@extends('layouts.app')

@section('content')
<section class="card-row container my-5 px-4 px-md-0">
    <div  class="heading mb-4">
        <h2 class="text-primary text-capitalize">Popular Games Right Now</h2>
    </div>
    <div class="d-flex flex-wrap justify-content-between">
        {{-- @foreach ($popularGames as $game)
        <div class="col-lg-2 col-md-3 col-sm-6">
            <div class="card game-card">
                <a href="">
                    <div class="poster relative">
                        <img src="{{str_replace('thumb', 'cover_big', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
                        <div class="rating absolute cw-8 ch-8 border-radius-50 bg-light-purple text-center d-flex align-items-center justify-content-center" style="z-index: 3; right: -1.5rem; bottom: -1.5rem;">
                            <span class="text-gray-300">{{round($game['rating'])}}</span>
                        </div>
                    </div>
                </a>

                <div class="card-body mt-3">
                  <h6 class="card-title text-gray-300">{{$game['name']}}</h6>
                  <p class="card-text text-gray-500">
                      @foreach ($game['platforms'] as $platform)
                          {{$platform['abbreviation']? $platform['abbreviation']. ", ": null}}
                      @endforeach
                    </p>
                </div>
            </div>
        </div>
        @endforeach --}}
        <include-fragment 
        src="{{route('popular.games')}}" 
        class="d-flex flex-wrap justify-content-between"
        data-name="popularGames">
            @foreach (range(1,12) as $item)
            <div class="col-xl-2 col-lg-3 col-md-4 pl-md-3 col-sm-6 px-2 px-md-4 mb-3">
                <div class="card game-card">
                    
                    <div class="poster relative bg-gray-600 poster-container mb-3 rounded wave">
                        <div class="rating card-rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-light-purple text-center d-flex align-items-center justify-content-center">
                            <span class=""></span>
                        </div>
                    </div>
                    
                    <h6 class="card-title bg-gray-600 text-container mb-2 rounded wave">{{str_repeat('_', rand(8,18))}}</h6>
                    
                    <p class="card-text bg-gray-600 rounded text-container wave">
                        {{str_repeat('_', 5)}}
                    </p>
                </div>
            </div>
            @endforeach
        </include-fragment>
    </div>
</section>
<div class="border-bottom border-secondary container"></div>

<section class="container my-5 px-4 px-md-0">
    
    <div class="row">
        <div class="main col-lg-8 col-md-7 col-sm-12">
            <div  class="heading mb-5">
                <h2 class="text-primary text-capitalize">Recently Reviewed</h2>
            </div>
            <div class="d-flex flex-column">
                {{-- @foreach ($recentlyReviewedGames as $game)
                <div class="card bg-light-purple p-4 rounded shadow-sm-transition mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <div class="poster relative">
                                    <img src="{{str_replace('thumb', 'cover_big', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
                                    <div class="rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-dark-purple text-center d-flex align-items-center justify-content-center" style="z-index: 3; right: -1.5rem; bottom: -1.5rem;">
                                        <span class="text-gray-300">{{round($game['rating'])}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 pl-4">
                                <h2 class="card-title text-gray-300 mb-2">{{$game['name']}}</h2>
                                <p class="card-text text-gray-500 mb-3">
                                    @foreach ($game['platforms'] as $platform)
                                        {{$platform['abbreviation']? $platform['abbreviation']. ", ": null}}
                                    @endforeach
                                </p>
                                
                                <p class="card-text text-gray-500 d-none d-sm-block">
                                    {{$game['summary']}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}
                
                <include-fragment src="{{route('recently.reviewed.games')}}" data-name="recentlyReviewedGames">
                    
                    @foreach (range(1,5) as $item)
                    <div class="card bg-light-purple p-4 rounded shadow-sm-transition mb-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <div class="poster relative bg-gray-600 poster-container mb-3 rounded w-100 wave">
                                        <div class="rating card-rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-light-purple text-center d-flex align-items-center justify-content-center">
                                            <span class="text-gray-400"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 pl-4">
                                    <h4 class="card-title bg-gray-600 mb-2 text-container rounded wave">{{str_repeat('_', rand(18,30))}}</h4>
                                    <p class="card-text bg-gray-600 mb-3 text-container rounded wave">
                                        {{str_repeat('_', 8)}}
                                    </p>
                                    
                                    <p class="card-text bg-gray-600 text-container d-none d-sm-block rounded wave">
                                        {{str_repeat('_', rand(30,50))}}
                                    </p>
                                    <p class="card-text bg-gray-600 d-none text-container d-sm-block rounded wave">
                                        {{str_repeat('_', rand(30,50))}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </include-fragment>
            </div>
        </div>
        <div class="sidebar col-lg-3 offset-lg-1 col-md-5 col-sm-12">
            <div  class="heading mb-4">
                <h2 class="text-primary text-capitalize">Most Anticipated</h2>
            </div>
            
            <div class="d-flex flex-column mb-5">
                {{-- @foreach ($mostAnticipatedGames as $game)
                <div class="row mb-3">
                    <div class="col">
                        <a href="">
                            <div class="poster relative">
                                <img src="{{str_replace('thumb', 'cover_small', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-8">
                        <h6 class="text-gray-300 mb-2">{{$game['name']}}</h6>
                        <span class="text-gray-500">{{!empty($game['first_release_date'])? \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') : 'n/a'}}</span>
                    </div>

                </div>
                @endforeach --}}
                
                <include-fragment src="{{route('most.anticipated.games')}}">
                    @foreach (range(1,4) as $item)
                    <div class="row mb-3">
                        <div class="col">
                            
                            <div class="poster relative poster-container-sm bg-gray-600 w-100 rounded">
                            </div>
                    
                        </div>
                        <div class="col-8">
                            <h6 class=" mb-2 bg-gray-600 text-container rounded">{{str_repeat('_', rand(7, 12))}}</h6>
                            <span class=" bg-gray-600 text-container rounded"></span>
                        </div>
                    
                    </div>
                    @endforeach
                </include-fragment>
            </div>

            <div  class="heading mb-4">
                <h2 class="text-primary text-capitalize">Coming Soon</h2>
            </div>
            
            <div class="d-flex flex-column mb-5">
                {{-- @foreach ($comingSoonGames as $game)
                <div class="row mb-3">
                    <div class="col">
                        <a href="">
                            <div class="poster relative">
                                <img src="{{str_replace('thumb', 'cover_small', $game['cover']['url'])}}" class="card-img-top img-fluid img-rounded" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-8">
                        <h6 class="text-gray-300 mb-2">{{$game['name']}}</h6>
                        <span class="text-gray-500">{{!empty($game['first_release_date'])? \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') : 'n/a'}}</span>
                    </div>

                </div>
                @endforeach --}}
                <include-fragment src="{{route('coming.soon.games')}}">
                    <div class="row mb-3">
                        <div class="col">
                            
                            <div class="poster relative poster-container-sm bg-gray-600 w-100 rounded">
                            </div>
                    
                        </div>
                        <div class="col-8">
                            <h6 class=" mb-2 bg-gray-600 text-container rounded">{{str_repeat('_', rand(7, 12))}}</h6>
                            <span class=" bg-gray-600 text-container rounded"></span>
                        </div>
                    
                    </div>
                </include-fragment>
            </div>
        </div>
    </div>
</section>
@endsection