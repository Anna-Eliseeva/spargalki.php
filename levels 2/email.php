<?php
//Директивы PHP ini

ini_set('SMTP','localhost');//указывается адрес ,ip сервера
ini_set('smtp_post','25');//
ini_set('sendmail_from', '');

$to = 'eliseeva9797@mail.ru';
$subject = 'Проба пера';
$body = 'Отправка письма';

if(mail($to,$subject,$body)){
    echo 'Письмо отправлено';
}else{
    echo 'Письмо отправить не удалось';
}