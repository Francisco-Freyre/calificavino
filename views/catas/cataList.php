<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Mis catas</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Inicio</a></li>
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
                <?php if($tamaño > 0): ?>
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vinos que has calificado</h4>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                            <thead>
                                                <tr>
                                                    <th>Vino</th>
                                                    <th>Nombre</th>
                                                    <th>Cosecha</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($cata as $indice => $dato): ?>   
                                                <tr>
                                                    <td><img  src="<?=base_url.$dato['img']?>" alt="imagen" style="width: 80px; height:auto"></td>
                                                    <td><?=$dato['nombre']?></td>
                                                    <td><?=$dato['cosecha']?></td>
                                                    <td>
                                                        <a href="<?=base_url?>cata/resumen&id=<?=$dato['id_cata']?>" class="btn btn-info">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="<?=base_url?>cata/editVino&id_vino=<?=$dato['id_vino']?>" class="btn waves-effect waves-light btn-success">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a href="<?=base_url?>cata/deleteCata&id_cata=<?=$dato['id_cata']?>&id_vino=<?=$dato['id_vino']?>" class="btn waves-effect waves-light btn-danger">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </td>
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