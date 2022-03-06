<div class="main-content-inner">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">

                <form action="" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $submenu['id']; ?>">
                    <div class="form-group">
                        <label for="name">Submenu name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="submenu name . ." value="<?= $submenu['name']; ?>">
                        <?= form_error('name', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="menu">menu</label>
                        <select class="form-control" id="menu" name="menu">
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m['id'] == $submenu['menu_id']) : ?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="ex:admin/menu" value="<?= $submenu['url']; ?>">
                    </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $submenu['is_active'];?>" id="is_active" name="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Active?
                        </label>
                    </div>
                    <div class="mt-3">
                    <a href="<?= base_url('menu/submenu'); ?>" type="button" class="btn btn-secondary">back</a>
                    <button type="submit" class="btn btn-primary">Update menu</button>
                </div>
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


