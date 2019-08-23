<?php

/**clase conexion */
class Conexion
{
    private $pdo;
    private $host = "localhost";
    private $dbname = "biblioteca";
    private $charset = "utf8";
    private $username = "root";
    private $pass = "";


    public function __CONSTRUCT(){

        try{
            /**se crear una nueva conexion */
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$dbname};charset={$this->charset}",
            $this->username, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            
        }catch(Exception $e){
            die($e->getMessage());
        }
       
    }

    /**se retorna la conexion de la db */
    public function getDB() {
        if ($this->pdo instanceof PDO) {
             return $this->pdo;
        }
  }
}
?>