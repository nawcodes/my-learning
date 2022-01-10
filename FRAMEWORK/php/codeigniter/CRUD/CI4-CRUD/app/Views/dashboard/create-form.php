<?= $this->extend('templates/app'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12 mb-3">
    <form action="/data/save" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-lg">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= old('email') ?>">
                    <div class="form-text text-danger">
                        <?php if ($validation->hasError('email')) : ?>
                            <?= $validation->getError('email') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= old('name') ?>">
                    <div class="form-text text-danger">
                        <?php if ($validation->hasError('name')) : ?>
                            <?= $validation->getError('name') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone" value="<?= old('phone') ?>">
                    <div class="form-text text-danger">
                        <?php if ($validation->hasError('phone')) : ?>
                            <?= $validation->getError('phone') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Photo</label>
                    <input class="form-control form-control-sm" name="image" id="image" type="file">
                    <div class="form-text text-danger">
                        <?php if ($validation->hasError('image')) : ?>
                            <?= $validation->getError('image') ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <a href="/" class="btn btn-primary btn-block">Kembali</a>
        <button type="submit" class="btn btn-info btn-block">Save</button>
    </form>
</div>



<?= $this->endSection('content'); ?>