<?php

class Auth{

    public function __construct(){
    }

    /**verifica si esta autenticado true si lo esta, false no */
    public static function  IfAuth(){
        if(isset($_SESSION['user'])){
            return true;
        }else{
            return false;
        }
    }
}