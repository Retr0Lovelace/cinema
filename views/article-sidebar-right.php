<?php include '../includes/header.php';?>
<?php require '../model/Functions.php'; ?>
<?php
if (!isset($_GET['id'])){
    $_SESSION['errors'] = [];
    array_push($_SESSION['errors'],'Le Film est introuvable');
    header('location: ../');
}
?>
        <section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="../assets/images/bg-login.jpg" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Article</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>News</span>
                    </div>
                </div>
            </div>
        </section>
        <?php
            $function = new Functions();
            $data = $function->fetch_media();
        ?>
        <div class="container">
            <div class="sidebar-container">
                <div class="content">
                    <section class="section-long section-spaced">
                        <div class="section-line">
                            <article class="article-tape-entity">
                                <div class="entity-preview">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <img class="embed-responsive-item" src="<?= 'https://image.tmdb.org/t/p/original'.$data[$_GET['id']]['backdrop_path'] ?>" alt="" />
                                    </div>
                                    <div class="entity-date">
                                        <div class="tape-block tape-horizontal tape-single bg-theme text-white">
                                            <div class="tape-dots"></div>
                                            <div class="tape-content m-auto"><?= $data[$_GET['id']]['release_date'] ?></div>
                                            <div class="tape-dots"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="entity-content">
                                    <h2 class="entity-title"><?= $data[$_GET['id']]['title'] ?></h2>
                                </div>
                            </article>
                            <div class="section-description">
                                <h6 class="text-dark">Description</h6>
                                <p><?= $data[$_GET['id']]['overview'] ?></p>
                            </div>
                            <div class="section-bottom">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="entity-links">
                                            <div class="entity-list-title">Tags:</div>
                                            <a class="content-link" href="#"><?= $data[$_GET['id']]['genres'][0]['name'] ?></a>,&nbsp;
                                            <a class="content-link" href="#"><?= $data[$_GET['id']]['genres'][1]['name'] ?></a>
                                        </div>
                                    </div>
                                    <div>
                                        <?php if (isset($_SESSION['username'])):?>
                                            <a class="btn-primary btn" href="payement.php">Reserver</a>
                                        <?php else: ?>
                                            <style>.disabled {pointer-events: none;cursor: default;}</style>
                                            <a class="btn-primary btn disabled" href="payement.php">Reserver</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<?php include '../includes/footer.php';?>
