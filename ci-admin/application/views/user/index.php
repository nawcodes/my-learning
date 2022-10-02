    <div class="main-content-inner mt-4">

            <?=  $this->session->flashdata('message');?>

        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url(); ?>assets/images/profile/<?= $user['images']; ?>" class="card-img mt-3 pl-2" alt="images">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['name']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <?php
                        $queryRole = "SELECT user_role.role FROM user_role JOIN user ON user_role.id = user.role_id WHERE user.role_id = {$user['role_id']}";
                        $role = $this->db->query($queryRole)->row_array();
                        ?>
                        <?php foreach ($role as $r) : ?>
                            <p class="card-text"><small class=""><?= $r; ?></small></p>
                        <?php endforeach; ?>
                        <a href="<?= base_url('user/update_profile/')?>" class="btn btn-primary btn-sm text-white">update</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- row area start-->
    </div>
    </div>
    <!-- main content area end -->