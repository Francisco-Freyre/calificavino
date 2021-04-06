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
        }
    }
?>