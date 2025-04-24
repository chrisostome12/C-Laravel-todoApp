<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur le Gestionnaire de Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Gestionnaire de Tâches</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav">
                    <!-- Si l'utilisateur est connecté, afficher le nom et le bouton de déconnexion -->
                    @if(Auth::check())
                        <li class="nav-item">
                            <span class="navbar-text text-white">Bonjour, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    <!-- Sinon, afficher les liens de connexion et d'inscription -->
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-5">
        <div class="text-center p-5 bg-white rounded shadow">
            <h1 class="mb-4">Bienvenue 👋</h1>
            <p class="lead">Ceci est une simple application Laravel pour gérer vos tâches quotidiennes.</p>

            <!-- Si l'utilisateur est connecté, afficher le bouton pour voir ses tâches -->
            @if(Auth::check())
                <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-4">Voir mes tâches</a>
            <!-- Sinon, rediriger vers la page de connexion -->
            @else
                <a href="{{ route('login') }}" class="btn btn-primary mt-4">Se connecter pour voir mes tâches</a>
            @endif
        </div>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
