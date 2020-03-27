<?php 
include 'vendor/autoload.php';
include 'config/config.php';

use app\Product;
use app\User;

$user = new User();
$val = $user->getUser($pdo, $_SESSION['auth']);

$product = new Product();
$data = $product->getProduct($pdo, $_GET['idproduct']);
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
        <a href="profile.php?id=<?php echo $val['id']; ?>"><?php echo $_SESSION['auth']; ?></a>
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
        <p>Цена</p>
        <p id="price"><?php echo $data['price']; ?></p>
        <p><?php echo $data['description']; ?></p>
        <input type="number" name="number" id="" value="1">
        <input type="button"  id="button" data-id="<?php echo $data['idproduct']; ?>" value="add cart">
    </div>
</body>
</html>