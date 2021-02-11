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
                            <h3 class="card-title"><?= $vin->nombre ?> - <?= $vin->cosecha ?></h3>
                            <p class="card-text">Uva: <?= $vin->uva ?></p>
                            <p class="card-text">Productor: <?= $vin->productor ?></p>
                            <p class="card-text">Alcohol: <?= $vin->alcohol ?>%</p>
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
                    <h3 class="card-title text-center">Calificación final - <?= $total ?></h3>
                </div>
            </div>
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