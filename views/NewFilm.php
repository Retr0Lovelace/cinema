<?php include '../includes/sidenav.php'; ?>

<?php include '../includes/header_1.php'; ?>

<?php require_once '../model/Functions.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Ajout Film</h1>
    <p class="mb-4">Dans cette section, vous trouverez tout les film a ajouter.</p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="../traitement/traitement_searchFilm.php" method="post">
                <input type="text" name="search" placeholder="Nom Film (ex.: Fast & Furious, Avengers, etc..)">
                <input type="submit" value="Envoyer">
            </form>
        </div>
        <div class="card-body">
            <?php
            $fonction = new Functions();
            $data = $fonction->getReq();
            var_dump($data);
            ?>

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