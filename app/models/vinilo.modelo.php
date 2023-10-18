<?php
require_once 'config.php';

class ViniloModelo{
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }

    public function getItems(){
        $query = $this->db->prepare('SELECT * FROM vinilos');
        $query->execute();
        $items = $query->fetchAll(PDO::FETCH_OBJ);
        return $items;
    }

    public function getDetalleById($idArtista){
        $query = $this->db->prepare('SELECT vinilos.*,artistas.* FROM vinilos INNER JOIN artistas ON vinilos.id_artista = artistas.id_artista WHERE vinilos.id_vinilo= ? ');
        $query->execute([$idArtista]);
        $item = $query->fetch(PDO::FETCH_OBJ);
        return $item;
    }

    public function getArtistas(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artistas = $query->fetchAll(PDO::FETCH_OBJ);
        return $artistas;
    }

    public function getViniloXArt($idArt){
        $query = $this->db->prepare('SELECT * FROM vinilos WHERE vinilos.id_artista = ?');
        $query->execute([$idArt]);
        $vin = $query->fetchAll(PDO::FETCH_OBJ);
        return $vin;
    }

    public function modificarVinilo($vinilo,$anioLan,$precio,$id){
        $query= $this->db->prepare('UPDATE vinilos SET vinilo= ?, precio= ?, anio_lanzamiento= ? WHERE vinilos.id_vinilo = ?');
        $query->execute([$vinilo,$anioLan,$precio,$id]);
    }

    public function deleteVinilo($idArt){
        $query = $this->db->prepare('DELETE FROM vinilos WHERE id_artista=? ; DELETE FROM artistas WHERE id_artista=?');
        $query->execute([$idArt, $idArt]);

   }

   public function insertarVinilo($nombre, $idArt, $precio, $anio){
    $query = $this->db->prepare('INSERT INTO vinilos (vinilo ,id_artista, precio, anio_lanzamiento) VALUES(?,?,?,?)');
    $query->execute([$nombre, $idArt, $precio, $anio]);
    return $this->db->lastInsertId();
}
}
