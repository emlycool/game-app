<div class="col-xl-2 col-lg-3 col-md-4 pl-md-3 col-sm-6 px-2 px-md-4 mb-3">
    <div class="card game-card">
        <a href="{{route('show.game', $game['slug'])}}">
            <div class="poster relative bg-gray-600" style="padding-bottom: 135%;">
                @if (array_key_exists('cover', $game))
                <img src="{{$game['cover_image_url']}}" class="card-img-top img-fluid img-rounded absolute h-100" alt="{{$game['name']}}">
                @endif
                <div class="rating card-rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-light-purple text-center d-flex align-items-center justify-content-center js-pg-rating" data-rating="{{$game['rating']}}">
                    {{-- <span class="text-gray-300">
                        @if(array_key_exists('rating', $game))
                        {{round($game['rating'])}}
                        @endif
                    </span> --}}
                </div>
            </div>
        </a>

        <div class="card-body mt-3">
            <a href="{{route('show.game', $game['slug'])}}">
                <h6 class="card-title text-gray-300 clamp two-lines">{{$game['name']}}</h6>
            </a>
            <p class="card-text text-gray-500 clamp one-line">
                {{$game['platforms_string']}}
            </p>
        </div>
    </div>
</div>

{{-- @push('scripts')
    <script>
        
    </script>
@endpush --}}