<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 14-12-5
 * Time: 下午12:17
 */
$a = array(
        "d"=>2,
        "e"=>1,
        "a"=>10
);

$b = array(
        "10"=>"w",
        "30"=>"z",
        "9"=>"f"
);

//array_multisort($a,$b);
//var_dump($a,$b);

$c = array_merge($a,$b);
asort($c);
print_r($c);