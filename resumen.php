<?php 
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'config/db.php';

    if(isset($_GET['id'])){
        $vino = new vinos();
        $cata = $vino->getCataId($_GET['id']);
        $OCata = $cata->fetch_object();
        $vine = $vino->getNewVinoId($OCata->id_vino);
        $vin = $vine->fetch_object();
        $cosecha = $vino->getCosecha($OCata->id_vino);
        $cos = $cosecha->fetch_object();
        $visual = $vino->getVisual($OCata->id);  
        $vis = $visual->fetch_object();
        $aroma = $vino->getAroma($OCata->id);  
        $aro = $aroma->fetch_object();
        $gusto = $vino->getGusto($OCata->id);  
        $gus = $gusto->fetch_object();
        $personal = $vino->getPersonal($OCata->id);  
        $perso = $personal->fetch_object();
        $aromas = $vino->getPalabrasAromas($OCata->id);
        $gustos = $vino->getPalabrasGustos($OCata->id);
        $uvas = $vino->getUvas($OCata->id_vino);
    }
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cata</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Inicio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Resumen</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7">
            <div class="text-right">
                <div class="row text-right">
                    <div class="col-md-3 text-right">
                        <a href="#" class="btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#myModal">
                            <i class="far fa-share-square"></i>
                            Compartir
                        </a>
                    </div>
                    <div class="col-md-3 text-right">
                        <div class="fb-share-button" data-href="<?=base_url?>inv.php?id=<?=$_GET['id']?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="btn waves-effect waves-light btn-info" style="background-color: #4267b2; border-color: #4267b2;"><i class="fab fa-facebook"></i> Compartir</a></div>
                    </div>
                    <?php if($_SESSION['identity']->id == $OCata->id_user): ?>
                        <div class="col-md-3 text-right">
                            <a href="editCalif.php?id=<?=$OCata->id?>" class="btn waves-effect waves-light btn-success">
                                <i class="far fa-edit"></i>    
                                Editar
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="controllers/obtener_vino.php?id_catado=<?=$OCata->id?>" class="btn waves-effect waves-light btn-danger">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $vin->pais ?> - <?= $vin->region ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid" src="<?= base_url ?><?= $vin->url_img ?>" alt="">
                        </div>
                        <div class="col-md-5 text-center">
                            <h3 class="card-title">Calificación final:</h3>
                            <h3 class="calificacion-final"> <?= $vino->calificacionCata($OCata->id) ?></h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="card-title"><?= $vin->nombre ?> - <?= $cos->cosecha ?></h3>
                            <p class="card-text">Uva: <?php while($uva = $uvas->fetch_object()){ echo $uva->uva.' - ';} ?> </p>
                            <p class="card-text">Productor: <?= $vin->productor ?></p>
                            <p class="card-text">Alcohol: <?= $cos->alcohol ?>%</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Visual: Calificación - <?= $vis->calificacion ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Capa: <?= $vis->capa ?></p>
                    <p class="card-text">Color: <?= $vis->color ?></p>
                    <p class="card-text">Brillo: <?= $vis->brillo ?></p>
                    <p class="card-text">Viscocidad: <?= $vis->viscosidad ?></p>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Aromático: Calificación - <?= $aro->calificacion ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-6">
                        <p class="card-text">Intensidad: <?= $aro->intensidad ?></p>
                        <p class="card-text">Complejidad: <?= $aro->complejidad ?></p>
                        <p class="card-text">Aromas: <?= $aro->aromas ?></p>
                        <ul>
                            <?php while($ar = $aromas->fetch_object()): ?>
                            <li><?=$ar->palabra?></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Gusto: Calificación - <?= $gus->calificacion ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Dulce: <?= $gus->dulce ?></p>
                    <p class="card-text">Acidez: <?= $gus->acidez ?></p>
                    <p class="card-text">Tanino: <?= $gus->tanino ?></p>
                    <p class="card-text">Alcohol: <?= $gus->alcohol ?></p>
                    <p class="card-text">Cuerpo: <?= $gus->cuerpo ?></p>
                    <p class="card-text">Permanencia: <?= $gus->permanencia ?></p>
                    <p class="card-text">Retrogusto: <?= $gus->retrogusto ?></p>
                    <ul>
                        <?php while($gus = $gustos->fetch_object()): ?>
                        <li><?=$gus->palabra?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Apreciación personal: Calificación - <?= $perso->calificacion ?></h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Comentarios: <?= $perso->comentario ?></p>
                    <p class="card-text">Maridaje: <?= $perso->meridaje ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-12 text-center">
            
        </div>
    </div>
    <!-- End Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="controllers/modelo_compartir.php" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Compartir esta cata en Wine Comunity...</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <h6>¿Tienes algo mas que decir acerca de esta cata?</h6>
                        <p>Compartelo con nosotros.</p>
                        <hr>
                        <textarea class="form-control" name="contenido" id="" cols="49" rows="10"></textarea>
                        <input type="text" value="compartir-cata" name="accion" style="display: none;">
                        <input type="text" value="<?=$_GET['id']?>" name="id_cata" style="display: none;">
                        <input type="text" value="<?=$_SESSION['identity']->id?>" name="id_user" style="display: none;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Compartir</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </form>
    </div><!-- /.modal -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include_once 'views/layaut/footer.php'; ?>