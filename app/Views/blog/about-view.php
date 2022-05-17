<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>About Us</h2>
                <div class="page_link">
                    <a href="<?= base_url() ?>">Home</a>
                    <a href="">About</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->
<?php foreach ($about as $abt) : ?>
    <!--================ Start About Us Area =================-->
    <section class="about_area section_gap">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-5">
                    <div class="about_img">
                        <img class="" src="<?= base_url() ?>/public/assets/portfolio/img/about-us.png" alt="">
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-5">

                    <div class="main_title text-left">
                        <h2>let’s <br>
                            Introduce about <br>
                            myself
                        </h2>

                        <?= $abt['introduction'] ?>
                        <?= $abt['history']; ?>
                        <a class="primary_btn" href="<?= base_url() ?>/home/contact"><span>Hire Me</span></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================ End About Us Area =================-->
    <!--================ Srart Brand Area =================-->
    <section class="brand_area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo1.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo2.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo3.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo4.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo5.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo6.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo7.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo8.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-brand-item d-table">
                                <div class="d-table-cell text-center">
                                    <img src="<?= base_url() ?>/public/assets/portfolio/img/brands/logo9.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offset-lg-2 col-lg-4 col-md-6">
                    <div class="client-info">
                        <div class="d-flex mb-50">
                            <span class="lage"><?= $abt['experience'] ?></span>
                            <span class="smll">Years Experience Working</span>
                        </div>
                        <div class="call-now d-flex">
                            <div>
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="ml-15">
                                <p>call us now</p>
                                <h3><?= $abt['phone'] ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Brand Area =================-->

<?php endforeach; ?>
<?= $this->endSection('content') ?>