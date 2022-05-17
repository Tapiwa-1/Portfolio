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
            <label for="">Project Name</label>
            <input type="text" name="projectname" id="" class="form-control" required value="<?= $project['name'] ?>">
        </div>
        <div class="form-group">
            <label for="">Project finish date</label>
            <input type="text" name="finishdate" id="" class="form-control" required value="<?= $project['finishdate'] ?>">
        </div>
        <div class="form-group">
            <label for="">Project Details</label>
            <textarea name="details" id="" cols="30" rows="10" class="form-control" required><?= $project['details'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Project More Details</label>
            <textarea name="moredetails" id="" cols="30" rows="10" class="form-control" required><?= $project['moredetails'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">GitHub Link</label>
            <input type="text" name="githublink" id="" class="form-control" required value="<?= $project['githublink'] ?>">
        </div>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="all" value="all" checked>
            <label class="form-check-label" for="flexSwitchCheckDefault">All</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="latest" value="latest">
            <label class="form-check-label" for="flexSwitchCheckChecked">latest</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="upcoming" value="upcoming">
            <label class="form-check-label" for="flexSwitchCheckChecked">upcoming</label>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="finished" value="finished">
            <label class="form-check-label" for="flexSwitchCheckChecked">Finished</label>
        </div>
        <div class="form-group">
            <input type="submit" value="Change" class="btn btn-primary w-100">
        </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection('content') ?>