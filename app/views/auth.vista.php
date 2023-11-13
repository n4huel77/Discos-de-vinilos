<?php

class AuthVista {

    public function mostrarLogin($error = null){
        require './templates/login.phtml';
    }

    public function logoutAviso(){
        require './templates/aviso.logout.phtml';
    }
}