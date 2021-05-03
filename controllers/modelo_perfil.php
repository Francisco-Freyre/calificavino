<?php
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/usuarios.php';
require_once '../config/db.php';
$usuarios = new usuarios();
if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == 'editar-perfil'){
            if($_FILES['img']['name'] != null){
                $file = $_FILES['img'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                    if(!is_dir('../uploads/images/users')){
                        mkdir('../uploads/images/users', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], '../uploads/images/users/'.$filename);
                    $url_img = 'uploads/images/users/'.$filename;
                }
                $result = $usuarios->updatePerfil($_SESSION['identity']->id, $_POST['nombre'], $_POST['edad'], $_POST['sexo'], $_POST['domicilio'], $_POST['cp'], $_POST['cel'], $_POST['user'], $url_img);
                if($result){
                    echo "<script>";
                    echo "alert('Datos actualizados correctamente!!');";
                    echo "window.location.replace('../perfil.php');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('Los datos no se actualizaron');";
                    echo "window.location.replace('../perfil.php');";
                    echo "</script>";
                }
            }else{
                $result = $usuarios->updatePerfil($_SESSION['identity']->id, $_POST['nombre'], $_POST['edad'], $_POST['sexo'], $_POST['domicilio'], $_POST['cp'], $_POST['cel'], $_POST['user'], '');
                if($result){
                    echo "<script>";
                    echo "alert('Datos actualizados correctamente!!');";
                    echo "window.location.replace('../perfil.php');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('Los datos no se actualizaron');";
                    echo "window.location.replace('../perfil.php');";
                    echo "</script>";
                }
            }
        }
    }
}
?>