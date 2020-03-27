<?php
include 'vendor/autoload.php';
include 'config/config.php';

use app\Category;
use app\User;

$user = new User();
$data = $user->getUser($pdo, $_SESSION['auth']);

$categories = Category::getCategories($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<header>
<?php if(!empty($_SESSION['auth'])): ?>
        <a href="profile.php?id=<?php echo $data['id']; ?>"><?php echo $_SESSION['auth']; ?></a>
        <a href="handler/exit.php">Выход</a>
        <a href="admin.php">admin</a>
    <?php else: ?>
        <a href="reg.php">Регистрация</a>
        <a href="auth.php">Авторизация</a>
    <?php endif; ?>
</header>
<body>
    <?php foreach($categories as $category): ?>
    <div class="category">
        <a href="products.php?idCategory=<?php echo $category['idcategory']; ?>"><H1><?php echo $category['category']; ?></H1></a>
        <img src="<?php echo $category['image']; ?>" alt="">
    </div>
    <?php endforeach; ?>
</body>
</html>