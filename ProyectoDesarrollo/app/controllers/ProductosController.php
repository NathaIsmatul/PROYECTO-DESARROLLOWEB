<?php
// ProductosController.php
require_once '../models/ProductosModel.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }

    public function index() {
        return $this->productModel->getProducts();
    }

    public function update($id, $nombre, $descripcion, $tipo, $laboratorio, $costo, $precio) {
        return $this->productModel->updateProduct($id, $nombre, $descripcion, $tipo, $laboratorio, $costo, $precio);
    }

    public function delete($id) {
        return $this->productModel->deleteProduct($id);
    }
}

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ProductController();
    if ($_POST['action'] === 'update') {
        $controller->update($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['tipo'], $_POST['laboratorio'], $_POST['costo'], $_POST['precio']);
    } elseif ($_POST['action'] === 'delete') {
        $controller->delete($_POST['id']);
    }
    header("Location: ../views/productos.php");
    exit;
}

