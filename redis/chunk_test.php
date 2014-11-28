<?php
error_reporting(-1);
include(dirname(__FILE__) . '/../src/include/chunk.inc.php');

$ret = _check_redis_getslave();
var_dump($ret);

function _check_redis_getslave(){
    $test_redis_servers = array(
        '10.13.130.25:6379'=>'10.13.130.25:6380',
        '10.13.130.25:6378'=>'10.13.130.25:6381',
    );

    $redis = new RedisWrap($test_redis_servers);
    $redis->set("test1","a");

    $test_redis_servers = array(
        '12'=>'10.13.130.25:6380',
        '123'=>'10.13.130.25:6381',
    );
    $redis = new RedisWrap($test_redis_servers);
    return $redis->get("test1");
}
?>