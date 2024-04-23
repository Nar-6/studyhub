<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e87f4f">
    <div class="container">
        <a class="navbar-brand" href="{{ route('etudiants.index') }}">
            Study Hub
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul> <!-- Ajout d'un conteneur vide à gauche pour séparer les icônes -->
            <ul class="navbar-nav">
                @auth
                <!-- Utilisateur connecté -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-fill"></i> <!-- Icône pour voir le profil -->
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">
                            <i class="bi bi-box-arrow-right"></i> <!-- Icône pour se déconnecter -->
                        </button>
                    </form>
                </li>
                @else
                <!-- Utilisateur non connecté -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> <!-- Icône pour connexion -->
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="bi bi-person-plus-fill"></i> <!-- Icône pour inscription -->
                    </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
