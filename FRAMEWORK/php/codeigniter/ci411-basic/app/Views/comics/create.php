<?=

$this->extend('layouts/app');

?>


<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2>Create Form Data</h2>
            <form action="/comics/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Comics Name</span>
                    <input type="text" class="form-control " name="title" value="<?= old('title') ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <div class="">
                        <?php if ($validation->hasError('title')) : ?>
                            <?= $validation->getError('title') ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Writer</span>
                    <input type="text" class="form-control" name="writer" value="<?= old('writer') ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <div class="">

                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Publisher</span>
                    <input type="text" class="form-control" name="publisher" value="<?= old('publisher') ?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <div class="">

                    </div>
                </div>
                <div class="input-group mb-3 row">
                    <div col-sm-2>
                        <figure>
                            <img src="/img/default.jpg" class="img-thumbnail img-preview">
                            <figcaption id="cover-label"></figcaption>
                        </figure>
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" name="cover" id="cover" class="form-control" id="inputGroupFile02" onchange="previewImage()">
                        </div>
                        <div class="">
                            <?php if ($validation->hasError('cover')) : ?>
                                <?= $validation->getError('cover') ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>