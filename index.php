<?php
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'config/db.php';
    $vino = new vinos();

    $vinos = $vino->getVinosCatados();
?>
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Vinos</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Inicio</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Lista de vinos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
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
                    <div class="col-12">
                        <!-- Row -->
                        <div class="row">
                            <!-- column -->
                            <?php while($vin = $vinos->fetch_object()): ?>
                                <div class="col-lg-3 col-md-6">
                                    <!-- Card -->
                                    <div class="card vinos" style="width: 232px; height: 550px;">
                                        <img class="card-img-top img-fluid" width="232" height="288" src="<?=base_url.$vin->url_img?>"
                                            alt="Card image cap">
                                        <div class="card-body">
                                            <?php $uvas = $vino->getUvas($vin->id); ?>
                                            <h4 class="card-title"><?=$vin->nombre?> - <?php while($uva = $uvas->fetch_object()){ echo $uva->uva.' - ';} ?></h4>
                                            <?php 
                                                $promedio = $vino->promedioCataVino($vin->id);
                                                $prom = $promedio->fetch_object();
                                            ?>
                                            <p class="card-text">Calificación: <?= bcdiv($prom->promedio, '1', 2);?></p>
                                            <!--<a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>-->
                                        </div>
                                    </div>
                                    <!-- Card -->
                                </div>
                            <?php endwhile; ?>
                            <!-- column -->
                        </div>
                        <!-- Row -->
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
<?php include_once 'views/layaut/footer.php'; ?>