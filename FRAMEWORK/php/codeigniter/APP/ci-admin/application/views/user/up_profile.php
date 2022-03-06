<div class="main-content-inner">


<div class="col-lg-8">
    <?= form_open_multipart('user/update_profile');?>
<div class="form-group mt-3">
    <label for="email">Email address</label>
    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'];?>" readonly>
  </div>
  <div class="form-group">
    <label for="name">Full name</label>
    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'];?>">
    <?= form_error('name', '<p class="text-danger">', '</p>'); ?>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Picture</div>
    <div class="col-sm-10">
        <div class="row">
          <div class="col-sm-3">
          <img src="<?= base_url('assets/images/profile/') . $user['images'];?>" class="img-thumbnail">
          </div>
          <div class="col-sm-9">
           <div class="custom-file">
              <input type="file" class="custom-file-input" id="image"  name="image">
              <label class="custom-file-label" for="image">Choose file</label>
            </div>
          </div>
        </div>
    </div>
  </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary">Update profile</button>    
    </div>
  </form>

</div>


</div>

</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->