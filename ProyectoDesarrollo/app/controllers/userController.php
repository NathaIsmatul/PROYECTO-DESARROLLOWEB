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

    public function update($id, $usuario, $nombre, $apellido, $clave, $perfil) {
        return $this->UserModel->updateUsuario($id, $usuario, $nombre, $apellido, $clave, $perfil);
    }

    public function delete($id) {
        return $this->UserModel->deleteUsuario($id);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();

    if ($_POST['action'] === 'update') {
        $controller->update($_POST['id'], $_POST['usuario'], $_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['perfil']);
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete($_POST['id']);
    }
    header("Location: ../views/usuarios.php");
    exit;
}
