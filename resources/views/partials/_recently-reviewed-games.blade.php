@foreach ($recentlyReviewedGames as $game)
    <x-big-game-card :game="$game"></x-big-game-card>
@endforeach