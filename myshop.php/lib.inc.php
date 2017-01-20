<?php

function clearStr($data){}

function clearInt($data){}

function addItemToCatalog($title, $author, $pubyear, $price){}

//function selectAllItems()
//{
//    global $link;
//    $sql = 'SELECT id, title,author,pubyear,price FROM catalog';
//
//    if(!$result = mysqli_query($link, $sql,)) {
//        return false;
//    }
//    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
//    mysqli_free_result($result);
//
//    return $items;
//}

/** Корзина с сохраненными товарами */
function saveBasket(){
    global $basket;
    $basket = base64_encode(serialize($basket));
    setcookie('basket', $basket, 0x7FFFFFFF);
}

/** инициализируем коризну с товараи */
function basketInit(){
    global $basket, $count;

    if(!isset($_COOKIE['basket'])){
        $basket = ['orderid' => uniqid()];
        saveBasket();
        $count = 0;
    }else{
        $basket = unserialize(base64_decode($_COOKIE['basket']));
        $count = 0;

        foreach($basket as $item) {
            $count += $item;
        }
    }

    return $count;
}

/**
 * @param $id
 */
function add2Basket($id)
{
    global $basket;

    if(!empty($basket['goods'][$id])){
        $basket['goods'][$id] = $basket['goods'][$id]++;
    } else {
        $basket['goods'][$id] = 1;
    }

    saveBasket();
}

/**
 * @return PDO Идентификатор текущего соединения
 */
function connectPDO()
{
    return new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_LOGIN, DB_PASSWORD);
}

function tableInit()
{
    $db = connectPDO();
    $stmt = $db->query('
        SELECT `id`, `name`, `autor`, `year`, `price`
        FROM goods
    ');
    $rowCount = $stmt->rowCount(); // кол-во вернувихся строк из бд
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // говорим базе что нужны данные в ассоциативном виде
    while($good = $stmt->fetch()){
        $goods[] = $good;
    }
    return $goods;
}
