<?php include '../includes/header.php';?>

        <section class="after-head d-flex section-text-white position-relative">
            <div class="d-background" data-image-src="../assets/images/bg-login.jpg" data-parallax="scroll"></div>
            <div class="d-background bg-black-80"></div>
            <div class="top-block top-inner container">
                <div class="top-block-content">
                    <h1 class="section-title">Contactez-nous.</h1>
                    <div class="page-breadcrumbs">
                        <a class="content-link" href="#">Home</a>
                        <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                        <span>Contact us</span>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="gmap-with-map">
                <div class="gmap" data-lat="48.9494276" data-lng="2.4144301"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 ml-lg-auto">
                            <div class="gmap-form bg-white">
                                <h4 class="form-title text-uppercase">Contactez
                                    <span class="text-theme">Nous</span>
                                </h4>
                                <form autocomplete="off">
                                    <div class="row form-grid">
                                        <div class="col-sm-6">
                                            <div class="input-view-flat input-group">
                                                <input class="form-control" name="nom" type="text" placeholder="Nom" />
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
<?php include '../includes/footer.php';?>