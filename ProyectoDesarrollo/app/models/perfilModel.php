<?php
require_once '../../config/database.php';

class PerfilModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getPerfil() {
        $sql = $this->db->query("
            SELECT 
                CODIGO_PERFIL,
                DESCRIPCION
            FROM PERFIL
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
