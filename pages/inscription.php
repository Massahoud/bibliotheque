<?php
include '../includes/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $password_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $query = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $query->execute([$email]);

    if ($query->rowCount() > 0) {
        $_SESSION['message'] = "Cet email est déjà utilisé.";
        header("Location: inscription.php");
        exit();
    }

    // Insérer l'utilisateur
    $query = $pdo->prepare("INSERT INTO users (nom, prenom,email, mot_de_passe) VALUES (?, ?,?, ?)");
    if ($query->execute([$nom,$prenom, $email, $password_hash])) {
        $_SESSION['message'] = "Inscription réussie ! Connectez-vous.";
        header("Location: connexion.php");
    } else {
        $_SESSION['message'] = "Erreur lors de l'inscription.";
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Inscription</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info"><?= $_SESSION['message'] ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="mot_de_passe" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
    <p class="mt-3">Déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
</div>
</body>
</html>
