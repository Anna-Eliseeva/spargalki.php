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

if(!empty($result)){
    header("Refresh:3; url=http://spargalki.php/form-reg/index.php");
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
    echo 'Привет ', $result['name'], ' ', $result['lastname'] . '!';
} else {
    header("Refresh:3; url=http://spargalki.php/form-reg/index.php", true, 401);
    echo 'Неправильные имя и/или пароль!';
}
