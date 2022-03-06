<div class="main-content-inner">

    <div class="col-md-12 mt-5">
        <div class="card">
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-2 mt-2">
                        <p>TMDB : LP/TV/ID</p>
                        <p>TVDB_ID : <a href="http://show.online-tvs.com/series/<?= $ex_id['tvdb_id']; ?>"><?= $ex_id['tvdb_id']; ?></a> </p>
                    </div>
                    <form method="get" action="<?= base_url('deskrip/tmdb'); ?>">
                        <div class="col-10 d-flex justify-content-end">
                            <div class="input-group input-group-sm ">
                                <input type="text" name="id" class="form-control mx-2">
                                <input type="text" name="season" class="form-control mx-2">
                                <input type="text" name="episode" class="form-control mx-2">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">search</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- team member area end -->
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body mt-3">
            <div class="main">
                <header>
                    <!-- <article>
                        <h5><?= $result_id['name']; ?> On <?= $result_id['networks'][0]['name']; ?></h5>
                        <h1>Watch - ‘<?= $result_id['name']; ?>’ Season <?= $season; ?> Episode <?= $episode; ?> | (Full Episodes) On <?= $result_id['networks'][0]['name']; ?>’s Tv </h1>
                        <h5><?= $result_id['name']; ?> EPISODE <?= $episode; ?></h5>
                    </article> -->
                </header>


                <body>

                    <article class="my-2">

                        <p><a href="<?= $link; ?>/<?= $tvid; ?>-<?= $season; ?>-<?= $episode; ?>"><?= $link; ?>/<?= $tvid; ?>-<?= $season; ?>-<?= $episode; ?></a>
                        </p>
                    </article>
                </body>




                <asside class="my-2">
                    <figure>
                        <img src="http://image.tmdb.org/t/p//w780/<?= $result_id['poster_path']; ?>" alt="">
                    </figure>
                    <asside>



                        <!-- <article class="my-2">
                            <ul>
                                <li><span style="font-weight:bold"><?= $result_id['name']; ?> | </span><?= $result_id['overview']; ?></li>
                                <li>Title :<?= $result_id['name']; ?></li>
                               
                                <li>Number Of Seasons : <?= $result_id['number_of_seasons']; ?></li>
                                <li>Number Of Episodes : <?= $result_id['number_of_episodes']; ?></li>
                                <li>Status : <?= $result_id['status']; ?></li>
                                <li>Quality : 4K HD | HD | SD</li>
                            </ul>
                        </article> -->

                        <article>
                            <p><?= $result_id['overview']; ?></p>
                            <p> <?= $result_id['name']; ?> </p>
                            <p> <?= $result_id['name']; ?> S<?= $season; ?> </p>
                            <p> <?= $result_id['name']; ?> E<?= $episode; ?> </p>
                            <p> <?= $result_id['name']; ?> <?= $result_id['networks'][0]['name']; ?> </p>
                            <p> <?= $result_id['name']; ?> Se <?= $season; ?> </p>
                            <p> <?= $result_id['name']; ?> Ep <?= $episode; ?> </p>
                            <p> <?= $result_id['name']; ?> Season <?= $season; ?> </p>
                            <p> <?= $result_id['name']; ?> Episode <?= $episode; ?> </p>
                            <p> <?= $result_id['name']; ?> Season <?= $season; ?> Episode <?= $episode; ?> </p>
                            <p> Watch <?= $result_id['name']; ?> Season <?= $season; ?> Episode 2 <?= $episode; ?> Online</p>

                        </article>

                        <br>

                        <article>
                            <h3> About <?= $result_id['name']; ?></h3>
                            <p>Title : <?= $result_id['name']; ?></p>
                            <p>Episode Title : Episode <?= $episode; ?> </p>
                            <p>Release Date : <?= $result_id['last_air_date']; ?></p>
                            <p>Runtime : <?= $result_id['episode_run_time'][0]; ?> Minutes</p>
                            <p>Genres : 
                                <?php 
                                $genres = array(); 
                                foreach ($result_id['genres'] as $fetchGenres ) {
                                    $genres[] = $fetchGenres['name'];
                                }
                                echo implode(', ', $genres);
                                ?>
                                </p>
                            <p>Networks : <?php
                            $network = array();
                            foreach ($result_id['networks'] as $key) {
                                $network[] = $key['name'];
                            }
                            echo implode(', ' , $network);
                            
                            ?></p>

                        </article>


                        <asside class="my-2">

                            <article class="my-2">

                                <p><a href="<?= $link; ?>/<?= $tvid; ?>-<?= $season; ?>-<?= $episode; ?>">🎬 Watch <?= $result_id['name']; ?> Season <?= $season; ?> Episode <?= $episode; ?> On <?= $result_id['networks'][0]['name']; ?></a>
                                </p>
                            </article>

                            <article class="my-2">

                                <section>
                                    <h3>Television Show</h3>
                                    <p>
                                        A television show might also be called a television program (British English: programme), especially if it lacks a narrative structure. A television series is usually released in episodes that follow a narrative, and are usually divided into seasons (US and Canada) or series (UK) — yearly or semiannual sets of new episodes. A show with a limited number of episodes may be called a miniseries, serial, or limited series. A one-time show may be called a “special”. A television film (“made-for-TV movie” or “television movie”) is a film that is initially broadcast on television rather than released in theaters or direct-to-video.
                                    </p>
                                </section>

                                <section>
                                    <h3>United States</h3>
                                 

                                    <p>
                                        When a person or company decides to create a new series, they develop the show’s elements, consisting of the concept, the characters, the crew, and cast. Then they often “pitch” it to the various networks in an attempt to find one interested enough to order a prototype first episode of the series, known as a pilot.[citation needed] Eric Coleman, an animation executive at Disney, told an interviewer, “One misconception is that it’s very difficult to get in and pitch your show, when the truth is that development executives at networks want very much to hear ideas. They want very much to get the word out on what types of shows they’re looking for.”[7]
                                        To create the pilot, the structure and team of the whole series must be put together. If audiences respond well to the pilot, the network will pick up the show to air it the next season (usually Fall).[citation needed] Sometimes they save it for mid-season, or request rewrites and additional review (known in the industry as development hell).[citation needed] Other times, they pass entirely, forcing the show’s creator to “shop it around” to other networks. Many shows never make it past the pilot stage.[citation needed]
                                        The show hires a stable of writers, who usually work in parallel: the first writer works on the first episode, the second on the second episode, etc.[citation needed] When all the writers have been used, episode assignment starts again with the first writer.[citation needed] On other shows, however, the writers work as a team. Sometimes they develop story ideas individually, and pitch them to the show’s creator, who folds them together into a script and rewrites them.[citation needed]
                                        If the show is picked up, the network orders a “run” of episodes — usually only six or 12 episodes at first, though a season typically consists of at least 22 episodes.[citation needed] The midseason seven and last nine episodes are sometimes called the “mid-seven” and “back nine” — borrowing the colloquial terms from bowling and golf.[citation needed]
                                        Thanks for joining, have fun, and check out and let me
                                        know what you guys think! Feel free to leave a clap and Follow
                                        Thanks for watching guys!! Smiling a little better a big laugh.! Have a nice day :))</p>
                                </section>
                            </article>


            </div>
        </div>
    </div>
    <!-- team member area end -->
</div>



</div>

</div>
<!-- row area start-->
</div>
</div>
<!-- main content area end -->