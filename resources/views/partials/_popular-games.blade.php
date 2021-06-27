@foreach ($popularGames as $game)
    <x-game-card :game="$game"></x-game-card>    
@endforeach