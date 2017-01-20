<?php

session_start();

if(!isset($_SESSION['test']) and !isset($_POST['q'])){
//если первый запуск то иницилизируем переменные

    $q = 0;//номер текущего вопроса
    $title = 'Пройдите тест';

}else{
    //создаем сессионную переменную 'test',содержащую массив ответов

    if($_POST['q'] != '1')
        $_SESSION['test'][] = $_POST['insert'];
    $q = $_POST['q'];
    $title = $_POST['title'];
}