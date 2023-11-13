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

    public function getArtistaById($idArt){
        $query = $this->db->prepare('SELECT * FROM artistas WHERE artistas.id_artista = ?');
        $query->execute([$idArt]);
        $artista = $query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }

    public function insertarArtista($artista,$anioNac,$descp) {
        $query = $this->db->prepare('INSERT INTO artistas (artista, anio_nac, descripcion) VALUES (?, ?, ?)' );
        $query->execute([$artista,$anioNac,$descp]);

        return $this->db->lastInsertId();

    }

    public function modificarArtista($descp, $idArt) {
        $query= $this->db->prepare('UPDATE artistas SET descripcion = ? WHERE artistas.id_artista = ?');
        $query->execute([$descp, $idArt ]);
    }

    public function eliminarArtista($idArt){
        $query = $this->db->prepare('DELETE FROM artistas WHERE id_artista = ?');
        $query->execute([$idArt]);

   }

}