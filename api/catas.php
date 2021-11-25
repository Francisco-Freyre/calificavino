<?php
require_once '../decimoescalon.club/calificavino/models/vinos.php';
require_once '../decimoescalon.club/calificavino/config/db.php';

$_vinos = new vinos();

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['calificar'])){
            if($_POST['calificar'] == true){
                $saveVisual = $_vinos->saveVisual($_POST['idcata'], $_POST['capa'], $_POST['color'], $_POST['brillo'], $_POST['viscosidad'], $_POST['califVisual']);
                if($saveVisual){
                    $saveAroma = $_vinos->saveAroma($_POST['idcata'], $_POST['intensidad'], $_POST['complejidad'], $_POST['califAroma']);
                    if($saveAroma){
                        $saveGusto = $_vinos->saveGusto($_POST['idcata'], $_POST['dulce'], $_POST['acidez'], $_POST['tanino'], $_POST['alcohol'], $_POST['cuerpo'], $_POST['sapidez'] , $_POST['permanencia'], $_POST['califGusto']);
                        if($saveGusto){
                            $savePersonal = $_vinos->saveApreciacion($_POST['idcata'], $_POST['comentario'], $_POST['meridaje'], $_POST['califPersonal']);
                            if($savePersonal){
                                foreach ($_POST['aromas'] as $value) {
                                    $palabra = $_vinos->savePalabraAromas($value, $_POST['idcata']);
                                }
                                die(json_encode(array(
                                    'resultado' => true
                                )));
                            }
                            else{
                                die(json_encode(array(
                                    'resultado' => false,
                                    'message' => 'Alguna opcion de la calificacion personal no pudo ser guardada'
                                )));
                            }
                        }
                        else{
                            die(json_encode(array(
                                'resultado' => false,
                                'message' => 'Alguna opcion de la calificacion del gusto no pudo ser guardada'
                            )));
                        }
                    }
                    else{
                        die(json_encode(array(
                            'resultado' => false,
                            'message' => 'Alguna opcion de la calificacion aromatica no pudo ser guardada'
                        )));
                    }
                }
                else{
                    die(json_encode(array(
                        'resultado' => false,
                        'message' => 'Alguna opcion de la calificacion visual no pudo ser guardada'
                    )));
                }
            }
        }

        if(isset($_POST['anio'])){
            if($_POST['anio'] == true){
                $catas = $_vinos->getCataId($_POST['idcata']);
                if($catas->num_rows > 0){
                    $cata = $catas->fetch_object();
                    $saveCosecha = $_vinos->saveCosecha($_POST['cosecha'], $_POST['alcohol'], $cata->id_vino, $_POST['idcata']);
                    if($saveCosecha){
                        die(json_encode(array(
                            'resultado' => true
                        )));
                    }
                    else{
                        die(json_encode(array(
                            'resultado' => false,
                            'message' => 'No se pudo guardar los datos, intenta de nuevo'
                        )));
                    }
                }
                else{
                    die(json_encode(array(
                        'resultado' => false,
                        'message' => 'La cata no existe'
                    )));
                }
            }
        }

        if(isset($_POST['create'])){
            if($_POST['create'] == true){
                $saveCata = $_vinos->saveCata($_POST['idvino'], $_POST['iduser'], 0);
                if($saveCata != false){
                    die(json_encode(array(
                        'resultado' => true,
                        'idcata' => $saveCata
                    )));
                }
                else{
                    die(json_encode(array(
                        'resultado' => false
                    )));
                }
            }
        }

        if(isset($_POST['update'])){
            if($_POST['update'] == true){
            }
        }
        break;
    case 'GET':
        if(isset($_GET['catas'])){
            if($_GET['catas'] == 1){
                $catas = $_vinos->getCatasUser($_GET['id']);
                if(count($catas) > 0){
                    die(json_encode($catas));
                }else{
                    die(json_encode(array(
                        'resultado' => false,
                        'message' => 'No hay catas'
                    )));
                }
            }else{
                die(json_encode(array(
                    'resultado' => false,
                    'message' => 'Error de procesamiento'
                )));
            }
        }

        if(isset($_GET['cata'])){
            if($_GET['cata'] == 1){
                $cata = $_vinos->getCataId($_GET['id']);
                $OCata = $cata->fetch_object();
                $vine = $_vinos->getNewVinoId($OCata->id_vino);
                $vin = $vine->fetch_object();
                $cosecha = $_vinos->getCosecha($OCata->id_vino);
                $cos = $cosecha->fetch_object();
                $visual = $_vinos->getVisual($OCata->id);  
                $vis = $visual->fetch_object();
                $aroma = $_vinos->getAroma($OCata->id);  
                $aro = $aroma->fetch_object();
                $gusto = $_vinos->getGusto($OCata->id);  
                $gus = $gusto->fetch_object();
                $personal = $_vinos->getPersonal($OCata->id);  
                $perso = $personal->fetch_object();
                $aromas = $_vinos->getPalabrasAromas($OCata->id);
                $gustos = $_vinos->getPalabrasGustos($OCata->id);
                $uvas = $_vinos->getUvas($OCata->id_vino);
                $uvs = [];
                $gust = [];
                $arm = [];
                while ($uva = $uvas->fetch_object()) {
                    array_push($uvs, $uva->uva);
                }
                while ($aroma = $aromas->fetch_object()) {
                    array_push($arm, $aroma->palabra);
                }
                while ($gusto = $gustos->fetch_object()) {
                    array_push($gust, $gusto->palabra);
                }
                die(json_encode(array(
                    'resultado' => true,
                    'vino' => $vin,
                    'cosecha' => $cos,
                    'visual' => $vis,
                    'aroma' => $aro,
                    'gusto' => $gus,
                    'personal' => $perso,
                    'uvas' => $uvs,
                    'gustos' => $gust,
                    'aromas' => $arm
                )));
            }else{
                die(json_encode(array(
                    'resultado' => false,
                    'message' => 'Error de procesamiento'
                )));
            }
        }

        if(isset($_GET['delete'])){
            if($_GET['delete'] == 1){
                $deleted = $_vinos->deleteCata($_GET['cataId']);
                if($deleted){
                    die(json_encode(array(
                        'resultado' => true
                    )));
                }else{
                    die(json_encode(array(
                        'resultado' => false
                    )));
                }
            }
        }
        break;
}
?>