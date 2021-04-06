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
    }
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Cata</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html" class="text-muted">Inicio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Resumen</li>
                    </ol>
                </nav>
            </div>

            <div class="text-right">
                <a href="#" class="btn waves-effect waves-light btn-info" data-toggle="tooltip" data-placement="top" title data-original-title="Compartir">
                    <i class="far fa-share-square"></i>
                </a>
                <a href="editCalif.php?id=<?=$OCata->id?>" class="btn waves-effect waves-light btn-success" data-toggle="tooltip" data-placement="top" title data-original-title="Editar cata">
                    <i class="far fa-edit"></i>
                </a>
                <a href="controllers/obtener_vino.php?id_catado=<?=$OCata->id?>" class="btn waves-effect waves-light btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Eliminar">
                    <i class="fas fa-trash"></i>
                </a>
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
                        <div class="col-md-10">
                            <h3 class="card-title"><?= $vin->nombre ?> - <?= $cos->cosecha ?></h3>
                            <p class="card-text">Uva: <?= $vin->uva ?></p>
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
                        <div class="col-md-6">
                            <h4 class="card-title">Visual</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <h3 class="card-title">Calificación - <?= $vis->calificacion ?></h3>
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
                        <div class="col-md-6">
                            <h4 class="card-title">Aromatico</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-6">
                        <h3 class="card-title">Calificación - <?= $aro->calificacion ?></h3>
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
                        <div class="col-md-6">
                            <h4 class="card-title">Gusto</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Calificación - <?= $gus->calificacion ?></h3>
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
                        <div class="col-md-6">
                            <h4 class="card-title">Apreciacion personal</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h3 class="card-title">Calificación - <?= $perso->calificacion ?></h3>
                    <p class="card-text">Comentarios: <?= $perso->comentario ?></p>
                    <p class="card-text">Meridaje: <?= $perso->meridaje ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Calificación final - <?= $vino->calificacionCata($OCata->id) ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <div class="fb-share-button" data-href="<?=base_url?>cata/resumen_inv&id=<?=$_GET['id']?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
        </div>
    </div>
    <!-- End Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include_once 'views/layaut/footer.php'; ?>