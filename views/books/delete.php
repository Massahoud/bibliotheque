<?php
require '../config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID du livre non fourni.");
}

// Supprimer le livre
$stmt = $pdo->prepare("DELETE FROM livres WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit();
?>
