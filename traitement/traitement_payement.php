<?php

require_once '../model/Functions.php';

$co = new Functions();
$co->Payement($_POST['Plein-tarif'],$_POST['Tarif-Etudiant'],$_POST['Moinsdix'],$_POST['Tarif-Navigo']);
header('location: ../views/payement.php');