<?php
require_once '../models/perfilModel.php';

class PerfilController {
    private $perfilModel;

    public function __construct() {
        $this->perfilModel = new PerfilModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->perfilModel->getPerfil();
    }

    public function add($descripcion) {
        return $this->perfilModel->addPerfil($descripcion);
    }

    public function update($id, $descripcion) {
        return $this->perfilModel->updatePerfil($id, $descripcion);
    }

    public function delete($id) {
        return $this->perfilModel->deletePerfil($id);
    }
}

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new PerfilController();
    if ($_POST['action'] === 'add') {
        $controller->add($_POST['descripcion']);
    } elseif ($_POST['action'] === 'update') {
        $controller->update($_POST['id'], $_POST['descripcion']);
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete($_POST['id']);
    }
    header("Location: ../views/perfiles.php");
    exit;
}