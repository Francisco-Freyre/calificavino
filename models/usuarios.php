<?php
class usuarios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getUser($id_user){
        $sql = "SELECT id, nombre, correo, imagen FROM clientes WHERE id = $id_user";
        return $result = $this->db->query($sql);
    }
}
?>