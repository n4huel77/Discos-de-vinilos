<?php

class ViniloVista
{
    public function verInicio($items)
    { //mostrar el inicio
        // $count = count($items);
        require './templates/header.phtml'; //muestro header
        require './templates/presentacion.phtml'; // muestro presentacion
        // var_dump($items);
        // $this->showAllItems($items); //muestra todos los items
        //require './templates/footer.phtml';
    }

    public function verTodosItems($items)
    { //muestra todos los items
        
        require './templates/tablaVinilos.phtml';
    }

    public function verDetalle($vinilo)
    { //muestra detalle de vinilo seleccionado en tabla de vinilos
       
        require './templates/detalleItem.phtml';
    }

    public function selectArtista($artista)
    {   //lista artistas para buscar vinilos
        require './templates/vinilo.por.artista.phtml';
        require './templates/footer.phtml';
    }

     public function mostrarVinXArt($items){
       $this->verTodosItems($items);
    } 

    public function mostrarFormModificar($error = null){
        require './templates/form.modificar.phtml';
    }

    public function mostrarFormInsertar($error = null){
        require './templates/formInsert.phtml';
    }

}
