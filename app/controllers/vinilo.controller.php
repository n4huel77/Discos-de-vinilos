<?php

require_once './app/models/vinilo.modelo.php';
require_once './app/views/vinilo.vista.php';
require_once './app/models/artista.modelo.php';
require_once './app/helpers/auth.helper.php';

class ViniloController{
    private $modeloVin;
    private $vistaVin;
    private $modeloArt;

    public function __construct() {
        //Verifico que este logueado
        AuthHelper::verify();
        $this->modeloVin = new ViniloModelo();
        $this->vistaVin = new ViniloVista();
        $this->modeloArt = new ArtistaModelo();

    }

    public function verInicio(){
        $items = $this->modeloVin->getItems();
        $this->vistaVin->verInicio($items);
    }

    public function verVinilos(){
        $items = $this->modeloVin->getItems();
        $this->vistaVin->verTodosItems($items);
        $this->selectArtista(); //lista por artista
    }
    
    public function verDetalle($idArtista){
        $vinilo = $this->modeloVin->getDetalleById($idArtista);
        $this->vistaVin->verDetalle($vinilo);
    }

    public function selectArtista(){
        $artistas = $this->modeloArt->getArtistas();
        $this->vistaVin->selectArtista($artistas);
    }

    public function verVinilosXArtista($artista) {
        $vinilos = $this->modeloVin->getViniloXArt($artista);
        $this->vistaVin->mostrarVinXArt($vinilos);
    }
    
    public function mostrarFormInsertar(){
        $this->vistaVin->mostrarFormInsertar();
    }
    public function insertarVinilo(){
       
        $nombre = $_POST['vinilo'];
        $anio = $_POST['anio'];
        $precio = $_POST['precio'];
        $idArt = $_POST['id-artista'];
        // validaciones
        if (empty($nombre) || empty($precio)|| empty($anio) || empty($idArt)) {
            $this->vistaVin->mostrarFormInsertar("Debe completar todos los campos");
            return;
        }

        $id = $this->modeloVin->insertarVinilo($nombre,$idArt, $precio, $anio);
        if ($id) {
            header('Location: ' . BASE_URL. 'vinilos');
        } else {
            var_dump("no se pudo insertar");
            //$this->view->showError("Error al insertar la tarea");
        }

    }
    public function mostrarFormMod(){

        $this->vistaVin->mostrarFormModificar();
    }
    public function modificarVinilo(){
      
        $vinilo = $_POST['vinilo'];
        $anioLan = $_POST['anio'];
        $precio = $_POST['precio'];
        $id = $_POST['id-vinilo'];
       
        if(!isset($vinilo) || !isset($anioLan) || !isset($precio)){
            $this->vistaVin->mostrarFormModificar('Campos incompletos');
            return;
        }
        
        $this->modeloVin->modificarVinilo($vinilo,$anioLan,$precio,$id);
        header('location: ' . BASE_URL . 'vinilos');
    }

    public function deleteVinilo($idArt){
        $this->modeloVin->deleteVinilo($idArt);
        header('Location: ' . BASE_URL .'vinilos');
    }



}