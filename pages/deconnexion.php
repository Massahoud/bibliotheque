
<!-- deconnexion.php - Déconnexion -->
<?php
session_start();
session_destroy();
header('Location: index.php');
exit;
?>