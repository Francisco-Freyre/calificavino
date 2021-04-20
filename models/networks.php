<?php
class networks{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getCompartidos(){
        $sql = "SELECT * FROM publication ORDER BY creado DESC";
        return $result = $this->db->query($sql);
    }

    public function saveComent($id_user, $id_public, $contenido){
        $sql = "INSERT INTO comentarios VALUES (NULL, $id_public, '$id_user', '$contenido', CURTIME(), CURTIME());";
        return $result = $this->db->query($sql);
    }

    public function getComents($id_pubic){
        $sql = "SELECT * FROM comentarios WHERE id_public = $id_pubic";
        return $result = $this->db->query($sql);
    }
}
?>