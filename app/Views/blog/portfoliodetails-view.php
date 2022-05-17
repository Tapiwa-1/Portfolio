<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Portfolio Details</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="portfolio.html">Portfolio</a>
                    <a href="portfolio-details.html">Portfolio Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!--================Start Portfolio Details Area =================-->
<?php if (isset($projects)) : ?>
    <section class="portfolio_details_area section_gap">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left_img">
                            <img class="img-fluid" src="<?= $projects['img']; ?>" style="width: 500px;" alt="">
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5">
                        <div class="portfolio_right_text mt-30">
                            <h4 class="text-uppercase"><?= $projects['name']; ?></h4>
                            <?= $projects['details'] ?>
                            <ul class="list">
                                <li><span>Client</span>: colorlib</li>
                                <li><span>Website</span>:<?= $projects['githublink']; ?> </li>
                                <li><span>Completed</span>:<?= $projects['finishdate']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?= $projects['moredetails']; ?>
            </div>
        </div>
    </section>

<?php endif ?>
<!--================End Portfolio Details Area =================-->
<?= $this->endSection('content') ?>