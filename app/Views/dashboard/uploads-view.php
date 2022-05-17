<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of your blogs here</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (session()->getTempdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
                <?php endif ?>
                <?php if (session()->getTempdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
                <?php endif ?>
                <?php if (count($blogs) > 0) : ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Blog Name</th>
                                <th>Date Posted</th>
                                <th>Comments</th>
                                <th>Read</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cover</th>
                                <th>Blog Name</th>
                                <th>Date Posted</th>
                                <th>Comments</th>
                                <th>Read</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($blogs as $bgs) : ?>
                                <tr>
                                    <td><img src="<?= $bgs['img'] ?>" height="60" alt=""></td>
                                    <td style="font-size: 12px;"><?= $bgs['heading'] ?></td>
                                    <td><?= date('F-j-Y', strtotime($bgs['created_at'])) ?></td>
                                    <td><a href="<?= base_url() ?>/dashboard/readcomments/<?= $bgs['id'] ?>" class="btn btn-primary w-100">Read</a></td>
                                    <td><a href="<?= base_url() ?>/dashboard/readblog/<?= $bgs['id'] ?>" class="btn btn-primary w-100">Read</a></td>
                                    <td><a href="<?= base_url() ?>/dashboard/editblog/<?= $bgs['id'] ?>" class="btn btn-warning w-100">Edit</a></td>
                                    <td><a href="<?= base_url() ?>/dashboard/deleteblog/<?= $bgs['id'] ?>" class="btn btn-danger w-100">Delete</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="alert alert-danger">
                        No projects to display
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection('content') ?>