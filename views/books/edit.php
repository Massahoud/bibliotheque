<?php include '../../includes/header.php'; ?>

<div class="container mt-4">
    <h2>Modifier un Livre</h2>
    <form action="index.php?action=update&id=<?= $livre['id'] ?>" method="POST">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?= htmlspecialchars($livre['titre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="<?= htmlspecialchars($livre['auteur']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="annee_publication" class="form-label">Année de publication</label>
            <input type="number" class="form-control" id="annee_publication" name="annee_publication" value="<?= htmlspecialchars($livre['annee_publication']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" value="<?= htmlspecialchars($livre['genre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="disponible" class="form-label">Disponible</label>
            <select class="form-control" id="disponible" name="disponible" required>
                <option value="1" <?= $livre['disponible'] ? 'selected' : '' ?>>Oui</option>
                <option value="0" <?= !$livre['disponible'] ? 'selected' : '' ?>>Non</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
