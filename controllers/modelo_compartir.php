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
                header('Location:../catas.php');
                exit();
            }
            else{
                echo "<script>";
                echo "alert('No se pudo insertar la cata!!');";
                echo "</script>";
            }
        }
    }
}
?>