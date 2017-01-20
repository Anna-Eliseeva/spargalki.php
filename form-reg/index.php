<?php
require_once __DIR__ . '/lib.inc.php';

session_start();
if(isset($_GET['destroyCookies'])){
    setcookie('userInfo', '', time() - 1);
    session_destroy();
    header('Location: http://spargalki.php/form-reg/index.php');
}
if(!empty($_COOKIE['userInfo'])) {
    $userInfo = unserialize($_COOKIE['userInfo']);
    //print_r($userInfo);
}
?>
<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello <?php echo ($userInfo['userName']) ? $userInfo['userName'] : 'Guest' ?>!</p>

    <?php if(!empty($userInfo)) {

        ?>
        <p>Последний раз Вы у нас были <?= $userInfo['userTime']?></p>
        <form action="#" method="get">
            <input name="destroyCookies" type="submit" value="Exit from account">
        </form>
    <?php }
    else {
        ?>
        <form action="user-auth.php" method="post">
            <p>
                <label>
                    Input Name please:
                    <input name="userName" type="text" placeholder="Input Name" required />
                </label>
            </p>
            <p>
                <label>
                    Input Password please:
                    <input name="userPassword" type="password" placeholder="Input Password" />
                </label>
            </p>
            <input type="submit" value="Authorize"/>
        </form>
        <a href="form-reg.php">Form Registered!</a>

        <a href="password.php"> Forget password?</a>


    <?php } ?>

</body>
</html>