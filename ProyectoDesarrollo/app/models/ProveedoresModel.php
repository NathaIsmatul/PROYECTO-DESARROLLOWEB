<?php
require_once '../../config/database.php';

class ProveerModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getProvees() {
        $sql = $this->db->query("
            SELECT 
                CODIGO_PROVEEDOR,
                NOMBRE_PROVEEDOR, 
                TELEFONO, 
                DIRECCION, 
                CORREO
            FROM PROVEEDORES
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
