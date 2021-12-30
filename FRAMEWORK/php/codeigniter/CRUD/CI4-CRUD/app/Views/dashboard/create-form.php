<?= $this->extend('templates/app'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 mb-3">
    <form action="/data/save" method="post">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone">
                </div>
            </div>
        </div>
        <a href="/" class="btn btn-primary btn-block">Kembali</a>
        <button type="submit" class="btn btn-info btn-block">Save</button>
    </form>
</div>



<?= $this->endSection('content'); ?>