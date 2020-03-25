<?php


use app\Product;
use app\Category;

include '../config/bd.php';
include '../vendor/autoload.php';

if (!empty($_POST['addProduct'])) {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $name = $_FILES['userfile']['name'];
    $tmpPath = $_FILES['userfile']['tmp_name'];
    $hash = md5($name);
    $newName = $hash.$name;
    $path = '../images/'.$newName;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $path);
    $path = 'images/'.$newName;

    $Category = Category::getCategory($pdo, $category);
    $products = new Product();
    $products->addProduct($pdo, $title, $price, $description, $path, $Category['idcategory']);

    header("Location: ../admin.php");
} else {
    header("Location: ../admin.php");
}

if (!empty($_POST['addCategory'])) {
    $category = $_POST['category'];
    $name = $_FILES['userfile']['name'];
    $tmpPath = $_FILES['userfile']['tmp_name'];
    $hash = md5($name);
    $newName = $hash.$name;
    $path = '../images/'.$newName;
    move_uploaded_file($_FILES['userfile']['tmp_name'], $path);
    $path = 'images/'.$newName;

    $add = new Category();
    $add->addCategory($pdo, $category, $path);
    header("Location: ../admin.php");
}

if (!empty($_POST['deleteCategory'])) {
    $nameCategory = $_POST['delCategory'];

    $delCategory = new Category();

    $delCategory->delCategory($pdo, $nameCategory);
    header("Location: ../admin.php");
}
