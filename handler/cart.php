<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\Cart;
use app\User;
use app\Product;

$idProduct = $_GET['id'];
$number = $_GET['number'];
$price = $_GET['price'];
$idUser = $_GET['userid'];
$title = $_GET['title'];

$_SESSION['id'] = $idProduct;

$summ = $price*$number;
$date = date('d-m-Y');
$product = new Product();
$productInfo = $product->getProduct($pdo, $idProduct);


$title = $productInfo['title'];
$image = $productInfo['image'];



$cart = new Cart();
$cart->addProduct($pdo, $idUser, $idProduct, $title, $price, $number, $productInfo['image']);



