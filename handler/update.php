<?php

include '../config/bd.php';
include '../vendor/autoload.php';

use app\Product;

if (!empty($_POST['update']) || !empty($_FILES)) {
    $title = strip_tags(trim($_POST['title']));
    $price = strip_tags(trim($_POST['price']));
    $description = strip_tags(trim($_POST['description']));

    $name = $_FILES['userfile']['name'];
    $tmpPath = $_FILES['userfile']['tmp_name'];
    $hash = md5($name);
    $newName = $hash.$name;
    $path = '../images/'.$newName;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $path);
    $path = 'images/'.$newName;
    
    
    $product = Product::getProduct($pdo, $_GET['id']);

    $oldImage = $product['image'];
    unlink('../'.$oldImage);

    $product = new Product();
    $product->updateProduct($pdo, $title, $price, $description, $path, $_GET['id']);
    header("Location: admin.php");
}

if (!empty($_FILES))
    $name = $_FILES['userfile']['name'];
    $tmpPath = $_FILES['userfile']['tmp_name'];
    $hash = md5($name);
    $newName = $hash.$name;
    $path = '../images/'.$newName;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $path);
    $path = 'images/'.$newName;
    
    
    $product = Product::getProduct($pdo, $_GET['id']);

    $oldImage = $product['image'];
    unlink($oldImage);

    $product = new Product();
    $product->updateProduct($pdo, $title, $price, $description, $path, $_GET['id']);
    header("Location: admin.php");