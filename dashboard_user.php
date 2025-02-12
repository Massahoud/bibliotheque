<?php
session_start();
include 'includes/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard_guest.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$sql = "SELECT abonnement_id FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$stmt->execute();
$abonnement_active = $stmt->fetchColumn();

$sql_books = "SELECT id, titre, auteur FROM books";
$result_books = $pdo->query($sql_books);





// Récupérer les abonnements
$query = $pdo->query("SELECT * FROM abonnements");
$abonnements = $query->fetchAll();

// Vérifier si l'utilisateur a déjà un abonnement actif
$sql = "SELECT ua.date_fin 
        FROM user_abonnement ua 
        JOIN abonnements a ON ua.abonnement_id = a.id 
        WHERE ua.user_id = :user_id 
        AND ua.date_fin >= CURDATE()";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$stmt->execute();
$abonnement_actuel = $stmt->fetchColumn();

if (!$abonnement_actuel) {
    header("Location: views/abonnement.php"); // Redirige vers la page d'abonnement si inactif
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque Professionnelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- CSS personnalisé -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> <!-- Icônes -->
</head>
<body class="bg-light">
<style>
    body {
    font-family: 'Arial', sans-serif;
}

header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    padding: 50px 0;
}

.card {
    border: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

section {
    padding: 50px 0;
}

#contact {
    background: linear-gradient(135deg, #0056b3, #003580);
}

footer {
    background-color: #00296b;
}

footer p {
    margin: 0;
}

</style>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
    <div class="container">
        <a class="navbar-brand" href="#">📖 Bibliothèque</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#books">Livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="views/abonnement.php">Mon Abonnement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="views/books/index.php">Tableau de board</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="../logout.php">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Header -->
<header class="bg-primary text-white text-center py-5">
    <h1>Bienvenue, <strong><?= htmlspecialchars($user_name) ?></strong> !</h1>
    <p class="lead">Découvrez nos livres et enrichissez vos connaissances.</p>
    <p>Abonnement : <span class="<?= $abonnement_active ? 'text-success' : 'text-danger' ?>"><?= $abonnement_active ? 'Actif' : 'Inactif' ?></span></p>
</header>

<!-- Section Livres -->
<section id="books" class="container my-5">
    <h2 class="text-center mb-4">📚 Nos Livres</h2>
    <div class="row">
        <?php while ($row = $result_books->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="assets/images/livre.webp" class="card-img-top" alt="Couverture du livre">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?= htmlspecialchars($row['titre']) ?></h5>
                        <p class="card-text">Auteur : <?= htmlspecialchars($row['auteur']) ?></p>
                        <a href="lire.php?id=<?= $row['id'] ?>" class="btn btn-primary">📖 Lire</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Section À Propos -->
<section id="about" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">📖 À propos de notre Bibliothèque</h2>
        <p class="lead text-center">
            Nous offrons une vaste collection de livres couvrant divers sujets et disciplines. Que vous soyez étudiant, professionnel ou amateur de lecture, notre bibliothèque est votre meilleure alliée pour apprendre et explorer de nouveaux horizons.
        </p>
    </div>
</section>

<!-- Formulaire de Contact -->
<section id="contact" class="bg-primary text-white py-5">
    <div class="container">
        <h2 class="text-center mb-4">✉️ Contactez-nous</h2>
        <form action="submit_contact.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-light">Envoyer</button>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2025 Bibliothèque | Tous droits réservés.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
