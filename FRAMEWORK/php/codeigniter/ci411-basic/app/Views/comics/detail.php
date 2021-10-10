<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://source.unsplash.com/random" alt="..." width="200">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comics['title'] ?></h5>
                            <p class="card-text"><?= $comics['writer'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $comics['publisher'] ?></small></p>
                            <a href="<?= base_url('comics') ?>" class="btn btn-primary">Kembali</a>
                            <form action="/comics/<?= $comics['id'] ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE"> 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');">Delete</button>
                            </form>
                            <a href="/comics/edit/<?= $comics['slug']; ?>" class="btn btn-warning">Edit</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>