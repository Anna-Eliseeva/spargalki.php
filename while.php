<?php

//используя цикл while выведите слово Hello из переменной var в вертикально положении

$var = 'HELLO';
$i = 0;
$len = strlen($var);

while($i < $len){
    echo $var{$i} .PHP_EOL;
    $i++;
}

