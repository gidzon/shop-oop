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
    <link rel="stylesheet" href="css/style.css">
    <title>Корзина</title>
</head>
<body>
    
        <div class="content-top">
            <?php foreach($cartInfo as $cart): ?>
                <div class="cart">
                    <img src="<?php echo $cart['image']; ?>" alt="">
                    <p>сумма <?php echo $cart['summ']; ?></p>
                    <p><?php echo $cart['title']; ?></p>
                    <a id="del" href="#">удалить</a>
                </div>
            <?php endforeach; ?>
        </div>   
    <p id="result">итого: <?php echo $summ; ?></p>
</body>
</html>