<?php

class LoginController{

    public function __construct(){

    }

    /** controla la vista login */
    public function Index(){
        
        /**retorna la vista login */
        View::render('Login',[]);
    }

    public function Validar(){
        
    }


}

