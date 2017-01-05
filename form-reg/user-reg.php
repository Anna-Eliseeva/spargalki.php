<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 05.01.2017
 * Time: 13:24
 */
function passwordHash($pass){
    $salt = 'hs5y44u1m5s15su35hy3s51str';
    return md5($salt . $pass . $salt . 123457);
}

if(empty($_POST['userName'])){
    $error['userName'] = 'Введите имя!<br />';
};

if(empty($_POST['userPassword'])){
    $error['userPassword'] = 'Введите пароль!<br />';
};

if(empty($_POST['userPasswordCheck'])){
    $error['userPasswordCheck'] = 'Повторите пароль!<br />';
};

if($_POST['userPassword'] !== $_POST['userPasswordCheck']){
    $error['userPassword'] = 'Пароли не совпадают!<br />';
};

if(empty($_POST['userEmail'])){
    $error['userEmail'] = 'Введите e-mail!<br />';
};

if(!filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)){
    $error['userEmail'] = 'e-mail введен некорректно!<br />';
};

if(!empty($error)){
    foreach($error as $value) {
        echo $value;
    }
    exit;
}

$db = new PDO('mysql:dbname=form-registr;host=127.0.0.1', 'root', '');
$sql = "
INSERT INTO users
SET
  users.`name` = :userName,
  users.`lastname` = :userLastName,
  users.`age` = :userAge,
  users.`sex` = :userSex,
  users.`password_hash` = :userPasswordHash,
  users.`e-mail` = :userEmail
";

$statement = $db->prepare($sql);

$statement->bindParam(':userName', $_POST['userName'], PDO::PARAM_STR);
$statement->bindParam(':userLastName', $_POST['userLastName'], PDO::PARAM_STR);
$statement->bindParam(':userAge', $_POST['userAge'], PDO::PARAM_STR);
$statement->bindParam(':userSex', mb_strtolower($_POST['userSex']), PDO::PARAM_STR);
$statement->bindParam(':userPasswordHash', passwordHash($_POST['userPassword']), PDO::PARAM_STR);
$statement->bindParam(':userEmail', $_POST['userEmail'], PDO::PARAM_STR);

$statement->execute();

print_r($statement->errorInfo());

print_r($_POST);