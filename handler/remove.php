<?php
include "../vendor/autoload.php";
include '../config/bd.php';

use app\Product;

$deleteProduct = new Product();
$deleteProduct->deleteProduct($pdo, $_GET['id']);
header("Location: admin.php");
