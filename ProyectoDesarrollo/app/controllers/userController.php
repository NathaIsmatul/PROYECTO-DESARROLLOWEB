<?php
require_once '../models/userModel.php';

class UserController {
    private $UserModel;

    public function __construct() {
        $this->UserModel = new UserModel();
    }

    public function index() {
        // Asegúrate de retornar el resultado de getProducts
        return $this->UserModel->getUser();
    }
}
