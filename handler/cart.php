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


$product = new Product();
$productInfo = $product->getProduct($pdo, $idProduct);


$title = $productInfo['title'];
$image = $productInfo['image'];



$cart = new Cart();
$cart->addProduct($pdo, $idUser, $idProduct, $title, $price, $number, $image);
