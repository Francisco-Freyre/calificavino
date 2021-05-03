<!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link" href="index.php"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Inicio
                                </span></a>
                        </li>
                        <?php if($_SESSION['identity']->id == 3143): ?>
                        <li class="sidebar-item"> <a class="sidebar-link" href="cargar-vinos.php"
                                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                                    class="hide-menu">Cargar vinos
                                </span></a>
                        </li>
                        <?php endif; ?>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="catas.php"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu">Mis Catas</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="vino.php"
                                aria-expanded="false"><i data-feather="check" class="feather-icon"></i><span
                                    class="hide-menu">Nueva Cata</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="network.php"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">Wine Comunity</span></a></li>
                        <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">