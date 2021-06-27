<?php

namespace App\Http\Controllers\Partials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\GameRepository;

class ComingSoonGamesController extends Controller
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
            
        $comingSoonGames = Cache::remember('comingSoonGames', $seconds = 4000, fn() => $this->gameRepository->getComingSoonGames() );    
        return view('partials._coming-soon-games', compact('comingSoonGames'));
    }
}
