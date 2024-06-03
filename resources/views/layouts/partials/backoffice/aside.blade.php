<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            @if( auth()->user()->role == "admin" )
            <li>
                <a class=" " href="{{ route('dashboard.rooms.list') }}" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Gymnases</span>
                </a>
            </li>
            <li>
                <a class=" " href="{{ route('dashboard.pricing') }}" aria-expanded="false">
                    <i class="fas fa-heart"></i>
                    <span class="nav-text">Type d'Abonnement</span>
                </a>
            </li>
            <li>
                <a class=" " href="{{ route('dashboard.subscription') }}" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Abonnement</span>
                </a>
            </li>
            @endif

            <li><a class=" " href="Accueil.html" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Accueil</span>
                </a>
            </li>
            <li>
                <a class=" " href="{{ route('dashboard.pricing') }}" aria-expanded="false">
                    <i class="fas fa-heart"></i>
                    <span class="nav-text">Type d'Abonnement</span>
                </a>
            </li>
            <li>
                <a class=" " href="{{ route('dashboard.subscription') }}" aria-expanded="false">
                    <i class="fas fa-clone"></i>
                    <span class="nav-text">Abonnement</span>
                </a>
            </li>
            <li><a class=" " href="Abonnés.html" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Abonnés</span>
                </a>
            </li>
            <li><a class=" " href="coatch.html" aria-expanded="false">
                    <i class="fas fa-user-check"></i>
                    <span class="nav-text">Coach</span>
                </a>
            </li>
            <li><a class=" " href="Programmation.html" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Programmation</span>
                </a>
            </li>
            <li><a class=" " href="Gestion financière.html" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Gestion financière</span>
                </a>
            </li>
            <li><a class=" " href="salaire.html" aria-expanded="false">
                    <i class="fas fa-table"></i>
                    <span class="nav-text">Salaire</span>
                </a>
            </li>

            @if( auth()->user()->role == "user" )
            <li>
                <a class=" " href="SALLE_DE_GYM.html" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Mon compte</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>