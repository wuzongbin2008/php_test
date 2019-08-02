<?php
error_reporting(-1);

$st = date('Y-m-d H:00', strtotime('-1 hours'));
$et = date('Y-m-d H:00', time());

echo $st.PHP_EOL.$et;

?>
