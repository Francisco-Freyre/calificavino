<?php
require_once '../models/vinos.php';
require_once '../config/db.php';

$_vinos = new vinos();

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['registro'])){
        }
        if(isset($_POST['update'])){
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
        break;
}
?>