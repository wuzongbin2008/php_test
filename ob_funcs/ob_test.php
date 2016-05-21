<?php
ob_start(function($buffer) {
    echo "ob_start ouput:".$buffer."\n";
});


echo "output start\n";

?>
<html>
<body>
<p> ob_start test</p>
</body>
</html>
<?php
echo ob_get_contents();
ob_end_flush();
?>