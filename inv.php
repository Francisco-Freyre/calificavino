<?php
    include_once 'config/parameters.php';
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url ?>assets/images/favicon.png">
    <title>Decimo-Escalón</title>
    <meta property="og:url"           content="<?=base_url?>inv.php?id=<?=$_GET['id']?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?= $vin->nombre ?> - <?= $cos->cosecha ?>" />
    <meta property="og:description"   content="Este vino tiene una calificacion final de <?=$OCata->calificacion?>" />
    <meta property="og:image"         content="<?= base_url ?><?= $vin->url_img ?>" />
    <!-- Custom CSS -->
    <link href="<?= base_url ?>assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url ?>assets/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url ?>assets/dist/css/miCss.css">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v9.0" nonce="4wgy5dsD"></script>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
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
                    <h3 class="card-title text-center">Calificación final - <?= $OCata->calificacion ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <div class="fb-share-button" data-href="<?=base_url?>inv.php?id=<?=$_GET['id']?>" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
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