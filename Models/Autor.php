<?php

class Autor{

    private $idautor;
    private $nombre;
    private $estado;

    public function __construct(){
    }

    /**get y set de idautor */
    public function getIdAutor(){
        return $this->idautor;
    }
    public function setIdAutor($idautor){
        return $this->idautor = $idautor;
    }

    /**get y set de nombre */
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        return $this->nombre = $nombre;
    }

    /**get y set de estado */
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($estado){
        return $this->estado = $estado;
    }

}