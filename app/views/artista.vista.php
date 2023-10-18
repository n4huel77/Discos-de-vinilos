<?php

class ArtistaVista{

    public function mostrarArtistas($artistas){ 
        
        require './templates/tablaArtistas.phtml';
    }

    public function verVinilosXArtista($items){
        var_dump($items);
       
        require './templates/tablaVinilos.phtml';
    }
}