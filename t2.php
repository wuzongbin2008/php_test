<?php
error_reporting(-1);

$a = array();
arr_t($a);

function arr_t(){
	if($a){
		echo "true\n";
	}else{
		echo "false\n";
	}
}

$a[] = array("a"=>1, "b"=>2);

$a[] = array("a"=>1, "b"=>2);
echo json_encode($a);
exit;


$uuid = uniqid();
echo sprintf("%s %d", $uuid, strlen($uuid));
exit;

//include_once("2.php");

$str = "2183098411.9af8565bc6c28f082b4cadd965727262.713062.240.1418111810.pic";

//$str = "10.13.1.158:8081:304";
//$str2 = "10.13.1.160:8081:448";
//echo (crc32($str) & 0x7fffffff) % 50119;
//echo "\n";
//echo (crc32($str2) & 0x7fffffff) % 50119;
//exit;

$hash_v = (crc32($str) & 0x7fffffff) % 50119;
echo $hash_v;

//echo "2147483647\n";
//echo hexdec(0x7fffffff);
//echo "\n";
//echo crc32("123");
?>
