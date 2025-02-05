<?php
include '../includes/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si user_id et abonnement_id sont bien envoyés
    if (!isset($_POST['user_id']) || !isset($_POST['abonnement_id'])) {
        $_SESSION['message'] = "Données invalides.";
        header("Location: abonnement.php");
        exit();
    }

    $utilisateur_id = $_POST['user_id'];
    $abonnement_id = $_POST['abonnement_id'];

    // Vérifier si l'utilisateur existe
    $query = $pdo->prepare("SELECT id FROM users WHERE id = ?");
    $query->execute([$utilisateur_id]);
    $user = $query->fetch();

    if (!$user) {
        $_SESSION['message'] = "Utilisateur introuvable.";
        header("Location: abonnement.php");
        exit();
    }

    // Vérifier si l'abonnement existe
    $query = $pdo->prepare("SELECT duree_emprunt FROM abonnements WHERE id = ?");
    $query->execute([$abonnement_id]);
    $abonnement = $query->fetch();

    if (!$abonnement) {
        $_SESSION['message'] = "Abonnement introuvable.";
        header("Location: abonnement.php");
        exit();
    }

    $duree = $abonnement['duree_emprunt'];
    $date_debut = date('Y-m-d');
    $date_fin = date('Y-m-d', strtotime("+$duree days"));

    // Vérifier si l'utilisateur a déjà un abonnement actif
    $query = $pdo->prepare("SELECT * FROM user_abonnement WHERE user_id = ? AND date_fin >= ?");
    $query->execute([$utilisateur_id, date('Y-m-d')]);

    if ($query->rowCount() > 0) {
        $_SESSION['message'] = "Vous avez déjà un abonnement actif.";
        header("Location: abonnement.php");
        exit();
    }

    // Insérer l'abonnement
    $query = $pdo->prepare("INSERT INTO user_abonnement (user_id, abonnement_id, date_debut, date_fin) VALUES (?, ?, ?, ?)");

    if ($query->execute([$utilisateur_id, $abonnement_id, $date_debut, $date_fin])) {
        $_SESSION['message'] = "Abonnement souscrit avec succès jusqu'au $date_fin.";
    } else {
        $_SESSION['message'] = "Erreur lors de la souscription.";
    }

    header("Location: abonnement.php");
    exit();
}
?>
