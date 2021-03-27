<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Memico - Cinema Bootstrap HTML5 Template</title>
    <link href="../assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/bootstrap/css/tempusdominus-bootstrap-4.scss" rel="stylesheet" type="text/css">
    <link href="../assets/animate.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <link href="../assets/css/theme.min.css" rel="stylesheet" type="text/css">
</head>
<body class="body">
<section class="d-flex position-relative section-text-white">
    <img class="d-background" src="../assets/images/bg-login.jpg" data-parallax="scroll">
    <div class="d-background bg-gradient-black"></div>
    <div class="top-block">
        <div class="top-block-content m-auto">
            <div class="system-form">
                <h4 class="form-title text-uppercase">Se connecter</h4>
                <form autocomplete="off" method="post" action="../traitement/traitement_login.php">
                    <div class="row form-grid">
                        <div class="col-12">
                            <div class="input-view-flat input-group">
                                <input class="form-control" name="username" type="text" placeholder="Pseudo" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-view-flat input-group">
                                <input class="form-control" name="password" type="password" placeholder="Mot de passe" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-view-flat form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                <span class="form-check-icon"></span>
                                <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="w-100 btn btn-theme" type="submit">Se connecter</button>
                        </div>
                    </div>
                </form>
                <p class="form-subtext">
                    Vous n'avez pas de compte?
                    <a href="sign-up.php">S'inscrire</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php';?>
