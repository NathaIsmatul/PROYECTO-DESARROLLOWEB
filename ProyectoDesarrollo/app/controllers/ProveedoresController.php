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
}
