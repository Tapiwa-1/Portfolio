<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Home Banner Area =================-->

<section class="home_banner_area">

    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner_content">
                        <h3 class="text-uppercase">Hell0</h3>
                        <h1 class="text-uppercase">I am Tapiwa Motsi</h1>
                        <h5 class="text-uppercase">FullStack developer</h5>
                        <div class="d-flex align-items-center">
                            <a class="primary_btn" href="<?= base_url() ?>/home/contact"><span>Hire Me</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home_right_img">
                        <img class="" src="<?= base_url() ?>/public/assets/portfolio/img/banner/home-right.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->



<?= $this->endSection('content') ?>