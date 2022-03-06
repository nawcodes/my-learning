<div class="main-content-inner">



    <!-- Button trigger modal -->
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="my-2">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#roleModalCenter">
            Add role
        </button>
    </div>



    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Role name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($role as $r) :  ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $r['role']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>admin/role_access/<?= $r['id']; ?>" class=" badge badge-warning">access</a>
                        <a href="<?= base_url(); ?>admin/role_update/<?= $r['id']; ?>" class=" badge badge-primary">update</a>
                        <a href="<?= base_url(); ?>admin/role_delete/<?= $r['id']; ?>" class=" badge badge-danger" onclick="return confirm('want to delete this menu?');">delete</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>


</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->

<!-- Modal -->
<div class="modal fade" id="roleModalCenter" tabindex="-1" role="dialog" aria-labelledby="roleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="roleModalCenterTitle">Create Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/role'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Role name</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="role name . .">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add role</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end menu modal -->