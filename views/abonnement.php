<?php
session_start();
include '../includes/config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "Veuillez vous connecter pour accéder à cette page.";
    header("Location: ../pages/connexion.php");
    exit();
}

// Récupération des informations de l'utilisateur
$user_id = $_SESSION['user_id'];
$user_nom = $_SESSION['user_nom'] ?? 'Utilisateur';

// Affichage des messages de session
if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-info text-center">'.$_SESSION['message'].'</div>';
    unset($_SESSION['message']);
}

// Récupérer les abonnements
$query = $pdo->query("SELECT * FROM abonnements");
$abonnements = $query->fetchAll();

// Vérifier si l'utilisateur a déjà un abonnement actif
$abonnement_actuel = null;
$query = $pdo->prepare("
    SELECT a.nom, ua.date_fin 
    FROM user_abonnement ua 
    JOIN abonnements a ON ua.abonnement_id = a.id 
    WHERE ua.user_id = ? AND ua.date_fin >= ?
");
$query->execute([$user_id, date('Y-m-d')]);
$abonnement_actuel = $query->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Abonnements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Bienvenue, <strong><?= htmlspecialchars($user_nom) ?></strong> 👋</h3>
        <a href="logout.php" class="btn btn-danger">Déconnexion</a>
    </div>

    <h2 class="text-center">Choisissez un Abonnement</h2>

    <?php if ($abonnement_actuel): ?>
        <div class="alert alert-success text-center">
            Vous êtes actuellement abonné à <strong><?= htmlspecialchars($abonnement_actuel['nom']) ?></strong> 
            jusqu'au <strong><?= date('d/m/Y', strtotime($abonnement_actuel['date_fin'])) ?></strong>.
        </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">
            Vous n'avez pas d'abonnement actif.
        </div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($abonnements as $abo): ?>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header bg-primary text-white">
                        <h4><?= htmlspecialchars($abo['nom']) ?></h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Prix :</strong> <?= number_format($abo['prix'], 2, ',', ' ') ?>€</p>
                        <p><strong>Livres max :</strong> <?= $abo['max_livres'] ?></p>
                        <p><strong>Durée :</strong> <?= $abo['duree_emprunt'] ?> jours</p>
                        <form action="souscription.php" method="POST">
                            <input type="hidden" name="user_id" value="<?= $user_id ?>">
                            <input type="hidden" name="abonnement_id" value="<?= $abo['id'] ?>">
                            <button type="submit" class="btn btn-success">S'abonner</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
