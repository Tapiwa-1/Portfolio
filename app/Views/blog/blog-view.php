<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Blog</h2>
                <div class="page_link">
                    <a href="<?= base_url() ?>">Home</a>
                    <a href="">Our Blog</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->
<!--================Blog Categorie Area =================-->

<!--================Blog Area =================-->
<section class="blog_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (count($blog) > 0) : ?>
                    <?php foreach (array_reverse($blog)  as $bgs) : ?>
                        <div class="blog_left_sidebar">
                            <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                            <li><a href="<?= base_url() ?>/home/blogdetails/<?= $bgs['id'] ?>">Tapiwa Motsi<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="<?= base_url() ?>/home/blogdetails/<?= $bgs['id'] ?>"><?= date('F-j-Y', strtotime($bgs['created_at'])) ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <!---Output start--->

                                    <div class="blog_post">
                                        <img src="<?= $bgs['img'] ?>" alt="" class="img-fluid" style="width: 550px;">
                                        <div class="blog_details">
                                            <a href="<?= base_url() ?>/home/blogdetails/<?= $bgs['id'] ?>">
                                                <?= $bgs['heading'] ?>
                                            </a>
                                            <?= $bgs['introduction'] ?>
                                            <a href=" <?= base_url() ?>/home/blogdetails/<?= $bgs['id'] ?>" class="primary_btn"><span>View More</span></a>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <p class="danger">No posts available yet</p>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<?= $this->endSection('content') ?>