<?= $this->extend('dashboard/layouts/base.php') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome Tapiwa to your dashboard</h1>
        <!--
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        -->
    </div>
    <!-- Content Row -->
    <div class="row justify-content-md-between">
        <!-- Total Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $blogs ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-mobile fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comments Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Comments</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $comments ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comment fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Comments Posts -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Projects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $projects ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wrench fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (count($contact) > 0) : ?>
        <?php foreach (array_reverse($contact)  as $cnt) : ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td><?= $cnt['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?= $cnt['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Subject:</td>
                        <td><?= $cnt['subject'] ?></td>
                    </tr>
                    <tr>
                        <td>Message:</td>
                        <td><?= $cnt['message'] ?></td>
                    </tr>
                    <tr>
                        <td>Date:</td>
                        <td><?= date('F-j-Y', strtotime($cnt['created_at'])) ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach ?>
    <?php else : ?>
    <?php endif ?>
</div>
<?= $this->endSection('content') ?>