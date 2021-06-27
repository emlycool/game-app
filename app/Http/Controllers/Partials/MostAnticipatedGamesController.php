<?php

namespace App\Http\Controllers\Partials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Repositories\GameRepository;

class MostAnticipatedGamesController extends Controller
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
            
        // $mostAnticipatedGames = $this->gameRepository->getmostAnticipatedGames();     
        $mostAnticipatedGames = Cache::remember('mostAnticipatedGames', $seconds = 4000, fn() => $this->gameRepository->getmostAnticipatedGames() );  
        return view('partials._most-anticipated-games', compact('mostAnticipatedGames'));
    }
}
