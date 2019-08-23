<?php

 /** reclaramos nuestras rutas y actiones*/

 define('ROUTES', [
    #nuestra controlador y vista por default
    ''=> ['controller'=> 'Login', 'action' => 'Index'],
    'login' => ['controller'=> 'Login', 'action' => 'Index', 'auth'=>'no'],
    'validar' => ['controller'=> 'Login', 'action' => 'Validar', 'auth'=>'no'],

    /**vista de crud usuario */
    'usuarios'=> ['controller'=> 'Usuario', 'action' => 'Index', 'auth' => 'no'],
    'usuario'=> ['controller'=> 'Usuario', 'action' => 'Vistacrear', 'auth' => 'no'],
    'usuariocrear'=> ['controller'=> 'Usuario', 'action' => 'Crear', 'auth' => 'no'],
    'usuarioeditarview'=> ['controller'=> 'Usuario', 'action' => 'Vistaeditar', 'auth' => 'no'],
    'usuarioeditar'=> ['controller'=> 'Usuario', 'action' => 'Editar', 'auth' => 'no'],
    'usuarioeliminar'=> ['controller'=> 'Usuario', 'action' => 'Eliminar', 'auth' => 'no'],

    /**vista de crud libro */
    'libros'=> ['controller'=> 'Libro', 'action' => 'Index', 'auth' => 'no'],
    'libro'=> ['controller'=> 'Libro', 'action' => 'Vistacrear', 'auth' => 'no'],
    'librocrear'=> ['controller'=> 'Libro', 'action' => 'Crear', 'auth' => 'no'],
    'libroeditarview'=> ['controller'=> 'Libro', 'action' => 'Vistaeditar', 'auth' => 'no'],
    'libroeditar'=> ['controller'=> 'Libro', 'action' => 'Editar', 'auth' => 'no'],
    'libroeliminar'=> ['controller'=> 'Libro', 'action' => 'Eliminar', 'auth' => 'no'],

      /**vista de crud autor */
    'autores'=> ['controller'=> 'Autor', 'action' => 'Index', 'auth' => 'no'],
    'autor'=> ['controller'=> 'Autor', 'action' => 'Vistacrear', 'auth' => 'no'],
    'autorcrear'=> ['controller'=> 'Autor', 'action' => 'Crear', 'auth' => 'no'],
    'autoreditarview'=> ['controller'=> 'Autor', 'action' => 'Vistaeditar', 'auth' => 'no'],
    'autoreditar'=> ['controller'=> 'Autor', 'action' => 'Editar', 'auth' => 'no'],
    'autoreliminar'=> ['controller'=> 'Autor', 'action' => 'Eliminar', 'auth' => 'no'],

    /**vista descontinuado */
    'descontinuados'=> ['controller'=> 'Descontinuado', 'action' => 'Index', 'auth' => 'no'],

    /**vista prestamo */
    'prestamo'=> ['controller'=> 'Prestamo', 'action' => 'Index', 'auth' => 'no']
  ]);
