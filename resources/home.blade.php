<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur le Gestionnaire de Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center p-5 bg-white rounded shadow">
            <h1 class="mb-4">Bienvenue 👋</h1>
            <p class="lead">Moins de stress, plus d’organisation ! Gérez vos tâches sans prise de tête et faites-en une aventure du quotidien..</p>
            <a href="{{ route('tasks.index') }}" class="btn btn-primary mt-4">Voir mes tâches</a>
        </div>
    </div>
</body>
</html>
