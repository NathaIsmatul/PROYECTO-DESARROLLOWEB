<?php
require_once '../models/vencimientoModel.php';

class VencController {
    private $expModel;

    public function __construct() {
        $this->expModel = new expModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->expModel->getVenc();
    }
}
