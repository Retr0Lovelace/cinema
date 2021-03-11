<?php

require_once '../model/Functions.php';

$function = new Functions();
$function->recherche($_GET['search']);

header('Location: ../réservation.php?search='.$function->getReq());

?>