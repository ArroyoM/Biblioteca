<?php

class UsuarioController{

    public function __construct(){
    }

    /** controla la vista de inicio index */
    public function Index(){
        
        $usuario = new UsuarioModel();
        $usuarios = $usuario->AllUsuario();

        /**retorna la vista login */
        View::render('usuario/index',$usuarios);
    }

    public function Vistacrear(){
        View::render('usuario/crear',[]);
    }


    public function Crear(){

        $usuarioModel = new UsuarioModel();

        $usuario = new Usuario();
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        $usuario->setUserName($_POST['username']);

        $passE = password_hash($_POST['pass'].'ClaveSuperSecreta#7', PASSWORD_DEFAULT);
        $usuario->setPass($passE);

        $result = $usuarioModel->Create($usuario);

        if($result == 0){
            View::render('usuario/usuario',['error'=>'no se a podido guardar']);
        }else{
            View::redirectView('usuarios');
        }
    
    }

    public function Vistaeditar(){

        $usuarioModel = new UsuarioModel();
        $usuario = new Usuario();

        $usuario = $usuarioModel->Getid($_GET['id']);
        if(isset($_GET['error'])){
            $msm = array(
                "error" => "Hubo un error",
                "usuario" => $usuario
            );
            View::render('usuario/editar', $msm, 2);

        }else{
            View::render('usuario/editar', ['usuario' => $usuario], 1);
        }

    }

    public function Editar(){
        $usuarioModel = new UsuarioModel();

        $usuario = new Usuario();
        $usuario->setIdUsuario($_POST['idusuario']);
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellido($_POST['apellido']);
        
        $passE = password_hash($_POST['pass'].'ClaveSuperSecreta#7', PASSWORD_DEFAULT);
        $usuario->setPass($passE);

        $result = $usuarioModel->Update($usuario);

        /**0 no modifico reguistro y 1 si modifico */
        if($result == 0){
            View::redirectView("usuarioeditarview&id={$usuario->getIdUsuario()}&error=1");
        }else{
            View::redirectView('usuarios');
        }

    }

    public function Eliminar(){
        $usuarioModel = new UsuarioModel();

        if(isset($_GET['id'])){
            
            $result = $usuarioModel->Delete($_GET['id']);

            header('Content-type: application/json; charset=utf-8');

            if($result == 0){
                echo json_encode(0);
            }else{
                echo json_encode(1);
            }
        }else{
            View::redirectView('usuarios');
        }
    }
}