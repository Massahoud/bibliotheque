<?php
session_start();
require '../config/config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("❌ Méthode non autorisée.");
}

$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$password = $_POST["password"];

// Vérification de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<br>Email invalide !");
}

try {
    // Récupération des infos de l'utilisateur (y compris abonnement et date d'inscription)
    $stmt = $pdo->prepare("SELECT users.id, users.nom, users.prenom, users.email, users.password, users.date_inscription, 
                            abonnement.type AS abonnement_type 
                    FROM users 
                    JOIN abonnement ON users.abonnement_id = abonnement.id 
                    WHERE users.email = :email");

    $stmt->execute([":email" => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user["password"])) {
        die("<br>❌ Email ou mot de passe incorrect.");
    }

    // Stockage des informations en session
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_nom"] = $user["nom"];
    $_SESSION["user_prenom"] = $user["prenom"];
    $_SESSION["user_email"] = $user["email"];
    $_SESSION["user_abonnement"] = $user["abonnement_type"];
    $_SESSION["user_date_inscription"] = $user["date_inscription"];



    // Message flash de connexion réussie
    $_SESSION['flash_message'] = 'Connexion réussie !';

    // Redirection vers dashboard
    header("Location: /TestJeanne/dashboard.php");
    exit();
} catch (PDOException $e) {
    die("<br>❌ Erreur SQL : " . $e->getMessage());
}
