<?php
require_once './app/controllers/vinilo.controller.php';
require_once './app/controllers/artista.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL','//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'inicio';

if(!empty($_GET['action'])){
    $action = $_GET['action'];
}

$params = explode('/', $action);
$controllerVinilo = new ViniloController();
$controllerArt = new artistaController();
$controllerAuth = new AuthController();


//  inicio          ->      $controllerVinilo->verInicio();
//  detalleVinilo   ->      $controllerVinilo->verDetalle($id);
//  vinilos         ->      $controllerVinilo->verVinilos();
//  artistas        ->      $controllerArt->verArtistas();
//  artista         ->      $controllerVinilo->verVinilosXArtista($id);
//  detalleArtista  ->      $controllerArt->verDetalleArtista(); 

switch($params[0]){
    case 'inicio':
        $controllerVinilo->verInicio();
        break;
    case 'detalleVinilo':
        $controllerVinilo->verDetalle($params[1]);
        break;
    case 'vinilos':
        $controllerVinilo->verVinilos();
        break;
    case 'artistas':
        $controllerArt->verArtistas();
        break;
    case 'artista':
        $controllerVinilo->verVinilosXArtista($params[1]);
        break;
    case 'detalleArtista':
        $controllerArt->verDetalleArtista($params[1]);
        break;
    case 'login':
        $controllerAuth->mostrarLogin();
        break;
    case 'auth':
        $controllerAuth->auth();
        break;
    case 'editar':
        $controllerVinilo->mostrarFormMod();
        break;
    case 'modificar':
        $controllerVinilo->modificarVinilo();
        break;
    case 'eliminar':
        $controllerVinilo->deleteVinilo($params[1]);
        break;
    case 'insertar': 
        $controllerVinilo->mostrarFormInsertar();
        break;
    case 'insertarVinilo' : 
        $controllerVinilo->insertarVinilo();
        break;
    default: 
        echo "404 Page Not Found";
        break;

}