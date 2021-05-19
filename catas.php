<?php
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'config/db.php';
    $vino = new vinos();
    $cata = $vino->getCatasUser($_SESSION['identity']->id);
    $tamaño = count($cata);
?>

            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Mis catas</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Mis catas</li>
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
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input id="buscar" class="form-control custom-shadow custom-radius border-0 bg-white"
                                    type="search" placeholder="Search" aria-label="Search">
                            </div>
                        </form>
                    </a>
                </li>
                <?php if($tamaño > 0): ?>
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vinos que has calificado</h4>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped no-wrap">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Vino</th>
                                                    <th>Nombre</th>
                                                    <th>Cosecha</th>
                                                    <th>Calif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($cata as $indice => $dato): ?>   
                                                <tr class="text-center">
                                                    <td><img  src="<?=base_url.$dato['img']?>" alt="imagen" class="rounded-circle" width="100" height="100"></td>
                                                    <td><a href="resumen.php?id=<?=$dato['id_cata']?>" style="color: #ba2e53;"><?=$dato['nombre']?></a></td>
                                                    <td><?=$dato['cosecha']?></td>
                                                    <td><?=$dato['calif']?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <h4 class="card-title">Aun no has calificado vinos</h4>
                    </div>
                <?php endif; ?>

<?php include_once 'views/layaut/footer.php'; ?>