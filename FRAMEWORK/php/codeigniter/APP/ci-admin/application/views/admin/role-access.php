<div class="main-content-inner">

<div class="m-1"><?= $this->session->flashdata('message'); ?></div>
<h5 class="m-2"> Role : <?= $role['role'];?></h5>

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
            <?php foreach ($menu as $m) :  ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $m['menu']; ?></td>
                    <td>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'];?>" data-menu="<?= $m['id'];?>" >
                    </div>
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