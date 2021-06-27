@extends('layouts.app')

@section('content')
    <section class="container my-5">
        <div class="row gx-4">
            <div class="col-lg-4 col-md-5 col-sm-12 px-3 px-sm-4 mb-3">
                <img src="{{str_replace('thumb', 'cover_big', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12">
                <div class="d-flex flex-column">
                    <div class="heading mb-0">
                        <h2 class="text-gray-100">{{$game['name']}}</h2>
                    </div>
                    <div class="genre text-gray-300 mb-2">
                        @if (array_key_exists('genres', $game))
                            @foreach ($game['genres'] as $genre)
                                <span>{{$genre['name']}}</span>
                                @if (!$loop->last)
                                &middot;
                                @endif
                            @endforeach
                        &middot;
                        @endif
                        {{$game['involved_companies'][0]['company']['name']}}
                    </div>
                    <div class="platforms text-gray-300">
                        {!!$game['platforms_string'] !!}
                    </div>
                    <div class="row gx-3 mb-3" >
                        <div class="col-lg-5 col-md-8 d-flex align-items-center mb-3">
                            <div class="rating d-inline-flex cw-sm-8 ch-sm-8 cw-6 ch-6 border-radius-50 bg-light-purple text-center align-items-center justify-content-center text-gray-300 position-relative" 
                            @if(array_key_exists('rating', $game))
                            data-details-rating data-rating="{{round($game['rating'])}}"
                            @endif >
                                {{-- <span class="text-gray-300" >
                                    
                                
                                </span> --}}
                            </div>

                            <small class="rating-type d-inline-flex text-gray-400 ml-2">
                                Member <br> Score
                            </small>

                            <div class="rating d-inline-flex cw-sm-8 ch-sm-8 cw-6 ch-6 ml-4 border-radius-50 bg-light-purple text-center align-items-center justify-content-center position-relative text-gray-300" 
                            @if(array_key_exists('rating', $game))
                            data-details-rating data-rating="{{round($game['rating'])}}"
                            @endif> 
                            {{-- <span class="text-gray-300">
                                @if(array_key_exists('aggregated_rating', $game))
                                {{round($game['aggregated_rating'])}}
                                @endif
                                </span>  --}}
                            </div>

                            <small class="rating-type d-inline-flex text-gray-400 ml-2">
                                Critic <br> Score
                            </small>

                        </div>
                        <div class="col-md-7 col-md-12 d-flex align-items-center justify-content-center justify-content-sm-start">
                            @if (!empty($game['links']['website']))
                            <a href="{{$game['links']['website']['url']}}" class="bg-light-purple d-inline-flex p-2 mx-2 border-radius-50 align-items-center justify-content-center justify-content-sm-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe fill-current" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4H2.255a7.025 7.025 0 0 1 3.072-2.472 6.7 6.7 0 0 0-.597.933c-.247.464-.462.98-.64 1.539zm-.582 3.5h-2.49c.062-.89.291-1.733.656-2.5H3.82a13.652 13.652 0 0 0-.312 2.5zM4.847 5H7.5v2.5H4.51A12.5 12.5 0 0 1 4.846 5zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5H7.5V11H4.847a12.5 12.5 0 0 1-.338-2.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12H7.5v2.923c-.67-.204-1.335-.82-1.887-1.855A7.97 7.97 0 0 1 5.145 12zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11H1.674a6.958 6.958 0 0 1-.656-2.5h2.49c.03.877.138 1.718.312 2.5zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12h2.355a7.967 7.967 0 0 1-.468 1.068c-.552 1.035-1.218 1.65-1.887 1.855V12zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5h-2.49A13.65 13.65 0 0 0 12.18 5h2.146c.365.767.594 1.61.656 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4H8.5V1.077c.67.204 1.335.82 1.887 1.855.173.324.33.682.468 1.068z"/>
                                </svg>
                            </a>
                            @endif
                            @if (!empty($game['links']['instagram']))
                            <a href="{{$game['links']['instagram']['url']}}" class="bg-light-purple d-inline-flex p-2 mx-2 border-radius-50 align-items-center justify-content-center justify-content-sm-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram cw-4 ch-4 fill-current" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                  </svg>
                            </a>
                            @endif
                            @if (!empty($game['links']['twitter']))
                            <a href="{{$game['links']['twitter']['url']}}" class="bg-light-purple d-inline-flex p-2 mx-2 border-radius-50 align-items-center justify-content-center justify-content-sm-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter fill-current" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                  </svg>
                            </a>
                            @endif
                            @if (!empty($game['links']['facebook']))
                            <a href="{{$game['links']['facebook']['url']}}" class="bg-light-purple d-inline-flex p-2 mx-2 border-radius-50 align-items-center justify-content-center justify-content-sm-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook fill-current" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>

                    <div class="description mb-3 w-75">
                        <p class="text-gray-300">
                            {{$game['summary']}}
                        </p>
                    </div>
                    <div class="trailer d-inline-flex">
                        @if (array_key_exists('videos', $game) &&  array_key_exists('trailer', $game['videos']))
                        {{-- href="{{"https://youtube.com/watch?v={$game['videos']['trailer']}"}}"> --}}
                        <button class="btn btn-primary btn-lg mr-3 watch-trigger" data-video-id="{{$game['videos']['trailer']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-circle-fill cw-4 ch-4" viewBox="0 0 16 16" style="fill: #fff;">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>

                            Play Trailer
                        </button>
                        @endif

                        @if (array_key_exists('videos', $game) &&  array_key_exists('gameplay_video', $game['videos']))
                        {{-- href="{{"https://youtube.com/watch?v={$game['videos']['gameplay_video']}"}}" --}}
                        <button class="btn btn-primary btn-lg watch-trigger"   data-video-id="{{$game['videos']['gameplay_video']}}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-circle-fill cw-4 ch-4" viewBox="0 0 16 16" style="fill: #fff;">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                            </svg>

                            Watch Game Play
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="border-bottom border-secondary container"></div>

    <section class="screenshot container my-5">
        <div  class="heading mb-5">
            <h2 class="text-primary text-capitalize">Screenshots</h2>
        </div>
        <div class="row gx-5" id="game__screenshot__js">
            @foreach ($game['screenshots'] as $screenshot)
            <div class="col-lg-4 col-sm-6 mb-3 mb-md-5">
                <div class="poster relative bg-gray-700 screenshot screenshot__item cursor-pointer" style="padding-bottom: 55%;" data-src="{{$screenshot['big']}}">
                    <img src="{{$screenshot['big']}}" srcset="{{$screenshot['huge']}}" class="card-img-top img-fluid img-rounded absolute" alt="...">
                </div>
            </div>
            @if ($loop->index == 5)
                @break
            @endif
            @endforeach
        </div>
    </section>
    

    <div class="border-bottom border-secondary container"></div>

    <section class="container my-5">
        <div  class="heading mb-5">
            <h2 class="text-primary text-capitalize">Similar Games</h2>
        </div>
        <div class="d-flex flex-wrap">
            @foreach ($game['similar_games'] as $game)
                <x-game-card :game="$game"></x-game-card>  
                @if ($loop->index == 5)
                    @break
                @endif
            @endforeach
        </div>
    </section>
    {{-- video-id="'6eS7CX5zkj0'" --}}
    <modal-video ></modal-video>

    <template id="modal-ytl-template">
        <style>
            @import '{{secure_asset('css/modal-ytl.css')}}';
        </style>  

        <div class="modal-ytl" aria-hidden="true" id="modalYtl">
            <div class="container px-2 px-md-5">
                <div class="modal-dialog-ytl">
                    <div class="modal-content-ytl">
                        <div class="video-wrapper" id="videoWrapper">
                            {{-- <iframe src="https://www.youtube.com/embed/6eS7CX5zkj0?rel=0&modestbranding=1&autoplay=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                        </div>
                        <div class="modal-close-ytl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#fff" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
@endsection


@push('scripts')
    <script>
        document.querySelectorAll('.watch-trigger').forEach( (el) => {
            el.addEventListener('click', (e) => {
                console.log(el);
                const modalVideo = document.querySelector('modal-video');
                let videoId = el.dataset.videoId
                modalVideo.setAttribute('video-id', videoId)
                modalVideo.showModal()
            })
        })
    </script>
@endpush