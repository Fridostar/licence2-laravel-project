<header id="pq-header" class="pq-header-style-1  pq-has-sticky">
    <div class="pq-header-diff-block">
        <div class="row g-0">
            <div class="col-lg-12">
                <div class="pq-bottom-header">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand me-5" href="{{ route('welcome') }}">
                                    <img class="img-fluid logo" src="{{ asset('front-tools/images/logos/logo.png') }}" alt="fitsense">
                                </a>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div id="pq-menu-contain" class="pq-menu-contain">
                                        <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                            <div class="col-lg-4 ">
                                                <form class="d-flex " role="search">
                                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                    <button class="btn btn-outline-success" type="submit">rechercher</button>
                                                </form>
                                            </div>
                                            <div class="col-lg-8 text-end me-0 ">
                                               
                                                   <a href="{{route('gym.room')}} " type="button" class="btn btn-secondary">Salle a proximité</a>
                                               
                                                
                                                @guest()
                                                <a href="{{ route('auth.login') }}" type="button" class="btn btn-primary">Connexion</a>
                                                @else
                                                <a href="" type="button" class="btn btn-primary">Mon compte</a>
                                                @endguest
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>