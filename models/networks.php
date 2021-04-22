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

    public function getLike($id_user, $id_public){
        $sql = "SELECT * FROM likes WHERE id_usuario = $id_user AND id_public = $id_public";
        return $result = $this->db->query($sql);
    }

    public function saveLike($id_user, $id_public){
        $sql = "INSERT INTO likes VALUES (NULL, '$id_user', $id_public, CURTIME(), CURTIME());";
        return $result = $this->db->query($sql);
    }

    public function deleteLike($id){
        $sql = "DELETE FROM likes WHERE id = $id";
        return $respuesta = $this->db->query($sql);
    }

    public function contarLikes($id_public){
        $sql = "SELECT COUNT(id) AS cantidad FROM likes WHERE id_public = 6 $id_public";
        $respuesta = $this->db->query($sql);
        if($respuesta){
            return $respuesta->cantidad;
        }
        else{
            return 0;
        }
    }
}
?>