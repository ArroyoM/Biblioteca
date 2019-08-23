<?php

 /** PATH de la aplicacion, raiz*/
 define('APP_PATH', __DIR__.'/../');

/**url base */
 define('PUBLIC_PATH', 'http://localhost/Biblioteca/public/');


 /**Importa el archivo de conexion a la base de datos */
 require_once APP_PATH.'Conexion/Conexion.php';
 require_once APP_PATH.'Librerias/Auth.php';
 require_once APP_PATH.'Librerias/View.php';
 require_once APP_PATH.'Librerias/Route.php';
 require_once APP_PATH.'Librerias/routes.php';