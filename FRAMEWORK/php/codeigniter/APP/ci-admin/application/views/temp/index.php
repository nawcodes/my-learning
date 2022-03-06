
            <!---Banner--->
            <div class="ms-banner mt-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="ms_banner_img">
                                <img src="<?= base_url('version/');?>images/banner1.png" alt="" class="img-fluid">
                            </div>
                            <div class="ms_banner_text pl-5">
                                <h1>See another movie & series </h1>
                                <h1 class="ms_color">PREMIERE HD ONLINE</h1>
                                <p>Spoil it your Eyes, Keep on watching MOVIES & SERIES On this web<br> Have a nice today...</p>
                            </div>
                        </div>
                    </div>
                </div>
								<!---Recently Played Music--->
			</div>
            <div class="ms_rcnt_slider">
                <div class="ms_heading">
                    <h1>NEW TODAY</h1>
                    <span class="veiw_all"><a href="#">view more</a></span>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach($film as $f ) : ?>
                        <div class="swiper-slide">
                            <div class="ms_rcnt_box">
                                <div class="ms_rcnt_box_img">
                                    <img src="<?= base_url('version/images/film/') . $f['image']; ?>" alt="">
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_play_icon">
                                            <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="ms_rcnt_box_text">
                                    <h3><a href="#"><?= $f['title'];?></a>
                                     <p>ON : <?= $f['last_update'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>      
                <!-- Add Arrows -->
                <div class="swiper-button-next slider_nav_next"></div>
                <div class="swiper-button-prev slider_nav_prev"></div>
            </div>
            <!---Weekly Top 15--->
            <div class="ms_weekly_wrapper">
                <div class="ms_weekly_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ms_heading">
                                <h1>weekly top 5 Movies</h1>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 padding_right40">
                                <?php $i=1;?> 
                                <?php foreach($movies as $m) : ?>
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
										0<?= $i;?>
									</span>
                                    <div class="w_top_song">
                                        <div class="w_tp_song_img">
                                            <img src="<?= base_url('version/');?>images/film/<?= $m['image'];?>" alt="" class="img-fluid">
                                            <div class="ms_song_overlay">
                                            </div>
                                            <div class="ms_play_icon">
                                                <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="w_tp_song_name">
                                            <h3><a href="#"><?= $m['title']; ?></a></h3>
                                            <p><?= $m['release_year'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly_right">
                                    <span class="w_song_time"><?=$m['length'];?> Minutes</span>
                                    <span class="ms_more_icon" data-other="1">
										<img src="<?= base_url('version/');?>images/svg/more.svg" alt="">									
									</span>
                                </div>
                                        <?php endforeach;?>
                            </div>
                            <div class="ms_divider"></div>
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
                        </div>
                    </div>
                </div>
            </div>
             <!---Weekly Top 15--->
            <div class="ms_weekly_wrapper">
                <div class="ms_weekly_inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ms_heading">
                                <h1>weekly top 5 Movies</h1>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 padding_right40">
                                <?php $i=1;?> 
                                <?php foreach($series as $s) : ?>
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
										0<?= $i;?>
									</span>
                                    <div class="w_top_song">
                                        <div class="w_tp_song_img">
                                            <img src="<?= base_url('version/');?>images/film/<?= $s['image'];?>" alt="" class="img-fluid">
                                            <div class="ms_song_overlay">
                                            </div>
                                            <div class="ms_play_icon">
                                                <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                            </div>
                                        </div>
                                        <div class="w_tp_song_name">
                                            <h3><a href="#"><?= $s['title']; ?></a></h3>
                                            <p><?= $m['release_year'];?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="weekly_right">
                                    <span class="w_song_time"><?=$s['length'];?> Minutes</span>
                                    <span class="ms_more_icon" data-other="1">
										<img src="<?= base_url('version/');?>images/svg/more.svg" alt="">									
									</span>
                                </div>
                                        <?php endforeach;?>
                            </div>
                            <div class="ms_divider"></div>
                            <div class="ms_weekly_box">
                                <div class="weekly_left">
                                    <span class="w_top_no">
                        </div>
                    </div>
                </div>
            </div>     <!----Top Genres Section Start---->
            <div class="ms_genres_wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ms_heading">
                            <h1>Genres</h1>
                            <span class="veiw_all"><a href="#">view more</a></span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ms_genres_box">
                            <img src="<?= base_url('version/');?>images/genrs/img1.jpg" alt="" class="img-fluid" />
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_play_icon">
                                    <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                </div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="#">romantic</a></span>
                                    <span class="ovrly_text2"><a href="#">view song</a></span>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="#">romantic</a></span>
                                    <span class="ovrly_text2"><a href="#">view song</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="ms_genres_box">
                                    <img src="<?= base_url('version/');?>images/genrs/img2.jpg" alt="" class="img-fluid" />
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_play_icon">
                                            <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                        </div>
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">Classical</a></span>
                                        </div>
                                    </div>
                                    <div class="ms_box_overlay_on">
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">Classical</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="ms_genres_box">
                                    <img src="<?= base_url('version/');?>images/genrs/img3.jpg" alt="" class="img-fluid" />
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_play_icon">
                                            <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                        </div>
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">hip hop</a></span>
                                        </div>
                                    </div>
                                    <div class="ms_box_overlay_on">
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">hip hop</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="ms_genres_box">
                                    <img src="<?= base_url('version/');?>images/genrs/img5.jpg" alt="" class="img-fluid" />
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_play_icon">
                                            <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                        </div>
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">dancing</a></span>
                                        </div>
                                    </div>
                                    <div class="ms_box_overlay_on">
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">dancing</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="ms_genres_box">
                                    <img src="<?= base_url('version/');?>images/genrs/img6.jpg" alt="" class="img-fluid" />
                                    <div class="ms_main_overlay">
                                        <div class="ms_box_overlay"></div>
                                        <div class="ms_play_icon">
                                            <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                        </div>
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">EDM</a></span>
                                        </div>
                                    </div>
                                    <div class="ms_box_overlay_on">
                                        <div class="ovrly_text_div">
                                            <span class="ovrly_text1"><a href="#">EDM</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="ms_genres_box">
                            <img src="<?= base_url('version/');?>images/genrs/img4.jpg" alt="" class="img-fluid" />
                            <div class="ms_main_overlay">
                                <div class="ms_box_overlay"></div>
                                <div class="ms_play_icon">
                                    <img src="<?= base_url('version/');?>images/svg/play.svg" alt="">
                                </div>
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="#">rock</a></span>
                                </div>
                            </div>
                            <div class="ms_box_overlay_on">
                                <div class="ovrly_text_div">
                                    <span class="ovrly_text1"><a href="#">rock</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	          <!----Main div close---->
        </div>
     