<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Services</h2>
                <div class="page_link">
                    <a href="<?= base_url() ?>">Home</a>
                    <a href="">Services</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->
<!--================ Start Features Area =================-->
<?php if (count($projects) > 0) : ?>
    <section class="features_area">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>service offers </h2>
                        <p>
                            please go through some of the services l offer to you when dealing with your projects
                        </p>
                    </div>
                </div>
            </div>

            <div class="row feature_inner">
                <?php foreach ($projects as $pjts) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature_item">
                            <img src="<?= $pjts['img'] ?>" height="80" alt="">
                            <h4><?= $pjts['heading'] ?></h4>
                            <p><?= $pjts['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>
<!--================ End Features Area =================-->
<?= $this->endSection('content') ?>