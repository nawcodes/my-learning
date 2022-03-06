<div class="main-content-inner">



    <!-- Button trigger modal -->
    <?= form_error('name', '<div class="text-danger">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="my-2">
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#menuModalCenter">
            Add menu
        </button>
    </div>



    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Menu name</th>
                <th scope="col">Icons | <a href="<?= base_url('menu/seeIcons') ?>" class=" badge badge-primary">see all</a>
                </th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($menu as $m) :  ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $m['menu']; ?></td>
                    <td><?= $m['icons']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>menu/update/<?= $m['id']; ?>" class=" badge badge-primary">update</a>
                        <a href="<?= base_url(); ?>menu/delete/<?= $m['id']; ?>" class=" badge badge-danger" onclick="return confirm('want to delete this menu?');">delete</a>
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
<div class="modal fade" id="menuModalCenter" tabindex="-1" role="dialog" aria-labelledby="menuModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuModalCenterTitle">Create Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu'); ?>" method="post">
                    <div class="form-group">
                        <label for="name">Menu name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="menu name . .">
                    </div>
                    <div class="form-group">
                        <label for="icons">Icons</label>
                        <select class="form-control" id="icons" name="icons">
                            <?php foreach ($icons as $i) : ?>
                                <option value="<?= $i['name_icons']; ?>"><?= $i['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
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