<div class="main-content-inner">
    <?= $this->session->flashdata('message'); ?>
    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#iconsModalCenter">
        Add icons
    </button>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Name icons</th>
                <th scope="col">images</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <tr>
                <?php foreach ($icons as $i) : ?>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $i['name']; ?></td>
                    <td><?= $i['name_icons']; ?></td>
                    <td><i class="<?= $i['name_icons']; ?>"></i></td>
                    <td>
                        <a href="<?= base_url(); ?>menu/up_icons/<?= $i['id']; ?>" class=" badge badge-primary">update</a>
                        <a href="<?= base_url(); ?>menu/del_icons/<?= $i['id']; ?>" class=" badge badge-danger" onclick="return confirm('want to delete this icons?');">delete</a>
                    </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('menu'); ?>" type="button" class="btn btn-secondary"><i class="ti-arrow-left"></i> Back</a>

</div>


</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->
<!-- Modal icons-->
<div class="modal fade" id="iconsModalCenter" tabindex="-1" role="dialog" aria-labelledby="iconsModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="iconsModalCenterTitle">Create Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/icons'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="example: Dashboard">
                    </div>
                    <div class="form-group">
                        <label for="name">Icons name</label>
                        <input type="text" class="form-control" id="i_name" name="i_name" placeholder="example: ti-dashboard">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add icons</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end icons modal -->