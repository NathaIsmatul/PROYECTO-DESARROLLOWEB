<?php

require_once 'config/database.php';

class InventoryModel {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }
}

?>