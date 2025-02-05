<?php
session_start();
include 'includes/config.php';

// Vérification de la connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: dashboard_guest.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Récupération des informations d'abonnement de l'utilisateur
$sql = "SELECT abonnement_id FROM users WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$stmt->execute();
$abonnement_active = $stmt->fetchColumn();

// Récupération des livres disponibles (ajout du champ image)
$sql_books = "SELECT id, titre, auteur FROM books";
$result_books = $pdo->query($sql_books);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">📖 Dashboard - Bibliothèque</h1>
    <p class="text-center">Bienvenue, <strong><?= htmlspecialchars($user_name) ?></strong> !</p>

    <div class="alert <?= $abonnement_active ? 'alert-success' : 'alert-danger' ?>">
        Abonnement : <?= $abonnement_active ? '✅ Actif' : '❌ Inactif' ?>
    </div>

    <h3 class="mt-4">📚 Livres disponibles :</h3>
    <div class="row">
        <?php while ($row = $result_books->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="assets/images/livre.webp" class="card-img-top" alt="Couverture du livre">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['titre']) ?></h5>
                        <p class="card-text">Auteur : <?= htmlspecialchars($row['auteur']) ?></p>
                        <a href="lire.php?id=<?= $row['id'] ?>" class="btn btn-primary">📖 Lire</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="mt-4">
        <a href="views/abonnement.php" class="btn btn-primary">Gérer mon abonnement</a>
        <a href="../logout.php" class="btn btn-danger">Déconnexion</a>
    </div>
</div>

</body>
</html>
