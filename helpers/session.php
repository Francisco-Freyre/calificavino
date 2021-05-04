<?php
    function usuario_autenticado(){
        if(revisar_usuario() == false){
            header('Location:login.php');
            exit();
        }
    }
    function revisar_usuario(){
        $calificador = false;
        if(isset($_SESSION['identity'])){
            if($_SESSION['identity']->calificaciones == "on"){
                $calificador = true;
            }
        }
        return $calificador;
    }
    session_start();
    usuario_autenticado();
?>