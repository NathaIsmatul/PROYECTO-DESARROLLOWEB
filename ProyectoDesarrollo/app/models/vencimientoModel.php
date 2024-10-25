<?php
require_once '../../config/database.php';

class expModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getVenc() {
        $sql = $this->db->query("
            SELECT 
                pd.CODIGO_PRODUCTO,
                pd.NOMBRE_PRODUCTO as PRODUCTO,
                l.UNID_ENTRANTES as STOCK,                
                lb.NOMBRE as LAB,
                pv.NOMBRE_PROVEEDOR as PROVEEDOR,
                format(l.VENCIMIENTO, 'dd/MM/yyyy') as VENCIMIENTO,
                case 
                    when l.VENCIMIENTO < GETDATE() then 'Vencido' -- En este caso imprime el mensaje para productos vencidos
                    when l.VENCIMIENTO between GETDATE() and DATEADD(day, 30, GETDATE()) THEN 'Pronto a vencer' -- En este caso, de faltar 30 dias para vencer, imprimira el mensaje 
                    ELSE 'En fecha' -- Para productos que están vigentes
                end as ESTADO
            FROM LOTES_INVENTARIO l
            JOIN PRODUCTOS pd ON l.ID_PRODUCTO = pd.CODIGO_PRODUCTO
            JOIN PROVEEDORES pv ON l.ID_PROVEEDOR = pv.CODIGO_PROVEEDOR
            JOIN LABORATORIO lb ON pd.ID_LABORATORIO = lb.CODIGO_LABORATORIO
            WHERE l.VENCIMIENTO <= GETDATE() or l.VENCIMIENTO <= DATEADD(day, 30, GETDATE())
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}