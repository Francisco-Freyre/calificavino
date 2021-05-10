<?php
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
?>

 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Uva</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Vinos</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Uvas</li>
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
                
                    <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Uvas que contiene el vino</h4>      
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input list="uvas" type="text" id="uva2" data-id="<?=$_GET['id_vino']?>" class="form-control"
                                                                placeholder="Uva">
                                                            <datalist id="uvas">
                                                                <option value="CHARDONNAY"></option>
                                                                <option value="SAUVIGNON BLANC"></option>
                                                                <option value="TORRONTES"></option>
                                                                <option value="PINOT GRIGIO"></option>
                                                                <option value="PINOT GRIS"></option>
                                                                <option value="RIESLING"></option>
                                                                <option value="GEWÜRZTRAMINER"></option>
                                                                <option value="ALBARIÑO"></option>
                                                                <option value="PALOMINO"></option>
                                                                <option value="MACABEO"></option>
                                                                <option value="VERDEJO"></option>
                                                                <option value="VIOGNER"></option>
                                                                <option value="CHENIN BLANC"></option>
                                                                <option value="MOSCATEL"></option>
                                                                <option value="SEMILLÓN"></option>
                                                                <option value="PARELLADA"></option>
                                                                <option value="XARELLO"></option>
                                                                <option value="AGLIÁNICO"></option>
                                                                <option value="BARBERA"></option>
                                                                <option value="BONARDA"></option>
                                                                <option value="CABERNET FRANC"></option>
                                                                <option value="CABERNET SAUVIGNON"></option>
                                                                <option value="CARMENERE"></option>
                                                                <option value="CARIGNAN"></option>
                                                                <option value="CORVINA"></option>
                                                                <option value="DOLCETTO"></option>
                                                                <option value="GAMAY"></option>
                                                                <option value="GARNACHA"></option>
                                                                <option value="GRACIANO"></option>
                                                                <option value="MALBEC"></option>
                                                                <option value="MERLOT"></option>
                                                                <option value="MISIÓN"></option>
                                                                <option value="MOURVEDRE"></option>
                                                                <option value="NEBBIOLO"></option>
                                                                <option value="NERO D' AVOLA"></option>
                                                                <option value="PETIT SYRAH"></option>
                                                                <option value="PETIT VERDOT"></option>
                                                                <option value="PINOT NOIR"></option>
                                                                <option value="PINOTAGE"></option>
                                                                <option value="PRIMITIVO"></option>
                                                                <option value="SANGIOVESE"></option>
                                                                <option value="SYRAH"></option>
                                                                <option value="TANNAT"></option>
                                                                <option value="TEMPRANILLO"></option>
                                                                <option value="TINTA DE TORO"></option>
                                                                <option value="TINTA FINA"></option>
                                                                <option value="ZINFANDEL"></option>
                                                            </datalist>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-12" id="chipss4">
                                                                    <!--<div class="chip">
                                                                        Ejemplo
                                                                        <span class="closebtn">&times;</span>
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <button id="guardar-uva-dos" data-id="<?=$_GET['id_vino']?>" data-idcata="<?=$_GET['id_cata']?>" type="submit" class="btn btn-info">Guardar</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<?php include_once 'views/layaut/footer.php'; ?>