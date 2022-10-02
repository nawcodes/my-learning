<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- page container area start -->
<div class="page-container"> 
    <!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <h3 class="text-white">CodeIgniter<sup>fire</sup></h3>
                <p class="text-white">v1.0</p>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    <ul class="metismenu" id="menu">
                        <?php
                        /* Menu */
                        $roleUser = $this->session->userdata('role_id');
                        $queryMenu = "SELECT user_menu.id, menu , user_menu.icons 
                                     FROM user_menu
                                      JOIN user_access_menu  
                                     ON user_menu.id = user_access_menu.menu_id
                                    WHERE user_access_menu.role_id = $roleUser";
                        $menu = $this->db->query($queryMenu)->result_array();
                        /* SUB MENU */

                        ?>
                        <?php foreach ($menu as $m) : ?>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="<?= $m['icons']; ?>"></i> <span><?= $m['menu']; ?></span></a>
                                <ul class="collapse">
                                    <?php
                                        $querySubMenu = "SELECT * FROM user_submenu
                                                        WHERE menu_id = {$m['id']} AND user_submenu.is_active = 1 ";
                                        $subMenu = $this->db->query($querySubMenu)->result_array();
                                        ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                        <li class="active"><a href="<?= base_url($sm['url']); ?>"><?= $sm['name']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li> 
                            <?php endforeach; ?>
                            <?php 
                            $query_menusg = "SELECT * FROM user_menu_single 
                                            JOIN user_access_menu ON user_menu_single.id = user_access_menu.menu_sid 
                                WHERE user_access_menu.role_id = {$roleUser}";
                            $menu_sg = $this->db->query($query_menusg)->result_array();
                            ?>
                            <?php foreach ($menu_sg as $msg) : ?>

                            <li><a href="<?= base_url($msg['url']);?>"><i class="<?= $msg['icons_sg']; ?>"></i> <span><?= $msg['name']; ?></span></a></li>
                            <?php endforeach;?>                            
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- sidebar menu area end -->