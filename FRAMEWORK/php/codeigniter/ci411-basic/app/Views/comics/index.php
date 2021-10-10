<?= $this->extend('layouts/app');
?>
<?= $this->section('content'); ?>

<style>
    .table>tbody>tr>* {
        vertical-align: middle;
    }
</style>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <a href="/comics/create" class="btn btn-primary">Create Comics</a>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-primary" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comics as $key => $row) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><img src="https://source.unsplash.com/random" alt="" width="100"></td>
                            <td><?= $row['title'] ?></td>
                            <td>
                                <a href="/comics/<?= $row['slug'] ?>" class="badge badge-sm bg-danger">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>