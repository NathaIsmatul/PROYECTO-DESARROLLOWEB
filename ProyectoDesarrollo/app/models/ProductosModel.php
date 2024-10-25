<?php
require_once '../../config/database.php';

class ProductModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getProducts() {
        $sql = $this->db->query("
            SELECT 
                p.CODIGO_PRODUCTO, 
                p.NOMBRE_PRODUCTO, 
                p.DESCRIPCION, 
                tp.TIP AS TIPO_PRODUCTO, 
                l.NOMBRE AS LABORATORIO, 
                p.COSTO, 
                p.PRECIO_VENTA
            FROM PRODUCTOS p
            JOIN TIPO_PRODUCTO tp ON p.ID_TIPO_PRODUCTO = tp.CODIGO_TPRODUCTO
            JOIN LABORATORIO l ON p.ID_LABORATORIO = l.CODIGO_LABORATORIO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

public function updateProduct($id, $nombre, $descripcion, $tipo, $laboratorio, $costo, $precio) {
    try {
        $sql = "UPDATE productos SET 
                NOMBRE_PRODUCTO = :nombre, 
                DESCRIPCION = :descripcion, 
                TIPO_PRODUCTO = :tipo, 
                LABORATORIO = :laboratorio, 
                COSTO = :costo, 
                PRECIO_VENTA = :precio 
                WHERE CODIGO_PRODUCTO = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':laboratorio', $laboratorio);
        $stmt->bindParam(':costo', $costo);
        $stmt->bindParam(':precio', $precio);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM PRODUCTOS WHERE CODIGO_PRODUCTO = :id");
        return $stmt->execute([':id' => $id]);
    }
}
