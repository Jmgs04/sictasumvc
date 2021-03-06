<?php
require_once 'model/m_database.php';
date_default_timezone_set('America/Caracas');

$controller = 'principal';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . '_Controller';
    $controller = new $controller;
    $controller->Index();   
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . '_Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
	 
}