<?php
$_post_url = 'http://127.0.0.1/demo/php_test/curl/get_header.php';

//$post = 'key=12&content_id='.$content_id.'&md5='.$storeStatusArr['insert_md5'].'&url='.$url;

$curl = curl_init ( $_post_url );
curl_setopt ( $curl, CURLOPT_HEADER, 0 );

$header = array ();
$header [] = 'Host:localhost';
$header [] = 'Connection: keep-alive';
$header [] = 'User-Agent:JMQ-PHP/1.0.1';
$header [] = 'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$header [] = 'Accept-Language: zh-CN,zh;q=0.8';
$header [] = 'Accept-Charset: GBK,utf-8;q=0.7,*;q=0.3';
$header [] = 'Cache-Control:max-age=0';
$header [] = 'Cookie:t_skey=p5gdu1nrke856futitemkld661; username=wujiang1';
$header [] = 'Content-Type:application/x-www-form-urlencoded';

curl_setopt ( $curl, CURLOPT_HTTPHEADER, $header );
//curl_setopt ( $curl, CURLOPT_POST, 1);
//curl_setopt ( $curl, CURLOPT_POSTFIELDS, $post );
$result = curl_exec ( $curl );
curl_close ( $curl );

var_dump ( "curl_header:".$result);