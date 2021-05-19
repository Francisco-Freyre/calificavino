<?php 
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'models/usuarios.php';
    require_once 'config/db.php';

    if(isset($_GET['id'])){
        $vino = new vinos();
        $usuarios = new usuarios();
        $vine = $vino->getNewVinoId($_GET['id']);
        $vin = $vine->fetch_object();
        $promedio = $vino->promedioCataVino($vin->id);
        $prom = $promedio->fetch_object();
        $numcatas = $vino->contCatas($vin->id);
        $cosechas = $vino->getCosechasVino($vin->id);
        $comentarios = $vino->getComentarios($vin->id);
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
                        <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Estadisticas</li>
                    </ol>
                </nav>
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-fluid" src="<?= base_url ?><?= $vin->url_img ?>" alt="">
                        </div>
                        <div class="col-md-5 text-center">
                            <h3 class="card-title">Valoracion general:</h3>
                            <h3 class="calificacion-final"> <?= bcdiv($prom->promedio, '1', 2)?> </h3>
                            <h3 class="card-title"><?=$numcatas?> Valoraciones</h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="card-title"><?= $vin->nombre ?></h3>
                            <br>
                            <h4 class="card-title"><?= $vin->pais ?> - <?= $vin->region ?></h4>
                            <br>
                            <h4 class="card-title">Productor: <?= $vin->productor ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Explora algunas cosechas</h4>
                    <h6 class="card-subtitle">Busca algunas de las mejores cosechas de <?= $vin->nombre ?></h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody class="text-center">
                            <?php while($cosecha = $cosechas->fetch_object()): ?>
                            <tr>
                                <td><?=$cosecha->cosecha?></td>
                                <?php $promedioCos = $vino->promedioCataCosecha($vin->id, $cosecha->cosecha);
                                    $promCos = $promedioCos->fetch_object();
                                ?>
                                <td><?= bcdiv($promCos->promedio, '1', 2) ?></td>
                                <td>De <?=$vino->getCosechasAnio($vin->id, $cosecha->cosecha)?> valoraciones</td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="card-title">Algunas reseñas</h4>
            <ul class="list-unstyled">
                <?php while($comentario = $comentarios->fetch_object()): ?>
                    <?php
                        $usuario = $usuarios->getUser($comentario->id_user);
                        $user = $usuario->fetch_object();
                    ?>
                    <li class="media">
                        <img class="d-flex mr-3" src="<?=$user->imagen?>" width="60" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1"><?=$user->nombre?> - <?=$comentario->total?></h5>
                            <?=$comentario->comentario?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
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