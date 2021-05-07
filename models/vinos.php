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

        public function getNewVinos(){
            $sql = "SELECT * FROM new_vinos";
            $result = $this->db->query($sql);
            return $result;
        }

        public function getVinosCatados(){
            $sql = "SELECT * FROM new_vinos WHERE id IN (SELECT id_vino FROM catas) ORDER BY id DESC;";
            $result = $this->db->query($sql);
            return $result;
        }

        public function buscadorVinos($nombre){
            $sql = "SELECT * FROM new_vinos WHERE id IN (SELECT id_vino FROM catas) AND nombre LIKE '%$nombre%' ORDER BY id DESC;";
            $result = $this->db->query($sql);
            return $result;
        }

        public function saveNewVinos($nombre, $region, $pais, $productor, $url_img){
            $sql = "INSERT INTO new_vinos VALUES (null, '$nombre', '$pais', '$region', '', '$productor', '$url_img');";
            $save = $this->db->query($sql);
            $result = false;
            if($save){
                $result = $this->db->insert_id;
            }

            return $result;
        }

        public function updateNewVino($id, $nombre, $region, $pais, $productor, $url_img){
            $sql = "UPDATE new_vinos SET nombre = '$nombre', pais = '$pais', region = '$region', uva = '', productor = '$productor', url_img = '$url_img' WHERE id = $id";
            $response = $this->db->query($sql);
            
            if($response){
                return $response;
            }
            else{
                return false;
            }
        }

        public function deleteNewVino($id){
            $sql = "DELETE FROM new_vinos WHERE id = $id";
            $respuesta = $this->db->query($sql);

            return $respuesta;
        }

        public function promedioCataVino($id_vino){
            $sql = "SELECT AVG(calificacion) AS promedio, id_vino FROM catas GROUP BY id_vino HAVING id_vino = $id_vino;";
            return $respuesta = $this->db->query($sql);
        }

        public function getNewVinoId($id){
            $sql = "SELECT * FROM new_vinos WHERE id = $id";
            return $response = $this->db->query($sql);
        }

        public function getCosecha($id){
            $sql = "SELECT * FROM cosechas WHERE id_vino = $id";
            return $response = $this->db->query($sql);
        }

        public function getMejorCata($id){
            $sql = "SELECT * FROM `catas` WHERE id_user = $id ORDER BY calificacion DESC LIMIT 1";
            return $response = $this->db->query($sql);
        }

        public function getCosechas($id_vino, $id_cata){
            $sql = "SELECT * FROM cosechas WHERE id_vino = $id_vino AND id_cata = $id_cata;";
            return $response = $this->db->query($sql);
        }

        public function getPalabrasAromas($id_cata){
            $sql = "SELECT * FROM palabras_aromas WHERE id_cata = $id_cata";
            return $response = $this->db->query($sql);
        }

        public function getUvas($id_vino){
            return $response = $this->db->query("SELECT * FROM uvas WHERE id_vino = $id_vino");
        }

        public function getPalabrasGustos($id_cata){
            $sql = "SELECT * FROM palabras_gustos WHERE id_cata = $id_cata";
            return $response = $this->db->query($sql);
        }

        public function saveCosecha($cosecha, $alcohol, $id_vino, $id_cata){
            $sql = "INSERT INTO cosechas VALUES (null, $cosecha, $alcohol, $id_vino, $id_cata);";
            return $save = $this->db->query($sql);
        }

        public function savePalabraAromas($palabra, $id_cata){
            $sql = "INSERT INTO palabras_aromas VALUES (null, '$palabra', $id_cata);";
            $save = $this->db->query($sql);
            if($save){
                $save = $this->db->insert_id;
            }

            return $save;
        }

        public function savePalabraGustos($palabra, $id_cata){
            $sql = "INSERT INTO palabras_gustos VALUES (null, '$palabra', $id_cata);";
            $save = $this->db->query($sql);
            if($save){
                $save = $this->db->insert_id;
            }

            return $save;
        }

        public function saveUva($uva, $id_vino){
            $sql = "INSERT INTO uvas VALUES (null, '$uva', $id_vino);";
            $save = $this->db->query($sql);
            if($save){
                $save = $this->db->insert_id;
            }

            return $save;
        }

        public function verifUva($id_vino){
            $sql = "SELECT * FROM uvas WHERE id_vino = $id_vino";
            $res = $this->db->query($sql);

            if($res->num_rows > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function deletePalabraAromas($id){
            $sql = "DELETE FROM palabras_aromas WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function deletePalabraGustos($id){
            $sql = "DELETE FROM palabras_gustos WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function deleteUvas($id){
            $sql = "DELETE FROM uvas WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function compartirCata($id_usuario, $id_cata, $contenido){
            $sql = "INSERT INTO publication VALUES (null, $id_usuario, $id_cata, '$contenido', CURTIME(), CURTIME());";
            return $respuesta = $this->db->query($sql);
        }

        public function obtenerPublic($id){
            $sql = "SELECT * FROM publication WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function editarPublic($id, $contenido){
            $sql = "UPDATE publication SET contenido = '$contenido', actualizado = CURTIME() WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function eliminarPublic($id){
            $sql = "DELETE FROM publication WHERE id = $id";
            return $respuesta = $this->db->query($sql);
        }

        public function calificacionCata($id_cata){
            $sql = "SELECT visual.calificacion AS calif1, aromatica.calificacion AS calif2, gustativo.calificacion AS calif3, apreciacion_personal.calificacion AS calif4 FROM visual, aromatica, gustativo, apreciacion_personal WHERE visual.id_cata = $id_cata AND aromatica.id_cata = $id_cata AND gustativo.id_cata = $id_cata AND apreciacion_personal.id_cata = $id_cata";
            $respuesta = $this->db->query($sql);
            if($respuesta){
                $res = $respuesta->fetch_object();
                $total = $res->calif1 + $res->calif2 + $res->calif3 + $res->calif4;
                return $total;
            }
            else{
                return false;
            }
            
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
                $result = $this->db->insert_id;
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

        public function deleteCata($id_cata){
            $sql = "DELETE FROM catas WHERE id = $id_cata";
            $response = $this->db->query($sql);

            if($response){
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
                $sql2 = "SELECT new_vinos.nombre, cosechas.cosecha, new_vinos.url_img FROM new_vinos, cosechas WHERE new_vinos.id = $cat->id_vino AND cosechas.id_vino = $cat->id_vino AND cosechas.id_cata = $cat->id";
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

        public function saveAroma($id, $intensidad, $complejidad, $calificacion){
            $sql = "INSERT INTO aromatica VALUES (NULL, $id, '$intensidad', '$complejidad', '', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function updateAroma($id, $intensidad, $complejidad, $calificacion){
            $sql = "UPDATE aromatica SET intensidad = '$intensidad', complejidad = '$complejidad', aromas = '', calificacion = '$calificacion' WHERE id_cata = $id";
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

        public function saveGusto($id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $calificacion){
            $sql = "INSERT INTO gustativo VALUES (NULL, $id, '$dulce', '$acidez', '$tanino', '$alcohol', '$cuerpo', '$permanencia', '', '$calificacion');";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }

            return $result;
        }

        public function updateGusto($id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $calificacion){
            $sql = "UPDATE gustativo SET dulce = '$dulce', acidez = '$acidez', tanino = '$tanino', alcohol = '$alcohol', cuerpo = '$cuerpo', permanencia = '$permanencia', retrogusto = '', calificacion = '$calificacion' WHERE id_cata = $id";
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