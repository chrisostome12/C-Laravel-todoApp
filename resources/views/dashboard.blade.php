<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue sur le Gestionnaire de Tâches</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #dff9fb, #c7ecee);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-box {
            background-color: #ffffff;
            padding: 3rem 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #130f40;
        }

        p.lead {
            font-size: 1.2rem;
            color: #535c68;
            margin-top: 1rem;
        }

        .btn-custom {
            background-color: #0984e3;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 0.5rem;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background-color: #74b9ff;
            transform: scale(1.05);
        }

        footer {
            position: absolute;
            bottom: 15px;
            width: 100%;
            text-align: center;
            font-size: 0.85rem;
            color: #636e72;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="hero-box">
        <h1>Bienvenue 👋</h1>
        <p class="lead">
    Chaque jour est une opportunité !<br>
    Planifiez, accomplissez et célébrez vos progrès grâce à votre gestionnaire de tâches intelligent.
</p>
 

        <a href="{{ route('tasks.index') }}" class="btn btn-custom mt-4">Voir mes tâches</a>
    </div>

    <footer>
        Développé par chrysosotme kikipa ❤️ 
    </footer>
</body>
</html>
