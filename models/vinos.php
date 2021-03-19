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
            $sql = "INSERT INTO catas VALUES (null, $id_vino, $id_user, 0);";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function updateCata($id, $calif){
            $sql = "UPDATE catas SET calificacion = $calif WHERE id = $id";
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

        public function deleteCata($id_cata, $id_vino){
            $sql = "DELETE FROM catas WHERE id = $id_cata";
            $response = $this->db->query($sql);
            $sql = "DELETE FROM vinos WHERE id = $id_vino";
            $response2 = $this->db->query($sql);

            if($response && $response2){
                return true;
            }
            else{
                return false;
            }
        }

        public function updateVino($id_vino, $nombre, $region, $pais, $uva, $productor, $cosecha, $alcohol, $url_img){
            $sql = "UPDATE vinos SET nombre = '$nombre', region = '$region', pais = '$pais', uva = '$uva', productor = '$productor', cosecha = $cosecha, alcohol = $alcohol, url_img = '$url_img' WHERE id = $id_vino";
            $response = $this->db->query($sql);
            
            if($response){
                return $response;
            }
            else{
                return false;
            }
        }

        public function getCatasUser($user){
            $sql = "SELECT * FROM catas WHERE id_user = $user";
            $catas = $this->db->query($sql);
            $result = [];
            while ($cat = $catas->fetch_object()) {
                $sql2 = "SELECT nombre, cosecha, url_img FROM vinos WHERE id = $cat->id_vino";
                $vino = $this->db->query($sql2);
                $vi = $vino->fetch_object();
                $AVino = array(
                    "id_cata" => $cat->id,
                    "img" => $vi->url_img,
                    "nombre" => $vi->nombre,
                    "cosecha" => $vi->cosecha,
                    "calif" => $cat->calificacion,
                    "id_vino" => $cat->id_vino
                );
                array_push($result, $AVino);
            }

            return $result;
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
            if($color){
                $sql = "INSERT INTO visual VALUES (NULL, $id, '$capa', '$color', '$brillo', '$viscosidad', '$calificacion');";
            }
            else{
                $sql = "INSERT INTO visual VALUES (NULL, $id, '$capa', '', '$brillo', '$viscosidad', '$calificacion');";
            }
            
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function updateVisual($id, $capa, $color, $brillo, $viscosidad, $calificacion){
            $sql = "UPDATE visual SET capa = '$capa', color = '$color', brillo = '$brillo', viscosidad = '$viscosidad', calificacion = '$calificacion' WHERE id_cata = $id";
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

        public function updateAroma($id, $intensidad, $complejidad, $aromas, $calificacion){
            $sql = "UPDATE aromatica SET intensidad = '$intensidad', complejidad = '$complejidad', aromas = '$aromas', calificacion = '$calificacion' WHERE id_cata = $id";
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

        public function updateGusto($id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $retrogusto, $calificacion){
            $sql = "UPDATE gustativo SET dulce = '$dulce', acidez = '$acidez', tanino = '$tanino', alcohol = '$alcohol', cuerpo = '$cuerpo', permanencia = '$permanencia', retrogusto = '$retrogusto', calificacion = '$calificacion' WHERE id_cata = $id";
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

        public function updateApreciacion($id, $comentario, $meridaje, $calificacion){
            $sql = "UPDATE apreciacion_personal SET comentario = '$comentario', meridaje = '$meridaje', calificacion = '$calificacion' WHERE id_cata = $id";
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