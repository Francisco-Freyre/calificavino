<?php 
    include_once '../config/parameters.php';
    include_once '../helpers/session.php';
    require_once '../models/vinos.php';
    require_once '../config/db.php';
    include "../helpers/class.upload.php";

    if(isset($_GET['id'])){
        $vinos = new vinos();
        $newVino = $vinos->getNewVinoId($_GET['id']);
        $vino = $newVino->fetch_object();
        die(json_encode($vino));
    }

    if(isset($_GET['id_catado'])){
        $vino = new vinos();
        $result = $vino->deleteCata($_GET['id_catado']);
        if($result){
            echo "<script>";
            echo "alert('Se elimino el registro exitosamente');";
            echo "window.location.replace('".base_url."');";
            echo "</script>";
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "vino-existe"){
            $vinos = new vinos();
            $cata = $vinos->saveCata($_POST['id_vino'], $_SESSION['identity']->id);
            $insert_cosecha = $vinos->saveCosecha($_POST['cosecha'], $_POST['alcohol'], $_POST['id_vino'], $cata);
            if($cata != false && $insert_cosecha){
                echo "<script>";
                echo "window.location.replace('".base_url."calificacion.php?id_cata=".$cata."');";
                echo "</script>";
            }
            else{
                echo "<script>";
                echo "alert('Algo salio mal');";
                echo "</script>";
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "vino-nuevo"){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $region = isset($_POST['region']) ? $_POST['region'] : false;
            $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
            $uva = isset($_POST['uva']) ? $_POST['uva'] : false;
            $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
            $cosecha = isset($_POST['cosecha']) ? $_POST['cosecha'] : false;
            $alcohol = isset($_POST['alcohol']) ? $_POST['alcohol'] : false;

            $file = $_FILES['img'];
            $filename = $file['name'];

            if (isset($_FILES["img"])) {
                $up = new Upload($_FILES["img"]);
                if ($up->uploaded) {
                    $up->Process("../uploads/");
                    if ($up->processed) {
                        $up->image_resize = true;
                        $up->image_x = $up->image_src_x / 2;
                        $up->image_ratio_y = true;
                        $up->jpeg_quality = 50;

                        $up->Process("../uploads/images/");
                        if ($up->processed) {
                            $url_img = 'uploads/images/' . $filename;
                        }
                    }
                }
            }

            if ($nombre && $region && $pais && $uva && $productor && $cosecha && $alcohol && $url_img) {
                $vino = new vinos();
                $id = $vino->saveNewVinos($nombre, $region, $pais, $uva, $productor, $url_img);
                if ($id != false) {
                    $save = $vino->saveCata($id, $_SESSION['identity']->id);
                    $saveCos = $vino->saveCosecha($cosecha, $alcohol, $id, $save);
                }
                else{
                    echo "<script>";
                    echo "alert('No se pudo guardar el vino');";
                    echo "</script>";
                }
                if ($save != false && $saveCos) {
                    $respuesta = array(
                        'respuesta' => 'exito'
                    );
                    echo "<script>";
                    echo "window.location.replace('".base_url."calificacion.php?id_cata=$save');";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('La cata o la cosecha no se pudieron guardar');";
                    echo "</script>";
                }
            } else {
                echo "<script>";
                echo "alert('Algun dato da falso');";
                echo "</script>";
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "insertar-visual"){
            $capa = $_POST['capa'];
            $color = isset($_POST['customRadio']) ? $_POST['customRadio'] : false;
            $brillo = $_POST['brillo'];
            $viscosidad = $_POST['viscocidad'];
            $calificacion = $_POST['calificacion1'];

            $vino = new vinos();
            if($capa == 0){ $capa = "baja"; } elseif ($capa == 1) {$capa = "media";} elseif ($capa == 2) { $capa = "media-alta"; } elseif ($capa == 3) {$capa = "alta";}
            if($brillo == 0){ $brillo = "escaso";} elseif ($brillo == 1) {$brillo = "brillante";} elseif($brillo == 2) {$brillo = "muy brillante";}
            if($viscosidad == 0) {$viscosidad = "fluido";} elseif($viscosidad == 1) {$viscosidad = "concistente";} elseif($viscosidad = 2) {$viscosidad = "muy concistente";}

            $cata = $vino->getCata($_SESSION['identity']->id);
            $OCata = $cata->fetch_object();

            if($color){
                $save = $vino->saveVisual($OCata->id, $capa, $color, $brillo, $viscosidad, $calificacion);
            }
            else{
                $save = $vino->saveVisual($OCata->id, $capa, "", $brillo, $viscosidad, $calificacion);
            }

            if($save){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
                die(json_encode($respuesta));
            }
            else{
                $respuesta = array(
                    'respuesta' => 'fallo'
                );
                die(json_encode($respuesta));
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "insertar-aroma"){
            $intensidad = $_POST['intensisdad'];
            $complejidad = $_POST['complejidad'];
            $calificacion2 = $_POST['calificacion2'];

            $vino = new vinos();

            if($intensidad == 0){ $intensidad = "baja"; } elseif ($intensidad == 1) {$intensidad = "media";} elseif ($intensidad == 2) { $intensidad = "media-alta"; } elseif ($intensidad == 3) {$intensidad = "alta";}
            if($complejidad == 0){ $complejidad = "baja"; } elseif ($complejidad == 1) {$complejidad = "media";} elseif ($complejidad == 2) { $complejidad = "media-alta"; } elseif ($complejidad == 3) {$complejidad = "alta";}

            $cata = $vino->getCata($_SESSION['identity']->id);
            $OCata = $cata->fetch_object();

            $save2 = $vino->saveAroma($OCata->id, $intensidad, $complejidad, $calificacion2);

            if($save2){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
                die(json_encode($respuesta));
            }
            else{
                $respuesta = array(
                    'respuesta' => 'fallo'
                );
                die(json_encode($respuesta));
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "insertar-gusto"){

            $dulce = $_POST['dulce'];
            $acidez = $_POST['acidez'];
            $tanino = $_POST['tanino'];
            $alcohol = $_POST['alcohol'];
            $cuerpo = $_POST['cuerpo'];
            $permanencia = $_POST['permanencia'];
            $calificacion3 = $_POST['calificacion3'];

            if($dulce == 0){ $dulce = "seco"; } elseif ($dulce == 1) {$dulce = "semiseco";} elseif ($dulce == 2) { $dulce = "semidulce"; } elseif ($dulce == 3) {$dulce = "dulce";} elseif ($dulce == 4) {$dulce = "muy dulce";}
            if($acidez == 0){ $acidez = "baja"; } elseif ($acidez == 1) {$acidez = "media";} elseif ($acidez == 2) { $acidez = "media-alta"; } elseif ($acidez == 3) {$acidez = "alta";}
            if($tanino == 0){ $tanino = "nulo"; } elseif ($tanino == 1) {$tanino = "bajo";} elseif ($tanino == 2) { $tanino = "medio"; } elseif ($tanino == 3) {$tanino = "medio-alto";} elseif ($tanino == 4) {$tanino = "alto";}
            if($alcohol == 0){ $alcohol = "bajo";} elseif ($alcohol == 1) {$alcohol = "medio";} elseif($alcohol == 2) {$alcohol = "alto";}
            if($cuerpo == 0){ $cuerpo = "ligero"; } elseif ($cuerpo == 1) {$cuerpo = "media";} elseif ($cuerpo == 2) { $cuerpo = "media-alta"; } elseif ($cuerpo == 3) {$cuerpo = "robusto";}
            if($permanencia == 0){ $permanencia = "baja"; } elseif ($permanencia == 1) {$permanencia = "media";} elseif ($permanencia == 2) { $permanencia = "media-alta"; } elseif ($permanencia == 3) {$permanencia = "alta";}

            $vino = new vinos();

            $cata = $vino->getCata($_SESSION['identity']->id);
            $OCata = $cata->fetch_object();

            $save3 = $vino->saveGusto($OCata->id, $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $calificacion3);

            if($save3){
                $respuesta = array(
                    'respuesta' => 'exito'
                );
                die(json_encode($respuesta));
            }
            else{
                $respuesta = array(
                    'respuesta' => 'fallo'
                );
                die(json_encode($respuesta));
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "insertar-presonal"){
            $comentario = $_POST['comentarios'];
            $meridaje = $_POST['meridaje'];
            $calificacion4 = $_POST['calificacion4'];

            $vino = new vinos();

            $cata = $vino->getCata($_SESSION['identity']->id);
            $OCata = $cata->fetch_object();

            $save4 = $vino->saveApreciacion($OCata->id, $comentario, $meridaje, $calificacion4);

            if($save4){
                $calificacion = $vino->calificacionCata($OCata->id);

                $save5 = $vino->updateCata($OCata->id, $calificacion);

                if($save5){
                    echo "<script>";
                    echo "window.location.replace('".base_url."resumen.php?id=".$_GET['id_cata']."');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('No se pudo guardar la calificacion total');";
                    echo "</script>";
                }
            }
            else{
                echo "<script>";
                echo "alert('No se pudo guardar la apresiacion personal');";
                echo "</script>";
            }
        }
    }

    if(isset($_POST)){
        if($_POST['accion'] == "update-calif"){
            if(isset($_GET['id_cata'])){
                $capa = $_POST['capa'];
                $color = $_POST['customRadio'];
                $brillo = $_POST['brillo'];
                $viscosidad = $_POST['viscocidad'];
                $calificacion = $_POST['calificacion1'];
                $intensidad = $_POST['intensisdad'];
                $complejidad = $_POST['complejidad'];
                $calificacion2 = $_POST['calificacion2'];
                $dulce = $_POST['dulce'];
                $acidez = $_POST['acidez'];
                $tanino = $_POST['tanino'];
                $alcohol = $_POST['alcohol'];
                $cuerpo = $_POST['cuerpo'];
                $permanencia = $_POST['permanencia'];
                $calificacion3 = $_POST['calificacion3'];
                $comentario = $_POST['comentarios'];
                $meridaje = $_POST['meridaje'];
                $calificacion4 = $_POST['calificacion4'];
                $calificacionTotal = $calificacion + $calificacion2 + $calificacion3 + $calificacion4;
                $vino = new vinos();
                if($capa == 0){ $capa = "baja"; } elseif ($capa == 1) {$capa = "media";} elseif ($capa == 2) { $capa = "media-alta"; } elseif ($capa == 3) {$capa = "alta";}
                if($brillo == 0){ $brillo = "escaso";} elseif ($brillo == 1) {$brillo = "brillante";} elseif($brillo == 2) {$brillo = "muy brillante";}
                if($viscosidad == 0) {$viscosidad = "fluido";} elseif($viscosidad == 1) {$viscosidad = "concistente";} elseif($viscosidad = 2) {$viscosidad = "muy concistente";}
                if($intensidad == 0){ $intensidad = "baja"; } elseif ($intensidad == 1) {$intensidad = "media";} elseif ($intensidad == 2) { $intensidad = "media-alta"; } elseif ($intensidad == 3) {$intensidad = "alta";}
                if($complejidad == 0){ $complejidad = "baja"; } elseif ($complejidad == 1) {$complejidad = "media";} elseif ($complejidad == 2) { $complejidad = "media-alta"; } elseif ($complejidad == 3) {$complejidad = "alta";}
                if($dulce == 0){ $dulce = "seco"; } elseif ($dulce == 1) {$dulce = "semiseco";} elseif ($dulce == 2) { $dulce = "semidulce"; } elseif ($dulce == 3) {$dulce = "dulce";} elseif ($dulce == 4) {$dulce = "muy dulce";}
                if($acidez == 0){ $acidez = "baja"; } elseif ($acidez == 1) {$acidez = "media";} elseif ($acidez == 2) { $acidez = "media-alta"; } elseif ($acidez == 3) {$acidez = "alta";}
                if($tanino == 0){ $tanino = "nulo"; } elseif ($tanino == 1) {$tanino = "bajo";} elseif ($tanino == 2) { $tanino = "medio"; } elseif ($tanino == 3) {$tanino = "medio-alto";} elseif ($tanino == 4) {$tanino = "alto";}                    if($alcohol == 0){ $alcohol = "bajo";} elseif ($alcohol == 1) {$alcohol = "medio";} elseif($alcohol == 2) {$alcohol = "alto";}
                if($cuerpo == 0){ $cuerpo = "ligero"; } elseif ($cuerpo == 1) {$cuerpo = "media";} elseif ($cuerpo == 2) { $cuerpo = "media-alta"; } elseif ($cuerpo == 3) {$cuerpo = "robusto";}
                if($permanencia == 0){ $permanencia = "baja"; } elseif ($permanencia == 1) {$permanencia = "media";} elseif ($permanencia == 2) { $permanencia = "media-alta"; } elseif ($permanencia == 3) {$permanencia = "alta";}
                $save = $vino->updateVisual($_GET['id_cata'], $capa, $color, $brillo, $viscosidad, $calificacion);
                $save2 = $vino->updateAroma($_GET['id_cata'], $intensidad, $complejidad, $calificacion2);
                $save3 = $vino->updateGusto($_GET['id_cata'], $dulce, $acidez, $tanino, $alcohol, $cuerpo, $permanencia, $calificacion3);
                $save4 = $vino->updateApreciacion($_GET['id_cata'], $comentario, $meridaje, $calificacion4);
                $save5 = $vino->updateCata($_GET['id_cata'], $calificacionTotal);

                if($save && $save2 && $save3 && $save4){
                    echo "<script>";
                    echo "window.location.replace('".base_url."resumen.php?id=".$_GET['id_cata']."');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('Algo salio mal, sus calificaciones no fueron guardadas');";
                    echo "</script>";
                }
                
            }
        }
    }
?>