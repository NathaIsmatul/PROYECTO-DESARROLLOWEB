<?php
require_once '../models/lotesModel.php';

class loteController {
    private $loteModel;

    public function __construct() {
        $this->loteModel = new loteModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->loteModel->getLote();
    }
}
