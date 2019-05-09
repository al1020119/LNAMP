<?php
/**
 * Created by PhpStorm.
 * User: iCocos
 * Date: 2019-03-16
 * Time: 14:19
 */

/*
 * P打印公告函数
 */
function P($data, $str=false) {
    if ($str) {
        echo $data;
    } else { // dd
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

/*
 * P打印公告函数
 */
function D($data, $str=false) {
    if ($str) {
        echo $data;
    } else { // dd
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }
}