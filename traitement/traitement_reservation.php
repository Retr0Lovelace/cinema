<?php

require_once '../model/Functions.php';

$Functions = new Functions();

$param = array(
    'id' => $_POST['id'],
    'Date_emprunt' => $_POST['Date_emprunt'],
    'Date_rendu' => $_POST['Date_rendu']
);

$Functions->reservation($param);

if( isset($_POST['id'])) {
    header('Location: ../page-reservation.php?id='.$_POST['id']);
}