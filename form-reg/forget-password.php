<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 08.01.2017
 * Time: 15:36
 */
//todo: Допилить!
if(!empty($_GET['forget_password'])){
    ?>
<form action="#" method="post">
    <input name="newpassword" type="text" placeholder="Введите email">
    <input name="forget_password" type="hidden" >
    <input type="submit">
</form>
<?php
    exit;
}

$newPassword = (string)$_POST['newPassword'];
if(!empty($newPassword)){
    require_once __DIR__ . '/lib.inc.php';
    $db = connectPDO();
    $sql = 'UPDATE `users` SET `password_hash` = :passwordHash WHERE (`email-hash` = :emailHash)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':emailHash', );
    $stmt->bindParam(':passwordHash', passwordHash($newPassword));
    $stmt->execute();
}