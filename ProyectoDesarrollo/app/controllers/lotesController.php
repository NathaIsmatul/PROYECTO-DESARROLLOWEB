<?php
require_once '../models/lotesModel.php';

class loteController {
    private $loteModel;

    public function __construct() {
        $this->loteModel = new loteModel();
    }

    public function index() {
        return $this->loteModel->getLote();
    }

    public function update($id, $unidades, $vencimiento, $producto, $laboratorio, $proveedor, $comentario) {
        return $this->loteModel->updateUnits($id, $unidades, $vencimiento, $producto, $laboratorio, $proveedor, $comentario);
    }

    public function delete($id) {
        return $this->loteModel->deleteLote($id);
    }
}

// Procesar acciones
$controller = new loteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'update_units') {
        $controller->update(
            $_POST['id'],
            $_POST['unidades'],
            '', '', '', '', '' // Asegúrate de actualizar el lote sin modificar otros datos
        );
        header("Location: ../views/lotes.php");
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $controller->delete($_GET['id']);
    header("Location: ../views/lotes.php");
    exit;
}
