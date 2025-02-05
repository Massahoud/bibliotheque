<?php 
include '../../includes/header.php'; ?>

<div class="container mt-4">
    <h2>Liste des Livres</h2>
    <a href="index.php?action=create" class="btn btn-primary">Ajouter un Livre</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Année de publication</th>
                <th>Genre</th>
                <th>Disponible</th>
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

<?php include '../../includes/footer.php'; ?>
