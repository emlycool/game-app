<div class="row mb-3">
    <div class="col">
        <a href="{{route('show.game', $game['slug'])}}">
            @if (array_key_exists('cover', $game))
            <div class="poster relative">
                <img src="{{str_replace('thumb', 'cover_small', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="{{$game['name']}}">
            </div> 
            @endif
        </a>
    </div>
    <div class="col-8">
        <a href="{{route('show.game', $game['slug'])}}">
            <h6 class="text-gray-300 mb-2">{{$game['name']}}</h6>
        </a>
        <span class="text-gray-500">{{!empty($game['first_release_date'])? \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') : 'n/a'}}</span>
    </div>

</div>