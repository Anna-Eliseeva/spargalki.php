<?php
/**
 * Created by PhpStorm.
 * User: Анютка
 * Date: 05.01.2017
 * Time: 18:15
 */
require_once __DIR__ . '/lib.inc.php';

function connectPDO ($dbName = 'form-registr', $dbUser = 'root', $dbPass = '') {
    return new PDO('mysql:dbname=' . $dbName . ';host=127.0.0.1', $dbUser, $dbPass);
}

function passwordHash($pass){
    $salt = 'hs5y44u1m5s15su35hy3s51str';
    return md5($salt . $pass . $salt . 123457);
}