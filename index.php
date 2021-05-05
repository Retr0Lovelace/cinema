<?php require 'model/Functions.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SPC - Cinema</title>
    <!-- Bootstrap -->
    <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="assets/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="assets/vendor/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="assets/vendor/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="assets/css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/theme.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<header class="header header-horizontal header-view-pannel">
    <div class="container">
        <nav class="navbar">
            <a class="navbar-brand" href="../index.php">
						<span class="logo-element">
							<span class="logo-tape"><span class="svg-content svg-fill-theme" data-svg="assets/images/svg/logo-part.svg"></span></span>
							<span class="logo-text text-uppercase"><span>S</span>PC Cinema</span>
						</span>
            </a>
            <button class="navbar-toggler" type="button">
						<span class="th-dots-active-close th-dots th-bars">
							<span></span>
							<span></span>
							<span></span>
						</span>
            </button>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item nav-item-arrow-down nav-hover-show-sub">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="views/movies-list.php">Film</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/about-us.php">A propos de nous</a></li>
                </ul>
                <div class="navbar-extra">
                    <?php if (isset($_SESSION['username'])):?>
                        <a class="btn-primary btn" href="views/profile.php"><p><?= $_SESSION['username'] ?></p></a>
                    <?php else: ?>
                        <a class="btn-theme btn" href="views/sign-in.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Se connecter</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<section class="section-text-white position-relative">
    <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
    <div class="d-background bg-theme-blacked"></div>
    <div class="mt-auto container position-relative">
        <?php if (isset($_SESSION['errors'])){ ?>
        <div class="pt-5">
            <div class="alert alert-danger mb-0" role="alert">
                <p>Un probleme est intervenue :</p>
                <ul>
                    <?php for ($i=0;$i < count($_SESSION['errors']); $i++){ ?>
                    <li><?= $_SESSION['errors'][$i] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php } unset($_SESSION['errors']); ?>
        <div class="top-block-head text-uppercase">
            <h2 class="display-4">Actuellement<span class="text-theme"> Chez Nous</span></h2>
        </div>
        <div class="top-block-footer">
            <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                <div class="slick-slides">
                    <?php
                    $function = new Functions();
                    $data = $function->fetch_media();
                    for ($i=0;$i < count($data);$i++):?>
                    <div class="slick-slide">
                        <article class="poster-entity" data-role="hover-wrap">
                            <div class="embed-responsive embed-responsive-poster">
                                <img class="embed-responsive-item" src="<?= 'https://image.tmdb.org/t/p/w500'.$data[$i]['poster_path'] ?>" alt="" />
                            </div>
                            <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                            <div class="d-over bg-highlight-bottom">
                                <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                    <a class="action-icon-theme action-icon-bordered rounded-circle" href="views/article-sidebar-right.php?id=<?= $i ?>">
                                        <span class="icon-content"><i class="fas fa-play"></i></span>
                                    </a>
                                </div>
                                <div class="entity-category">
                                    <a class="content-link" href="views/article-sidebar-right.php"><?= $data[$i]['genres'][0]['name'] ?></a>
                                    ,
                                    <a class="content-link" href="views/article-sidebar-right.php"><?= $data[$i]['genres'][1]['name'] ?></a>
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
                            </div>
                        </article>
                    </div>
                    <?php endfor; ?>
                </div>
                <div class="slick-arrows">
                    <div class="slick-arrow-prev">
								<span class="th-dots th-arrow-left th-dots-animated">
									<span></span>
									<span></span>
									<span></span>
								</span>
                    </div>
                    <div class="slick-arrow-next">
								<span class="th-dots th-arrow-right th-dots-animated">
									<span></span>
									<span></span>
									<span></span>
								</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-long">
    <div class="container">
        <div class="section-head">
            <h2 class="section-title text-uppercase">En Salle</h2>
            <p class="section-text">
                Dates: <?php $t=time();
                echo(date("Y-m-d",$t)); ?>
            </p>
        </div>
        <?php
            $function = new Functions();
            $data1 = $function->fetch_media_salle();
            for ($i=0;$i < count($data1);$i++):
        ?>
        <article class="movie-line-entity">
            <div class="entity-poster" data-role="hover-wrap">
                <div class="embed-responsive embed-responsive-poster">
                    <img class="embed-responsive-item" src="<?= 'https://image.tmdb.org/t/p/w500'.$data1[$i]['poster_path'] ?>" alt="" />
                </div>
            </div>
            <div class="entity-content">
                <div class="entity-category">
                    <a class="content-link" href="views/article-sidebar-right.php"><?= $data1[$i]['genres'][0]['name'] ?></a>
                    ,
                    <a class="content-link" href="views/article-sidebar-right.php"><?= $data1[$i]['genres'][1]['name'] ?></a>
                </div>
                <div class="entity-info">
                    <div class="info-lines">
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-star"></i></span>
                            <span class="info-text"><?= $data1[$i]['vote_average'] ?></span>
                            <span class="info-rest">/10</span>
                        </div>
                        <div class="info info-short">
                            <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                            <span class="info-text"><?= $data1[$i]['runtime'] ?></span>
                            <span class="info-rest">&nbsp;min</span>
                        </div>
                    </div>
                </div>
                <p class="text-short entity-text"><?= $data1[$i]['overview'] ?></p>
            </div>
            <div class="entity-extra">
                <div class="text-uppercase entity-extra-title">
                    En Cours de diffusion
                </div>
            </div>
        </article>
        <?php endfor; ?>
    </div>
</section>
<section>
    <div class="gmap-with-map">
        <div class="gmap" data-lat="48.9494276" data-lng="2.4144301"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ml-lg-auto">
                    <div class="gmap-form bg-white">
                        <h4 class="form-title text-uppercase">Contactez <span class="text-theme">nous</span></h4>
                        <form autocomplete="off">
                            <div class="row form-grid">
                                <div class="col-sm-6">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" name="nom" type="text" placeholder="nom" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-view-flat input-group">
                                        <input class="form-control" name="email" type="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-view-flat input-group">
                                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="px-5 btn btn-theme" type="submit">Envoyez</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
<footer class="section-text-white footer footer-links bg-darken">
    <div class="footer-body container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <a class="footer-logo" href="index.php" >
							<span class="logo-element">
								<span class="logo-tape"><span class="svg-content svg-fill-theme" data-svg="assets/images/svg/logo-part.svg"></span></span>
								<span class="logo-text text-uppercase "><span>S</span>PC CINEMA
							</span>
                </a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <h5 class="footer-title text-uppercase">
                    Movies
                </h5>
                <ul class="list-unstyled list-wide footer-content">
                    <li><a class="content-link" href="views/movies-list.php">All Movies</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3">
                <style>#eapps-weather-5c367264-049a-40da-a992-94cb978eecf4 > div > div:nth-child(2), body > footer > div.footer-body.container > div > div:nth-child(3) > div > div.eapps-widget-toolbar{display: none;}</style>
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-5c367264-049a-40da-a992-94cb978eecf4"></div>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            Copyright 2021 &copy; Francisco Benjamin. Tous les droits sont reserves.
        </div>
    </div>
</footer>
<!-- jQuery library -->
<script src="js/jquery-3.3.1.js"></script>
<!-- Bootstrap -->
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<!-- Paralax.js -->
<script src="assets/vendor/parallax.js/parallax.js"></script>
<!-- Waypoints -->
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<!-- Slick carousel -->
<script src="assets/vendor/slick/slick.min.js"></script>
<!-- Magnific Popup -->
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- Inits product scripts -->
<script src="js/script.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIcHQllgYNKUV7U0u6lJRlJgDh6y7a3Y0&callback=initMap"></script>
</body>
</html>
