<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\User;

$login = strip_tags(trim($_POST['login']));
$pass = strip_tags(trim($_POST['pass']));
$name = strip_tags(trim($_POST['name']));
$email = strip_tags(trim($_POST['email']));

$user = new User();
$user->reg($pdo, $login, $pass, $name, $email);
header("Location: /");
