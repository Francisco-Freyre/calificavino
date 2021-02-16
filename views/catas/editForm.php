<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Caracteristicas</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item text-muted active" aria-current="page">Cata</li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Caracteristicas</li>
                    </ol>
                </nav>
            </div>
            <br>
            <span style="color: red;">No olvides seleccionar nuevamente el color de tu vino</span>
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
    <form action="<?= base_url ?>cata/updateCalif&id_cata=<?=$_GET['id_cata']?>" method="POST">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Visual</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Capa</h4>
                                        <div class="row">
                                            <div class="col-md-3">Baja</div>
                                            <div class="col-md-3 text-center">Media</div>
                                            <div class="col-md-3 text-center">Media-Alta</div>
                                            <div class="col-md-3 text-right">Alta</div>
                                        </div>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$capa?>" name="capa" class="form-control" min="0" max="3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Color</h4>
                                        <h6 class="card-subtitle">Da click y selecciona el color
                                        </h6>
                                        <div class="mb-3">
                                            <div class="row g-2">
                                                <div class="col-auto">
                                                    <label class="form-colorinput">
                                                        <input id="colorNegro" class="form-colorinput-input" type="radio" name="color-rounded" value="dark">
                                                        <span class="form-colorinput-color bg-dark rounded-circle"></span>
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="form-colorinput">
                                                        <input id="colorAzul" class="form-colorinput-input" type="radio" name="color-rounded" value="blue">
                                                        <span class="form-colorinput-color bg-blue rounded-circle"></span>
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="form-colorinput">
                                                        <input id="colorBlanco" class="form-colorinput-input" type="radio" name="color-rounded" value="white">
                                                        <span class="form-colorinput-color bg-white rounded-circle"></span>
                                                    </label>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="form-colorinput">
                                                        <input id="colorEspuma" class="form-colorinput-input" type="radio" name="color-rounded" value="blue">
                                                        <span class="form-colorinput-color bg-espu rounded-circle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 tinto">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Colores Tintos</h4>
                                        <h6 class="card-subtitle">Selecciona el color</h6>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="Violaceo">
                                                    <label class="custom-control-label" for="customRadio1">Violaceo</label>
                                                    <img src="<?= base_url ?>assets/images/violaceo.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="Rubi">
                                                    <label class="custom-control-label" for="customRadio2">Rubi</label>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/rubi.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="Granate">
                                                    <label class="custom-control-label" for="customRadio3">Granate</label>
                                                    <img src="<?= base_url ?>assets/images/granate.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="Tinto naranja">
                                                    <label class="custom-control-label" for="customRadio4">Tinto Naranja</label>
                                                    <img src="<?= base_url ?>assets/images/tintonaranja.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 rosa">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Colores Rosados</h4>
                                        <h6 class="card-subtitle">Selecciona el color</h6>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input" value="Grosella">
                                                    <label class="custom-control-label" for="customRadio5">Grosella</label>
                                                    <img src="<?= base_url ?>assets/images/grosella.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio6" name="customRadio" class="custom-control-input" value="Frambuesa">
                                                    <label class="custom-control-label" for="customRadio6">Frambuesa</label>
                                                    <img src="<?= base_url ?>assets/images/frambueza.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input" value="Rosa claro">
                                                    <label class="custom-control-label" for="customRadio7">Rosa claro</label>
                                                    <img src="<?= base_url ?>assets/images/rosaclaro.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio8" name="customRadio" class="custom-control-input" value="Rosa Palido">
                                                    <label class="custom-control-label" for="customRadio8">Rosa Palido</label>
                                                    <img src="<?= base_url ?>assets/images/rosapalido.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio9" name="customRadio" class="custom-control-input" value="Salmon">
                                                    <label class="custom-control-label" for="customRadio9">Salmon</label>
                                                    <img src="<?= base_url ?>assets/images/salmon.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio10" name="customRadio" class="custom-control-input" value="Naranja">
                                                    <label class="custom-control-label" for="customRadio10">Naranja</label>
                                                    <img src="<?= base_url ?>assets/images/naranja.png" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 blanco">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Colores Blancos</h4>
                                        <h6 class="card-subtitle">Selecciona el color</h6>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio11" name="customRadio" class="custom-control-input" value="Amarillo verdozo">
                                                    <label class="custom-control-label" for="customRadio11">Amarillo verdozo</label>
                                                    <img src="<?= base_url ?>assets/images/marilloverdozo.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio12" name="customRadio" class="custom-control-input" value="Amarillo palido">
                                                    <label class="custom-control-label" for="customRadio12">Amarillo palido</label>
                                                    <img src="<?= base_url ?>assets/images/amarillopalido.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio13" name="customRadio" class="custom-control-input" value="Amarillointenso">
                                                    <label class="custom-control-label" for="customRadio13">Amarillo intenso</label>
                                                    <img src="<?= base_url ?>assets/images/Amarillointenso.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio14" name="customRadio" class="custom-control-input" value="Dorado">
                                                    <label class="custom-control-label" for="customRadio14">Dorado</label>
                                                    <br>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/dorado.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio15" name="customRadio" class="custom-control-input" value="Amabar">
                                                    <label class="custom-control-label" for="customRadio15">Amabar</label>
                                                    <br>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/amabar.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio16" name="customRadio" class="custom-control-input" value="Cobre">
                                                    <label class="custom-control-label" for="customRadio16">Cobre</label>
                                                    <br>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/cobre.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 espuma">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Colores Espumosos</h4>
                                        <h6 class="card-subtitle">Selecciona el color</h6>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio17" name="customRadio" class="custom-control-input" value="Rosario lineal">
                                                    <label class="custom-control-label" for="customRadio17">Rosario lineal</label>
                                                    <br>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/lineal.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio18" name="customRadio" class="custom-control-input" value="Rosario ondulado">
                                                    <label class="custom-control-label" for="customRadio18">Rosario ondulado</label>
                                                    <img src="<?= base_url ?>assets/images/ondulado.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio19" name="customRadio" class="custom-control-input" value="Perlado fino">
                                                    <label class="custom-control-label" for="customRadio19">Perlado fino</label>
                                                    <br>
                                                    <br>
                                                    <img src="<?= base_url ?>assets/images/fine.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio20" name="customRadio" class="custom-control-input" value="Perlado medio">
                                                    <label class="custom-control-label" for="customRadio20">Perlado medio</label>
                                                    <img src="<?= base_url ?>assets/images/medio.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio21" name="customRadio" class="custom-control-input" value="Perlado grande">
                                                    <label class="custom-control-label" for="customRadio21">Perlado grande</label>
                                                    <img src="<?= base_url ?>assets/images/grande.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Brillo</h4>
                                        <div class="row">
                                            <div class="col-md-4">Escaso</div>
                                            <div class="col-md-4 text-center">Brillante</div>
                                            <div class="col-md-4 text-right">Muy brillante</div>
                                        </div>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$brillo?>" class="form-control" min="0" max="2" name="brillo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Viscocidad</h4>
                                        <div class="row">
                                            <div class="col-md-4">Fluido</div>
                                            <div class="col-md-4 text-center">Concistente</div>
                                            <div class="col-md-4 text-right">Muy concistente</div>
                                        </div>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$viscosidad?>" class="form-control" min="0" max="2" name="viscocidad">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Calificación</h4>
                                        <h6 class="card-subtitle">Valores del 0 al 1 (se incluyen
                                            valores decimales)</h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$OVisual->calificacion?>" class="form-control" min="0" max="1" step="0.1" id="calif1" name="calificacion1">
                                            <div class="text-center" id="select1">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Aromatica</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Intensidad</h4>
                                        <div class="row">
                                            <div class="col-md-3">Baja</div>
                                            <div class="col-md-3 text-center">Media</div>
                                            <div class="col-md-3 text-center">Media-Alta
                                            </div>
                                            <div class="col-md-3 text-right">Alta</div>
                                        </div>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$intensidad?>" class="form-control" min="0" max="3" name="intensisdad">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Complejidad</h4>
                                        <div class="row">
                                            <div class="col-md-3">Baja</div>
                                            <div class="col-md-3 text-center">Media</div>
                                            <div class="col-md-3 text-center">Media-Alta
                                            </div>
                                            <div class="col-md-3 text-right">Alta</div>
                                        </div>
                                        <h6 class="card-subtitle"></h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$complejidad?>" class="form-control" min="0" max="3" name="complejidad">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Aromas
                                        </h4>
                                        <h6 class="card-subtitle"></h6>

                                        <div class="form-group">
                                            <input type="search" value="<?=$OAromas->aromas?>" class="form-control" name="aromas" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Calificación</h4>
                                        <h6 class="card-subtitle">Valores del 0 al 2 (se
                                            incluyen valores decimales)</h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$OAromas->calificacion?>" class="form-control" min="0" max="2" step="0.1" id="calif2" name="calificacion2">
                                            <div class="text-center" id="select2">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title">Gustativo</h4><br>
                                <h4 class="card-title">Dulce</h4>
                                <div class="row">
                                    <div class="col-md-2">Seco</div>
                                    <div class="col-md-2 text-center">Semiseco</div>
                                    <div class="col-md-4 text-center">Semidulce</div>
                                    <div class="col-md-2 text-center">Dulce</div>
                                    <div class="col-md-2 text-right">Muy dulce</div>
                                </div>
                                <input type="range" value="<?=$dulce?>" class="custom-range" id="customRange1" min="0" max="4" name="dulce">
                                <h4 class="card-title">Acidez</h4>
                                <div class="row">
                                    <div class="col-md-3">Baja</div>
                                    <div class="col-md-3 text-center">Media</div>
                                    <div class="col-md-3 text-center">Media-Alta</div>
                                    <div class="col-md-3 text-right">Alta</div>
                                </div>
                                <input type="range" value="<?=$acidez?>" class="custom-range" min="0" max="3" id="customRange2" name="acidez">
                                <h4 class="card-title">Tanino</h4>
                                <div class="row">
                                    <div class="col-md-2">Nulo</div>
                                    <div class="col-md-2 text-center">Bajo</div>
                                    <div class="col-md-4 text-center">Medio</div>
                                    <div class="col-md-2 text-center">Medio-Alto</div>
                                    <div class="col-md-2 text-right">Alto</div>
                                </div>
                                <input type="range" value="<?=$tanino?>" class="custom-range" min="0" max="4" id="customRange3" name="tanino">
                            </div>
                            <div class="col-lg-12">
                                <h4 class="card-title"> </h4><br>
                                <h4 class="card-title">Alcohol</h4>
                                <div class="row">
                                    <div class="col-md-4">Bajo</div>
                                    <div class="col-md-4 text-center">Medio</div>
                                    <div class="col-md-4 text-right">Alto</div>
                                </div>
                                <input type="range" value="<?=$alcohol?>" class="custom-range" id="customRange1" min="0" max="2" name="alcohol">
                                <h4 class="card-title">Cuerpo</h4>
                                <div class="row">
                                    <div class="col-md-3">Ligero</div>
                                    <div class="col-md-3 text-center">Medio</div>
                                    <div class="col-md-3 text-center">Medio-Alto</div>
                                    <div class="col-md-3 text-right">Robusto</div>
                                </div>
                                <input type="range" value="<?=$cuerpo?>" class="custom-range" min="0" max="3" id="customRange2" name="cuerpo">
                                <h4 class="card-title">Permanencia</h4>
                                <div class="row">
                                    <div class="col-md-3">Baja</div>
                                    <div class="col-md-3 text-center">Media</div>
                                    <div class="col-md-3 text-center">Media-Alta</div>
                                    <div class="col-md-3 text-right">Alta</div>
                                </div>
                                <input type="range" value="<?=$permanencia?>" class="custom-range" min="0" max="3" id="customRange3" name="permanencia">
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Retrogusto
                                        </h4>
                                        <h6 class="card-subtitle"></h6>

                                        <div class="form-group">
                                            <input type="search" value="<?=$OGustos->retrogusto?>" class="form-control" name="sabores" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Calificación</h4>
                                        <h6 class="card-subtitle">Valores del 0 al 3 (se
                                            incluyen valores decimales)</h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$OGustos->calificacion?>" class="form-control" min="0" max="3" step="0.1" id="calif3" name="calificacion3">
                                            <div class="text-center" id="select3">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Apreciacion personal</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Comentarios</h4>

                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Comentario" name="comentarios" required><?=$OApresiacion->comentario?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Maridaje</h4>

                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Comentario" name="meridaje" required><?=$OApresiacion->meridaje?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Calificación</h4>
                                        <h6 class="card-subtitle">Valores del 0 al 4 (se
                                            incluyen valores decimales)</h6>
                                        <div class="form-group">
                                            <input type="range" value="<?=$OApresiacion->calificacion?>" class="form-control" min="0" max="4" step="0.1" id="calif4" name="calificacion4">
                                            <div class="text-center" id="select4">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <button type="submit" class="btn btn-block btn-primary">Guardar</button>
            </div>
        </div>
    </form>