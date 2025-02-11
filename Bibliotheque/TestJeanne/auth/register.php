<?php
    require '../config/config.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Ajouter le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Enregistrez-vous</h2>

                        <form action="/TestJeanne/backend/register_back.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nom" class="form-label">Nom :</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="prenom" class="form-label">Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email :</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Mot de passe :</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="abonnement_id" class="form-label">Abonnement :</label>
                                    <select id="abonnement_id" name="abonnement_id" class="form-select" required>
                                        <option value="" selected disabled>Sélectionner un abonnement</option>
                                        <?php
                                        require '../config/config.php';
                                        $stmt = $pdo->query("SELECT id, type FROM abonnement");
                                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option value='{$row['id']}'>{$row['type']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="date_inscription" class="form-label">Date d'inscription :</label>
                                    <input type="datetime-local" id="date_inscription" name="date_inscription" class="form-control" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button> <a href="login.php">S'enregistrer</a></button>
                                
                            </div>
                        </form>
                        <p class="mt-3 text-center">Vous vous êtes déjà enregistrer ? <a href="login.php">Enregistrez-vous</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter le JS de Bootstrap (facultatif pour les éléments interactifs comme les modales) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


