<?php
//echo print_r(getdate()); 
//$d=getdate(strtotime ('2008-9-21'));
//echo $d[year];
//date_default_timezone_set('UTC');

$time = time();
$beginTime = date('Y-m-01 00:00:00', $time);
$endTime = date('Y-m-d H:i:s', strtotime('+1 month', strtotime($beginTime)));
$t = date('Y-m-d', strtotime($endTime) - 1);

var_dump($endTime, $t);
?>
