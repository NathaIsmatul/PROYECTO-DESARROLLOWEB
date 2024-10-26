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

    public function addPerfil($descripcion) {
        try {
            $insertSql = "INSERT INTO PERFIL (DESCRIPCION) 
                          VALUES (:descripcion)";
            $stmt = $this->db->prepare($insertSql);
            $stmt->bindParam(':descripcion', $descripcion);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updatePerfil($id, $descripcion) {
        try {
            // Actualizar el producto
            $updateSql = "UPDATE PERFIL SET
                            DESCRIPCION  = :descripcion
                        WHERE CODIGO_PERFIL= :id";
            
            $updateStmt = $this->db->prepare($updateSql);
            $updateStmt->bindParam(':id', $id);
            $updateStmt->bindParam(':descripcion', $descripcion);
            
            return $updateStmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function deletePerfil($id) {
        $stmt = $this->db->prepare("DELETE FROM PERFIL WHERE CODIGO_PERFIL = :id");
        return $stmt->execute([':id' => $id]);
    }
}
