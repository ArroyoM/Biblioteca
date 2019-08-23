<?php

class AutorModel{

    private $conn;

    public function __construct(){
        try{
        
            $conexion = new Conexion();
            $this->conn = $conexion->getDB();

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function AllAutores(){
    
        try{
        
            $result = array();

            $stm = $this->conn->prepare("SELECT idautor, nombre FROM autor WHERE estado_idestado = 1");

            $stm->execute();

            foreach( $stm->fetchAll(PDO::FETCH_OBJ) as $r){
                $autor = new Autor();

                $autor->setIdAutor($r->idautor);
                $autor->setNombre($r->nombre);

                $result[] = $autor;
            }

            return $result;
        }catch(Excepetion $e){
            die($e->getMessage());
        }
    }

  /**busca por id, retorna un autor */
    public function Getid($id){

        try{
            /**prepara la consulta */
            $stm = $this->conn->prepare("SELECT idautor, nombre FROM autor
                                    WHERE idautor= ? ");

            /**ejecuta la consulta preparada y pasamos el aprametro en dorma de array segun el orden */
            $stm->execute(
                array($id)
            );

            /**se crea un nuevo autor para almacenarlo  */
            $autor = new Autor();
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $autor->setIdAutor($r->idautor);
            $autor->setNombre($r->nombre);

            /**retorna el autor */
            return $autor;
            
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    /**elimina un autor retorna el numero de filas afectadas */
    public function Delete($id){

        try{
            /**se inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta prepara */
            $stm = $this->conn->prepare("UPDATE autor SET estado_idestado = 2 WHERE idautor= ? ");
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

    
    /**metodo para actulizar un autor retorna las filas afectadas */
    public function Update($autor){

        try{
            /**inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta preparada */
            $stm = $this->conn->prepare("UPDATE autor SET NOMBRE = ?  WHERE idautor = ?");
            /**se ejecuta y se pasa los el autor por parametro */
            $stm->execute(
                array(
                $autor->getNombre(),
                $autor->getIdAutor()
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

    /**crea un nuevo autor */
    public function Create($autor){

        try{
            /**se inicia la transacion */
            $this->conn->beginTransaction();
            /**consulta preparada */
            $stm = $this->conn->prepare("INSERT INTO AUTOR(NOMBRE, ESTADO_IDESTADO) VALUES(?,?)");
            
            /**se ejecuta y se pasa los el autor por parametro */
            $stm->execute(
                array(
                    $autor->getNombre(),
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