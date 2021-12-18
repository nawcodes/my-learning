<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>
        <div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create</a>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>image</th>
                            <th>uuid</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>image</th>
                            <th>uuid</th>
                            <th>name</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $row => $u) : ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <th class="text-center">
                                    <img src="<?= $u['image'] ?>" alt="" class=" rounded" width="50">
                                </th>
                                <th><?= $u['uuid'] ?></th>
                                <th><?= $u['name'] ?></th>
                                <th><?= $u['email'] ?></th>
                                <th><?= $u['phone'] ?></th>
                                <th class="text-center">
                                    <a href="" class="text-danger"><i class="fas fa-eye"></i></a>
                                    <a href="" class="text-primary"><i class="fas fa-edit"></i></a>
                                    <a href="" class="text-danger"><i class="fas fa-trash"></i></a>
                                </th>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection('content'); ?>