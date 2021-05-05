<?php

require_once '../model/user.php';
require_once '../model/Functions.php';

$function = new Functions();
$function->SearchFilm($_POST['search']);