<?php

require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'repassword' => $_POST['repassword'],
    'role' => 2
));

$co = new manager();
$co->Inscription($user);


