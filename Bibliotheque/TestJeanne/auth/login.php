<?php
    session_start();
    require '../config/config.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Affichage du message flash si disponible
    $flashMessage = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
    unset($_SESSION['flash_message']); // Suppression du message après affichage
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Ajouter le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Si un message flash existe, on le supprime après 5 secondes
            const flashMessageElement = document.getElementById("flash-message");
            if (flashMessageElement) {
                setTimeout(function() {
                    flashMessageElement.style.display = "none"; // Cache le message
                }, 5000); // 5000 ms = 5 secondes
            }
        });
    </script>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Connectez-vous</h2>

                        <!-- Affichage du message flash s'il est disponible -->
                        <?php if ($flashMessage): ?>
                            <div id="flash-message" class="alert alert-success" role="alert">
                                <?= htmlspecialchars($flashMessage) ?>
                            </div>
                        <?php endif; ?>

                        <form action="/TestJeanne/backend/login_back.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <div class="bouton">
                                <button>
                                    <a href="">Se connecter</a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter le JS de Bootstrap (facultatif pour les éléments interactifs comme les modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

