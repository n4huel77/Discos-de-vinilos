<?php
require_once 'config.php';
require_once 'app/models/model.php';
class UsuarioModelo extends Model {
  
    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

}