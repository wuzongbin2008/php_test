<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 14-11-12
 * Time: 下午6:20
 */

$str = "a,b,c";
$arr = explode(",", $str);
$n = substr_count($str, ',');
var_dump($n);
//print_r($arr);
//var_dump(count($arr));

function str_to_array(){
        global $str;
        $arr = str_split($str);

        return $arr;
}

function array_to_str()
{
        global $arr;
        print_r(implode($arr));
}