<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="container">
        <h3><?= $blogs['heading'] ?></h3>
        <img src="<?= $blogs['img'] ?>" alt="" class="img-fluid">
        <?= $blogs['introduction'] ?>
        <?= $blogs['body'] ?>
    </div>



</div>
<?= $this->endSection('content') ?>