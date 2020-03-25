<?php
include 'vendor/autoload.php';
include 'config/config.php';

use app\Product;

$products = new Product();
$data = $products->getProductsFromCategory($pdo, $_GET['idCategory']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <?php if(!empty($_SESSION['auth'])): ?>
        <a href="profile.php?id=<?php echo $data['id']; ?>"><?php echo $_SESSION['auth']; ?></a>
        <a href="handler/exit.php">Выход</a>
    <?php else: ?>
        <a href="reg.php">Регистрация</a>
        <a href="auth.php">Авторизация</a>
    <?php endif; ?>
</header>
    <a href="/">home</a>
    <?php foreach($data as $product): ?>
    <div class="product">
       <a href="product.php?id=<?php echo $product['idproduct']; ?>"><H1><?php echo $product['title']; ?></H1></a>
        <img src="<?php echo $product['image']; ?>" alt="">
        <p><?php echo $product['price']; ?></p>
        <a href="product.php?id=<?php echo $product['idproduct']; ?>">подробнее</a>
    </div>
    <?php endforeach; ?>
</body>
</html>