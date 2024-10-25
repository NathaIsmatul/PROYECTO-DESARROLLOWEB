<?php
require_once '../../config/database.php';

class UserModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getUser() {
        $sql = $this->db->query("
            SELECT 
                u.CODIGO_USUARIO,
                u.USUARIO, 
                u.NOMBRE, 
                u.APELLIDO, 
                u.CLAVE,
                u.FECHA_REGISTRO,
                p.DESCRIPCION as DES_PERFIL
            FROM USUARIOS u
            JOIN PERFIL p ON u.ID_PERFIL = p.CODIGO_PERFIL
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
