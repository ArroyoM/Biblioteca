<?php

class UsuarioModel{


    private $conn;

    public function __construct(){
        try{
        
            $conexion = new Conexion();
            $this->conn = $conexion->getDB();

        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function AllUsuario(){
    
        try{
        
            $result = array();

            $stm = $this->conn->prepare("SELECT idusuario, nombre, apellido, username FROM usuario WHERE estado_idestado = 1");

            $stm->execute();

            foreach( $stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $usuario = new Usuario();

                $usuario->setIdUsuario($r->idusuario);
                $usuario->setNombre($r->nombre);
                $usuario->setApellido($r->apellido);
                $usuario->setUserName($r->username);

                $result[] = $usuario;
            }

            return $result;
        }catch(Excepetion $e){
            die($e->getMessage());
        }
    }

    public function Getid($id){

        try{

            $stm = $this->conn->prepare("SELECT idusuario, nombre, apellido, username FROM USUARIO
                                     WHERE idusuario= ? ");

            $stm->execute(
                array($id)
            );

            $usuario = new Usuario();
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $usuario->setIdUsuario($r->idusuario);
            $usuario->setNombre($r->nombre);
            $usuario->setApellido($r->apellido);
            $usuario->setUserName($r->username);

            return $usuario;
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }


    public function Delete($id){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("UPDATE USUARIO SET estado_idestado = 2 WHERE idusuario= ? ");

            $stm->execute(
                array($id)
            );

            $this->conn->commit();
            $afectadas = $stm->rowCount();

            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());

        }
    }

    public function Update($usuario){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("UPDATE USUARIO SET NOMBRE = ?, APELLIDO = ?, PASS=?  WHERE idusuario = ?");

            $stm->execute(
                array(
                $usuario->getNombre(),
                $usuario->getApellido(),
                $usuario->getPass(),
                $usuario->getIdUsuario()
            ));

            $this->conn->commit();
            $afectadas = $stm->rowCount();
   
            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

    public function Create($usuario){

        try{

            $this->conn->beginTransaction();

            $stm = $this->conn->prepare("INSERT INTO USUARIO(NOMBRE, APELLIDO, USERNAME,
             PASS, ESTADO_IDESTADO) VALUES(?,?,?,?,?)");

            $stm->execute(
                array(
                    $usuario->getNombre(),
                    $usuario->getApellido(),
                    $usuario->getUserName(),
                    $usuario->getPass(),
                    1
                )
            );

            $this->conn->commit();
            $afectadas = $stm->rowCount();

            return $afectadas;
        }catch(Exception $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

}