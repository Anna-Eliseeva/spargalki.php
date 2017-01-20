<?php

//подключение библиотек

require  __DIR__ . '/lib.inc.php';
require __DIR__ . '/config.inc.php';

$id = (int)$_GET['id'];

if($id){
    add2Basket($id);
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

$goodInBasket = [
    1 => 'quantity',
    [
        'id' => 2,
        'quantity' => 2,
    ],
    [
        'id' => 3,
        'quantity' => 3,
    ],
    [
        'id' => 4,
        'quantity' => 4,
    ],
];