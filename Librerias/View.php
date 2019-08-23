<?php

class View{

    /** fileView es archivo de la vista*/
    /** /varialbes si hay sino un array vacio por default*/
    public static function render($vista, array $variables = [])
    {
        /**convierte el array en variables independientes */
        extract($variables);
        
        require_once  APP_PATH."/views/$vista.php";
    }

    /**retornar una vista 404 */
    public static function renderError404()
    {
        header('HTTP/1.0 404 Not Found');
        require_once  APP_PATH."/views/errors/404.php";
    }
    
    /**redicionar una vista */
    public static function redirectView($view){
      header('Location:'.PUBLIC_PATH.$view);
    }


}