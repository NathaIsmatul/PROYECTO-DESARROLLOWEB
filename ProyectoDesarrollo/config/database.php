<?php

class Database{
    private $host = "localhost";
    private $db_name = "farmacia";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConecction(){
        $this->conn = null;

        try{
            $this->conn = new PDO("sqlsrv:Server=$this->host;Database=$this->db_name", $this->username, $this->password);
            $this->conn->exec("SET NAMES utf8");
        }catch (PDOException $exception){
            echo "Error de conexión ". $exception->getMessage();
        }
        return $this->conn;
    }
}

?>