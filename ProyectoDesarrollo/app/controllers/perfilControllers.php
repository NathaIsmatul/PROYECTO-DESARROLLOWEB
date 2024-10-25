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
}
