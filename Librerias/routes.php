<?php

 /** reclaramos nuestras rutas y actiones*/

 define('ROUTES', [
    #nuestra controlador y vista por default
    ''=> ['controller'=> 'Login', 'action' => 'Index'],
    'login' => ['controller'=> 'Login', 'action' => 'Index', 'auth'=>'no'],
       
    'home'=> ['controller'=> 'Home', 'action' => 'home', 'auth' => 'no']
  ]);
