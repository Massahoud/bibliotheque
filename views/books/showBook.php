<?php include __DIR__ . '/../layouts/header.php'; ?>
<div class="container">
    <h2>Détails du Livre</h2>
    <table class="table table-striped">
        <tr><th>ID</th><td><?= $book['id']; ?></td></tr>
        <tr><th>Titre</th><td><?= htmlspecialchars($book['titre']); ?></td></tr>
        <tr><th>Auteur</th><td><?= htmlspecialchars($book['auteur']); ?></td></tr>
        <tr><th>Année de publication</th><td><?= $book['annee_publication']; ?></td></tr>
        <tr><th>Disponibilité</th><td><?= $book['disponible'] ? 'Disponible' : 'Emprunté'; ?></td></tr>
    </table>
    <a href="livres.php" class="btn btn-secondary">Retour</a>
</div>
<?php include __DIR__ . '/../layouts/footer.php'; ?>
