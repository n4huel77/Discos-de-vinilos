<?php
require_once 'config.php';
class UsuarioModelo {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

}