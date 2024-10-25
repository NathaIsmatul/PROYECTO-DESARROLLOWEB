<?php
require_once '../../config/database.php';

class loteModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getLote() {
        $sql = $this->db->query("
            SELECT 
                l.CODIGO_LOTE,
                l.UNID_ENTRANTES, 
                format(l.VENCIMIENTO, 'dd/MM/yyyy') as VENCIMIENTO, 
                pd.NOMBRE_PRODUCTO as PRODUCTO, 
                lb.NOMBRE as LAB,
                pv.NOMBRE_PROVEEDOR as PROVEEDOR,
                l.COMENTARIO,
                case 
                    when l.VENCIMIENTO < GETDATE() then 'Vencido' -- En este caso imprime el mensaje para productos vencidos
                    when l.VENCIMIENTO between GETDATE() and DATEADD(day, 30, GETDATE()) THEN 'Pronto a vencer' -- En este caso, de faltar 30 dias para vencer, imprimira el mensaje 
                    else 'Vigente' -- Productos vigentes
                end as ESTADO
            FROM LOTES_INVENTARIO l
            JOIN PRODUCTOS pd ON l.ID_PRODUCTO = pd.CODIGO_PRODUCTO
            JOIN PROVEEDORES pv ON l.ID_PROVEEDOR = pv.CODIGO_PROVEEDOR
            JOIN LABORATORIO lb ON pd.ID_LABORATORIO = lb.CODIGO_LABORATORIO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}