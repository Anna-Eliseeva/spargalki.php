<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 05.01.2017
 * Time: 13:24
 */


if(empty($_POST['userName'])){
    $error['userName'] = 'Введите имя!<br />';
};

if(empty($_POST['userPassword'])){
    $error['userPassword'] = 'Введите пароль!<br />';
};

if(empty($_POST['userPasswordCheck'])){
    $error['userPasswordCheck'] = 'Повторите пароль!<br />';
};

if($_POST['userPassword'] !== ['userPasswordCheck']){
    $error['userName'] = 'Пароли не совпадают!<br />';
};

if(empty($_POST['userEmail'])){
    $error['userEmail'] = 'Введите e-mail!<br />';
};

if(!filter_var($_POST['userEmail'], FILTER_VALIDATE_EMAIL)){
    $error['userName'] = 'e-mail введен некорректно!<br />';
};

if(!empty($error)){
    foreach($error as $value) {
        echo $value;
    }
    exit;
}

print_r($_POST);

/*
currentDate: "05-01-2017 13:53:36"
userLastName: "SHevchenko"
userAge: "2020-02-02"
userSex: "Male"
userPassword: "pass"
userPasswordCheck: "pass"
userEmail
 */