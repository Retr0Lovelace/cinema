<?php

require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'username' => $_POST['username'],
    'mail' => $_POST['mail'],
    'password' => $_POST['password'],
    'repassword' => $_POST['repassword'],
));

$co = new manager();
$co->Modification($user);

header("Location: ../espace-membre.php");