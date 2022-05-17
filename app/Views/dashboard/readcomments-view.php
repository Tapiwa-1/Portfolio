<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Read comments here</h2>
    <?php if (session()->getTempdata('success')) : ?>
        <div class="alert alert-success"><?= session()->getTempdata('success') ?></div>
    <?php endif ?>
    <?php if (session()->getTempdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getTempdata('error') ?></div>
    <?php endif ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Reply</th>
                <th>Reply</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>Reply</th>
                <th>Reply</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            <?php foreach ($comments as $cmts) : ?>
                <tr>
                    <td><?= ((array)$cmts)['username'] ?></td>
                    <td><?= ((array)$cmts)['comment'] ?></td>
                    <td><?= ((array)$cmts)['reply'] ?></td>
                    <td><a href="<?= base_url() ?>/dashboard/replycomments/<?= ((array)$cmts)['id'] ?>" class="btn btn-success">Reply</a></td>
                    <td><a href="<?= base_url() ?>/dashboard/deletecomments/<?= ((array)$cmts)['id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection('content') ?>