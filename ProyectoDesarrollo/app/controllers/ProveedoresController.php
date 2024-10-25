<?php
require_once '../models/ProveedoresModel.php';

class ProveeController {
    private $proveeModel;

    public function __construct() {
        $this->proveeModel = new ProveerModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->proveeModel->getProvees();
    }

    public function update($id, $nombre, $telefono, $direccion, $correo) {
        return $this->proveeModel->updateProvee($id, $nombre, $telefono, $direccion, $correo);
    }

    public function delete($id) {
        return $this->proveeModel->deleteProvee($id);
    }
}
// Procesar acciones
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller = new ProveeController();
        if ($_POST['action'] === 'update') {
            $controller->update($_POST['id'], $_POST['nombre'], $_POST['telefono'], $_POST['direccion'], $_POST['correo']);
        } elseif ($_POST['action'] === 'delete') {
            $controller->delete($_POST['id']);
        }
        header("Location: ../views/proveedores.php");
        exit;
    }

