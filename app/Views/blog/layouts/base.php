<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--
            <link rel="icon" href="<?= base_url() ?>/public/assets/portfolio/img/favicon.png" type="<?= base_url() ?>/public/assets/portfolio/image/png">
    -->
    <title>Tapiwa Motsi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/vendors/nice-select/css/nice-select.css">
    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url() ?>/public/assets/portfolio/css/style.css">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>

    <!--================ Start Header Area =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href=""><img src="<?= base_url() ?>/public/assets/portfolio/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <?php if (str_contains(current_url(), 'home')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                            <?php else : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                            <?php endif ?>
                            <?php if (str_contains(current_url(), 'about')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/home/about">About</a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/home/about">About</a></li>
                            <?php endif ?>
                            <?php if (str_contains(current_url(), 'services')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/home/services">Services</a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/home/services">Services</a></li>
                            <?php endif ?>
                            <?php if (str_contains(current_url(), 'home/portfolio')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/home/portfolio">Portfolio</a></li>
                            <?php else : ?>
                                <li class="nav-item "><a class="nav-link" href="<?= base_url() ?>/home/portfolio">Portfolio</a></li>
                            <?php endif ?>
                            <?php if (str_contains(current_url(), 'blog')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/home/blog">Blog</a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/home/blog">Blog</a></li>
                            <?php endif ?>
                            <?php if (str_contains(current_url(), 'contact')) : ?>
                                <li class="nav-item active"><a class="nav-link" href="<?= base_url() ?>/home/contact">Contact</a></li>
                            <?php else : ?>
                                <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>/home/contact">Contact</a></li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ End Header Area =================-->
    <!--Page Contents here--->
    <?= $this->renderSection("content"); ?>

    <!--Page Contents here--->
    <!--================Footer Area =================-->
    <footer class="footer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="footer_top flex-column">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="<?= base_url() ?>/public/assets/portfolio/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer_bottom justify-content-center">
                <p class="col-lg-8 col-sm-12 footer-text">
                    Tapiwa Motsi
                </p>
            </div>
        </div>
    </footer>
    <!--================End Footer Area =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url() ?>/public/assets/portfolio/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/popper.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/stellar.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/vendors/isotope/isotope-min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/gmaps.min.js"></script>
    <script src="<?= base_url() ?>/public/assets/portfolio/js/theme.js"></script>
</body>

</html>