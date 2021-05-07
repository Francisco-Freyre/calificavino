<?php
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/vinos.php';
require_once '../config/db.php';

if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == "compartir-cata"){
            $vinos = new vinos();
            $compartido = $vinos->compartirCata($_POST['id_user'], $_POST['id_cata'], $_POST['contenido']);
            if($compartido){
                echo "<script>";
                echo "alert('Tu cata fue compartida!!');";
                echo "</script>";
                header('Location:../network.php');
                exit();
            }
            else{
                echo "<script>";
                echo "alert('No se pudo insertar la cata!!');";
                echo "</script>";
            }
        }

        if($_POST['accion'] == "editar"){
            $vinos = new vinos();
            $borrado = $vinos->editarPublic($_POST['id'], $_POST['contenido']);
            if($borrado){
                echo "<script>";
                echo "alert('Post actualizado!!');";
                echo "</script>";
                header('Location:../network.php');
                exit();
            }else{
                echo "<script>";
                echo "alert('No fue posible actualizar el post!!');";
                echo "</script>";
                header('Location:../network.php');
                exit();
            }
        }
    }
}
if(isset($_GET)){
    if(isset($_GET['accion'])){
        if($_GET['accion'] == 'borrar'){
            $vinos = new vinos();
            $borrado = $vinos->eliminarPublic($_GET['id']);
            if($borrado){
                echo "<script>";
                echo "alert('Post eliminado!!');";
                echo "</script>";
                header('Location:../network.php');
                exit();
            }else{
                echo "<script>";
                echo "alert('No fue posible eliminar el post!!');";
                echo "</script>";
                header('Location:../network.php');
                exit();
            }
        }

        if($_GET['accion'] == 'obtener'){
            $vinos = new vinos();
            $public = $vinos->obtenerPublic($_GET['id']);
            if($public){
                $publication = $public->fetch_object();
                $response = array(
                    'respuesta' => 'exito',
                    'public' => $publication
                );
                die(json_encode($response));
            }
            else{
                $response = array(
                    'respuesta' => 'fallo',
                    'public' => 'No existe'
                );
                die(json_encode($response));
            }
        }
    }
}
?>