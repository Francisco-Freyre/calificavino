<?php
include_once '../config/parameters.php';
include_once '../helpers/session.php';
require_once '../models/vinos.php';
require_once '../config/db.php';
include "../helpers/class.upload.php";

if (isset($_POST)) {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $region = isset($_POST['region']) ? $_POST['region'] : false;
    $pais = isset($_POST['pais']) ? $_POST['pais'] : false;
    $uva = isset($_POST['uva']) ? $_POST['uva'] : false;
    $productor = isset($_POST['productor']) ? $_POST['productor'] : false;
    $cosecha = isset($_POST['cosecha']) ? $_POST['cosecha'] : false;
    $alcohol = isset($_POST['alcohol']) ? $_POST['alcohol'] : false;

    $file = $_FILES['img'];
    $filename = $file['name'];

    if (isset($_FILES["img"])) {
        $up = new Upload($_FILES["img"]);
        if ($up->uploaded) {
            $up->Process("uploads/");
            if ($up->processed) {
                $up->image_resize = true;
                $up->image_x = $up->image_src_x / 2;
                $up->image_ratio_y = true;
                $up->jpeg_quality = 50;

                $up->Process("uploads/images/");
                if ($up->processed) {
                    $url_img = 'uploads/images/' . $filename;
                }
            }
        }
    }

    if ($nombre && $region && $pais && $uva && $productor && $cosecha && $alcohol && $url_img) {
        $vino = new vinos();
        $id = $vino->save($nombre, $region, $pais, $uva, $productor, $cosecha, $alcohol, $url_img);
        if ($id != false) {
            $save = $vino->saveCata($id, $_SESSION['identity']->id);
        }
        else{
            $respuesta = array(
                'respuesta' => 'id es igual a falso'
            );
            die(json_encode($respuesta));
        }
        if ($save) {
            $respuesta = array(
                'respuesta' => 'exito'
            );
            echo "<script>";
            echo "window.location.replace('".base_url."calificacion.php');";
            echo "</script>";
        } else {
            $respuesta = array(
                'respuesta' => 'No se pudo guardar'
            );
        }
    } else {
        $respuesta = array(
            'respuesta' => 'Lo datos estan vacios'
        );
    }
} else {
    $respuesta = array(
        'respuesta' => 'No venia nada en post'
    );
}

?>