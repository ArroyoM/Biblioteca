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

    /**busca por id, retorna un usuario */
    public function Getid($id){

        try{
            /**prepara la consulta */
            $stm = $this->conn->prepare("SELECT idusuario, nombre, apellido, username FROM USUARIO
                                     WHERE idusuario= ? ");

            /**ejecuta la consulta preparada y pasamos el aprametro en dorma de array segun el orden */
            $stm->execute(
                array($id)
            );

            /**se crea un nuevo usuario para almacenarlo  */
            $usuario = new Usuario();
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $usuario->setIdUsuario($r->idusuario);
            $usuario->setNombre($r->nombre);
            $usuario->setApellido($r->apellido);
            $usuario->setUserName($r->username);

            /**retorna el usuario */
            return $usuario;
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    /**elimina un usuario retorna el numero de filas afectadas */
    public function Delete($id){

        try{
            /**se inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta prepara */
            $stm = $this->conn->prepare("UPDATE USUARIO SET estado_idestado = 2 WHERE idusuario= ? ");
            /**se ejecuta y se pasa id por parametro */
            $stm->execute(
                array($id)
            );
            /**se guarda */
            $this->conn->commit();
            /**retorna la filas afectadas */
            $afectadas = $stm->rowCount();
            /**retorna el numero de filas afectadas */
            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());

        }
    }

    /**metodo para actulizar un usuario retorna las filas afectadas */
    public function Update($usuario){

        try{
            /**inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta preparada */
            $stm = $this->conn->prepare("UPDATE USUARIO SET NOMBRE = ?, APELLIDO = ?, PASS=?  WHERE idusuario = ?");
            /**se ejecuta y se pasa los el usuario por parametro */
            $stm->execute(
                array(
                $usuario->getNombre(),
                $usuario->getApellido(),
                $usuario->getPass(),
                $usuario->getIdUsuario()
            ));

            /**se guarda */
            $this->conn->commit();
            /**retorna la fila afectadas */
            $afectadas = $stm->rowCount();
   
            return $afectadas;

        }catch(Excepetion $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

    /**crea un nuevo usuario */
    public function Create($usuario){

        try{
            /**se inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta preparada */
            $stm = $this->conn->prepare("INSERT INTO USUARIO(NOMBRE, APELLIDO, USERNAME,
             PASS, ESTADO_IDESTADO) VALUES(?,?,?,?,?)");
            
            /**se ejecuta y se pasa los el usuario por parametro */
            $stm->execute(
                array(
                    $usuario->getNombre(),
                    $usuario->getApellido(),
                    $usuario->getUserName(),
                    $usuario->getPass(),
                    1
                )
            );
            /**se guarda */

            $this->conn->commit();
            /**retorna la fila afectadas */
            $afectadas = $stm->rowCount();

            return $afectadas;
        }catch(Exception $e){
            $this->conn->rollBack();
            die($e->getMessage());
        }
    }

}