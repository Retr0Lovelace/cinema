<?php include '../includes/header.php';?>
<?php require '../model/manager.php'; ?>
<?php
$function = new manager();
$data = $function->fetch_user_info();
?>
<div class="container mt-5 mb-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="../assets/images/avatar-default.jpg" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4 class="mb-3"><?= $_SESSION['username'] ?></h4>
                                <a href="modify.php"><button class="btn btn-info">Modification</button></a>
                                <a href="../traitement/leave.php"><button class="btn btn-danger">Deconnexion</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $_SESSION['username'] ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?= $data[0]['email'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-12 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Reservation</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php';?>
