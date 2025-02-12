
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background: #343a40;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center text-white">Bibliothèque</h4>
        <a href="../../dashboard_user.php"><i class="fas fa-home"></i> Accueil</a>
        <a href="#"><i class="fas fa-book"></i> Livres</a>
        <a href="#"><i class="fas fa-users"></i> Utilisateurs</a>
        <a href="#"><i class="fas fa-chart-bar"></i> Statistiques</a>
    </div>
    
    <div class="content">
        <h2>Tableau de Bord</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Livres Disponibles</h5>
                        <p class="card-text">150</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Livres Empruntés</h5>
                        <p class="card-text">45</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Utilisateurs Inscrits</h5>
                        <p class="card-text">85</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3>Liste des Livres</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Genre</th>
                    <th>Disponibilité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($livres) && is_array($livres)) : ?>
                <?php foreach ($livres as $livre) : ?>
                <tr>
                <td><?= htmlspecialchars($livre['id']) ?></td>
                <td><?= htmlspecialchars($livre['titre']) ?></td>
                <td><?= htmlspecialchars($livre['auteur']) ?></td>
                <td><?= htmlspecialchars($livre['annee_publication']) ?></td>
                <td><?= htmlspecialchars($livre['genre']) ?></td>
                <td><?= $livre['disponible'] ? 'Oui' : 'Non' ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $livre['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="index.php?action=delete&id=<?= $livre['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
                </tr>
               
                <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7" class="text-center">Aucun livre trouvé.</td>
        </tr>
    <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
