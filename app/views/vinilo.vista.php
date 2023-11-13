<?php

class ViniloVista
{
    public function verInicio($items)
    { //mostrar el inicio
        require './templates/presentacion.phtml'; // muestro presentacion
    }

    public function verTodosItems($items)
    { //muestra todos los items
        
        require './templates/tabla.vinilos.phtml';
    }

    public function verDetalle($vinilo)
    { //muestra detalle de vinilo seleccionado en tabla de vinilos
       
        require './templates/detalle.vinilo.phtml';
    }

    public function selectArtista($artista)
    {   //lista artistas para buscar vinilos
        require './templates/vinilo.por.artista.phtml';
    }

     public function mostrarVinXArt($items){
        require './templates/tabla.vinilos.phtml';
    } 

    public function mostrarFormInsertar($artistas){
        require './templates/form.insert.vinilo.phtml';
    }
    
    public function mostrarFormModificar($idVinilo,$error = null){
     require './templates/form.modificar.vinilo.phtml';
    }
    
    public function mostrarError($error){
        require './templates/error.phtml';
    }

}
