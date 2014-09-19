<?php 
require_once('../init.inc.php');

usdb("common");

$contactus = '';
if ($type == 'province')
{
    $pobj=new Common("cdb_province");
	$parr = $pobj->getList('');
	$contactus .= '<b>请先选择省份：</b>';
	foreach($parr as $row)
	{
		$contactus .= ' <span style="cursor:pointer;" onclick="showmaindiv_city(\''.$row['provinceID'].'\');">'.$row['province'].'</span> |';
	}
}
elseif ($type == 'city')
{
    $cobj=new Common("cdb_city");//echo $_GET[provinceID];
	$carr=$cobj->getList(" and father =$_GET[provinceID]");
	$contactus .= '<b>请选择城市：</b>';
	foreach($carr as $row1 )
	{
		$contactus .= ' <span style="cursor:pointer;" onclick="showmaindiv_admin(\''.$row1['cityID'].'\');">'.$row1['city'].'</span> |';
	}
}
elseif ($type == 'area')
{
    $obj=new Common("cdb_area");
	$arr = $obj->getList(" and father=$_GET[cityID]");
	$contactus .= '<b>请选择市區：</b>';
	foreach($arr as $row)
	{
		$contactus .= ' <span style="cursor:pointer;" onclick="selectadmin(\''.$row['areaID'].'\');">'.$row['area'].'</span> |';
	}
}
//$contactus = substr($contactus,0,-1);
echo $contactus;
exit;
?>