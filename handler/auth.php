<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\User;

$login = $_POST['login'];
$pass = $_POST['pass'];

$user = new User();
$data = $user->auth($pdo, $login, $pass);
$_SESSION['auth'] = $data['login'];


header("Location: /");