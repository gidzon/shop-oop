<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="handler/update.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="title" id="" placeholder="update title">
        <input type="text" name="price" id="" placeholder="update price">
        <textarea name="description" id="" cols="30" rows="10" placeholder="update description"></textarea>
        Отправить этот файл: <input name="userfile" type="file" />
        <input type="submit" name="update" id="" value="отправить">
    </form>
</body>
</html>