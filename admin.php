<?php

include 'vendor/autoload.php';
include 'config/bd.php';

use app\Category;
use app\Product;

$categories = new Category();
$categories = Category::getCategories($pdo);
$products = new Product();
$val = $products->getProducts($pdo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>add product</p>
    <form action="handler/admin.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="title">
        <input type="text" name="price" placeholder="price">
        <textarea name="description" id="" cols="60" rows="30" placeholder="description"></textarea>
        <input type="text" name="category" placeholder='name category'>
        Отправить этот файл: <input name="userfile" type="file" />
        <input type="submit" name="addProduct" value="отправить">
    </form>
    <p>add category</p>
    <form action="handler/admin.php" method="post" enctype="multipart/form-data">
        <input type="text" name="category" placeholder="new name category">
        Отправить этот файл: <input name="userfile" type="file" />
        <input type="submit" name="addCategory" value="отправить">
    </form>
    <p>delete category</p>
    <div>
        <form action="handler/admin.php" method="post">
            <input type="text" name="delCategory" id="" placeholder="name category">
            <input type="submit" name="deleteCategory" id="" value="удалить категорию">
        </form>
    </div>
    <p>categories</p>
    
    <div class="category">
        <select name="" id="">
        <?php foreach ($categories as $category): ?>
            <option value=""><?php echo $category['category']; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
   
    <?php foreach ($val as $product): ?>
        <div class="product">
            <div class="elem">
                <p><?php echo $product['title']; ?></p>
            </div>
            <div class="elem">
                <img src="<?php echo $product['image']; ?>" alt="">
            </div>
            <div class="elem">
                <p><?php echo $product['price']; ?></p>
            </div>
            <div class="elem">
                <p><?php echo $product['description']; ?></p>
            </div>
            <div class="link">
            <a href="handler/remove.php?id=<?php echo $product['idproduct']; ?>">удалить</a>
            </div>
            <div class="link">
                <a href="update.php?id=<?php echo $product['idproduct']; ?>">изменить</a>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>