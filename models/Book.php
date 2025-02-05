<?php
require_once '../../includes/config.php';

class Livre {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllLivres() {
        $stmt = $this->pdo->query("SELECT * FROM books");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLivreById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addLivre($titre, $auteur, $annee_publication, $genre, $disponible) {
        $stmt = $this->pdo->prepare("INSERT INTO books (titre, auteur, annee_publication, genre, disponible) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$titre, $auteur, $annee_publication, $genre, $disponible]);
    }

    public function updateLivre($id, $titre, $auteur, $annee_publication, $genre, $disponible) {
        $stmt = $this->pdo->prepare("UPDATE books SET titre = ?, auteur = ?, annee_publication = ?, genre = ?, disponible = ? WHERE id = ?");
        return $stmt->execute([$titre, $auteur, $annee_publication, $genre, $disponible, $id]);
    }

    public function deleteLivre($id) {
        $stmt = $this->pdo->prepare("DELETE FROM books WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
