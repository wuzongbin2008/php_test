<?php 
$fp = fopen("test.txt","w");
		flock($fp,3);
		fwrite($fp,'<'.'?php'."\r\n");
		fwrite($fp,'aaa'."\n");
		fwrite($fp,'bbbb'."\n");
		fwrite($fp,'cccc'."\n");
fwrite($fp,"\n".'?'.'>');
		fclose($fp);
?>