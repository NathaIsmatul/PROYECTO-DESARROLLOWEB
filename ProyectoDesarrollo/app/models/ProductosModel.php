<?php
require_once '../../config/database.php';

class ProductModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conn; // Acceder directamente a la conexión establecida
    }

    public function getTproducts() {
        $sql = $this->db->query("
            SELECT 
                CODIGO_TPRODUCTO,
                TIP
            FROM TIPO_PRODUCTO
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
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

    public function getProducts() {
        $sql = $this->db->query("
            SELECT 
                p.CODIGO_PRODUCTO, 
                p.NOMBRE_PRODUCTO, 
                COALESCE(SUM(lt.UNID_ENTRANTES), 0) AS STOCK,
                p.DESCRIPCION, 
                tp.TIP AS TIPO_PRODUCTO, 
                l.NOMBRE AS LABORATORIO, 
                p.COSTO, 
                p.PRECIO_VENTA
            FROM PRODUCTOS p
            JOIN TIPO_PRODUCTO tp ON p.ID_TIPO_PRODUCTO = tp.CODIGO_TPRODUCTO
            JOIN LABORATORIO l ON p.ID_LABORATORIO = l.CODIGO_LABORATORIO
            LEFT JOIN LOTES_INVENTARIO lt ON p.CODIGO_PRODUCTO = lt.ID_PRODUCTO AND lt.VENCIMIENTO > GETDATE() -- Filtrar aquí los lotes no vencidos
            WHERE lt.VENCIMIENTO IS NULL OR lt.VENCIMIENTO > GETDATE() 
            GROUP BY 
                p.CODIGO_PRODUCTO, 
                p.NOMBRE_PRODUCTO, 
                p.DESCRIPCION, 
                tp.TIP, 
                l.NOMBRE, 
                p.COSTO, 
                p.PRECIO_VENTA;
        ");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($nombre, $descripcion, $tipo, $laboratorio, $costo, $precio) {
        try {
            // Paso 1: Buscar el ID del tipo de producto por su nombre
            $tipoSql = "SELECT CODIGO_TPRODUCTO FROM TIPO_PRODUCTO WHERE TIP = :tipo";
            $tipoStmt = $this->db->prepare($tipoSql);
            $tipoStmt->bindParam(':tipo', $tipo);
            $tipoStmt->execute();
            $tipoRow = $tipoStmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$tipoRow) {
                throw new Exception("Tipo de producto no encontrado: $tipo");
            }
            $tipoId = $tipoRow['CODIGO_TPRODUCTO'];
    
            // Paso 2: Buscar el ID del laboratorio por su nombre
            $labSql = "SELECT CODIGO_LABORATORIO FROM LABORATORIO WHERE NOMBRE = :laboratorio";
            $labStmt = $this->db->prepare($labSql);
            $labStmt->bindParam(':laboratorio', $laboratorio);
            $labStmt->execute();
            $labRow = $labStmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$labRow) {
                throw new Exception("Laboratorio no registrado: $laboratorio");
            }
            $labId = $labRow['CODIGO_LABORATORIO'];
    
            // Paso 3: Insertar el producto utilizando los IDs encontrados
            $insertSql = "INSERT INTO PRODUCTOS (NOMBRE_PRODUCTO, DESCRIPCION, ID_TIPO_PRODUCTO, ID_LABORATORIO, COSTO, PRECIO_VENTA)
                          VALUES (:nombre, :descripcion, :tipoId, :labId, :costo, :precio)";
            $stmt = $this->db->prepare($insertSql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':tipoId', $tipoId);
            $stmt->bindParam(':labId', $labId);
            $stmt->bindParam(':costo', $costo);
            $stmt->bindParam(':precio', $precio);
            
    
            return $stmt->execute(); // Ejecuta la consulta y retorna el resultado
        } catch (PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
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
