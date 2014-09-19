<?php
$mystring = '<field:body itemname="文章内容" autofield="0" notsend="0" type="htmltext"  isnull="true" islist="1" default=""  maxlength="" page="split"></field:body>';

//$findme   = '/>';
//$findme   = "<field:";
$findme   = "</field:body>";
$pos = strpos($mystring, $findme,0);

echo "len=".strlen($mystring)."<br>pos=".intval($pos);
?>
