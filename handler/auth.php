<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\User;

$login = strip_tags(trim($_POST['login']));
$pass = strip_tags(trim($_POST['pass']));

$user = new User();
$auth = $user->auth($pdo, $login, $pass);

if ($auth === true) {
    $_SESSION['auth'] = $login;
}
header("Location: /");
