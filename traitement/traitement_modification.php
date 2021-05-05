<?php

require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'repassword' => $_POST['repassword'],
    'recaptcha' => $_POST['g-recaptcha-response'],
));

$co = new manager();
$co->Modification($user);