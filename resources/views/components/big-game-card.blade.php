<div class="card bg-light-purple p-4 rounded shadow-sm-transition mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-4 mb-3">
                <a href="{{route('show.game', $game['slug'])}}">

                    <div class="poster relative">
                        <img src="{{str_replace('thumb', 'cover_big', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
                        <div class="rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-dark-purple text-center d-flex align-items-center justify-content-center js-rv-rating" style="z-index: 3; right: -1.5rem; bottom: -1.5rem;" data-rating="{{$game['rating']}}">
                            {{-- <span class="text-gray-300">{{round($game['rating'])}}</span> --}}
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-8 pl-4">
                <a href="{{route('show.game', $game['slug'])}}">
                    <h2 class="card-title text-gray-300 mb-2">{{$game['name']}}</h2>
                </a>
                <p class="card-text text-gray-500 mb-3">
                    @foreach ($game['platforms'] as $platform)
                        {{$platform['abbreviation']? $platform['abbreviation']. ", ": null}}
                    @endforeach
                </p>
                
                <p class="card-text text-gray-500 clamp six-lines game__summary">
                    {{$game['summary']}}
                </p>
            </div>
        </div>
    </div>
</div>