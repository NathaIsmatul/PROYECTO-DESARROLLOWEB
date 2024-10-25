<?php
require_once '../models/userModel.php';

class UserController {
    private $UserModel;

    public function __construct() {
        $this->UserModel = new UserModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->UserModel->getUser();
    }

    public function update($id, $nombre, $descripcion, $tipo, $laboratorio, $costo, $precio) {
        return $this->UserModel->updateProduct($id, $nombre, $descripcion, $tipo, $laboratorio, $costo, $precio);
    }

    public function delete($id) {
        return $this->UserModel->deleteProduct($id);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    if ($_POST['action'] === 'update') {
        $controller->update($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['laboratorio'], $_POST['costo'], $_POST['precio']);
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete($_POST['id']);
    }
    header("Location: ../views/usuarios.php");
    exit;
}
