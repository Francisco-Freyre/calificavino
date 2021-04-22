<?php
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/networks.php';
require_once '../models/usuarios.php';
require_once '../config/db.php';

if(isset($_GET['accion'])){
    if($_GET['accion'] == "obtener-coment"){
        $red = new networks();
        $users = new usuarios();
        $result = [];
        $comentarios = $red->getComents($_GET['id_public']);
        if($comentarios){
            if($comentarios->num_rows > 0){
                while($comment = $comentarios->fetch_object()){
                    $usuario = $users->getUser($comment->id_user);
                    if($usuario){
                        $user = $usuario->fetch_object();
                        $AComent = array(
                            "id_usuario" => $comment->id_user,
                            "id_comentario" => $comment->id,
                            "nombre_usuario" => $user->nombre,
                            "contenido" => $comment->contenido,
                            "img" => $user->imagen
                        );
                        array_push($result, $AComent);
                    }
                }
                die(json_encode($result));
            }else{
                $AResp = array(
                    "respuesta" => "sincomen"
                );
                array_push($result, $AResp);
    
                die(json_encode($result)); 
            }
             
        }else{
            $AResp = array(
                "respuesta" => "error"
            );
            array_push($result, $AResp);

            die(json_encode($result)); 
        }
    }
}

if(isset($_POST['accion'])){
    if($_POST['accion'] == 'insertar-coment'){
        $red = new networks();
        $comentario = $red->saveComent($_POST['id_user'], $_POST['id_public'], $_POST['contenido']);
        if($comentario){
            $response = array(
                'respuesta' => 'exito'
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

    if($_POST['accion'] == 'like'){
        $red = new networks();
        $existe = $red->getLike($_SESSION['identity']->id, $_POST['id_public']);
        if($existe->num_rows == 0){
            $like = $red->saveLike($_SESSION['identity']->id, $_POST['id_public']);
            if($like){
                $lik = $like->fetch_object();
                $response = array(
                    'respuesta' => 'exito',
                    'like' => $lik
                );
            }
            else{
                $response = array(
                    'respuesta' => 'error',
                    'like' => 'insercion fallida'
                );
            }
            die(json_encode($response));
        }
        else{
            $response = array(
                'respuesta' => 'error',
                'like' => 'El like ya existe'
            );
            die(json_encode($response));
        }
    }

    if($_POST['accion'] == 'dislike'){
        $red = new networks();
        $existe = $red->getLike($_SESSION['identity']->id, $_POST['id_public']);
        if($existe->num_rows == 1){
            $exis = $existe->fetch_object();
            $like = $red->deleteLike($exis->id);
            $response = array(
                'respuesta' => 'exito',
            );
            die(json_encode($response));
        }
        else{
            $response = array(
                'respuesta' => 'error',
                'like' => 'El like no existe'
            );
            die(json_encode($response));
        }
    }
}
?>