@foreach ($comingSoonGames as $game)
    <x-min-game-card :game="$game"></x-min-game-card>
@endforeach