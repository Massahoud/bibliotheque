<?php include '../../includes/header.php'; ?>

<div class="container mt-4">
    <h2>Ajouter un Livre</h2>
    <form method="POST" action="index.php?action=store">
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Auteur</label>
            <input type="text" name="auteur" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Année de publication</label>
            <input type="number" name="annee_publication" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <input type="text" name="genre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Disponible</label>
            <select name="disponible" class="form-control">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
