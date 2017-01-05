<?php

/* Array - количесвто элементов в массиве
NULL - 0
Другое - 1
 *
 * */

function my_count($var,$mode = 0){
    if(is_null($var))
        return 0;

    if(!is_array($var))
        return 1;

    $cnt = 0;
    foreach($var as $item) {
        if(is_array($item) and $mode)
          $cnt+=  my_count($item,1);
        $cnt++;
        return $cnt;
    }
}