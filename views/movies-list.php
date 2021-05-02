<?php include '../includes/header.php';?>
<?php require '../model/Functions.php'; ?>
        <section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="../assets/images/bg-login.jpg" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Movies list</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>Movies</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">
                <div class="section-pannel">
                    <div class="grid row">
                        <div class="col-md-10">
                            <form autocomplete="off">
                                <div class="row form-grid">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="input-view-flat input-group">
                                            <select class="form-control" name="genre">
                                                <option selected="true">genre</option>
                                                <option>action</option>
                                                <option>adventure</option>
                                                <option>comedy</option>
                                                <option>crime</option>
                                                <option>detective</option>
                                                <option>drama</option>
                                                <option>fantasy</option>
                                                <option>melodrama</option>
                                                <option>romance</option>
                                                <option>superhero</option>
                                                <option>supernatural</option>
                                                <option>thriller</option>
                                                <option>sport</option>
                                                <option>historical</option>
                                                <option>horror</option>
                                                <option>musical</option>
                                                <option>sci-fi</option>
                                                <option>war</option>
                                                <option>western</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="input-view-flat date input-group" data-toggle="datetimepicker" data-target="#release-year-field">
                                            <input class="datetimepicker-input form-control" id="release-year-field" name="releaseYear" type="text" placeholder="release year" data-target="#release-year-field" data-date-format="Y" />
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="input-view-flat input-group">
                                            <select class="form-control" name="sortBy">
                                                <option selected="true">sort by</option>
                                                <option>name</option>
                                                <option>release year</option>
                                                <option>rating</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 my-md-auto d-flex">
                            <span class="info-title d-md-none mr-3">Select view:</span>
                            <ul class="ml-md-auto h5 list-inline">
                                <li class="list-inline-item">
                                    <a class="content-link transparent-link" href="article-sidebar-right.php"><i class="fas fa-th"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="content-link transparent-link active" href="movies-list.php"><i class="fas fa-th-list"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                $function = new Functions();
                $data = $function->fetch_media();
                for ($i=0;$i < count($data);$i++):?>
                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <a class="content-link" href="article-sidebar-right.php?id=<?= $i ?>">
                                <img class="embed-responsive-item" src="<?= 'https://image.tmdb.org/t/p/w500'.$data[$i]['poster_path'] ?>" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="entity-content">
                        <div class="entity-category">
                            <a class="content-link" href="article-sidebar-right.php"><?= $data[$i]['genres'][0]['name'] ?></a>,
                            <a class="content-link" href="article-sidebar-right.php"><?= $data[$i]['genres'][1]['name'] ?></a>
                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                                    <span class="info-text"><?= $data[$i]['vote_average'] ?></span>
                                    <span class="info-rest">/10</span>
                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text"><?= $data[$i]['runtime'] ?></span>
                                    <span class="info-rest">&nbsp;min</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text">
                            <?= $data[$i]['overview'] ?>
                        </p>
                    </div>
                    <div class="entity-extra">
                        <div class="text-uppercase entity-extra-title">Horaire</div>
                        <div class="entity-showtime">
                            <div class="showtime-wrap">
                                <div class="showtime-item">
                                    <span class="disabled btn-time btn" aria-disabled="true">11 : 30</span>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#">13 : 25</a>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#">16 : 07</a>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#">19 : 45</a>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#">21 : 30</a>
                                </div>
                                <div class="showtime-item">
                                    <a class="btn-time btn" aria-disabled="false" href="#">23 : 10</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <?php endfor; ?>
                <article class="movie-line-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" src="http://via.placeholder.com/340x510" alt="" />
                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <div class="entity-category">
                            <a class="content-link" href="article-sidebar-right.php">drama</a>,
                            <a class="content-link" href="article-sidebar-right.php">comedy</a>
                        </div>
                        <div class="entity-info">
                            <div class="info-lines">
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                    <span class="info-text">12 jan 2017</span>
                                </div>
                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text">140</span>
                                    <span class="info-rest">&nbsp;min</span>
                                </div>
                            </div>
                        </div>
                        <p class="text-short entity-text">In luctus ac nisi vel vulputate. Sed blandit augue ut ex eleifend, ac posuere dolor sollicitudin. Mauris tempus euismod mauris id semper. Vestibulum ut vulputate elit, id ultricies libero. Aenean laoreet mi augue, at iaculis nisi aliquam eu. Quisque nec ipsum vehicula diam egestas porttitor eu vitae ex. Curabitur auctor tortor elementum leo faucibus, sit amet imperdiet ante maximus. Nulla viverra tortor dignissim purus placerat dapibus nec ut orci. Quisque efficitur nulla quis pulvinar dapibus. Phasellus sodales tortor sit amet sagittis condimentum. Donec ac ultricies ex. In odio leo, rhoncus aliquam bibendum sit amet, varius sit amet nisl.
                        </p>
                    </div>
                    <div class="entity-extra">
                        <div class="text-uppercase entity-extra-title">Comming soon</div>
                        <div></div>
                    </div>
                </article>
            </div>
        </section>
        <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<?php include '../includes/footer.php';?>