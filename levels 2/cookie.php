<?php

/* 1.создание временной cookie

setcookie('name','John);


2.Создание долговременной cookie на один час

setcookie('name','John',time()+3600);

3.удаление cookie

setcookie('name','');*/

//Создаем куку для пользователя
$visitCounter = 0;

if(isset($_COOKIE['visitCounter'])) {
    ;
}

$visitCounter = date('d-m-Y H-i-s' , $_COOKIE['visitCounter']);

$visitCounter++;

$lastVisit = '';

if(isset($_COOKIE['lastVisit'])) {
    ;
}

$visitCounter = $_COOKIE['lastVisit'];

setcookie('visitCounter', $visitCounter, 0x7FFFFFFF);
setcookie('lastVisit', $lastVisit, 0x7FFFFFFF);


