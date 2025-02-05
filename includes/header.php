<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bibliothèque Numérique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background: rgba(255, 255, 255, 0.9);
            padding: 15px;
        }
        .hero-section {
            text-align: center;
            padding: 100px 20px;
        }
        .hero-title {
            font-size: 4rem;
            font-weight: bold;
        }
        .hero-subtitle {
            font-size: 1.2rem;
            margin-top: 15px;
            color: #555;
        }
        .hero-btn {
            margin-top: 20px;
            background-color: #443C68;
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#">À Propos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </div>
        <a href="#" class="btn btn-dark rounded-pill">Rejoignez-nous</a>
    </div>
</nav>

<section class="hero-section">
    <h1 class="hero-title">Votre <br> Bibliothèque <br> Numérique</h1>
    <p class="hero-subtitle">Explorez, empruntez et dévorez des livres sans fin !</p>
    <a href="#" class="btn hero-btn">Commencez Maintenant</a>
</section>
<li class="nav-item">
                    <a class="nav-link" href="../views/books/liste.php">Ajouter un Livre</a>
                </li>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
