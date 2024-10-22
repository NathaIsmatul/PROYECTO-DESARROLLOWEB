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
}
