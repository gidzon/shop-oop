<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\Cart;
use app\User;

$idProduct = $_GET['id'];
$number = $_GET['number'];
$price = $_GET['price'];


$cart = new Cart();
$cart->addCart($pdo, $_SESSION['auth'], $idProduct, $price, $number);

$user = new User();
$userInfo = $user->getUser($pdo, $_SESSION['auth']);

$cart->getCart($pdo, $userInfo['id']);
json_encode($cart);