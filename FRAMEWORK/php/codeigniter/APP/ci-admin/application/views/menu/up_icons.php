<div class="main-content-inner">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">

                <form action="" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $icons['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex:Dashboard" value="<?= $icons['name']; ?>">
                        <?= form_error('name', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="name">Icons name</label>
                        <input type="text" class="form-control" id="i_name" name="i_name" placeholder="ex:ti-dashboard . ." value="<?= $icons['name_icons']; ?>">
                        <?= form_error('i_name', '<div class="text-danger ml-1">', '</div>'); ?>
                    </div>
                    <a href="<?= base_url('admin/seeIcons'); ?>" type="button" class="btn btn-secondary"> <i class="ti-arrow-left"></i> back</a>
                    <button type="submit" class="btn btn-primary">Update icons</button>
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