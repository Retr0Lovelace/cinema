<?php include '../includes/sidenav.php'; ?>

<?php include '../includes/header_1.php'; ?>

<?php require_once '../model/Functions.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
    <p class="mb-4">Dans cette section, vous trouverez les utilisateurs pr�sent dans votre base de donn�e.</p>
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
                        <th>R�le</th>
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
                                <form action="../traitement/traitement_suppression.php" method="post" id="form">
                                    <input name="id" hidden value="<?= $a[$i]['id'] ?>">
                                    <button document.getElementById("form").submit();">
                                    <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Pseudo</th>
                        <th>Mail</th>
                        <th>R�le</th>
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