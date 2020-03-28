<?php

include 'vendor/autoload.php';
include 'config/config.php';

use app\Cart;

$idUser = $_GET['iduser'];
$cart = new Cart();
$cartInfo = $cart->getCart($pdo, $idUser);


foreach ($cartInfo as  $value) {
    $summ += $value['summ'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
</head>
<body>
    <?php foreach($cartInfo as $cart): ?>
    <div class="cart">
        <p><img src="<?php echo $cart['image']; ?>" alt=""></p>
        <p><?php echo $cart['title']; ?></p>
        <p>сумма <?php echo $cart['summ']; ?></p>
        <p>итого: <?php echo $summ; ?></p>
    </div>
    <?php endforeach; ?>
</body>
</html>