<?php
include_once 'config/parameters.php';
include_once 'helpers/session.php';
include_once 'views/layaut/header.php';
include_once 'views/layaut/sidebar.php';
require_once 'models/vinos.php';
require_once 'models/usuarios.php';
require_once 'models/networks.php';
require_once 'config/db.php';

$networks = new networks();
$usuarios = new usuarios();
$vinos = new vinos();

$publicaciones = $networks->getCompartidos();
?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <?php while($public = $publicaciones->fetch_object()): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <?php
                        $usuario = $usuarios->getUser($public->id_usuario);
                        $us = $usuario->fetch_object();
                        $cata = $vinos->getCataId($public->id_cata);
                        $cat = $cata->fetch_object();
                        $vino = $vinos->getNewVinoId($cat->id_vino);
                        $vine = $vino->fetch_object();
                        $cosechas = $vinos->getCosechas($cat->id_vino, $cat->id);
                        $cose = $cosechas->fetch_object();
                        $personal = $vinos->getPersonal($cat->id);
                        $perso = $personal->fetch_object();
                    ?>
                    <div class="card-header">
                        <div class="row text-center">
                            <div class="col-md-1">
                                <img src="assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="30" height="30">
                            </div>
                            <div class="col-md-8">
                                <p class="card-text"><?=$us->nombre?></p>
                            </div>
                            <div class="col-md-3">
                                <p class="card-text time"><?=$public->creado?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($public->contenido != ""): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="card-text"><?=$public->contenido?></p>
                            </div>
                        </div>
                        <hr>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-fluid" src="<?=$vine->url_img?>" alt="">
                            </div>
                            <div class="col-md-6">
                                <h3 class="card-title"></h3>
                                <p class="card-text"><?=$vine->nombre?> - <?=$cose->cosecha?></p>
                                <p class="card-text">Calificación final - <?=$cat->calificacion?> </p>
                                <p class="card-text"><?=$perso->comentario?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-light waves-effect waves-light"><img src="assets/images/dislike.png" alt="" srcset=""> Like</button>
                                <button data-id="<?=$public->id?>" class="btn btn-light waves-effect waves-light btncoment" data-toggle="modal" data-target="#myModal"><i class="far fa-comment"></i> Comentar</button>
                                <button class="btn btn-light waves-effect waves-light"><i class="far fa-share-square"></i> Compartir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    <?php endwhile; ?>
    <!-- End Row -->             
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Comentarios (0)</h4>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                <textarea class="form-control" id="add-coment" data-iduser="<?=$_SESSION['identity']->id?>" data-name="<?=$_SESSION['identity']->nombre?>" placeholder="Escribe aqui un nuevo comentario"  cols="49" rows="2"></textarea>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php include_once 'views/layaut/footer.php'; ?>