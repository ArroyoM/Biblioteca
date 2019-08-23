<?php

/**El modelo de usuario */
class Usuario{

    private $idusuario;
    private $nombre;
    private $apellido;
    private $username;
    private $pass;


    public function __construct(){
    }

    /**get y set de idpersona */
    public function getIdpersona(){
        return $this->idusuario;
    }
    public function setIdpersona($idusuario){
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
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        return $this->username = $username;
    }

    /**get y set de pass */
    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        return $this->pass = $pass;
    }
}