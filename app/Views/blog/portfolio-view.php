<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Portfolio</h2>
                <div class="page_link">
                    <a href="<?= base_url() ?>">Home</a>
                    <a href="">Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!--================Start Portfolio Area =================-->
<section class="portfolio_area" id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_title text-left">
                    <h2>quality work <br>
                        Recently done project </h2>
                </div>
            </div>
        </div>
        <div class="filters portfolio-filter">
            <ul>
                <li class="active" data-filter="*">all</li>
                <li data-filter=".finished">finished</li>
                <li data-filter=".latest"> latest</li>
                <li data-filter=".upcoming">upcoming</li>
            </ul>
        </div>

        <div class="filters-content">
            <div class="row portfolio-grid justify-content-center">
                <!---Output start--->
                <?php if (count($projects) > 0) : ?>
                    <?php foreach ($projects as $pjts) : ?>
                        <div class="col-lg-4 col-md-6 <?= $pjts['status'] ?>">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100" src="<?= $pjts['img'] ?>" alt="">
                                    <div class="overlay"></div>
                                    <a href="<?= $pjts['img'] ?>" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4><a href="<?= base_url() ?>/home/portfoliodetails/<?= $pjts['id'] ?>"><?= $pjts['name'] ?></a></h4>
                                    <?= $pjts['details'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="alert alert-danger">Nothing here</div>
                <?php endif ?>
                <!---Output end--->
            </div>
        </div>
    </div>
</section>
<!--================End Portfolio Area =================-->
<?= $this->endSection('content') ?>