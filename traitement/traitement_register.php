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
    'role' => 2
));

$co = new manager();
$co->Inscription($user);


