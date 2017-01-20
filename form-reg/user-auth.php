<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 05.01.2017
 * Time: 17:55
 */
require_once __DIR__ . '/lib.inc.php';

if(empty($_POST['userName'])){
    $error['userName'] = 'Введите имя';
}

if(empty($_POST['userPassword'])){
    $error['userPassword'] = 'Введите пароль';
}

if(!empty($error)){
    header("Refresh:3; url=http://spargalki.php/form-reg/index.php", true, 401);

    foreach($error as $value) {
        echo $value, "<br />\n";
    }

    exit();
}

$db = connectPDO();
$sql = 'SELECT * FROM `users` WHERE `name` = :userName AND `password_hash` = :userPassword';
$stmt = $db->prepare($sql);
$stmt->bindParam(':userName' , $_POST['userName']);
$stmt->bindParam(':userPassword', passwordHash($_POST['userPassword']));
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

/** Если пользователь найден, то авторизовываем его */
if(!empty($result)){
    session_start();
    /** Время авторизации пользователя */
    $db = connectPDO();
    $sql = 'UPDATE `users` SET time = :userTime WHERE (id = :userId)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userTime', mktime());
    $stmt->bindParam(':userId',$result['id']);
    $stmt->execute();

    header("Refresh:3; url=http://spargalki.php/form-reg/index.php");

    /** Подготавливаем данные для отправки в куки */
    $userInfo = [
        'sessionId' => session_id(),
        'userName' => $result['name'],
        'userLastName' => $result['lastname'],
        'userAge' => $result['age'],
        'userSex' => $result['sex'],
        'userEmail' => $result['e-mail'],
        'userId' => $result['id'],
        'userTime' => date('d-m-Y : H:i:s', $result['time']),
    ];

    $userInfoSerialize = serialize($userInfo);

    setcookie('userInfo', $userInfoSerialize, time() + 86400);
    echo 'Привет ', $result['name'], ' ', $result['lastname'], '!', $userInfo['sessionId'];
} else {
    header("Refresh:3; url=http://spargalki.php/form-reg/index.php", true, 401);
    echo 'Неправильные имя и/или пароль!';
}
