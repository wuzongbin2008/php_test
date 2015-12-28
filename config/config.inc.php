<?php
/** 
 * config.inc.php 
 * 基本基本常量
 */
 /* 數據庫配置 */
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'xinya_webmaker');
define('DB_PORT', '3306');
define('DB_USER', 'root');//root
define('DB_PASS', '19791231'); //3m_test

/*服務器資源檔案 */
define('ROOT_PATH', dirname(__FILE__).'/');   
define('URL_PATH', dirname($_SERVER['PHP_SELF']));  
define('DB_PATH', ROOT_PATH.'class/');  
define('LIB_PATH', ROOT_PATH.'libs/'); 
define('TPL_PATH', ROOT_PATH.'libs/smarty/');  
define('UPLOAD_DIR', 'uploads/'); 
define('FCK_PATH','/libs/fckeditor/');
define('FCK_UPLOAD','/uploads/');

/* smtp常量參數 */
define('SMTP_SERVER', 'smtp.163.com');
define('SMTP_USER', 'anvy002@163.com');
define('SMTP_PASSWORD', 'anwei818'); 
define('MAIL_FROM', 'anvy'); 
define('MAIL_TO', 'anvycn@hotmail.com'); 
define('SMTP_AUTH',TRUE);

/* Smarty */
define('TPL_TEMPLATE_DIR', './template/templates'); 
define('TPL_COMPILE_DIR', './template/templates_c');
define('TPL_CONFIGS_DIR', './template/configs'); 
define('TPL_CACHE_DIR',  './template/cache'); 
define('TPL_LIFTTIME',  '5'); 
define('TPL_CACHEING',  '0');  
define('TPL_LEFT_DELIMITER', '<{'); 
define('TPL_RIGHT_DELIMITER', '}>');
?>