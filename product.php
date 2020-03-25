<?php 
include 'vendor/autoload.php';
include 'config/config.php';

use app\Product;

$product = new Product();
$data = $product->getProduct($pdo, $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <a href="/">home</a>
    <?php if(!empty($_SESSION['auth'])): ?>
        <a href="profile.php?id=<?php echo $data['id']; ?>"><?php echo $_SESSION['auth']; ?></a>
        <a href="handler/exit.php">Выход</a>
    <?php else: ?>
        <a href="reg.php">Регистрация</a>
        <a href="auth.php">Авторизация</a>
    <?php endif; ?>
</header>
<body>
    <div class="content">
        <H3><?php echo $data['title']; ?></H3>
        <img src="<?php echo $data['image']; ?>" alt="">
        <p>цена:<?php echo $data['price']; ?></p>
        <p><?php echo $data['description']; ?></p>
        <input type="number" name="number" id="" val="<?php echo $data['idproduct']; ?>">
        <input type="button" name="button" id="" value="add cart">
    </div>
</body>
</html>