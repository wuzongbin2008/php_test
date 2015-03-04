<?php
/**
 * Created by PhpStorm.
 * User: wj
 * Date: 15-3-3
 * Time: обнГ3:56
 */

$str = "123";

$h = password_hash($str, PASSWORD_DEFAULT);
$h2 = password_hash($str, PASSWORD_BCRYPT);
//print_r(password_get_info($h));
printf("h: %s\nlen: %d\n", $h, strlen($h));
printf("h2: %s\nlen: %d\n", $h2, strlen($h2));

if(password_verify($str, $h)){
	echo "equal\n";
}else{
	echo "not equal\n";
}