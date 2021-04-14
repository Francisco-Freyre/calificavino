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
}
?>