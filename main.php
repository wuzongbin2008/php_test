<?php
error_reporting(-1);

$url = "/2/index/index/test/1/";

$requestUri = trim($url, '/');

$arr = explode('/', $requestUri, 4);

$applicationPrefix = $arr[0];
$control = (isset($arr[1]) && ''!= $arr[1]) ? $arr[1] : 'index';

echo $control;


