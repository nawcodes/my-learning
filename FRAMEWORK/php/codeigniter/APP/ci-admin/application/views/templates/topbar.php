 <!-- main content area start -->
 <div class="main-content">
     <!-- header area start -->
     <div class="header-area">
         <div class="row align-items-center">
             <!-- nav and search button -->
             <div class="col-md-6 col-sm-8 clearfix">
                 <div class="nav-btn pull-left">
                     <span></span>
                     <span></span>
                     <span></span>
                 </div>
             </div>
             <!-- profile info & task notification -->
             <div class="col-md-6 col-sm-4 clearfix">
                 <ul class="notification-area pull-right">
                     <li id="full-view"><i class="ti-fullscreen"></i></li>
                     <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                     <li class="dropdown">
                         <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                             <span>2</span>
                         </i>
                         <div class="dropdown-menu bell-notify-box notify-box">
                             <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                             <div class="nofity-list">
                                 <a href="#" class="notify-item">
                                     <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                     <div class="notify-text">
                                         <p>You have Changed Your Password</p>
                                         <span>Just Now</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </li>
                     <li class="dropdown">
                         <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                         <div class="dropdown-menu notify-box nt-enveloper-box">
                             <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                             <div class="nofity-list">
                                 <a href="#" class="notify-item">
                                     <div class="notify-thumb">
                                         <img src="assets/images/author/author-img1.jpg" alt="image">
                                     </div>
                                     <div class="notify-text">
                                         <p>Aglae Mayer</p>
                                         <span class="msg">Hey I am waiting for you...</span>
                                         <span>3:15 PM</span>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </li>
                     <li class="settings-btn">
                         <i class="ti-settings"></i>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!-- header area end -->
     <!-- page title area start -->
     <div class="page-title-area">
         <div class="row align-items-center">
             <div class="col-sm-6">
                 <div class="breadcrumbs-area clearfix">

                     <h4 class="page-title pull-left"><?= $titleM[0]; ?></h4>
                     <ul class="breadcrumbs pull-left">
                         <li><a href=""> <?= $titleM[1]; ?></a></li>
                         <li><span><?= $titleM[0]; ?></span></li>
                     </ul>

                 </div>
             </div>
             <div class="col-sm-6 clearfix">
                 <div class="user-profile pull-right">
                     <img class="avatar user-thumb" src="<?= base_url(); ?>assets/images/profile/<?= $user['images']; ?>">
                     <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $user['name']; ?><i class="fa fa-angle-down"></i></h4>
                     <div class="dropdown-menu">
                         <a class="dropdown-item" href="#">Message</a>
                         <a class="dropdown-item" href="#">Settings</a>
                         <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Log Out</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- page title area end -->