<?php

function foo(){
    echo func_num_args(); //передает кол-во переданных элементов в функции
}

foo(1, 2, 3, 4, 5);