<?php
require_once 'config.php';
class ArtistaModelo{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getArtistas(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artistas = $query->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }

}