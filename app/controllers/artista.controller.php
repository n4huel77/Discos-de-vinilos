<?php
require_once './app/models/artista.modelo.php';
require_once './app/views/artista.vista.php'; //cambiar el nombre de la carpeta
require_once './app/models/vinilo.modelo.php';
class artistaController{
    private $modeloArt;
    private $vistaArt;
    private $modeloVinilo;
    public function __construct() {
        $this->modeloArt = new ArtistaModelo();
        $this->vistaArt = new ArtistaVista();
        $this->modeloVinilo = new ViniloModelo();

    }

    public function getArtistas() {
        $artistas = $this->modeloArt->getArtistas();
        return $artistas;
    }

    public function verArtistas(){
        $artistas = $this->getArtistas();
        $this->vistaArt->mostrarArtistas($artistas);
    }

    public function verDetalleArtista($idArtista){
        $vinilosXartista = $this->modeloVinilo->getViniloXArt($idArtista);
        $this->vistaArt->verVinilosXArtista($vinilosXartista);
    }
    
}