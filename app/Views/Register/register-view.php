<?= $this->extend('Register/layouts/base.php') ?>
<?= $this->section('content') ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                        <?php endif ?>
                        <?php if (session()->getTempdata('success')) : ?>
                            <div class="alert alert-success" style="border-radius: 25px;"><?= session()->getTempdata('success') ?></div>
                        <?php endif ?>
                        <?php if (session()->getTempdata('error')) : ?>
                            <div class="alert alert-danger" style="border-radius: 25px;"><?= session()->getTempdata('error') ?></div>
                        <?php endif ?>
                        <form class="user" method="post" accept-charset="utf-8">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="firstname" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lastname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="confirmpassword" required>
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn btn-primary btn-user btn-block">
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="<?= base_url() ?>/register">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection('content') ?>