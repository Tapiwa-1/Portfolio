<?= $this->extend('blog/layouts/base.php') ?>
<?= $this->section('content') ?>

<!--================ Start Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Contact Us</h2>
                <div class="page_link">
                    <a href="index.html">Home</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <div class="row">
            <?php foreach ($about as $abt) : ?>
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Harare, Zimbabwe</h6>
                            <p>Wessex dr Mabelreign</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#"><?= $abt['phone'] ?></a></h6>
                            <p>Mon to Fri 9am to 6 pm</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#"><?= $abt['email'] ?></a></a></h6>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-9">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif ?>
                <?php if (session()->getTempdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif ?>
                <form class="row contact_form" method="post" accept-charset="utf-8">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary_btn">
                            <span>Send Message</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</section>
<!--================Contact Area =================-->
<?= $this->endSection('content') ?>