<?php
    include_once '../config/parameters.php';
    include_once '../helpers/session.php';
    require_once '../models/vinos.php';
    require_once '../config/db.php';

    if(isset($_GET)){
        if(isset($_GET['accion'])){
            if($_GET['accion'] == "insertar-aroma"){
                $vino = new vinos();
                $palabra = $vino->savePalabraAromas($_GET['palabra'], $_GET['id']);

                if($palabra != false){
                    $response = array(
                        'respuesta' => 'exito',
                        'id' => $palabra
                    );

                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "borrar-aroma"){
                $vino = new vinos();
                $palabraBorrada = $vino->deletePalabraAromas($_GET['id']);

                if($palabraBorrada){
                    $response = array(
                        'respuesta' => 'exito',
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "insertar-sabor"){
                $vino = new vinos();
                $palabra = $vino->savePalabraGustos($_GET['palabra'], $_GET['id']);

                if($palabra != false){
                    $response = array(
                        'respuesta' => 'exito',
                        'id' => $palabra
                    );

                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "borrar-sabor"){
                $vino = new vinos();
                $palabraBorrada = $vino->deletePalabraGustos($_GET['id']);

                if($palabraBorrada){
                    $response = array(
                        'respuesta' => 'exito',
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "insertar-uva"){
                $vino = new vinos();
                $uva = $vino->saveUva($_GET['palabra'], $_GET['id']);

                if($uva != false){
                    $response = array(
                        'respuesta' => 'exito',
                        'id' => $uva
                    );

                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "borrar-uva"){
                $vino = new vinos();
                $palabraBorrada = $vino->deleteUvas($_GET['id']);

                if($palabraBorrada){
                    $response = array(
                        'respuesta' => 'exito',
                    );
                    die(json_encode($response));
                }
                else{
                    $response = array(
                        'respuesta' => 'error'
                    );

                    die(json_encode($response));
                }
            }

            if($_GET['accion'] == "verif-uvas"){
                $vino = new vinos();
                $existen = $vino->verifUva($_GET['id_vino']);

                if($existen){
                    header('Location:../cargar-vinos.php');
                    exit();
                }
                else{
                    header('Location:uva.php?id='.$_GET['id_vino']);
                    exit();
                }
            }

            if($_GET['accion'] == "verif-uvas-2"){
                $vino = new vinos();
                $existen = $vino->verifUva($_GET['id_vino']);

                if($existen){
                    header('Location:../calificacion.php?id_cata='.$_GET['id_cata']);
                    exit();
                }
                else{
                    header('Location:uva.php?id='.$_GET['id_vino']);
                    exit();
                }
            }
        }
    }
?>