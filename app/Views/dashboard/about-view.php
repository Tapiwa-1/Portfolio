<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="col-md-12">
        <h3>About mySelf</h3>
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif ?>
        <?php if (session()->getTempdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
        <?php endif ?>
        <?php if (session()->getTempdata('error')) : ?>
            <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
        <?php endif ?>
        <?= form_open_multipart() ?>
        <div class="form-group">
            <label for="formFile" class="form-label">Profile Picture</label>
            <input class="form-control" type="file" id="formFile" name="profile" required>
        </div>
        <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" name="fullname" id="" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Introduction</label>
            <textarea name="introduction" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="">My History</label>
            <textarea name="history" id="" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Phone Number</label>
            <input type="text" name="phonenumber" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Work Experience</label>
            <input type="number" name="workexperience" id="" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" value="upload" class="btn btn-primary w-100">
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection('content') ?>