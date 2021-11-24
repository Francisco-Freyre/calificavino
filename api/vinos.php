<?php
require_once '../decimoescalon.club/calificavino/models/vinos.php';
require_once '../decimoescalon.club/calificavino/config/db.php';

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
        if(isset($_GET['vinos'])){
            if($_GET['vinos'] == 1){
                $vinos = $_vinos->getNewVinos($_GET['id']);
                if($vinos->num_rows > 0){
                    $AVinos = [];
                    while ($vino = $vinos->fetch_object()) {
                        $uvas = $_vinos->getUvas($vino->id);
                        $AUvas = [];
                        while ($uva = $uvas->fetch_object()) {
                            array_push($AUvas, $uva->uva);
                        }
                        $AVino = array(
                            'id' => $vino->id,
                            'nombre' => $vino->nombre,
                            'pais' => $vino->pais,
                            'region' => $vino->region,
                            'productor' => $vino->productor,
                            'img' => $vino->url_img,
                            'uvas' => $AUvas
                        );
                        array_push($AVinos, $AVino);
                    }
                    die(json_encode($AVinos));
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
        break;
}
?>