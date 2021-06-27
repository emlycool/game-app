<header>
    <nav class="navbar navbar-expand-md border-bottom border-secondary py-3">
        <div class="container">
            <a class="navbar-brand text-gray-100" href="{{config('app.url')}}">
                <img src="{{secure_asset('img/game-app-logo.png')}}" alt="game app logo" id="app__logo">
            </a>
            <button class="navbar-toggler btn-default" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="cw-4 ch-4 fill-current" viewBox="0 0 448 512"><path d="M442 114H6a6 6 0 01-6-6V84a6 6 0 016-6h436a6 6 0 016 6v24a6 6 0 01-6 6zm0 160H6a6 6 0 01-6-6v-24a6 6 0 016-6h436a6 6 0 016 6v24a6 6 0 01-6 6zm0 160H6a6 6 0 01-6-6v-24a6 6 0 016-6h436a6 6 0 016 6v24a6 6 0 01-6 6z"></path></svg>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-md-5 mr-2 mr-sm-0 mb-2 mb-lg-0 col-lg-4">
                    <li class="nav-item mr-md-3">
                        <a class="nav-link active text-gray-100 text-end" aria-current="page" href="#">Games</a>
                    </li>
                    <li class="nav-item mr-md-3">
                        <a class="nav-link text-gray-100 text-end" href="#">Reviews</a>
                    </li>
                    
                    <li class="nav-item mr-md-3">
                        <a class="nav-link text-gray-100 text-end" href="#" tabindex="-1" aria-disabled="true">Coming Soon</a>
                    </li>
                </ul>

                <div class="d-flex ml-auto cw-100 col-lg-6 mr-2 mr-sm-0 justify-content-end ">
                    <form class="position-relative col-lg-6"  x-data="searchWidget()" x-cloak>
                        <input class="form-control form-control-sm border-radius-3 relative" type="search" placeholder="Search" aria-label="Search" id="nav-search-input"  autofocus autocomplete="off" autocorrect="off" 
                        @keyup.debounce.500ms="searchIt($event.target.value)"
                        x-model="searchQuery">

                        <div id="search-dropdown" class="position-absolute mt-3 rounded py-3 px-3"
                        :data-dropdown="searchQuery && showSearchDropdown ?'expand': ''" 
                        @click.away="showSearchDropdown = false">
                            <div class="text-center text-gray-100" x-show="sendingRequest">
                                <div class="spinner-border spinner-border-sm" role="status" v-else>
                                    <span class="sr-only"></span>
                                </div>
                            </div>

                            <ul class="list-group px-0">
                                <template x-for="(result, index) in results.slice(0,6)" :key="index">
                                    <li class="list-group-item mb-2 rounded">
                                        <a :href="'/games/'+result.slug" class="row gx-2 text-gray-100 position-relative">
                                            <div class="poster col-4">
                                                <img :src="result.thumbnail" alt="" class="img-fluid">
                                            </div>
                                            <span class="col-8" x-text="result.name"></span>
                                        </a>
                                    </li>
                                </template>

                                <li x-show="results.length == 0 && searchQuery && !sendingRequest" class=" list-group-item mb-2">
                                    <div class="text center">
                                        <span class="text-gray-100">No game found</span>
                                    </div>
                                </li>
                                <li x-show="searchQuery.length < 3" class="list-group-item mb-2">
                                    
                                </li>
                            </ul>
                            
                        </div>

                    </form>

                    
    
                    <div class="user ml-2">
                        <img src="https://via.placeholder.com/150" alt="" class="border-radius-50 img-fluid cw-5 ch-5">
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
</header>