<?php

class Route{
    /** controller revise el contrador a usar*/
    /** action el metodo del contrador a usar*/
    public static function any($controller = null, $action = 'Index')
    {
        /** nueva instancia de nuestro contralor*/
        if ($controller) {
            require_once APP_PATH."Controllers/{$controller}Controller.php";
            $controllerString = $controller.'Controller';
            $controller = new $controllerString;

        }

        /** comprabamos si tiene el metodo o action el contralor*/
        if (method_exists($controller, $action)) {         
                return $controller->$action();
          
        } else {
            /** error 404 */
            View::renderError404();
        }
    }

}