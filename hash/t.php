<?php
include("consistent_hash.php");

$slice_icache_servers_1 = array('10.13.1.153:8081', '10.13.1.154:8081', '10.13.1.155:8081', '10.13.1.156:8081');
$slice_icache_servers_0 = array('10.13.1.157:8081', '10.13.1.158:8081', '10.13.1.159:8081', '10.13.1.160:8081');
$cluster = array($slice_icache_servers_0, $slice_icache_servers_1);

$retry_times = 1;
$token = "2183098411.9af8565bc6c28f082b4cadd965727262.713062.240.1418111810.pic";

$hash_v = (crc32($token) & 0x7fffffff) % 50119;
//echo $hash_v."\n";

$rings = array();
foreach($cluster as $ring) {
	$ch = new CHASH($ring);
	array_push($rings, $ch);
	//break;
}

foreach ($rings as $ring) {

	$ret = false;

	$node = $ring->get_node($token);
	//var_dump($node);

	$host_list = $ring->get_nodes($token, $retry_times);
	if (!$host_list) {
		return false;
	}

	//echo "host_list:";print_r($host_list);
	//exit;
	foreach ($host_list as $k => $host) {
		echo("k: $k\t host: {$host}\n");
		/*$ret = $this->post_data($url, $host, $blob);
		if ($ret) {
			$ret = true;
			break;
		}*/
	}
}


$c = array('10.13.1.153:8081', '10.13.1.154:8081', '10.13.1.155:8081', '10.13.1.156:8081');
if($retry_times > $c){
	echo "more >";
}else{
	echo "less <";
}
exit;