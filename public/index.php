<?php
session_start();

/**Importamos la configuracion */
require_once __DIR__. '/../config/App.php';

/**revisar la varaible url */
$url = $_GET['url'] ?? '';
/**sino exite se le iguala a false */
$route = ROUTES[$url] ?? false;

/**revisar si es false retorna error 404 sino envia el controlador y accion para generar vista */
if($route){
    $controller = $route['controller'];
    $action = $route['action'];
    Route::any($controller, $action);
}else{
    View::renderError404();
}






