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
            // Obtener los IDs de tipo de producto y laboratorio usando INNER JOIN
            $sql = "SELECT t.CODIGO_TPRODUCTO, l.CODIGO_LABORATORIO
                    FROM TIPO_PRODUCTO t
                    INNER JOIN LABORATORIO l ON l.NOMBRE = :laboratorio
                    WHERE t.TIP = :tipo";
                    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':laboratorio', $laboratorio);
            $stmt->execute();
            
            // Obtener los IDs
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                throw new Exception("Tipo de producto o laboratorio no encontrado.");
            }
            
            $tipoId = $result['CODIGO_TPRODUCTO'];
            $laboratorioId = $result['CODIGO_LABORATORIO'];
    
            // Actualizar el producto
            $updateSql = "UPDATE productos SET
                            NOMBRE_PRODUCTO = :nombre,
                            DESCRIPCION = :descripcion,
                            ID_TIPO_PRODUCTO = :tipoId,
                            ID_LABORATORIO = :laboratorioId,
                            COSTO = :costo,
                            PRECIO_VENTA = :precio
                        WHERE CODIGO_PRODUCTO = :id";
            
            $updateStmt = $this->db->prepare($updateSql);
            $updateStmt->bindParam(':id', $id);
            $updateStmt->bindParam(':nombre', $nombre);
            $updateStmt->bindParam(':descripcion', $descripcion);
            $updateStmt->bindParam(':tipoId', $tipoId);
            $updateStmt->bindParam(':laboratorioId', $laboratorioId);
            $updateStmt->bindParam(':costo', $costo);
            $updateStmt->bindParam(':precio', $precio);
            
            return $updateStmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM PRODUCTOS WHERE CODIGO_PRODUCTO = :id");
        return $stmt->execute([':id' => $id]);
    }
}
