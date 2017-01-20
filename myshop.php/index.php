<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Document</title>
</head>
<body>
<a href="table.php">table.php</a><br/>

<pre>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        print_r($_FILES); /*В данной переменной хранятся файлы,которые пользователь
       хочет загрузить,хранятся в временной папке */
    }
    ?>




</table>
    <form action="index.php" method="post"
          enctype="multipart/form-data">
        <p><label>Название<input type="text" name='GoodName'></label></p>
        <p><label>Автор<input type="text" name='Avtor'></label></p>
        <p><label>Год издания<input type="date" name='God' class="god"></label></p>
        <p><label>Цена<input type="number" name='Cena' class="cena"></label></p><p>руб.</p>
        <input type="submit" name="Добавить">
    </form>
</pre>
</body>
</html>

