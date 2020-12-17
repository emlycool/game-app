@extends('layouts.app')

@section('content')
<section class="card-row container my-5 px-4 px-md-0">
    <div  class="heading mb-4">
        <h2 class="text-primary text-capitalize">Popular Games</h2>
    </div>
    <div class="d-flex flex-wrap justify-content-between" style="gap: .75rem;">
        @foreach (range(1, 10) as $item)
        <div class="col-lg-2 col-md-3 col-sm-6">
            <div class="card game-card">
                <a href="">
                    <div class="poster relative">
                        <img src="https://via.placeholder.com/400" class="card-img-top img-fluid img-rounded" alt="...">
                        <div class="rating absolute cw-8 ch-8 border-radius-50 bg-light-purple text-center d-flex align-items-center justify-content-center" style="z-index: 3; right: -1.5rem; bottom: -1.5rem;">
                            <span class="text-gray-300">10%</span>
                        </div>
                    </div>
                </a>

                <div class="card-body mt-3">
                  <h6 class="card-title text-gray-300">Final Fantasy VII Remake</h6>
                  <p class="card-text text-gray-500">PS4</p>
                </div>
            </div>
        </div>
        @endforeach
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
                @foreach (range(1, 4) as $item)
                <div class="card bg-light-purple p-4 rounded shadow-sm-transition mb-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <div class="poster relative">
                                    <img src="https://via.placeholder.com/400" class="card-img-top img-fluid img-rounded" alt="...">
                                    <div class="rating absolute cw-6 ch-6 ch-sm-8 cw-sm-8 border-radius-50 bg-dark-purple text-center d-flex align-items-center justify-content-center" style="z-index: 3; right: -1.5rem; bottom: -1.5rem;">
                                        <span class="text-gray-300">10%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 pl-4">
                                <h2 class="card-title text-gray-300 mb-2">Final Fantasy VII Remake</h2>
                                <p class="card-text text-gray-500 mb-3">PS4</p>
                                
                                <p class="card-text text-gray-500 d-none d-sm-block">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates vitae laborum molestiae doloremque consectetur quas, quibusdam at, enim accusantium exercitationem eaque nostrum nam ut adipisci tempora atque ipsum voluptate mollitia?
                                </p>
                                <p class="card-text text-gray-500 d-block d-sm-none">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, facere.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="sidebar col-lg-3 offset-lg-1 col-md-5 col-sm-12">
            <div  class="heading mb-4">
                <h2 class="text-primary text-capitalize">Most Anticipated</h2>
            </div>
            
            <div class="d-flex flex-column mb-5">
                @foreach (range(1, 5) as $item)
                <div class="row mb-3">
                    <div class="col">
                        <a href="">
                            <div class="poster relative">
                                <img src="https://via.placeholder.com/400" class="card-img-top img-fluid img-rounded" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-8">
                        <h6 class="text-gray-300 mb-2">Marvel's Avenger</h6>
                        <span class="text-gray-500">Sep 04, 2020</span>
                    </div>

                </div>
                @endforeach
            </div>

            <div  class="heading mb-4">
                <h2 class="text-primary text-capitalize">Coming Soon</h2>
            </div>
            
            <div class="d-flex flex-column mb-5">
                @foreach (range(1, 5) as $item)
                <div class="row mb-3">
                    <div class="col">
                        <a href="">
                            <div class="poster relative">
                                <img src="https://via.placeholder.com/400" class="card-img-top img-fluid img-rounded" alt="...">
                            </div>
                        </a>
                    </div>
                    <div class="col-8">
                        <h6 class="text-gray-300 mb-2">Marvel's Avenger</h6>
                        <span class="text-gray-500">Sep 04, 2020</span>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection