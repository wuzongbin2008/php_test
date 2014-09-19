<?php  
  
//@file phpinput_server.php  
$raw_post_data = file_get_contents('php://input', 'r');  

echo "<br>-------php://input-------------<br>";
echo $raw_post_data . "\n";

?> 