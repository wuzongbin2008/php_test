<?php
$sk = '94251792d35f45acbb7adaf5784dfd25';
$baiduApiHost = "http://cdnapi.baidu.com/customer/3t/statistics/";
$postUrl = $baiduApiHost."http-code";

$requestParams = json_encode([
    'start_time' => "2019-07-23 11:00",
    'end_time' => "2019-07-23 12:00",
    'domain' => "img.momocdn.com,video.momocdn.com",
]);

$sign = genSign($sk);
$headerAry = [
    'Content-Type: application/json',
    'Authorization: '.$sign
];
$res = curlPost($postUrl, $requestParams, 30, $headerAry);
echo $res;
//var_dump(json_decode($res, true));

function genSign($sk) {
    $curTs = time();
    return base64_encode($curTs." ".md5($sk.$curTs));
}

function curlPost($postUrl, $data, $timeout = 30, $headerAry = '')
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $postUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_HEADER, false);
    if ($headerAry != '') {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerAry);
    }

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    $res = curl_exec($ch);

    return $res;
}