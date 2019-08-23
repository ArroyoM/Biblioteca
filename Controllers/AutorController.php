<?php 

class AutorController{

    public function __construct(){
    }

    /** controla la vista login */
    public function Index(){
        
        $autor = new AutorModel();
        $autores = $autor->AllAutores();

        /**retorna la vista login */
        View::render('autor/index',['autores' => $autores]);
    }

    public function Vistacrear(){
        View::render('autor/crear',[]);
    }


    public function Crear(){

        $autorModel = new AutorModel();

        $autor = new Autor();
        $autor->setNombre($_POST['nombre']);

        $result = $autorModel->Create($autor);

        if($result == 0){
            View::render('autor/autor',['error'=>'no se a podido guardar']);
        }else{
            View::redirectView('autores');
        }
    
    }

    public function Vistaeditar(){

        $autorModel = new AutorModel();
        $autor = new Autor();

        $autor = $autorModel->Getid($_GET['id']);
        if(isset($_GET['error'])){
            $msm = array(
                "error" => "Hubo un error",
                "autor" => $autor
            );
            View::render('autor/editar', $msm, 2);

        }else{
            View::render('autor/editar', ['autor' => $autor], 1);
        }
    }

    public function Editar(){
        $autorModel = new AutorModel();

        $autor = new Autor();
        $autor->setIdAutor($_POST['idautor']);
        $autor->setNombre($_POST['nombre']);

    
        $result = $autorModel->Update($autor);

        /**0 no modifico reguistro y 1 si modifico */
        if($result == 0){
            View::redirectView("autoreditarview&id={$autor->getIdAutor()}&error=1");
        }else{
            View::redirectView('autores');
        }
    }

    public function Eliminar(){
        $autorModel = new AutorModel();

        if(isset($_GET['id'])){
            
            $result = $autorModel->Delete($_GET['id']);

            header('Content-type: application/json; charset=utf-8');

            if($result == 0){
                echo json_encode(0);
            }else{
                echo json_encode(1);
            }
        }else{
            View::redirectView('autores');
        }
    }
}