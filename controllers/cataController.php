<?php
    require_once 'models/vinos.php';
class cataController{
    public function index(){
        Utils::isCatador();
        require_once 'views/catas/vino.php';
    }

    public function calificaciones(){
        Utils::isCatador();
        require_once 'views/catas/formulario.php';
    }

    public function listaCatas(){
        Utils::isCatador();
        $vino = new vinos();
        $cata = $vino->getCatasUser($_SESSION['identity']->id);
        $tamaño = count($cata);
        require_once 'views/catas/cataList.php';
    }

    public function deleteCata(){
        if(isset($_GET['id_vino']) && isset($_GET['id_cata'])){
            $vino = new vinos();
            $result = $vino->deleteCata($_GET['id_cata'], $_GET['id_vino']);
            if($result){
                echo "<script>";
                echo "alert('Se elimino el registro exitosamente');";
                echo "window.location.replace('".base_url."');";
                echo "</script>";
            }
        }
    }

    public function editVino(){
        if(isset($_GET['id_vino'])){
            $vino = new vinos();
            $vinos = $vino->getVinoId($_GET['id_vino']);
            require_once 'views/catas/updateVino.php';
        }
    }

    public function updateVino(){
        if(isset($_GET['id_vino'])){
            if(isset($_POST)){
                
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $region = isset($_POST['region']) ? $_POST['region'] : false;
                $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
                $uva = isset($_POST['uva']) ? $_POST['uva'] : false;
                $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
                $cosecha = isset($_POST['cosecha']) ? $_POST['cosecha'] : false;
                $alcohol = isset($_POST['alcohol']) ? $_POST['alcohol'] : false;
                
                $file = $_FILES['img'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                    if(!is_dir('uploads/images')){
                        mkdir('uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                    $url_img = 'uploads/images/'.$filename;
                }

                if($nombre && $region && $pais && $uva && $productor && $cosecha && $alcohol && $url_img){
                    $vino = new vinos();
                    $id = $vino->updateVino($_GET['id_vino'], $nombre, $region, $pais, $uva, $productor, $cosecha, $alcohol, $url_img);
                    if($id){
                        echo "<script>";
                        echo "alert('Se actualizo correctamente el vino');";
                        echo "window.location.replace('".base_url."cata/listaCatas');";
                        echo "</script>";
                    }
                }
                else{
                    echo "<script>";
                        echo "alert('No se actualizo');";
                        echo "window.location.replace('".base_url."cata/listaCatas');";
                        echo "</script>";
                }
        
            }
        }
    }

    public function resumen(){
        Utils::isCatador();
        if(isset($_GET['id'])){
            $vino = new vinos();
            $cata = $vino->getCataId($_GET['id']);
            $OCata = $cata->fetch_object();
            $vine = $vino->getVinoId($OCata->id_vino);
            $vin = $vine->fetch_object();
            $visual = $vino->getVisual($OCata->id);  
            $vis = $visual->fetch_object();
            $aroma = $vino->getAroma($OCata->id);  
            $aro = $aroma->fetch_object();
            $gusto = $vino->getGusto($OCata->id);  
            $gus = $gusto->fetch_object();
            $personal = $vino->getPersonal($OCata->id);  
            $perso = $personal->fetch_object();

            $total = $perso->calificacion + $gus->calificacion + $aro->calificacion + $vis->calificacion;
            require_once 'views/catas/calificacion.php';
        }
        
    }

    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $region = isset($_POST['region']) ? $_POST['region'] : false;
            $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
            $uva = isset($_POST['uva']) ? $_POST['uva'] : false;
            $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
            $cosecha = isset($_POST['cosecha']) ? $_POST['cosecha'] : false;
            $alcohol = isset($_POST['alcohol']) ? $_POST['alcohol'] : false;
            
            $file = $_FILES['img'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }

                move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                $url_img = 'uploads/images/'.$filename;
            }

            if($nombre && $region && $pais && $uva && $productor && $cosecha && $alcohol && $url_img){
                $vino = new vinos();
                $id = $vino->save($nombre, $region, $pais, $uva, $productor, $cosecha, $alcohol, $url_img);
                if($id != false){
                    $save = $vino->saveCata($id, $_SESSION['identity']->id);
                }
                if($save){
                    $_SESSION['vino'] = "Complete";
                }
                else{
                    $_SESSION['vino'] = "Failed";
                }
            }
            else{
                $_SESSION['vino'] = "Failed";
            }
        }
        else{
            $_SESSION['vino'] = "Failed";
        }
        echo "<script>";
        echo "window.location.replace('".base_url."cata/calificaciones');";
        echo "</script>";
    }

    public function saveCalif(){
        var_dump($_POST);
        if(isset($_POST)){
            $capa = $_POST['capa'];
            $color = $_POST['customRadio'];
            $brillo = $_POST['brillo'];
            $viscosidad = $_POST['viscocidad'];
            $calificacion = $_POST['calificacion1'];
            $intensidad = $_POST['intensisdad'];
            $complejidad = $_POST['complejidad'];
            $aromas = $_POST['aromas'];
            $calificacion2 = $_POST['calificacion2'];
            $dulce = $_POST['dulce'];
            $acidez = $_POST['acidez'];
            $tanino = $_POST['tanino'];
            $alcohol = $_POST['alcohol'];
            $cuerpo = $_POST['cuerpo'];
            $permanencia = $_POST['permanencia'];
            $retrogusto = $_POST['sabores'];
            $calificacion3 = $_POST['calificacion3'];
            $comentario = $_POST['comentarios'];
            $meridaje = $_POST['meridaje'];
            $calificacion4 = $_POST['calificacion4'];
            var_dump($capa);
            $calificacionTotal = $calificacion + $calificacion2 + $calificacion3 + $calificacion4;
            
                $vino = new vinos();
                if($capa == 0){ $capa = "baja"; } elseif ($capa == 1) {$capa = "media";} elseif ($capa == 2) { $capa = "media-alta"; } elseif ($capa == 3) {$capa = "alta";}
                if($brillo == 0){ $brillo = "escaso";} elseif ($brillo == 1) {$brillo = "brillante";} elseif($brillo == 2) {$brillo = "muy brillante";}
                if($viscosidad == 0) {$viscosidad = "fluido";} elseif($viscosidad == 1) {$viscosidad = "concistente";} elseif($viscosidad = 2) {$viscosidad = "muy concistente";}
                if($intensidad == 0){ $intensidad = "baja"; } elseif ($intensidad == 1) {$intensidad = "media";} elseif ($intensidad == 2) { $intensidad = "media-alta"; } elseif ($intensidad == 3) {$intensidad = "alta";}
                if($complejidad == 0){ $complejidad = "baja"; } elseif ($complejidad == 1) {$complejidad = "media";} elseif ($complejidad == 2) { $complejidad = "media-alta"; } elseif ($complejidad == 3) {$complejidad = "alta";}
                if($dulce == 0){ $dulce = "seco"; } elseif ($dulce == 1) {$dulce = "semiseco";} elseif ($dulce == 2) { $dulce = "semidulce"; } elseif ($dulce == 3) {$dulce = "dulce";} elseif ($dulce == 4) {$dulce = "muy dulce";}
                if($acidez == 0){ $acidez = "baja"; } elseif ($acidez == 1) {$acidez = "media";} elseif ($acidez == 2) { $acidez = "media-alta"; } elseif ($acidez == 3) {$acidez = "alta";}
                if($tanino == 0){ $tanino = "nulo"; } elseif ($tanino == 1) {$tanino = "bajo";} elseif ($tanino == 2) { $tanino = "medio"; } elseif ($tanino == 3) {$tanino = "medio-alto";} elseif ($tanino == 4) {$tanino = "alto";}
                if($alcohol == 0){ $alcohol = "bajo";} elseif ($alcohol == 1) {$alcohol = "medio";} elseif($alcohol == 2) {$alcohol = "alto";}
                if($cuerpo == 0){ $cuerpo = "ligero"; } elseif ($cuerpo == 1) {$cuerpo = "media";} elseif ($cuerpo == 2) { $cuerpo = "media-alta"; } elseif ($cuerpo == 3) {$cuerpo = "robusto";}
                if($permanencia == 0){ $permanencia = "baja"; } elseif ($permanencia == 1) {$permanencia = "media";} elseif ($permanencia == 2) { $permanencia = "media-alta"; } elseif ($permanencia == 3) {$permanencia = "alta";}
                $id_vino = $vino->getCata($_SESSION['identity']->id);
                $id = $id_vino->fetch_object();
                $save = $vino->saveVisual($id->id, $capa, $color, $brillo, $viscosidad, $calificacion);
                $save2 = $vino->saveAroma($id->id, $intensidad, $complejidad, $aromas, $calificacion2);
                $save3 = $vino->saveGusto($id->id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $retrogusto, $calificacion3);
                $save4 = $vino->saveApreciacion($id->id, $comentario, $meridaje, $calificacion4);

                if($save && $save2 && $save3 && $save4){
                    echo "<script>";
                    echo "window.location.replace('".base_url."cata/resumen&id=$id->id');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('Algun save da falso');";
                    echo "</script>";
                }
            
        }
    }
}
