<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>
<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Blog Details</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="blog.html">Blog</a>
                    <a href="single-blog.html">Blog Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= $blog['img'] ?>" alt="" style="width:720px">
                        </div>
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <li><a href="#">Tapiwa Motsi<i class="lnr lnr-user"></i></a></li>
                                <li><a href="#"><?= date('F-j-Y', strtotime($blog['created_at'])) ?><i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li>
                            </ul>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <?= $blog['heading'] ?>
                        <?= $blog['introduction'] ?>
                        <?= $blog['body'] ?>
                    </div>
                </div>
                <?php if (count($comments) > 0) : ?>
                    <div class="comments-area">
                        <h4>Comments</h4>
                        <div class="comment-list">
                            <?php foreach (array_reverse($comments)  as $cmt) : ?>
                                <?php if ($cmt['blog'] == $blog['id']) : ?>
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex w-100">
                                            <div class="desc">
                                                <h5><?= $cmt['username'] ?></h5>
                                                <p class="comment">
                                                    <?= $cmt['comment'] ?>
                                                </p>
                                                <?php if ($cmt['reply'] != '') : ?>
                                                    <h5 style="margin-left: 20px;">Tapiwa</h5>
                                                    <p class="comment" style="margin-left: 20px;">
                                                        <?= $cmt['reply'] ?>
                                                    </p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif ?>
                    <?php if (session()->getTempdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                    <?php endif ?>
                    <?php if (session()->getTempdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                    <?php endif ?>
                    <?= form_open(); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Enter your comment please" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
                    </div>
                    <input type="submit" value="POST COMMENT" class="primary-btn primary_btn w-100">
                    <?= form_close() ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget author_widget">
                        <?php foreach ($about as $abt) : ?>
                            <img class="author_img rounded-circle" src="<?= $abt['img'] ?>" alt="" style="width: 100px;">
                            <h4> <?= $abt['fullname'] ?></h4>
                            <p>Full Stack developer</p>
                            <?= $abt['introduction'] ?>
                            <div class="br"></div>
                        <?php endforeach; ?>
                    </aside>
                    <aside class="single_sidebar_widget ads_widget">
                        <a href="#"><img class="img-fluid" src="<?= base_url() ?>/public/assets/portfolio/img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>

                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
<?= $this->endSection('content') ?>