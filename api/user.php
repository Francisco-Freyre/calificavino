<?php
require_once '../models/usuarios.php';
require_once '../config/db.php';

$_usuarios = new usuarios();

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
        if(isset($_POST['registro'])){
            $usuario = $_usuarios->create($_POST['nombre'], $_POST['correo'], $_POST['password']);
            if($usuario > 0){
                $user = $_usuarios->getPerfil($usuario);
                $us = $user->fetch_object();
                $response = array(
                    'resultado' => true,
                    'usuario' => array(
                        'id' => $us->id_paciente,
                        'nombre' => $us->nombre_p,
                        'correo' => $us->correo,
                    )
                );
                die(json_encode($response));
            }
            else{
                die(json_encode(array(
                    'resultado' => false,
                    'message' => $usuario
                )));
            }
        }

        if(isset($_POST['login'])){
            $usuario = $_usuarios->logueo($_POST['password'], $_POST['correo']);
            if(is_object($usuario)){
                die(json_encode(array(
                    'resultado' => true,
                    'usuario' => array(
                        'id' => $usuario->id_paciente,
                        'nombre' => $usuario->nombre_p,
                        'correo' => $usuario->correo
                    )
                )));
            }
            else{
                die(json_encode(array(
                    'resultado' => false,
                    'message' => $usuario
                )));
            }
        }

        if(isset($_POST['update'])){
            $usuario = $_usuarios->updatePerfil($_POST['id'], $_POST['nombre'], $_POST['edad'], $_POST['sexo'], $_POST['domicilio'], $_POST['cp'], $_POST['cel'], $_POST['correo'], $_POST['imagen']);
            if($usuario){
                die(json_encode(array(
                    'resultado' => true
                )));
            }
            else{
                die(json_encode(array(
                    'resultado' => false,
                    'message' => $usuario
                )));
            }
        }
        break;
    case 'GET':
        if(isset($_GET['usuario'])){
            if($_GET['usuario'] == 1){
                $usuario = $_usuarios->getPerfil($_GET['id_usuario']);
                if($usuario){
                    $user = $usuario->fetch_object();
                    die(json_encode(array(
                        'resultado' => true,
                        'usuario' => array(
                            'id' => $user->id_paciente,
                            'nombre' => $user->nombre_p,
                            'edad' => $user->edad_p,
                            'sexo' => $user->sexo_p,
                            'domicilio' => $user->domicilio_p,
                            'cp' => $user->cp_p,
                            'cel' => $user->cel_pac,
                            'correo' => $user->correo,
                            'imagen' => $user->imagen
                        )
                    )));
                }else{
                    die(json_encode(array(
                        'resultado' => false,
                        'message' => $usuario
                    )));
                }
            }
        }
        break;
}
?>