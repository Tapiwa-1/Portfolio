<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of your projects</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php if (session()->getTempdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                    <?php endif ?>
                    <?php if (session()->getTempdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                    <?php endif ?>
                    <?php if (count($projects) > 0) : ?>
                        <thead>
                            <tr>
                                <th>heading</th>
                                <th>description</th>
                                <th>img</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>heading</th>
                                <th>description</th>
                                <th>img</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($projects as $pjts) : ?>
                                <tr>
                                    <td><?= $pjts['heading'] ?></td>
                                    <td><?= $pjts['description'] ?></td>
                                    <td><img src="<?= $pjts['img'] ?>" height="30" alt=""></td>
                                    <td><a href="<?= base_url() ?>/dashboard/editservice/<?= $pjts['id'] ?>" class="btn btn-warning btn-sm w-100">Edit</a></td>
                                    <td><a href="<?= base_url() ?>/dashboard/deleteservice/<?= $pjts['id'] ?>" class="btn btn-danger btn-sm w-100">Delete</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    <?php else : ?>
                        <div class="alert alert-danger">
                            No projects to display
                        </div>
                    <?php endif ?>


                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection('content') ?>