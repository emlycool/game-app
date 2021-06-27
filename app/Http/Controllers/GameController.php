<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\GameRepository;

class GameController extends Controller
{

    protected $gameRepository;

    public function __construct(GameRepository $gameRepository){
        $this->gameRepository = $gameRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $before = Carbon::now()->subMonths(4)->timestamp;
        // $before2 = Carbon::now()->subMonths(2)->timestamp;

        // $after = Carbon::now()->addMonths(2)->timestamp;
        // $after2 = Carbon::now()->addMonths(4)->timestamp;
        // $after3 = Carbon::now()->addMonths(12)->timestamp;

        // $current = Carbon::now()->timestamp;


        // $popularGames = Http::withHeaders
        // $authorizationToken = Cache::remember('authorizationToken', 5430000, function () {
        //     return $authorizationToken = Http::post('https://id.twitch.tv/oauth2/token', config('services.igdb'))->json();
        // });

        // ['client_id' => $clientId] = config('services.igdb');
        // $popularGames = Http::withHeaders([
        //     'Client-ID' => $clientId,
        //     'Authorization' => "Bearer {$authorizationToken['access_token']}"
        // ])
        // // ->withToken($authorizationToken['access_token'])
        // ->withBody(
        //     "
        //         fields name, slug, rating, total_rating, total_rating_count, follows, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
        //         sort follows desc;
        //         where rating != null & follows != null 
        //         & platforms = (48,49,130,6,9, 167)
        //         & (
        //             first_release_date >= {$before}
        //             & first_release_date <= {$after}
        //         );
        //         limit 10;
        //     ", "text/plain"
        // )->post("https://api.igdb.com/v4/games")
        // ->json();
        


        // $recentlyReviewedGames = Http::withHeaders([
        //     'Client-ID' => $clientId,
        //     'Authorization' => "Bearer {$authorizationToken['access_token']}"
        // ])
        // // ->withToken($authorizationToken['access_token'])
        // ->withBody(
        //     "
                // fields name, slug, rating, rating_count, total_rating, total_rating_count, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
                // sort total_rating_count desc;
                // where rating != null
                // & platforms = (48,49,130,6,9, 167)
                // & (
                //     first_release_date >= {$before2}
                //     & first_release_date <= {$current}
                // )
                // & rating_count > 5;
                // limit 5;
        //     ", "text/plain"
        // )->post("https://api.igdb.com/v4/games")
        // ->json();
        // dd($popularGames);


        // $mostAnticipatedGames = Http::withHeaders([
        //     'Client-ID' => $clientId,
        //     'Authorization' => "Bearer {$authorizationToken['access_token']}"
        // ])
        // // ->withToken($authorizationToken['access_token'])
        // ->withBody(
        //     "
        //         fields name, slug, rating, rating_count, total_rating, total_rating_count, hypes, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
        //         sort hypes desc;
        //         where cover != null & hypes != null
        //         & platforms = (48,49,130,6,9, 167)
        //         & (
        //             first_release_date >= {$current}
        //             & first_release_date <= {$after3}
        //         );
        //         limit 5;
        //     ", "text/plain"
        // )->post("https://api.igdb.com/v4/games")
        // ->json();



        // $comingSoonGames = Http::withHeaders([
        //     'Client-ID' => $clientId,
        //     'Authorization' => "Bearer {$authorizationToken['access_token']}"
        // ])
        // // ->withToken($authorizationToken['access_token'])
        // ->withBody(
            // "
            //     fields name, slug, rating, rating_count, total_rating, total_rating_count, hypes, game_engines.name, genres.name, storyline, summary, cover.url, first_release_date, platforms.abbreviation;
            //     sort hypes desc;
            //     where cover != null & hypes != null
            //     & platforms = (48,49,130,6,9, 167)
            //     & (
            //         first_release_date >= {$current}
            //         & first_release_date <= {$after2}
            //     );
            //     limit 5;
            // ", "text/plain"
        // )->post("https://api.igdb.com/v4/games")
        // ->json();



        // dd($current, $after3);
        $mostAnticipatedGames = [];
        $recentlyReviewedGames = [];
        
        $comingSoonGames = [];

        return view('welcome', compact('recentlyReviewedGames','mostAnticipatedGames', 'comingSoonGames'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = $this->gameRepository->getGameBySlug($slug);
        // dump($game);
        return view('show', compact('game'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchQuery = $request->searchQuery;
        $games = $this->gameRepository->searchGames($searchQuery);
        return response()->json($games, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
