<?php
require_once './app/views/auth.vista.php';
require_once './app/models/usuario.modelo.php';
require_once './app/helpers/auth.helper.php';


class AuthController {
    private $modelo;
    private $vista;

    function __construct()
    {
        $this->modelo = new UsuarioModelo();
        $this->vista = new AuthVista();
    }
    
    public function mostrarLogin(){
        
        $this->vista->mostrarLogin();
    } 

    public function auth() {
        $usuario = $_POST['email'];
        $password = $_POST['pass'];
        var_dump(password_hash('admin', PASSWORD_BCRYPT));
        if (empty($usuario) || empty($password)) {
            $this->vista->mostrarLogin('Faltan completar datos');
            return;
        }

        // busco el usuario
        $user = $this->modelo->getByEmail($usuario);
        var_dump($user);
        if ($user && password_verify($password,$user->pass)) {
            
            AuthHelper::login($user);
            
            var_dump($user);
            header('Location: ' . BASE_URL . 'vinilos' );
        }
        else {
            $this->vista->mostrarLogin('Usuario inválido');
        }
    }

    public function mostrarAviso(){
        $this->vista->logoutAviso();
    }
    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }


}
