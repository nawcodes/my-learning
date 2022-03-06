<div class="main-content-inner">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">

                <form action="" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $menu['id']; ?>">
                    <div class="form-group">
                        <label for="name">Menu name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="menu name . ." value="<?= $menu['menu']; ?>">
                        <?= form_error('name', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="icons">Icons</label>
                        <select class="form-control" id="icons" name="icons">
                            <?php foreach ($icons as $i) : ?>
                                <?php if ($i['name_icons'] == $menu['icons']) : ?>
                                    <option value="<?= $i['name_icons']; ?>" selected><?= $i['name']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $i['name_icons']; ?>"><?= $i['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <a href="<?= base_url('admin/menu'); ?>" type="button" class="btn btn-secondary">back</a>
                    <button type="submit" class="btn btn-primary">Update menu</button>
                </form>
            </div>
        </div>
    </div>

</div>


</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->