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
    
    public function mostrarFormInsertarVin(){
        $artistas = $this->modeloArt->getArtistas();
        $this->vistaVin->mostrarFormInsertar($artistas);
    }
    public function insertarVinilo(){
        if(AuthHelper::verify()){
            $nombre = $_POST['vinilo'];
            $anio = $_POST['anio'];
            $precio = $_POST['precio'];
            $idArt = $_POST['id_art'];
            
            // validaciones
            if (empty($nombre) || empty($precio)|| empty($anio) || empty($idArt)) {
                $this->vistaVin->mostrarError("Debe completar todos los campos");
                return;
            }

            $viniloInsertado = $this->modeloVin->insertarVinilo($nombre,$idArt, $precio, $anio);
            if ($viniloInsertado) {
                header('Location: ' . BASE_URL. 'vinilos');
            } else {
                $this->vistaVin->mostrarError("Error al insertar vinilo");
            }
        }
    }

    public function mostrarFormMod($idVinilo){
        $this->vistaVin->mostrarFormModificar($idVinilo);
    }

    public function modificarVinilo($idVinilo){
        if(AuthHelper::verify()){
            $precio = $_POST['precio'];
            
            if(empty($precio) || empty($idVinilo)){
                $this->vistaVin->mostrarError('Campos incompletos');
                return;
            }
            $this->modeloVin->modificarVinilo($precio,$idVinilo);
            header('location: ' . BASE_URL . 'vinilos');
 
        }
    }
    public function eliminarVinilo($idVinilo){
        if(AuthHelper::verify()){
            $this->modeloVin->eliminarVinilo($idVinilo);
            header('Location: ' . BASE_URL .'vinilos');
        }
    }



}