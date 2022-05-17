<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="col-md-12">
        <h3>Edit Project Here</h3>
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
            <label for="">Heading</label>
            <input type="text" name="heading" id="" class="form-control" required value="<?= $project['heading'] ?>">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control" required><?= $project['description'] ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="upload" class="btn btn-primary w-100">
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection('content') ?>