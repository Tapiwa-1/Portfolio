<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">View your personal Information here</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (session()->getTempdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif ?>
                <?php if (count($about) > 0) : ?>
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Attribute</th>
                                <th>Value</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($about as $bgs) : ?>
                                <tr class=" align-items-center">
                                    <td>Profile Picture</td>
                                    <td><img src="<?= $bgs['img'] ?>" class=" rounded-circle" height="60" alt=""></td>
                                </tr>
                                <tr>
                                    <td>My Name</td>
                                    <td><?= $bgs['fullname'] ?></td>
                                </tr>
                                <tr>
                                    <td>introduction</td>
                                    <td><?= $bgs['introduction'] ?></td>
                                </tr>
                                <tr>
                                    <td>History</td>
                                    <td><?= $bgs['history'] ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?= $bgs['email'] ?></td>
                                </tr>
                                <tr>
                                    <td>Experience</td>
                                    <td><?= $bgs['experience'] ?></td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-warning mx-auto" href="<?= base_url() ?>/dashboard/editabout/<?= $bgs['id'] ?>">Edit</a></td>
                                    <td><a class="btn btn-danger mx-auto" href="<?= base_url() ?>/dashboard/deleteabout/<?= $bgs['id'] ?>">Delete</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-danger">
                        Nothing to display
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection('content') ?>