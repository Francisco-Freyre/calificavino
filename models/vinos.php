<?php
    class vinos{
        private $id;
        private $id_user;
        private $nombre;
        private $region;
        private $pais;
        private $uva;
        private $productor;
        private $cosecha;
        private $alcohol;
        private $url_img;
        private $db;

        public function __construct() {
            $this->db = Database::connect();
        }

        public function save($nombre, $region, $pais, $uva, $productor, $cosecha, $alcohol, $url_img){
            $sql = "INSERT INTO vinos VALUES (null, '$nombre', '$region', '$pais', '$uva', '$productor', '$cosecha', '$alcohol', '$url_img');";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = $this->db->insert_id;
            }

            return $result;
        }

        public function saveCata($id_vino, $id_user){
            $sql = "INSERT INTO catas VALUES (null, $id_vino, $id_user);";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function getCata($id){
            $sql = "SELECT * FROM catas WHERE id_user = $id ORDER BY id DESC LIMIT 1";
            return $response = $this->db->query($sql);
        }

        public function getCataId($id){
            $sql = "SELECT * FROM catas WHERE id = $id";
            return $response = $this->db->query($sql);
        }

        public function getVino(){
            $sql = "SELECT * FROM `vinos` ORDER BY id DESC LIMIT 1";
            return $vino = $this->db->query($sql);
        }

        public function getVinoId($id){
            $sql = "SELECT * FROM vinos WHERE id = $id";
            return $response = $this->db->query($sql);
        }

        public function saveVisual($id, $capa, $color, $brillo, $viscosidad, $calificacion){
            $sql = "INSERT INTO visual VALUES (NULL, $id, '$capa', '$color', '$brillo', '$viscosidad', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function getVisual($id){
            $sql = "SELECT * FROM visual WHERE id_cata = $id";
            return $response = $this->db->query($sql);
        }

        public function saveAroma($id, $intensidad, $complejidad, $aromas, $calificacion){
            $sql = "INSERT INTO aromatica VALUES (NULL, $id, '$intensidad', '$complejidad', '$aromas', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function getAroma($id){
            $sql = "SELECT * FROM aromatica WHERE id_cata = $id";
            return $response = $this->db->query($sql);
        }

        public function saveGusto($id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $retrogusto, $calificacion){
            $sql = "INSERT INTO gustativo VALUES (NULL, $id, '$dulce', '$acidez', '$tanino', '$alcohol', '$cuerpo', '$permanencia', '$retrogusto', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function getGusto($id){
            $sql = "SELECT * FROM gustativo WHERE id_cata = $id";
            return $response = $this->db->query($sql);
        }

        public function saveApreciacion($id, $comentario, $meridaje, $calificacion){
            $sql = "INSERT INTO apreciacion_personal VALUES (NULL, $id, '$comentario', '$meridaje', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function getPersonal($id){
            $sql = "SELECT * FROM apreciacion_personal WHERE id_cata = $id";
            return $response = $this->db->query($sql);
        }   
    }
?>