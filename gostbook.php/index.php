<?php
header('Content - type:text/html;charset = utf-8');
error_reporting(-1);
require_once __DIR__ . '/funcs.php';

if(!empty($_POST)) {
    save_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$msg = get_mess();
$msg = array_mess($msg);
print_arr($msg);
?>

<!DOCTYPE html>
    <html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>

    <style>

        .messages{
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<form action="#" method="post">
<p>
    <label for="name"> Имя: </label><br>
    <input type="text" name="name" id="name">
</p>
    <p>
    <label for="text"> Текст: </label><br>
    <textarea name="text" id="text"></textarea>
</p>
    <button type="submit">Написать</button>
</form>

<hr>
<?php if(!empty($message)): ?>
    <?php foreach($message as $msg): ?>
        <?php  $mess = get_format_message($msg); ?>
        <div class="messages">
        <p>Автор :<?=$msg[0]?> | Дата :<?=$msg[2]?> </p>
            <div><?=$msg[1]?></div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>