<?php

/**El modelo de usuario */
class Usuario{

    private $idusuario;
    private $nombre;
    private $apellido;
    private $username;
    private $pass;
    private $fecha;
    private $estado;

    public function __construct(){
    }

    /**get y set de idpersona */
    public function getIdUsuario(){
        return $this->idusuario;
    }
    public function setIdUsuario($idusuario){
        return $this->idusuario = $idusuario;
    }

    /**get y set de nombre */
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        return $this->nombre = $nombre;
    }

    /**get y set de apellido */
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        return $this->apellido = $apellido;
    }

    /**get y set de username */
    public function getUserName(){
        return $this->username;
    }
    public function setUserName($username){
        return $this->username = $username;
    }

    /**get y set de pass */
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        return $this->pass = $pass;
    }

    /**get y set de fecha de creacion */
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
       return $this->fecha = $fecha;
    }

    /**get y set de estado */
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
       return $this->estado = $estado;
    }
}