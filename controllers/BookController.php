<?php
require_once __DIR__ . '/../models/Book.php';

class LivreController {
    private $livreModel;

    public function __construct($pdo) {
        $this->livreModel = new Livre($pdo);
    }

    public function index() {
        $livres = $this->livreModel->getAllLivres();
        include __DIR__ . '/../TableauBoard.php';
    }

    public function show($id) {
        $livre = $this->livreModel->getLivreById($id);
        include __DIR__ . '/../views/books/detail.php';
    }

    public function create() {
        include __DIR__ . '/../views/books/add.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->livreModel->addLivre($_POST['titre'], $_POST['auteur'], $_POST['annee_publication'], $_POST['genre'], $_POST['disponible']);
            header("Location: ../books/index.php");
            exit();
        }
    }

    public function edit($id) {
        $livre = $this->livreModel->getLivreById($id);
        include __DIR__ . '/../views/books/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $auteur = $_POST['auteur'];
            $annee_publication = $_POST['annee_publication'];
            $genre = $_POST['genre'];
            $disponible = $_POST['disponible'];
    
            if ($this->livreModel->updateLivre($id, $titre, $auteur, $annee_publication, $genre, $disponible)) {
                header("Location: ../books/index.php");
                exit();
            } else {
                die("Erreur lors de la mise à jour du livre.");
            }
        }
    }
    
    // Supprimer un livre
    public function delete($id) {
        if (!empty($id) && is_numeric($id)) {
            if ($this->livreModel->deleteLivre($id)) {
                header("Location: ../books/index.php");
                exit();
            } else {
                die("Erreur lors de la suppression du livre.");
            }
        } else {
            die("ID invalide pour la suppression.");
        }
    }
    
}
?>
