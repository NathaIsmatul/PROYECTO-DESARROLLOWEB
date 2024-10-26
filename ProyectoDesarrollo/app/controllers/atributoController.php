<?php
require_once '../models/atributoModel.php';

class AtributoController {
    private $atributoModel;

    public function __construct() {
        $this->atributoModel = new AtributoModel();
    }

    public function LAB() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->atributoModel->getLab();
    }

    public function TIP() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->atributoModel->getTip();
    }

}

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new atributoController();
    header("Location: ../views/atributos.php");
    exit;
}