<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\Partials\PopularGamesController;
use App\Http\Controllers\Partials\ComingSoonGamesController;
use App\Http\Controllers\Partials\MostAnticipatedGamesController;
use App\Http\Controllers\Partials\RecentlyReviewedGamesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GameController::class, 'index']);

Route::get('/games/{slug}', [GameController::class, 'show'])->name('show.game');

Route::group(['prefix' => 'partials'], function(){
    Route::get('/popular-games', PopularGamesController::class)->name('popular.games');
    Route::get('/recently-reviewed-games', RecentlyReviewedGamesController::class)->name('recently.reviewed.games');
    Route::get('/coming-soon-games', ComingSoonGamesController::class)->name('coming.soon.games');
    Route::get('/most-anticipated-games', MostAnticipatedGamesController::class)->name('most.anticipated.games');
});