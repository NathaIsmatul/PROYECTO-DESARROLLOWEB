<?php

require_once 'app/controllers/Inventory.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/inventory':
        $controller = new InventoryController();
        $controller->index();
        break;
    
    default:
        echo "404 - Página no encontrada";
        break;
}

?>