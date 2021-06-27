<?php

namespace App\Http\Controllers\Partials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\GameRepository;

class RecentlyReviewedGamesController extends Controller
{

    protected $gameRepository;

    public function __construct(GameRepository $gameRepository){
        $this->gameRepository = $gameRepository;
    }

    /**
     * Handles recently reviwed game resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
            
        // $recentlyReviewedGames = $this->gameRepository->getRecentlyReviwedGames();     
        $recentlyReviewedGames = Cache::remember('recentlyReviewedGames', $seconds = 4000, fn() => $this->gameRepository->getRecentlyReviwedGames() );  
        return view('partials._recently-reviewed-games', compact('recentlyReviewedGames'));
    }
}
