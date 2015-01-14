<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 14-11-12
 * Time: 下午6:20
 */

$str = "dacb";
//echo strlen($str);
//echo substr($str,1,1);exit;

function str_to_array(){
        global $str;
        $arr = str_split($str);

        return $arr;
}
$arr = str_to_array();
asort($arr);
print_r($arr);
//var_dump(count($arr));


function array_to_str()
{
        global $arr;
        print_r(implode($arr));
}