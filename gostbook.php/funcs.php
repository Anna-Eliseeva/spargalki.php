<?php

function save_mess()
{
    $srt = $_POST['name']
        . ' : '
        . $_POST['text']
        . ' : '
        . date('Y-m-d H:i:s')
        . '----'; // todo:1 разделитель

    file_put_contents('gb.txt', $srt, FILE_APPEND);
}

function get_mess()
{
    return file_get_contents('gb.txt');
}

function array_mess($messager)
{
    $messager = explode("/n***/n", $messager); //todo:2... смотри разделитель в todo:1

    return array_reverse($messager);
}

function get_format_message($message)
{
    return explode('|',$message);
}

function print_arr($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}