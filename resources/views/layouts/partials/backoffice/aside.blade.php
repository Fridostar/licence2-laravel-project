<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">

            <!-- sidebar for user with admin role -->
            @if( auth()->user()->role == "admin" )
                <li><a class=" " href="Accueil.html" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Accueil</span>
                    </a>
                </li>
                <li>
                    <a class=" " href="{{ route('dashboard.rooms.list') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Gérer les Gymnases</span>
                    </a>
                </li>
                <li>
                    <a class=" " href="{{ route('dashboard.pricing') }}" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Gérer les tarifs</span>
                    </a>
                </li>
                <li>
                    <a class=" " href="{{ route('dashboard.subscription') }}" aria-expanded="false">
                        <i class="fas fa-clone"></i>
                        <span class="nav-text">Gérer les abonnements</span>
                    </a>
                </li>
                <li><a class=" " href="Abonnés.html" aria-expanded="false">
                        <i class="fas fa-user-check"></i>
                        <span class="nav-text">Gérer les abonnés</span>
                    </a>
                </li>
            @endif

            <!-- sidebar for user with manager role -->
            @if( auth()->user()->role == "manager" )
                <li>
                    <a href="{{ route('manager.home') }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.pricing.index') }}" aria-expanded="false">
                        <i class="fas fa-heart"></i>
                        <span class="nav-text">Gérer les plans tarifs</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.outfit.index') }}" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Gérer les équipements</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('manager.room.index') }}" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Gérer les gymnases</span>
                    </a>
                </li>
                <li>
                    <a href="#" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Gérer les abonnés</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="coatch.html" aria-expanded="false">
                        <i class="fas fa-user-check"></i>
                        <span class="nav-text">Gérer les coach</span>
                    </a>
                </li>
                <li>
                    <a href="Gestion financière.html" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Gérer les achats</span>
                    </a>
                </li>
                <li>
                    <a href="salaire.html" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Gérer les salaire</span>
                    </a>
                </li>
                <li>
                    <a href="Programmation.html" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Programmation</span>
                    </a>
                </li> -->
            @endif

            <!-- sidebar for user with user role -->
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