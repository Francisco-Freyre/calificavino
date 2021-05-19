<?php
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'models/usuarios.php';
    require_once 'config/db.php';
    $vino = new vinos();
    $cata = $vino->getCatasUser($_GET['id']);
    if($cata){
        $tamaño = count($cata);
        $usuarios = new usuarios();
        $usuario = $usuarios->getPerfil($_GET['id']);
        $user = $usuario->fetch_object();
        $Mcata = $vino->getMejorCata($_GET['id']);
        $OMcata = $Mcata->fetch_object();
        $vine = $vino->getNewVinoId($OMcata->id_vino);
        $vin = $vine->fetch_object();
        $cosecha = $vino->getCosecha($OMcata->id_vino);
        $cos = $cosecha->fetch_object();
    }else{
        $tamaño = 0;
    }
?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Catas de </h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Catas de usuario</li>
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
    <?php if($tamaño > 0): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $user->nombre ?></h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <?php if($user->imagen == ''): ?>
                                <img class="img-fluid" src="assets/images/usuariodefault.jpg" alt="">
                            <?php else: ?>
                                <img class="img-fluid" src="<?= base_url ?><?= $user->imagen ?>" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-5 text-center">
                            <h3 class="card-title">Catas hechas: </h3>
                            <h3 class="calificacion-final"> <?= $tamaño ?></h3>
                        </div>
                        <div class="col-md-5">
                            <h3 class="card-title"></h3>
                            <p class="card-text">El vino que mas le ha gustado: </p>
                            <p class="card-text"><?=$vin->nombre?> - <?= $cos->cosecha ?></p>
                            <p class="card-text"> <a href="resumen.php?id=<?=$OMcata->id?>" style="color: #ba2e53;">Puedes revisar la cata aqui</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
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
                
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Lista de vinos catados por el usuario</h4>
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
                        <h4 class="card-title">Esta persona aun no califica ningun vino</h4>
                    </div>
                <?php endif; ?>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include_once 'views/layaut/footer.php'; ?>