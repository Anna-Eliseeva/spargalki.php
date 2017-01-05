<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 05.01.2017
 * Time: 13:24
 */
require_once __DIR__ . '/lib.inc.php';

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

$db = connectPDO();
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


session_start();

$userInfo = [
    'sessionId' => session_id(),
    'userName' => $_POST['userName'],
    'userLastName' => $_POST['userLastName'],
    'userAge' => $_POST['userAge'],
    'userSex' => $_POST['userSex'],
    'userEmail' => $_POST['userEmail'],
];

$userInfoSerialize = serialize($userInfo);

setcookie('userInfo', $userInfoSerialize, time() + 86400);

header('Location: http://spargalki.php/form-reg/index.php');