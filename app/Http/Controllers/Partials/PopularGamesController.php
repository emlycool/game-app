<?php

namespace App\Http\Controllers\Partials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\GameRepository;

class PopularGamesController extends Controller
{
    protected $gameRepository;

    public function __construct(GameRepository $gameRepository){
        $this->gameRepository = $gameRepository;
    }

    /**
     * Handles popular game resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        
        // $popularGames = $this->gameRepository->getpopularGames();
        $popularGames = Cache::remember('popularGames', $seconds = 4000, fn() => $this->gameRepository->getpopularGames() );  
        return view('partials._popular-games', compact('popularGames'));
    }
}
