<?php
require_once '../../config/database.php';

class AtributoModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getLab() {
        $sql = $this->db->query("
            SELECT 
                CODIGO_LABORATORIO,
                NOMBRE
            FROM LABORATORIO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTip() {
        $sql = $this->db->query("
            SELECT 
                CODIGO_TPRODUCTO,
                TIP,
                DESCRIPCION
            FROM TIPO_PRODUCTO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}