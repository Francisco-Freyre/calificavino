<?php
include_once 'config/parameters.php';
include_once 'helpers/session.php';
include_once 'views/layaut/header.php';
include_once 'views/layaut/sidebar.php';
require_once 'models/usuarios.php';
require_once 'config/db.php';
$usuarios = new usuarios();
$usuario = $usuarios->getPerfil($_SESSION['identity']->id);
$user = $usuario->fetch_object();
?>

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Perfil de usuario</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Inicio</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Perfil</li>
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
                <form id="guardar-perfil-imagen" action="controllers/modelo_perfil.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Cargar fotografía de etiqueta</h4>
                                        <fieldset class="form-group">
                                            <input type="file" name="img" class="form-control-file" id="exampleInputFile">
                                        </fieldset>
                                        <p>NOTA: Si no quiere cambiar la imagen de perfil no seleccione nada, si cambiara la imagen, que el nombre no contenga espacios.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Editar mi cuenta</h4>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" id="nombre" name="nombre" class="form-control"
                                                            placeholder="Nombre" value="<?=$user->nombre?>" autocomplete="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="sexo" id="sexo" class="form-control"
                                                            placeholder="Sexo" value="<?=$user->sexo?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="edad" id="edad" class="form-control"
                                                            placeholder="Edad" value="<?=$user->edad?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="domicilio" id="domicilio" class="form-control"
                                                            placeholder="Domicilio" value="<?=$user->domicilio?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="cp" id="cp" class="form-control"
                                                            placeholder="Codigo postal" value="<?=$user->cp?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="user" id="user" class="form-control"
                                                            placeholder="Usuario" value="<?=$user->user?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <input type="text" name="cel" id="cel" class="form-control"
                                                            placeholder="Num. celular" value="<?=$user->cel?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-right">
                                                <input type="text" value="editar-perfil" name="accion" style="display: none;">
                                                <button type="submit" class="btn btn-info">Guardar</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12" id="perfil">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php if($user->imagen != ""): ?>
                                    <img src="<?=$user->imagen?>" alt="user" id="img" class="rounded-circle" width="100" >
                                <?php else: ?>
                                    <img src="assets/images/usuariodefault.jpg" alt="user" id="img" class="rounded-circle" width="100" >
                                <?php endif; ?>
                                <br>
                                <br>                               
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Información de mi cuenta</h4>
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="nombre" class="form-control"
                                                        placeholder="Nombre" value="<?=$user->nombre?>" autocomplete="off" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="sexo" class="form-control"
                                                        placeholder="Sexo" value="<?=$user->sexo?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="edad" class="form-control"
                                                        placeholder="Edad" value="<?=$user->edad?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="domicilio" class="form-control"
                                                        placeholder="Domicilio" value="<?=$user->domicilio?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="cp" class="form-control"
                                                        placeholder="Codigo postal" value="<?=$user->cp?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="user" class="form-control"
                                                        placeholder="Usuario" value="<?=$user->user?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <input type="text" name="cel" class="form-control"
                                                        placeholder="Num. celular" value="<?=$user->cel?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button id="editar_perfil" class="btn btn-info">Editar</button>
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