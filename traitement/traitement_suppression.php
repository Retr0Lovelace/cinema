<?php

require_once '../model/manager.php';

$co = new manager();
$co->Supression($_POST['id']);

header("Location: ../admin.php");