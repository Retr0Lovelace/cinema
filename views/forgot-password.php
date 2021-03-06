<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>SPC - Cinema</title>
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
            <div class="system-form" style="max-width: 450px;">
                <h4 class="form-title text-uppercase">Mot de passe oublie</h4>
                <form autocomplete="off" method="post" action="../traitement/traitement_login.php">
                    <div class="row form-grid">
                        <div class="col-12">
                            <?php if (isset($_SESSION['Errors'])){ ?>
                                <div class="alert alert-danger mb-0" role="alert">
                                    <p>Un probleme est intervenue :</p>
                                    <ul>
                                        <?php for ($i=0;$i < count($_SESSION['Errors']); $i++){ ?>
                                            <li><?= $_SESSION['Errors'][$i] ?></li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                            <?php unset($_SESSION['Errors']); } ?>

                            <?php if (isset($_SESSION['Errors'])){ ?>
                                <div class="alert alert-danger mb-0" role="alert">
                                    <p>Un probleme est intervenue :</p>
                                    <ul>
                                        <?php for ($i=0;$i < count($_SESSION['Errors']); $i++){ ?>
                                            <li><?= $_SESSION['Errors'][$i] ?></li>
                                        <?php }  ?>
                                    </ul>
                                </div>
                            <?php unset($_SESSION['Errors']); } ?>
                        </div>
                        <div class="col-12">
                            <div class="input-view-flat input-group">
                                <input class="form-control" name="username" type="text" placeholder="Mail" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="w-100 btn btn-theme" type="submit">Reinitialiser le mot de passe</button>
                        </div>
                    </div>
                </form>
                <p class="form-subtext">
                    Vous avez d?j? un compte?
                    <a href="sign-in.php">Se connecter</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php';?>
