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

    public function updateProvee($id, $nombre, $telefono, $direccion, $correo) {
        try {
            // Consulta SQL para actualizar un proveedor
            $sql = "UPDATE PROVEEDORES SET 
                    NOMBRE_PROVEEDOR = :nombre, 
                    TELEFONO = :telefono, 
                    DIRECCION = :direccion, 
                    CORREO = :correo 
                    WHERE CODIGO_PROVEEDOR = :id";
    
            // Preparar la consulta
            $stmt = $this->db->prepare($sql);
    
            // Vincular los parámetros
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':correo', $correo);
    
            // Ejecutar la consulta
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    
    public function deleteProvee($id) {
        $stmt = $this->db->prepare("DELETE FROM PROVEEDORES WHERE CODIGO_PROVEEDOR = :id");
        return $stmt->execute([':id' => $id]);
    }
}
