<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tapiwa Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() . "/public/assets/dashboard/" ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() . "/public/assets/dashboard/" ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Tapiwa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php if (str_contains(current_url(), '/dash')) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php else : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if (str_contains(current_url(), '/uploadblog')) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/uploadblog">
                        <i class="fas fa-fw fa-upload"></i>
                        <span>Upload</span></a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/uploadblog">
                        <i class="fas fa-fw fa-upload"></i>
                        <span>Upload</span></a>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if (str_contains(current_url(), '/uploads')) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/uploads">
                        <i class="fas fa-fw fa-paper-plane"></i>
                        <span>Uploads</span></a>
                </li>
            <?php else : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/uploads">
                        <i class="fas fa-fw fa-paper-plane"></i>
                        <span>Uploads</span></a>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if (str_contains(current_url(), 'project')) : ?>
                <!-- Nav Item - Dashboard -->
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Project</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/project">View Projects</a>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/uploadproject">Upload Project</a>
                        </div>
                    </div>
                </li>
            <?php else : ?>
                <!-- Nav Item - Dashboard -->
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Project</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/project">View Projects</a>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/uploadproject">Upload Project</a>
                        </div>
                    </div>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if (str_contains(current_url(), '/services')) : ?>
                <!-- Nav Item - Dashboard -->
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#services" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Services</span>
                    </a>
                    <div id="services" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/services"">Upload Services</a>
                            <a class=" collapse-item" href="<?= base_url() ?>/dashboard/viewservices">Services</a>
                        </div>
                    </div>
                </li>
            <?php else : ?>
                <!-- Nav Item - Dashboard -->
                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#services" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-cogs"></i>
                        <span>Services</span>
                    </a>
                    <div id="services" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/services"">Upload Services</a>
                            <a class=" collapse-item" href="<?= base_url() ?>/dashboard/viewservices">Services</a>
                        </div>
                    </div>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if (str_contains(current_url(), '/about')) : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-user"></i>
                        <span>Project</span>
                    </a>
                    <div id="about" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/about">Edit About</a>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/viewabout">View About</a>
                        </div>
                    </div>
                </li>
            <?php else : ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#about" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-user"></i>
                        <span>About</span>
                    </a>
                    <div id="about" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Select:</h6>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/about">Edit About</a>
                            <a class="collapse-item" href="<?= base_url() ?>/dashboard/viewabout">View About</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/dashboard/logout">
                        <i class="fas fa-fw fa-door-open"></i>
                        <span>Logout</span></a>
                </li>
            <?php endif ?>
            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome Tapiwa </span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!--Page Contents here--->
                <?= $this->renderSection("content"); ?>
                <!--Page Contents here--->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() . "/public/assets/dashboard/" ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>