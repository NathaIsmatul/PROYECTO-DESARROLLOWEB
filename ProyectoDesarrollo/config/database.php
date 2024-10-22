<?php

class Database{
    private $host = "ERWIN\SQLEXPRESS";
    private $db_name = "ROGIL";
    private $username = "sa";
    private $password = "francisco13";
    public $conn;

    public function __construct(){
        try{
            $this->conn = new PDO("sqlsrv:Server=$this->host;Database=$this->db_name", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo "Error de conexión ". $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
