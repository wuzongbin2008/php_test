<?php
$s = "<a href='test'>Test</a>";

$new = htmlspecialchars($s, ENT_QUOTES);

$new = htmlentities($s);

echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
?>
