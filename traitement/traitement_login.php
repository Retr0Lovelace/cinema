<?php

require_once '../model/user.php';
require_once '../model/manager.php';

$user = new Utilisateur(array(
    'username'=> $_POST['username'],
    'password'=> $_POST['password'],
    'recaptcha' => $_POST['g-recaptcha-response']
));

$co = new manager();
$co->Connexion($user);
