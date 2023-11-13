<?php

class ArtistaVista{

    public function mostrarArtistas($artistas){ 
        
        require './templates/tabla.artistas.phtml';
    }

    public function verVinilosXArtista($detalleArt){
        require './templates/detalle.artista.phtml';
    }

    public function formInsertarArt(){
        require './templates/form.insert.artista.phtml';
    }

    public function formModicarArt($idArt){
        require './templates/form.modificar.artista.phtml';
    }

    public function mostrarAlerta($idArt){
        require './templates/alerta.phtml';
    }
    
    public function mostrarError($error){
        require './templates/error.phtml';
    }
}