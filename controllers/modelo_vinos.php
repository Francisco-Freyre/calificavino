<?php
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/vinos.php';
require_once '../config/db.php';
include "../helpers/class.upload.php";

if(isset($_POST)){
    if(isset($_POST['accion'])){
        if($_POST['accion'] == 'guardar-vino'){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $region = isset($_POST['region']) ? $_POST['region'] : false;
            $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
            $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
            
            $file = $_FILES['img'];
            $filename = $file['name'];

            if(isset($_FILES["img"])){
                $up = new Upload($_FILES["img"]);
                if($up->uploaded){
                    $up->Process("../uploads/");
                    if($up->processed){
                        $up->image_resize = true;
                        $up->image_x = $up->image_src_x/2;
                        $up->image_ratio_y = true;
                        $up->jpeg_quality = 50;
                    
                        $up->Process("../uploads/images/");
                        if($up->processed){
                            $url_img = 'uploads/images/'.$filename;
                        }
                    }
                }
            }

            if($nombre && $region && $pais && $productor && $url_img){
                $vino = new vinos();
                $id = $vino->saveNewVinos($nombre, $region, $pais, $productor, $url_img);
                if($id != false){
                    echo "<script>";
                    echo "alert('Vino guardado correctamente');";
                    echo "window.location.replace('".base_url."uva.php?id=$id');";
                    echo "</script>";
                }
                else{
                    echo "<script>";
                    echo "alert('No se pudo guardar el vino');";
                    echo "</script>";
                }
            }
            else{
                echo "<script>";
                echo "alert('No se pudo guardar el vino, falta algun dato en el formulario');";
                echo "</script>";
            }
        }

        if($_POST['accion'] == 'actualizar-vino'){
            if(isset($_GET['id'])){
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
                $region = isset($_POST['region']) ? $_POST['region'] : false;
                $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
                $uva = isset($_POST['uva']) ? $_POST['uva'] : false;
                $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
                
                $file = $_FILES['img'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "img/png"){
                    if(!is_dir('../uploads/images')){
                        mkdir('../uploads/images', 0777, true);
                    }

                    move_uploaded_file($file['tmp_name'], '../uploads/images/'.$filename);
                    $url_img = 'uploads/images/'.$filename;
                }

                if($nombre && $region && $pais && $uva && $productor && $url_img){
                    $vino = new vinos();
                    $id = $vino->updateNewVino($_GET['id'], $nombre, $region, $pais, $uva, $productor, $url_img);
                    if($id){
                        echo "<script>";
                        echo "alert('Se actualizo correctamente el vino');";
                        echo "window.location.replace('".base_url."cargar-vinos.php');";
                        echo "</script>";
                    }
                }
                else{
                    echo "<script>";
                        echo "alert('No se actualizo');";
                        echo "window.location.replace('".base_url."cargar-vinos.php');";
                        echo "</script>";
                }
            }
        }
    }
}

if(isset($_GET['accion'])){
    if($_GET['accion'] == 'elimina'){
        $vino = new vinos();
        $result = $vino->deleteNewVino($_GET['id']);
        if($result){
            echo "<script>";
            echo "alert('Se elimino el registro exitosamente');";
            echo "window.location.replace('".base_url."cargar-vinos.php');";
            echo "</script>";
        }
        else{
            echo "<script>";
            echo "alert('Algo fallo, intente de nuevo');";
            echo "window.location.replace('".base_url."cargar-vinos.php');";
            echo "</script>";
        }
    }
}
?>