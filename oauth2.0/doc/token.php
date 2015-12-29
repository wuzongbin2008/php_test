<?php
/**
 * Created by PhpStorm.
 * Author: John Wu
 * Date: 15-12-29
 * Time: ионГ6:14
 */

/*
 * иЗЁиtoken
 */
function create_token($user_info){
    $token = md5(uniqid('token', true));
    $app_uid = isset($user_info['app_uid']) ? $user_info['app_uid'] : 0;
    $user_info = serialize($user_info);
    $sql = "insert into token(token, app_uid, ctime, user_info)
		values('".$token."', ". $app_uid.','. time() . ", '$user_info')";
    run_sql($sql);
    $token_mckey = get_token_mckey($token);
    $res = mc_set($token_mckey, $user_info, TOKEN_EXPIRES);
    return $token;
}