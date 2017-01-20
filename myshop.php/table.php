<?php
require_once __DIR__ . '/lib.inc.php';
require_once __DIR__ . '/config.inc.php';

$count = basketInit(); // олжна вернуть количество товаров в корзине
$goods = tableInit();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
<p>Товаров <a href="add2Basket.php">в корзине:</a> <b><?=$count?></b></p>
             <title>Document</title>
<p>Товаров <a href="add2Basket.php">на витрине:</a> <b><?=count($goods)?></b></p>
<hr/>
<table border="2" class="table">
    <tr>
        <th>Id</th>
        <th>Название</th>
        <th>Автор</th>
        <th>Год издания</th>
        <th>Цена</th>
        <th>В корзину</th>
    </tr>
    <?php
        foreach($goods as $good){
            echo '<tr>';
            echo '<td>', $good['id'], '</td>';
            echo '<td>', $good['name'], '</td>';
            echo '<td>', $good['autor'], '</td>';
            echo '<td>', $good['year'], '</td>';
            echo '<td>', $good['price'], '</td>';
            echo '<td>', '<a href="add2Basket.php?id=', $good['id'], '">В корзину</a>', '</td>';
            echo '</tr>';
        }
    ?>
</body>
</html>
