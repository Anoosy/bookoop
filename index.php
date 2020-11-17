<?php
require_once "book.php";
//

$ghostBook = new Book('localhost','login','password','база данных','таблица');
// Вызов функции для вывода данных с базы данных
$row = $ghostBook->getPost();
// Вызов функции для сохранения данных с полей в базу данных
$ghostBook->savePost();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сomments page</title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
    <div class="alignment">
        <h1>Добавить комментарий</h1>
        <div class="showComment">
            <?php foreach($row as $item): ?>
                <div class="showComment__item">
                    <p><?php echo $item['name'] ?></p>
                    <p>
                        <?php echo $item['text'] ?>
                    </p> 
                    <p><?php echo date("d.m.y H:i:s",$item['date']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="addComment">
            <form action="index.php" method="POST">
                <p>Введите ваше имя: </p>
                <input type="text" name="name">
                <p>Введите коментарий: </p>
                <textarea name="text" cols="30" rows="10"></textarea>
                <input type="submit" value="Добавить комментарий">
            </form>
        </div>
    </div>
</body>
</html>
