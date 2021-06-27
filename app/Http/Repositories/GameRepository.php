<?php
namespace App\Http\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class GameRepository
{
    private function getAuthorizationToken(){
        return Cache::remember('authorizationToken', $seconds = 5430000, function () {
            return $authorizationToken = Http::post('https://id.twitch.tv/oauth2/token', config('services.igdb'))->json();
        });
    }

    private function callApi(String $body):array {
        $authorizationToken = $this->getAuthorizationToken();

        ['client_id' => $clientId] = config('services.igdb');

        return Http::withHeaders([
            'Client-ID' => $clientId,
            'Authorization' => "Bearer {$authorizationToken['access_token']}"
        ])
        // ->withToken($authorizationToken['access_token'])
        ->withBody($body, "text/plain")->post("https://api.igdb.com/v4/games")
        ->json();

    }

    public function getpopularGames():array {
        $before = Carbon::now()->subMonths(4)->timestamp;

        $after = Carbon::now()->addMonths(2)->timestamp;

        $body = " 
            fields name, slug, rating, total_rating, total_rating_count, follows, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
            sort follows desc;
            where rating != null & follows != null 
            & platforms = (48,49,130,6,9, 167)
            & (
                first_release_date >= {$before}
                & first_release_date <= {$after}
            );
            limit 12;
        ";

        $popularGames = $this->callApi($body);

        

        return $this->formatGamesData($popularGames);
    }

    public function getRecentlyReviwedGames(): array{
        $before = Carbon::now()->subMonths(4)->timestamp;

        $current = Carbon::now()->timestamp;

        $body = " 
            fields name, slug, rating, rating_count, total_rating, total_rating_count, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
            sort total_rating_count desc;
            where rating != null
            & platforms = (48,49,130,6,9, 167)
            & (
                first_release_date >= {$before}
                & first_release_date <= {$current}
            )
            & rating_count > 5;
            limit 5;
        ";

        $recentlyReviewedGames = $this->callApi($body);


        return $recentlyReviewedGames;
    }

    public function getComingSoonGames(): array{
        $after = Carbon::now()->addMonths(4)->timestamp;

        $current = Carbon::now()->timestamp;

        $body = " 
            fields name, slug, rating, rating_count, total_rating, total_rating_count, hypes, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
            sort hypes desc;
            where cover != null 
            & hypes != null
            & platforms = (48,49,130,6,9, 167)
            & (
                first_release_date >= {$current}
                & first_release_date <= {$after}
            );
            limit 5;
        ";

        $comingSoonGames = $this->callApi($body);

        return $comingSoonGames;
    }


    public function getMostAnticipatedGames(): array{
        $after = Carbon::now()->addMonths(12)->timestamp;

        $current = Carbon::now()->timestamp;

        $body = " 
            fields name, slug, rating, rating_count, total_rating, total_rating_count, hypes, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
            sort hypes desc;
            where cover != null & hypes != null
            & platforms = (48,49,130,6,9, 167)
            & (
                first_release_date >= {$current}
                & first_release_date <= {$after}
            );
            limit 5;
        ";

        $mostAnticipatedGames = $this->callApi($body);

        return $mostAnticipatedGames;
    }

    public function getGameBySlug($slug): array{

        $body = " 
            fields name, slug, rating, rating_count, total_rating, aggregated_rating, total_rating_count, hypes, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation, similar_games.name,similar_games.slug, similar_games.cover.url, similar_games.rating, similar_games.platforms.abbreviation, websites.*, videos.*, involved_companies.company.name, screenshots.url;
            where slug = \"{$slug}\";
        ";

        $data = $this->callApi($body);
        abort_if(empty($data), 404);
        [$game] = $data;
        $game['videos'] = collect($game['videos'])->map( function($video){
            return[
                'name' => Str::snake($video['name']),
                'video_id' => $video['video_id']
            ];
        })->pluck('video_id', 'name')->toArray();

        $game['similar_games'] = $this->formatGamesData($game['similar_games']);
        $game['platforms_string'] = collect($game['platforms'])->pluck('abbreviation')->implode(' &middot; ');
        $game['screenshots'] = collect($game['screenshots'])->map( function ($screnshot){
            return [
                'big' => str_replace('thumb', 'screenshot_big', $screnshot['url']),
                'huge' => str_replace('thumb', 'screenshot_huge', $screnshot['url'])
            ];
        });
        $game['links'] = [
            'website' => $game['websites'][0],
            'facebook' => collect($game['websites'])->first( function($website){
                return Str::contains($website['url'], 'facebook');
            }),
            'instagram' => collect($game['websites'])->first( function($website){
                return Str::contains($website['url'], 'instagram');
            }),
            'twitter' => collect($game['websites'])->first( function($website){
                return Str::contains($website['url'], 'twitter');
            })
        ];
        
        return $game;
   
    }

    public function searchGames($query): array{

        $body = "search \"{$query}\";
        fields name, game.slug, game.cover.url;
        where game.cover != null;";

        $authorizationToken = $this->getAuthorizationToken();

        ['client_id' => $clientId] = config('services.igdb');

        $results = Http::withHeaders([
            'Client-ID' => $clientId,
            'Authorization' => "Bearer {$authorizationToken['access_token']}"
        ])
        ->withBody($body, "text/plain")->post("https://api.igdb.com/v4/search")
        ->json();

        if(is_array($results) && count($results)){
            $results = collect($results)->map( function( $result) {
                return [
                    'name' => $result['name'],
                    'slug' => $result['game']['slug'],
                    'thumbnail' => $result['game']['cover']['url'],
                ];
            })->toArray();

            return $results;
        }

     
        return [];
    }

    private function formatGamesData($games){
        return collect($games)->map( function($game){
            return collect($game)->merge([
                'cover_image_url' => array_key_exists('cover', $game)? str_replace('thumb', 'cover_big', $game['cover']['url']) : '',
                'platforms_string' => array_key_exists('platforms', $game)? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : '',
                'rating' => array_key_exists('rating', $game)? $game['rating'] : 0,
            ]);
        })->toArray();
    }
}
