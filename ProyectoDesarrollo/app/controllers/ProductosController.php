<?php
require_once '../models/ProductosModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->productModel->getProducts();
    }
}
