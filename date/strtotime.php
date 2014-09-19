<?php
ini_set('date.timezone','Etc/GMT-8');
echo date('Y-m-d H:i:s',strtotime('now'))."<br><br>";
echo date('Y-m-d H:i:s',strtotime('10 September 2000'))."<br><br>";
echo "-day=".date('Y-m-d H:i:s',strtotime('- day',mktime(0,0,0,7,10,2010)))."<br><br>";
echo "day+1=".date('Y-m-d H:i:s',mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")))."<br><br>";
echo "m-1=".date('Y-m-d H:i:s', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")))."<br><br>";
echo "y+1=".date('Y-m-d H:i:s',mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1))."<br><br>";
echo date('Y-m-d H:i:s',mktime(date('G')+1,date('i')+2, date('s')+10, date("m")  , date("d"), date("Y")))."<br><br>";

/*echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";*/

$tomorrow  = mktime(date('G')+1,date('i')+2, date('s')+10, date("m")  , date("d"), date("Y"));
$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

echo "tomorrow=$tomorrow<br>lastmonth=$lastmonth<br>nextyear=$nextyear";

?>
