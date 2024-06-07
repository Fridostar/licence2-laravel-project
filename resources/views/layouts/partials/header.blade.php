<header id="pq-header" class="pq-header-style-1  pq-has-sticky">
    <div class="pq-header-diff-block">
        <div class="row g-0">
            <div class="col-lg-12">
                
                <div class="pq-bottom-header">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <a class="navbar-brand me-5" href="{{ route('welcome') }}">
                                    <img class="img-fluid logo" src="{{ asset('front-tools/template-frontoffice/images/logos/logo.png') }}" alt="fitsense">
                                </a>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div id="pq-menu-contain" class="pq-menu-contain">
                                        <ul id="pq-main-menu" class="navbar-nav ml-auto">
                                            <div class="col-lg-12 text-end me-0 ">
                                                @if ( \Request::is('*/overview') )
                                                <a href="{{ route('gym.rooms.subscription') }} " type="button" class="btn btn-secondary">M'abonner à la salle</a>
                                                @else
                                                <a href="{{ route('gym.rooms.map') }} " type="button" class="btn btn-secondary">Salle a proximité</a>
                                                @endif
                                                
                                                @guest()
                                                <a href="{{ route('auth.login') }}" type="button" class="btn btn-primary">Connexion</a>
                                                @else
                                                <a href="{{ route('dashboard.home') }}" type="button" class="btn btn-primary">Mon compte</a>
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