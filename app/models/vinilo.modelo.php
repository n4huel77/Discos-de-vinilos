<?php
require_once 'config.php';
require_once 'app/models/model.php';
class ViniloModelo extends Model{


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

    public function insertarVinilo($nombre, $idArt, $precio, $anio){
     $query = $this->db->prepare('INSERT INTO vinilos (vinilo ,id_artista, precio, anio_lanzamiento) VALUES(?,?,?,?)');
     $query->execute([$nombre, $idArt, $precio, $anio]);
     return $this->db->lastInsertId();
    }
    
    public function modificarVinilo($precio, $id){
        $query= $this->db->prepare('UPDATE vinilos SET precio = ? WHERE vinilos.id_vinilo = ?');
        $query->execute([$precio, $id]);
    }

    public function eliminarVinilo($idVinilo){
        $query = $this->db->prepare('DELETE FROM vinilos WHERE id_vinilo = ?');
        $query->execute([$idVinilo]);

   }

}
