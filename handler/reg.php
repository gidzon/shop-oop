<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\User;

$login = $_POST['login'];
$pass = $_POST['pass'];
$name = $_POST['name'];
$email = $_POST['email'];

$user = new User();
$user->reg($pdo, $login, $pass, $name, $email);
header("Location: /");
