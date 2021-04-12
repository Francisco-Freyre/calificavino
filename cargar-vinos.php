<?php
    include_once 'config/parameters.php';
    include_once 'helpers/session.php';
    include_once 'views/layaut/header.php';
    include_once 'views/layaut/sidebar.php';
    require_once 'models/vinos.php';
    require_once 'config/db.php';

    $vino = new vinos();
    $cata = $vino->getNewVinos();
?>

 <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Nuevo vino</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Vinos</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Creacion</li>
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
                <form action="controllers/modelo_vinos.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Cargar fotografía de etiqueta</h4>
                                        <fieldset class="form-group">
                                            <input type="file" name="img" class="form-control-file" id="exampleInputFile" required>
                                        </fieldset>
                                </div>
                            </div>
                        </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Información de la etiqueta</h4>
                                        
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input type="text" name="nombre" class="form-control"
                                                                placeholder="Nombre" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input list="paises" type="text" name="pais" class="form-control"
                                                                placeholder="Pais" required>
                                                            <datalist id="paises">
                                                                <option value="ARGENTINA"></option>
                                                                <option value="AUSTRALIA"></option>
                                                                <option value="AUSTRALIA DEL SUR"></option>
                                                                <option value="NUEVA GALES DEL SUR"></option>
                                                                <option value="TASMANIA"></option>
                                                                <option value="WESTERN AUSTRALIA"></option>
                                                                <option value="ESTADOS UNIDOS"></option>
                                                                <option value="CHILE"></option>
                                                                <option value="FRANCIA"></option>
                                                                <option value="ESPAÑA"></option>
                                                                <option value="ITALIA"></option>
                                                                <option value="ALEMANIA"></option>
                                                                <option value="PORTUGAL"></option>
                                                                <option value="NUEVA ZELANDA"></option>
                                                                <option value="MEXICO"></option>
                                                            </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <input list="regiones" type="text" name="region" class="form-control"
                                                                placeholder="Region" required>
                                                            <datalist id="regiones">
                                                                <option value="VALLE DE UCO"></option>
                                                                <option value="LUJAN DE CUYO"></option>
                                                                <option value="MAIPÚ"></option>
                                                                <option value="SALTA"></option>
                                                                <option value="SAN JUAN"></option>
                                                                <option value="PATAGONIA"></option>
                                                                <option value="MURRAY-DARLING"></option>
                                                                <option value="RIVERINA"></option>
                                                                <option value="RIVERLAND"></option>
                                                                <option value="BAROSSA"></option>
                                                                <option value="BAROSSA VALLEY"></option>
                                                                <option value="EDEN VALLEY"></option>
                                                                <option value="CLARE VALLEY"></option>
                                                                <option value="MCLAREN VALE"></option>
                                                                <option value="COONAWARRA"></option>
                                                                <option value="VICTORIA"></option>
                                                                <option value="YARRA VALLEY"></option>
                                                                <option value="GEELONG"></option>
                                                                <option value="MORNINGTON PENINSULA"></option>
                                                                <option value="HEATHCOTE"></option>
                                                                <option value="GOULBURN VALLEY"></option>
                                                                <option value="RUTHERGLEN"></option>
                                                                <option value="HUNTER VALLEY"></option>
                                                                <option value="TASMANIA"></option>
                                                                <option value="MARGARET RIVER"></option>
                                                                <option value="GREAT SOUTHERN"></option>
                                                                <option value="NAPA COUNTY"></option>
                                                                <option value="NAPA VALLEY"></option>
                                                                <option value="RUTHERFORD"></option>
                                                                <option value="OAKVILLE"></option>
                                                                <option value="STAGS LEAP DISTRICT"></option>
                                                                <option value="HOWELL MOUNTAIN"></option>
                                                                <option value="MOUNT VEEDER"></option>
                                                                <option value="LOS CARNEROS"></option>
                                                                <option value="SANTA HELENA"></option>
                                                                <option value="CALISTOGA"></option>
                                                                <option value="SONOMA COUNTY"></option>
                                                                <option value="SONOMA COAST"></option>
                                                                <option value="ALEXANDER VALLEY"></option>
                                                                <option value="DRY CREEK VALLEY"></option>
                                                                <option value="MENDOCINO COUNTY"></option>
                                                                <option value="SANTA CRUZ MOUNTAINS"></option>
                                                                <option value="MONTERREY"></option>
                                                                <option value="SAN LUIS OBISPO COUNTY"></option>
                                                                <option value="PASO ROBLES"></option>
                                                                <option value="SANTA BARBARA COUNTY"></option>
                                                                <option value="SANTA MARIA VALLEY"></option>
                                                                <option value="LODI"></option>
                                                                <option value="ANDERSON VALLEY"></option>
                                                                <option value="WILLAMETTE VALLEY"></option>
                                                                <option value="COLUMBIA VALLEY"></option>
                                                                <option value="YAKIMA VALLEY"></option>
                                                                <option value="FINGER LAKES"></option>
                                                                <option value="VALLE CASA BLANCA"></option>
                                                                <option value="VALLE SAN ANTONIO "></option>
                                                                <option value="VALLE LEYDA"></option>
                                                                <option value="VALLE ACONCAGUA"></option>
                                                                <option value="VALLE CAHAPOAL"></option>
                                                                <option value="VALLE COLCHAGUA"></option>
                                                                <option value="VALLE MAIPO"></option>
                                                                <option value="VALLE CURICÓ"></option>
                                                                <option value="VALLE MAULE"></option>
                                                                <option value="BORDEAUX SUPERIOR"></option>
                                                                <option value="CÔTE DE BORDEAUX"></option>
                                                                <option value="ENTRE-DEUX- MERS"></option>
                                                                <option value="MÉDOC"></option>
                                                                <option value="HAUT MÉDOC"></option>
                                                                <option value="SAINT-ESTÈPHE"></option>
                                                                <option value="PAUILLAC"></option>
                                                                <option value="MARGAUX"></option>
                                                                <option value="GRAVES"></option>
                                                                <option value="PAESSAC-LÉOGNAN"></option>
                                                                <option value="SAINT-ÉMILION"></option>
                                                                <option value="SAINT-JULIEN"></option>
                                                                <option value="GRAN CRU"></option>
                                                                <option value="POMEROL"></option>
                                                                <option value="SAUTERNS"></option>
                                                                <option value="BARSAC"></option>
                                                                <option value="BERGERAC"></option>
                                                                <option value="MONBAZILLAC"></option>
                                                                <option value="CAHORS"></option>
                                                                <option value="MADIRAN"></option>
                                                                <option value="JURANÇON"></option>
                                                                <option value="CÔTE DE GASCOGNE"></option>
                                                                <option value="CHABLIS"></option>
                                                                <option value="CÔTES DE NUITS-VILLAGES"></option>
                                                                <option value="GEVREY-CHAMBERTIN"></option>
                                                                <option value="VOSNE-ROMANÉE"></option>
                                                                <option value="NUITS-SANIT GEORGES"></option>
                                                                <option value="CÔTES DE BEAUNE"></option>
                                                                <option value="CÔTE DE BEAUNE VILLAGES"></option>
                                                                <option value="ALOXE-CORTONE"></option>
                                                                <option value="BEAUNE"></option>
                                                                <option value="POMMARD"></option>
                                                                <option value="VOLNAY"></option>
                                                                <option value="MEURSALT"></option>
                                                                <option value="PUGLINY MONTRACHET"></option>
                                                                <option value="CHASSAGNE-MONTRACHET"></option>
                                                                <option value="BOURGOGNE CÔTE CHALONNAISE"></option>
                                                                <option value="MONTAGNY"></option>
                                                                <option value="MÂCON"></option>
                                                                <option value="MÂCON VILLAGES"></option>
                                                                <option value="SAINT VERAN"></option>
                                                                <option value="BEUJOLAIS"></option>
                                                                <option value="BEUJOLLAIS VILLAGES"></option>
                                                                <option value="BROULLY"></option>
                                                                <option value="FLEURIE"></option>
                                                                <option value="MORGON"></option>
                                                                <option value="MOUILIN-À VENT"></option>
                                                                <option value="ALSACIA"></option>
                                                                <option value="MUSCADET SÈVRE ET MAINE"></option>
                                                                <option value="ANJOU"></option>
                                                                <option value="COTEAUX DU LAYON"></option>
                                                                <option value="SAVENNIERES"></option>
                                                                <option value="SAUMUR"></option>
                                                                <option value="SAUMUR CHAMPIGNY"></option>
                                                                <option value="VOUVRAY"></option>
                                                                <option value="TOURAINE"></option>
                                                                <option value="BOURGUEIL"></option>
                                                                <option value="CHININ"></option>
                                                                <option value="SANCERRE"></option>
                                                                <option value="POUILLY FUMÉ"></option>
                                                                <option value="MENETOU SALON"></option>
                                                                <option value="ROSÉ D'ANJOU"></option>
                                                                <option value="ROSÉ DE LOIRE"></option>
                                                                <option value="CÔTES DU RHÔNE VILLAGES"></option>
                                                                <option value="SAINT JOSEPH"></option>
                                                                <option value="HERMITAGE"></option>
                                                                <option value="CROZES HERMITAGE"></option>
                                                                <option value="CHÂTEAUNEUF DU PAPE"></option>
                                                                <option value="GIGONDAS"></option>
                                                                <option value="VACQUEYRAS"></option>
                                                                <option value="MUSCADET DE BEAUMES DE VENISE"></option>
                                                                <option value="PAYS D'OC"></option>
                                                                <option value="LANGUEDOC"></option>
                                                                <option value="MINERVOIS"></option>
                                                                <option value="FITOU"></option>
                                                                <option value="CORBIÈRES"></option>
                                                                <option value="CÔTES DU ROUSSILLON"></option>
                                                                <option value="CHAMPAGNE"></option>
                                                                <option value="RIOJA"></option>
                                                                <option value="NAVARRA"></option>
                                                                <option value="RIBERA DEL DUERO"></option>
                                                                <option value="CASTILLA LA MANCHA"></option>
                                                                <option value="VALDEPEÑAS"></option>
                                                                <option value="PRIORAT"></option>
                                                                <option value="CATALUNYA"></option>
                                                                <option value="PENEDÈS"></option>
                                                                <option value="TORO"></option>
                                                                <option value="RUEDA"></option>
                                                                <option value="RIAS BAIXAS"></option>
                                                                <option value="VALENCIA"></option>
                                                                <option value="VALDEPEÑAS"></option>
                                                                <option value="TRENTINO"></option>
                                                                <option value="FRIULI VENEZIA GIULIA"></option>
                                                                <option value="VALPOLICELLA"></option>
                                                                <option value="SOAVE"></option>
                                                                <option value="PIEMONTE"></option>
                                                                <option value="BARBARESCO"></option>
                                                                <option value="BARBERA D'ASTI"></option>
                                                                <option value="GAVI"></option>
                                                                <option value="TOSCANA"></option>
                                                                <option value="CHIANTI"></option>
                                                                <option value="BRUNELOI DI MONTALCINO"></option>
                                                                <option value="UMBRIA"></option>
                                                                <option value="LAZIO"></option>
                                                                <option value="ABRUZZO"></option>
                                                                <option value="FIANO DI AVELINO"></option>
                                                                <option value="PUGLIA"></option>
                                                                <option value="SICILIA"></option>
                                                                <option value="MOSEL"></option>
                                                                <option value="RHEINGAU"></option>
                                                                <option value="PFALZ"></option>
                                                                <option value="BADEN"></option>
                                                                <option value="FRANKEN"></option>
                                                                <option value="VINHO VERDE"></option>
                                                                <option value="DOURO"></option>
                                                                <option value="BAIRRADA"></option>
                                                                <option value="PORTO"></option>
                                                                <option value="MADEIRA"></option>
                                                                <option value="HAWKE'S BAY"></option>
                                                                <option value="MARTINBOROUGH"></option>
                                                                <option value="MARLBOROUGH"></option>
                                                                <option value="CENTRAL OTAGO"></option>
                                                                <option value="CANTERBURY"></option>
                                                                <option value="VALLE DE GUADALUPE"></option>
                                                                <option value="SAN VICENTE"></option>
                                                                <option value="VALLE DE PARRAS"></option>
                                                                <option value="QUERETARO"></option>
                                                                <option value="ZACATECAS"></option>
                                                            </datalist>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" name="productor" class="form-control"
                                                                placeholder="Productor" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="text-right">
                                                    <input type="text" value="guardar-vino" name="accion" style="display: none;">
                                                    <button type="submit" class="btn btn-info">Guardar</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- basic table -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vinos en existencia</h4>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped no-wrap">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Img</th>
                                                    <th>Nombre</th>
                                                    <th>Uva</th>
                                                    <th>Pais</th>
                                                    <th>Region</th>
                                                    <th>Productor</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($cat = $cata->fetch_object()): ?>   
                                                <tr class="text-center">
                                                    <td><img  src="<?=$cat->url_img?>" alt="imagen" class="rounded-circle" width="50" height="50"></td>
                                                    <td><a href="editVino.php?id=<?=$cat->id?>" style="color: #ba2e53;"><?=$cat->nombre?></a></td>
                                                    <?php $uvas = $vino->getUvas($cat->id); ?>
                                                    <td>
                                                        <?php while($uva = $uvas->fetch_object()){echo  $uva->uva." - ";} ?>
                                                    </td>
                                                    <td><?=$cat->pais?></td>
                                                    <td><?=$cat->region?></td>
                                                    <td><?=$cat->productor?></td>
                                                    <td>
                                                    <a href="controllers/modelo_vinos.php?accion=elimina&&id=<?=$cat->id?>" class="btn waves-effect waves-light btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<?php include_once 'views/layaut/footer.php'; ?>