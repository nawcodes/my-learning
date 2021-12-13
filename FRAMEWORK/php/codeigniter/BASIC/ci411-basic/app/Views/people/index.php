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
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary"  type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
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
                    <?php $i = 1 + (5 * ($currentPage - 1));  foreach ($people as $key => $row) :  ?>
                        <tr>
                            <th scope="row"><?= $i++  ?></th>
                            <td><img src="https://source.unsplash.com/random" alt="" width="100"></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['updated_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('people', 'people_paginate') ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>