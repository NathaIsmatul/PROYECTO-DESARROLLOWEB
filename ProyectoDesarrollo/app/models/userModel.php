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

    public function updateUsuario($id, $usuario, $nombre, $apellido, $clave, $perfil) {
        try {
            // Obtener el ID del perfil usando el nombre del perfil
            $sql = "SELECT CODIGO_PERFIL
                    FROM PERFIL
                    WHERE DESCRIPCION = :perfil";
                    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':perfil', $perfil);
            $stmt->execute();
            
            // Obtener el ID del perfil
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$result) {
                throw new Exception("Perfil no encontrado.");
            }
            
            $perfilId = $result['CODIGO_PERFIL'];
        
            // Actualizar el usuario
            $updateSql = "UPDATE USUARIOS SET
                            USUARIO = :usuario,
                            NOMBRE = :nombre,
                            APELLIDO = :apellido,
                            CLAVE = :clave,
                            ID_PERFIL = :perfilId
                        WHERE CODIGO_USUARIO = :id";
            
            $updateStmt = $this->db->prepare($updateSql);
            $updateStmt->bindParam(':id', $id);
            $updateStmt->bindParam(':usuario', $usuario);
            $updateStmt->bindParam(':nombre', $nombre);
            $updateStmt->bindParam(':apellido', $apellido);
            $updateStmt->bindParam(':clave', $clave);
            $updateStmt->bindParam(':perfilId', $perfilId);
            
            
            return $updateStmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function deleteUsuario($id) {
        $stmt = $this->db->prepare("DELETE FROM USUARIOS WHERE CODIGO_USUARIO = :id");
        return $stmt->execute([':id' => $id]);
    }
}
