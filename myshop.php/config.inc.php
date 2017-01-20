<?php
//параметры базы данных
const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'myshop';

//соединение с БД

$link = mysqli_connect(DB_HOST,DB_LOGIN,DB_PASSWORD,DB_NAME);

//файл с данными пользователя

const ORDERS_LOG = 'orders.log';

//корзина пользователя

$basket = [];
//кол-во товара в корзине пользователя
$count = 0;

//создание или чтение корзины
basketInit();