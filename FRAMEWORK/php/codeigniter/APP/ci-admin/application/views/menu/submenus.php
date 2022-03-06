<div class="main-content-inner">



    <!-- Button trigger modal -->
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="my-2">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#submenuModalCenter">
            Add Submenu
        </button>
    </div>



    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Menu</th>
                <th scope="col">Url</th>
                <th scope="col">Active</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($submenu as $sm) :  ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $sm['name']; ?></td>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['is_active']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>menu/up_sm/<?= $sm['id']; ?>" class=" badge badge-primary">update</a>
                        <a href="<?= base_url(); ?>menu/del_sm/<?= $sm['id']; ?>" class=" badge badge-danger" onclick="return confirm('want to delete this menu?');">delete</a>
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
<div class="modal fade" id="submenuModalCenter" tabindex="-1" role="dialog" aria-labelledby="submenuModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenuModalCenterTitle">Create submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">submenu name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="menu name . .">
                    </div>
                    <div class="form-group">
                        <label for="icons">Menu</label>
                        <select class="form-control" id="menu" name="menu">
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="ex:admin/menu">
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active" >
                            Active?
                        </label>
                    </div>
                                            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add menu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end menu modal -->