<?php
/**************************************/
/*		@ SmellSomething			  */
/*		@ Project GuangZheng		  */
/*		@ Designer AnVyCN			  */
/**************************************/

session_start();

/* 
 * init.inc.php
 * 
*/

/*  全局變數接受設置 */

/* init php.ini */
ini_set('error_reporting','~E_NOTICE');

/* set charset */
//header("Content-type: text/html; charset: utf-8"); 

require_once('config.inc.php');
//require_once(TPL_PATH.'Smarty.class.php');

//common functions

function usdb($file_name)
{
	require_once(DB_PATH.$file_name.'.php');
}

function uslib($file_name)
{
	require_once(LIB_PATH.$file_name.'.php');
}

function debug($v)
{
	echo '<pre>';
	if (is_array($v))
		print_r($v);
	else
		echo $v;
	echo '</pre>';
	exit;
}
function alert($msg,$url = '')
{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language=javascript>alert(\''.$msg.'\');'.($url ? "window.location='$url';" : '').'</script>';
}

function confirm($msg,$action)
{
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script language=javascript>if(confirm(\''.$msg.'\')){'.$action.'}</script>';
}
// new DB
uslib('DB');
$db = new DB(DB_USER,DB_PASS,DB_NAME,DB_HOST);
$db->query('SET NAMES utf8');

function click($page)
{
	usdb('click');
	$obj = new Click();
	$obj->UpClicks($page);
	//$obj->debug();
}
/* Smarty 設置*/

//$tpl = & new Smarty();
/* 註冊自定義函數 */

/*uslib('select');
$tpl->register_function('my_select','CreatSelect');

$tpl->template_dir = TPL_TEMPLATE_DIR;
$tpl->compile_dir = TPL_COMPILE_DIR;
$tpl->cache_dir  = TPL_CACHE_DIR;
$tpl->configs  = TPL_CONFIGS_DIR;
$tpl->cache_lifetime  = TPL_LIFTTIME;
$tpl->caching  = TPL_CACHEING;
$tpl->left_delimiter = TPL_LEFT_DELIMITER;
$tpl->right_delimiter = TPL_RIGHT_DELIMITER;*/

?>