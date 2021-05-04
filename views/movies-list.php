<?php include '../includes/header.php';?>
<?php require '../model/Functions.php'; ?>
        <section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="../assets/images/bg-login.jpg" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Movies list</h1>
                </div>
            </div>
        </section>
        <section class="section-long">
            <div class="container">
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
                </article>
                <?php endfor; ?>
            </div>
        </section>
        <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<?php include '../includes/footer.php';?>