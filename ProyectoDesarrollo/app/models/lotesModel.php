<?php
require_once '../../config/database.php';

class loteModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn;
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
                    when l.VENCIMIENTO < GETDATE() then 'Vencido'
                    when l.VENCIMIENTO between GETDATE() and DATEADD(day, 30, GETDATE()) THEN 'Pronto a vencer'
                    else 'Vigente'
                end as ESTADO
            FROM LOTES_INVENTARIO l
            JOIN PRODUCTOS pd ON l.ID_PRODUCTO = pd.CODIGO_PRODUCTO
            JOIN PROVEEDORES pv ON l.ID_PROVEEDOR = pv.CODIGO_PROVEEDOR
            JOIN LABORATORIO lb ON pd.ID_LABORATORIO = lb.CODIGO_LABORATORIO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUnits($id, $unidades) {
        try {
            $updateSql = "
                UPDATE LOTES_INVENTARIO 
                SET UNID_ENTRANTES = :unidades
                WHERE CODIGO_LOTE = :id";
            
            $updateStmt = $this->db->prepare($updateSql);
            $updateStmt->bindParam(':id', $id);
            $updateStmt->bindParam(':unidades', $unidades);
            
            return $updateStmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function deleteLote($id) {
        $stmt = $this->db->prepare("DELETE FROM LOTES_INVENTARIO WHERE CODIGO_LOTE = :id");
        return $stmt->execute([':id' => $id]);
    }
}
