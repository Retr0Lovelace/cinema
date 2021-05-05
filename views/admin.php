<?php include '../includes/sidenav.php'; ?>

<?php include '../includes/header_1.php'; ?>

<?php require_once '../model/Functions.php'; ?>

        <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
                <p class="mb-4">Dans cette section, vous trouverez les utilisateurs présent dans votre base de donnée.</p>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            $function = new Functions();
                            $a = $function->fetch_user();
                            ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Modification</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count_1 = count($a);
                                for ($i=0;$i<$count_1;$i++):

                                    if ($a[$i]['role'] == 1){
                                        $a[$i]['role'] = "admin";
                                    }
                                    elseif ($a[$i]['role'] == 2){
                                        $a[$i]['role'] = "user";
                                    }?>
                                    <tr>
                                    <td><?= $a[$i]['id'] ?></td>
                                    <td><?=$a[$i]['username'] ?></td>
                                    <td><?=$a[$i]['email'] ?></td>
                                    <td><?=$a[$i]['role'] ?></td>
                                    <td style="display: flex; padding-left: 10px;">
                                        <a href="../traitement/traitement_suppression.php?id=<?php echo $a[$i]['id']; ?>" class="btn btn-danger btn-icon-split">
                                            <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                            <span class="text">Supprimer l'utilisateur</span>
                                        </a>
                                        <?php if ($a[$i]['role'] != 'admin'){ ?>
                                            <a href="../traitement/traitement_admin.php?id=<?php echo $a[$i]['id']; ?>" class="btn btn-info btn-icon-split mx-2">
                                                <span class="icon text-white-50"><i class="fas fa-user-cog"></i></span>
                                                <span class="text">Permission Administrateur</span>
                                            </a>
                                        <?php } else{ ?>
                                            <a href="../traitement/traitement_unadmin.php?id=<?php echo $a[$i]['id']; ?>" class="btn btn-info btn-icon-split mx-2">
                                                <span class="icon text-white-50"><i class="fas fa-user-cog"></i></span>
                                                <span class="text">Enlever Permission Administrateur</span>
                                            </a>
                                        <?php } ?>
                                    </td>
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Pseudo</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Modification</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Bootstrap core JavaScript-->
<script src="../js/jquery-3.3.1.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>
</body>

</html>