<?php
include 'vendor/autoload.php';
include 'config/config.php';

use app\Product;
use app\User;

$user = new User();
$val = $user->getUser($pdo, $_SESSION['auth']);

$products = new Product();
$data = $products->getProductsFromCategory($pdo, $_GET['idCategory']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="link">
        <?php if(!empty($_SESSION['auth'])): ?>
            <a href="profile.php?id=<?php echo $val['id']; ?>"><?php echo $_SESSION['auth']; ?></a>
            <a href="handler/exit.php">Выход</a>
        <?php else: ?>
            <a href="reg.php">Регистрация</a>
            <a href="auth.php">Авторизация</a>
        <?php endif; ?>
        <a href="/">home</a>
    </div>
</header>
    <?php foreach($data as $product): ?>
    <div class="product">
        <div class="title">
            <a href="product.php?idproduct=<?php echo $product['idproduct']; ?>"><H1><?php echo $product['title']; ?></H1></a>
        </div>
        <img src="<?php echo $product['image']; ?>" alt="">
        <p ><?php echo $product['price']; ?></p>
        <a id="detailed" href="product.php?idproduct=<?php echo $product['idproduct']; ?>">подробнее</a>
    </div>
    <?php endforeach; ?>
</body>
</html>