<?php 
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/vinos.php';
require_once '../config/db.php';
if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == 'buscar_vino'){
            $wines = new vinos();
            $vinos = $wines->buscadorVinos($_POST['nombre']);
            if($vinos && $vinos->num_rows > 0){
                $AUvas = [];
                $AVinos = [];
                while($vino = $vinos->fetch_object()){
                    $uvas = $wines->getUvas($vino->id);
                    while($uva = $uvas->fetch_object()){
                        array_push($AUvas, $uva->uva);
                    }
                    $promedio = $wines->promedioCataVino($vino->id);
                    $prom = $promedio->fetch_object();
                    $result = array(
                        'imagen' => $vino->url_img,
                        'nombre' => $vino->nombre,
                        'uvas' => $AUvas,
                        'promedio' => bcdiv($prom->promedio, '1', 2)
                    );
                    unset($AUvas);
                    $AUvas = [];
                    array_push($AVinos, $result);
                }
                die(json_encode($AVinos));
            }
            else{
                $result = array(
                    'resultado' => 'Fallo'
                );
                die(json_encode($result));
            }
        }
    }
}
?>