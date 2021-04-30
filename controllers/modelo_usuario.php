<?php
session_start();
include_once '../config/parameters.php';
require_once '../models/usuarios.php';
require_once '../config/db.php';

if(isset($_POST)){
    $usuario = new usuarios();
    $identity = $usuario->logueo($_POST['password'], $_POST['email']);
    if($identity && is_object($identity)){
        $_SESSION['identity'] = $identity;
        echo "<script>";
        echo "alert('Bienvenido!!!!!');";
        echo "window.location.replace('".base_url."');";
        echo "</script>";
    }   
    else{
        $_SESSION['error_login'] = 'identificacion fallida';
        echo "<script>";
        echo "alert('NO SE HA PODIDO INICIAR SESION, INTENTE DE NUEVO!!');";
        echo "window.location.replace('".base_url."login.php');";
        echo "</script>";
    }
}
?>