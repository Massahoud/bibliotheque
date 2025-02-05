<?php
require_once '../../includes/config.php';
require_once '../../controllers/BookController.php';

$controller = new LivreController($pdo);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
        case 'edit':
            $controller->edit($_GET['id']);
            break;
        case 'update':
            $controller->update($_GET['id']);
            break;
        case 'delete':
            $controller->delete($_GET['id']);
            break;
    default:
        $controller->index();
}
?>
