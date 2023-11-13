<?php
require_once './app/models/artista.modelo.php';
require_once './app/views/artista.vista.php'; //cambiar el nombre de la carpeta
require_once './app/models/vinilo.modelo.php';
class artistaController{
    private $modeloArt;
    private $vistaArt;
    //private $modeloVinilo;
    public function __construct() {
        //AuthHelper::verify();
        $this->modeloArt = new ArtistaModelo();
        $this->vistaArt = new ArtistaVista();
        //$this->modeloVinilo = new ViniloModelo();

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
        $detalleArt = $this->modeloArt->getArtistaById($idArtista);
        $this->vistaArt->verVinilosXArtista($detalleArt);
    }
    
    public function mostrarFormInsertarArt(){
        $this->vistaArt->formInsertarArt();
    }

    public function insertarArtista(){
        if(AuthHelper::verify()){
            $artista = $_POST['artista'];
            $anioNac = $_POST['anio'];
            $descp = $_POST['descp'];

            if(empty($artista) || empty($anioNac) || empty($descp)){
                $this->vistaArt->mostrarError('Campos incompletos');
                return;
            }
            $artistaInsertado = $this->modeloArt->insertarArtista($artista,$anioNac,$descp);
            if($artistaInsertado){
                header('Location: '. BASE_URL . 'artistas');
            }
            else{
                $this->vistaArt->mostrarError('Error al insertar artista');
            }
        }
    }

    public function mostrarFormModificarArt($idArt){
        $this->vistaArt->formModicarArt($idArt);
    }    

    public function modificarArtista($idArt){
        if(AuthHelper::verify()){
            $descp = $_POST['descp'];
            die();
            if(empty($descp)){
                $this->vistaArt->mostrarError('Campos incompletos');
                return;
            }
            $this->modeloArt->modificarArtista($idArt, $descp);
            header('location: ' . BASE_URL . 'artistas');
    
           }
    }

    public function mostrarAlerta($idArt){
        if(AuthHelper::verify()){
            $this->vistaArt->mostrarAlerta($idArt);
        }
    }
    public function eliminarArtista($idArt){
        if(AuthHelper::verify()){
            $this->modeloArt->eliminarArtista($idArt);
            header('Location: ' . BASE_URL .'artistas');
        }
    }
}