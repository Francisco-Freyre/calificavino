<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <!-- Custom CSS -->
    <link href="<?= base_url ?>assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url ?>assets/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url ?>assets/dist/css/miCss.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="<?=base_url_tienda?>">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?= base_url ?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?= base_url ?>assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <img src="<?= base_url ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                <!-- Light Logo text -->
                                <img src="<?= base_url ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- ============================================================== -->
                        <!-- Right side toggle and nav items -->
                        <!-- ============================================================== -->
                        <ul class="navbar-nav float-right">
                            <!-- ============================================================== -->
                            <!-- Search -->
                            <!-- ============================================================== -->
                            <li class="nav-item d-none d-md-block">
                                <a class="nav-link" href="javascript:void(0)">
                                    <form>
                                        <div class="customize-input">
                                            <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                                type="search" placeholder="Search" aria-label="Search">
                                            <i class="form-control-icon" data-feather="search"></i>
                                        </div>
                                    </form>
                                </a>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img src="<?= base_url ?>assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle"
                                        width="40">
                                    <span class="ml-2 d-none d-lg-inline-block"><span>Hola,</span> <span
                                            class="text-dark"><?=$_SESSION['identity']->nombre?></span> <i data-feather="chevron-down"
                                            class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    <a class="dropdown-item" href="<?=base_url_tienda?>usuario/cuenta"><i data-feather="user"
                                            class="svg-icon mr-2 ml-1"></i>
                                        Mi perfil</a>
                                    <a class="dropdown-item" href="#"><i data-feather="power"
                                            class="svg-icon mr-2 ml-1"></i>
                                        Salir</a>
                                </div>
                            </li>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                        </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->