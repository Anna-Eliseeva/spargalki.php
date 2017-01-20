<?php
$email = (string)$_POST['email'];

if(!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) $error = 'Wrong Email!';

if(empty($error)){
    require_once __DIR__ . '/lib.inc.php';

    $db = connectPDO();
    $sql = 'SELECT `e-mail` FROM `users` WHERE (`e-mail` = :email)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if(!$stmt->fetch(PDO::FETCH_ASSOC)){
        $error = 'No current Email addresses';
    }

    if(empty($error)){
        $emailHash = passwordHash($email) . passwordHash($email);
        $sql = "
INSERT INTO users
SET
  users.`e-mailHash` = :emailHash
";
        $statement = $db->prepare($sql);
        $statement->bindParam(':emailHash', $emailHash, PDO::PARAM_STR);

        if($statement->execute()){
            $requestURI = preg_replace('\w+\.php', '', $_SERVER['REQUEST_URI']);

            $link =
                $_SERVER['REQUEST_SCHEME']
                . '://'
                . $_SERVER['HTTP_HOST']
                . $requestURI
                . '/forget-password.php?forget_password='
                . $emailHash;

            $subject = 'восстановление пароля';
            $message = "ссылка для восстановления пароля: <a href=\"$link\">$link</a>";

            if(!mail($email,$subject, $message)){
                $error = 'Ошибка восстановления пароля!';
            }
        } else {
            $error = 'Ошибка в запросе!';
        }
    }


}
?>

<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Document</title>
</head>
<body>

<?php
if(!empty($error)) echo $error;
?>

<form action="#" method="post">
    <input type="email" placeholder="Введите email" name="email">
    <input type="submit">
</form>

</body>
</html>
