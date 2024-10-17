<?php
include_once '../../config/database.php';

class usuario {
    var $objetos;

    public function __construct() {
        $db = new Database();
        $this->acceso = $db->conn;
    }

    function logearse($username, $password) {
        $sql = "SELECT USUARIO, CLAVE, ID_PERFIL FROM USUARIOS WHERE USUARIO = :username AND CLAVE = :password";
        $query = $this->acceso->prepare($sql);
        
        $query->execute(array(':username' => $username, ':password' => $password));
        
        $this->objetos = $query->fetchAll(PDO::FETCH_ASSOC); // Asegúrate de usar FETCH_ASSOC
        return $this->objetos;
    }
    
}
?>