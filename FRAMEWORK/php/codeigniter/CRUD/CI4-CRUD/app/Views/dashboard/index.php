<!--
    FILE INI ADALAH TAMPILAN CONTENT YANG SUDAH DIPISAHKAN DARI FILE ASLINYA.
 -->

<!-- extend adalah layaknya file ini di export untuk bisa di panggil di file yang lainnya.   -->
<?= $this->extend('templates/app'); ?>

<!-- section adalah untuk membungkus file di dalamnya  -->
<?= $this->section('content'); ?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800"><?= $subtitle ?></h1>
    <div>
        <a href="/data/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Create</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Print Report</a>
    </div>
</div>


<?php if (session()->getFlashdata()) :  ?>
    <div class="alert alert-primary" role="alert">
        <?php foreach (session()->getFlashdata() as $sess) :  ?>
            <?= $sess ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

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
                    <!-- perulangan dari $data['users'] yang di kirim di controller -->
                    <?php $no = 1;
                    foreach ($users as $row => $u) : ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <th class="text-center">
                                <img src="/assets/image/<?= $u['image'] ?>" alt="" class=" rounded" width="50">
                            </th>
                            <th><?= $u['uuid'] ?></th>
                            <th><?= $u['name'] ?></th>
                            <th><?= $u['email'] ?></th>
                            <th><?= $u['phone'] ?></th>
                            <form action="/data/<?= $u['uuid'] ?>" method="post" class="">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <th class="text-center">
                                    <a href="" class="text-danger"><i class="fas fa-eye"></i></a>
                                    <a href="/data/edit/<?= $u['uuid'] ?>" class="text-primary"><i class="fas fa-edit"></i></a>
                                    <button type="submit" style="border:none; background:transparent;" class="text-danger" onclick="return confirm('Are you sure wanna delete this data?')"><i class="fas fa-trash"></i></button>
                                </th>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?= $this->endSection('content'); ?>
<!-- endSection adalah penutup bungkus dari html di atas. -->