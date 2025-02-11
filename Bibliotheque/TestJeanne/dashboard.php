<?php
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: auth/login.php");
        exit();
    }
    
    $dateInscription = new DateTime($_SESSION["user_date_inscription"]);
    $formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::SHORT);
    $dateFormatee = $formatter->format($dateInscription);

    // Affichage du message flash (si disponible)
    $flashMessage = isset($_SESSION['flash_message']) ? $_SESSION['flash_message'] : null;
    unset($_SESSION['flash_message']); // Suppression du message après affichage
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <!-- Ajouter le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <h2 class="text-center mb-4">Bienvenue, Mr <?= htmlspecialchars($_SESSION["user_prenom"]) . " " . htmlspecialchars($_SESSION["user_nom"]) ?> !</h2>

                        <?php if ($flashMessage): ?>
                            <div id="flash-message" class="alert alert-success" role="alert">
                                <?= htmlspecialchars($flashMessage) ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="mb-3">
                            <p><strong>Email :</strong> <?= htmlspecialchars($_SESSION["user_email"]) ?></p>
                        </div>

                        <div class="mb-3">
                            <p><strong>Type d'abonnement :</strong> <?= htmlspecialchars($_SESSION["user_abonnement"]) ?></p>
                        </div>

                        <div class="mb-3">
                            <p><strong>Date d'inscription :</strong> <?= htmlspecialchars($dateFormatee) ?></p>
                        </div>

                        <div class="text-center mt-3">
                            <a href="auth/logout.php" class="btn btn-danger">Se déconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter le JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
