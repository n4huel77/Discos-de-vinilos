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


//  inicio                  ->       $controllerVinilo->verInicio();
//  detalle-vinilo          ->       $controllerVinilo->verDetalle($id);
//  vinilos                 ->       $controllerVinilo->verVinilos();
//  artistas                ->       $controllerArt->verArtistas();
//  artista-vinilo          ->       $controllerVinilo->verVinilosXArtista($id);
//  detalle-detalle         ->       $controllerArt->verDetalleArtista(); 
//  login                   ->       $controllerAuth->mostrarLogin();
//  auth                    ->       $controllerAuth->auth();
//  aviso-logout            ->       $controllerAuth->mostrarAviso();
//  logout                  ->       $controllerAuth->logout();
//  editar-vinilo           ->       $controllerVinilo->mostrarFormMod($id);
//  modificar-vinilo        ->       $controllerVinilo->modificarVinilo($id);
//  eliminar-vinilo         ->       $controllerVinilo->eliminarVinilo($id);
//  form-insertar-vinilo    ->       $controllerVinilo->mostrarFormInsertarVin();
//  insertar-vinilo         ->       $controllerVinilo->insertarVinilo();
//  form-insertar-artista   ->       $controllerArt->mostrarFormInsertarArt();
//  insertar-artista        ->       $controllerArt->insertarArtista();
//  editar-artista          ->       $controllerArt->mostrarFormModificarArt($id);
//  modificar-artista       ->       $controllerArt->modificarArtista($id);
//  eliminar-alerta         ->       $controllerArt->mostrarAlerta($id);
//  eliminar-artista        ->       $controllerArt->eliminarArtista($id);
//
switch($params[0]){
    case 'inicio':
        $controllerVinilo->verInicio();
        break;
    case 'detalle-vinilo':
        $controllerVinilo->verDetalle($params[1]);
        break;
    case 'vinilos':
        $controllerVinilo->verVinilos();
        break;
    case 'artistas':
        $controllerArt->verArtistas();
        break;
    case 'artista-vinilos':
        $controllerVinilo->verVinilosXArtista($params[1]);
        break;
    case 'artista-detalle':
        $controllerArt->verDetalleArtista($params[1]);
        break;
    case 'login':
        $controllerAuth->mostrarLogin();
        break;
    case 'auth':
        $controllerAuth->auth();
        break;
    case 'aviso-logout':
        $controllerAuth->mostrarAviso();
        break;
    case 'logout':
        $controllerAuth->logout();
        break;
    case 'editar-vinilo':
        $controllerVinilo->mostrarFormMod($params[1]);
        break;
    case 'modificar-vinilo':
        $controllerVinilo->modificarVinilo($params[1]);
        break;
    case 'eliminar-vinilo':
        $controllerVinilo->eliminarVinilo($params[1]);
        break;
    case 'form-insertar-vinilo': 
        $controllerVinilo->mostrarFormInsertarVin();
        break;
    case 'insertar-vinilo' : 
        $controllerVinilo->insertarVinilo();
        break;
    case 'form-insertar-artista':
        $controllerArt->mostrarFormInsertarArt();
        break;
    case 'insertar-artista':
        $controllerArt->insertarArtista();
        break;
    case 'editar-artista':
        $controllerArt->mostrarFormModificarArt($params[1]);
        break;
    case 'modificar-artista':
        $controllerArt->modificarArtista($params[1]);
        break;
    case 'eliminar-alerta':
        $controllerArt->mostrarAlerta($params[1]);
        break;
    case 'eliminar-artista':
        $controllerArt->eliminarArtista($params[1]);
        break;
    default: 
        echo "404 Page Not Found";
        break;

}