<?= $this->extend('Register/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Activating Your account</h1>
                                </div>
                                <hr>
                                <?php if (isset($success)) : ?>
                                    <div class="alert alert-success my-5" style="border-radius: 25px; margin-top:200px !important; margin-bottom:200px !important;"><?= $success ?><a href="<?= base_url() ?>/register">LOGIN</a></div>
                                <?php endif ?>
                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger my-5" style="border-radius: 25px; margin-top:200px !important; margin-bottom:200px !important;"><?= $error ?></div>
                                <?php endif ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection('content') ?>