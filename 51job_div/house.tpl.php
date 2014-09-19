<?php 
if(!defined('IN_LYNO')) {
	exit('Access Denied');
}
//cpheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="./images/admincp/admincp.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="include/javascript/common.js"></script>
<script src="include/javascript/iframe.js" type="text/javascript"></script>
<script src="include/javascript/00.js" type="text/javascript"></script>
<script src="include/javascript/house.js" type="text/javascript"></script>
<script type="text/javascript">
function deletefile(hid,field)
{
	var querystring= 'action=house&item=delone&field='+field+'&hid='+hid;
	var result = function(f){var b=f.responseText;var arr=b.split('|');if(arr.length>1){alert(arr[2]);
	if(arr[1]=='1'){Y.gi('textSpan_'+field+hid).style.display='none';}}};
	Y.PostAjax('admin.php',querystring,result,'正在删除');
}

function deleterecord(hid)
{
	if(!confirm('确定要删除这笔数据?')){return false;}
	var querystring= 'action=house&item=del&hid='+hid;
	var result = function(f){var b=f.responseText;var arr=b.split('|');if(arr.length>1){alert(arr[2]);if(arr[1]=='1'){window.location.reload();}}};
	Y.PostAjax('admin.php',querystring,result,'正在删除');
}

var sprovince = '<?php echo $house[province ] ?>';
var scity = '<?php echo $house[city] ?>';
var sarea = '<?php echo $house[area] ?>';
function pageinit()
{
	//build_menu_init(sprovince,'city');
	//build_menu_init(scity,'area');
	<?php if($house[operatetype] == '2'){?>
	document.getElementById('opercausetd')document.getElementById('opercausetd').style.display = '';
	<?php }?>
	<?php if($house[regtype] == '4' || $house[regtype] == '5'){?>
	document.getElementById('depositspan')document.getElementById('depositspan').style.display = '';
	<?php }?>
}
</script>
<script type="text/javascript" src="include/javascript/calendar.js"></script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>
<body leftmargin="10" topmargin="10" <?php if($item == 'edit'){?>onload="pageinit();"<?php }?>>
<table width="100%" border="0" cellpadding="2" cellspacing="6"><tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
<tr class="header"><td ><?php 
$channelname = array('need'=>'客户管理','new'=>'最新房源','ok'=>'成交列表','my'=>'我的房源信箱');
echo $channel ?$channelname[$channel]:'房源';
?></td></tr>
<tr class="altbg2"><td width="25%"><a href="admin.php?action=house&channel=<?php echo $channel ?>">房源列表</a> &nbsp;&nbsp; <a href="admin.php?action=house&item=add&channel=<?php echo $channel ?>">新增房源 </a>
</td>
</tr>
</table><br />
<?php 
$channel = isset($channel)?$channel:'';

?>

<?php if(!isset($item)){?>
<div id="maindiv1" style=" top:1px; left:240px; position:absolute; width:500px; height:auto; border:#999999 2px solid; z-index:5; background:#FFFFFF; display:none;">
<div id="maindiv_header" style=" padding-top:5px; padding-right:5px; height:22px;background:#000066; display:block; text-align:right"><span onclick="document.getElementById('maindiv1').style.display = 'none'" style="color:#FFFFFF; cursor:pointer;">关闭</span></div>
<div id="maindiv_area" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
<div id="maindiv_shop" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
<div id="maindiv_admin" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
</div>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
<tr class="header">
<td width="6%">编号</td>
<td width="8%">类型</td>
<td width="6%">类型</td>
<td width="17%">所在区域</td>
<td width="14%">分配情况</td>
<td width="14%">首页显示</td>
<td width="15%">成交情况</td>
<td width="14%">操作状态</td>
<td width="20%">操作</td>
</tr>
<?php 
$key =-1;
foreach($house_list as $key=>$value){
$value[builddate] = substr($value[builddate],0,4);
?>
<tr class="altbg<?php echo $key%2 +1 ?>">

<td><?php echo $value[hcode]; ?></td>
<td><?php echo $Y_CATCH[houseType][$value[htype]]; ?></td>
<td><?php echo $Y_CATCH[houseRegType][$value[regtype]]; ?></td>
<td><?php echo $value[provincename].$value[cityname].$value[areaname]; ?></td>
<td>
<?php 
if($_DCOOKIE['adminid'] == 'p1'){
if($value[assign]){?>
已分配给<span id="<?php echo $value[hid]; ?>span" class="style1"><?php echo $value[assign]; ?></span><br />

<a href="javascript:;" onclick="showmaindiv_area('<?php echo $value[hid]; ?>');">重新分配</a>
<?php }else{?>
<a href="javascript:;" onclick="showmaindiv_area('<?php echo $value[hid]; ?>');">现在分配</a>
<?php }
}else{
	if($value[assign]){
	echo '已分配';
	}else{
	echo '未分配';
	}
}
?>
</td>
<td width="14%"><?php 
if($value[isfirst] != '1'){
	if($_DCOOKIE['adminid'] != 'p4'){
?>
	<a href="admin.php?action=house&item=isfirst&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>"><span class="style1">点击显示</span></a>
<?php 
	}else{
		echo '不显示';
	}
}else{
	if($value[isfirstchk] != '1'){
		if($_DCOOKIE['adminid'] == 'p1'){
?>
	<a href="admin.php?action=house&item=isfirstchk&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>&isfirstchk=1"><span class="style1">审核通过</span></a>
	<a href="admin.php?action=house&item=isfirstchk&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>&isfirstchk=0"><span class="style1">审核不通过</span></a>

<?php
		}else{
			echo '申请中';
		}
	}else{
?>
首页显示 	<a href="admin.php?action=house&item=isfirstchk&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>&isfirstchk=0"><span class="style1">取消</span></a>
<?php 
		echo '';
	}
}
?></td>
<td width="15%"><?php 
if($value[bargain] != '1'){
	if($_DCOOKIE['adminid'] != 'p4'){
?>
	<a href="admin.php?action=house&item=bargain&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>"><span class="style1">设置为成交</span></a>
<?php 
	}else{
		echo '未成交';
	}
}else{
	echo '已成交';
}
?></td>
<td><?php echo $Y_CATCH[houseOperateType][$value[operatetype]];?>&nbsp;&nbsp;&nbsp;
<?php if($_DCOOKIE['adminid'] == 'p1'){
if($value[operatetype] == '1'){
?><a href="admin.php?action=house&item=operatetype&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>&operatetype=<?php echo $value[operatetype]; ?>">审核通过</a><?php 
}elseif($value[operatetype]=='2'){
?><a href="javascript:;" onclick="deleterecord('<?php echo $value[hid]; ?>')">审核通过</a><?php 
}
}?>
</td>

<td>
<?php if( $_DCOOKIE['adminid'] != 'p1' && $value[operatetype] == '4' && $value[check] != '1' ){
//
}else{?>
<a href="admin.php?action=house&item=edit&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>">编辑</a>
<?php }?>
&nbsp;&nbsp;
<?php if($value[hcode] == '5' && $_DCOOKIE['adminid'] == 'p4'){?>
<a href="admin.php?action=house&item=confirm&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>"><span class="style1">您有新的房源等待确认</span></a>
<?php }
if($_DCOOKIE['adminid'] == 'p1'){
?>
<a href="javascript:;" onclick="deleterecord('<?php echo $value[hid]; ?>')">删除</a>
<?php 
if($value[check] != '1'){
?><a href="admin.php?action=house&item=check&hid=<?php echo $value[hid]; ?>&channel=<?php echo $channel ?>"><span class="style1">审核</span></a><?php 
}}
?></td>
</tr>
<?php }
?>
</table>
<?php if($PageObj){?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">
<tr class="altbg2"><td align="center"><center><?php $PageObj->GeneratePageLink2();?></center></td></tr>
<?php 
if($key ===-1){
?>
<tr class="altbg2"><td>暂无房源</td></tr>
<?php }?>
</table><?php }?>
<br />
<?php }elseif($item == 'add' ||$item == 'edit'){?>
<form name="houseform" onsubmit="return houseformsubmit();" action="admin.php?action=house&act=save" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">

<tr class="header"><td colspan="2"><?php echo ($item == 'add')?'新增':'编辑';?>房源-房屋所有人信息</td></tr>
<input type="hidden" name="item" value="<?php echo $item ?>"/>
<input type="hidden" name="hid" value="<?php echo $house[hid]; ?>"/>
<input type="hidden" name="createusertype" value="<?php echo $house[createusertype]?$house[createusertype]:'admin'; ?>"/>
<input type="hidden" name="channel" value="<?php echo $channel; ?>"/>
<input type="hidden" name="operateuid" value="<?php echo $_DCOOKIE['uid']; ?>"/>

<tr class="altbg1"><td width="14%">姓名</td>
<td><input type="text" name="holderman" value="<?php echo $house[holderman]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">身份证号</td>
<td><input type="text" name="hdidnum" value="<?php echo $house[hdidnum]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">性别</td>
<td><select name="hdsex">
<?php 
$hdsexselected=array($house[hdsex]=>'selected');
$hdsex = array('M'=>'男','F'=>'女');
foreach($hdsex as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $hdsexselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>
<tr class="altbg2"><td width="14%">电话</td>
<td><input type="text" name="hdtel" value="<?php echo $house[hdtel]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">手机</td>
<td><input type="text" name="hdmobile" value="<?php echo $house[hdmobile]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">E-mail</td>
<td><input type="text" name="hdemail" value="<?php echo $house[hdemail]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">详细地址</td>
<td><input type="text" name="hdaddress" value="<?php echo $house[hdaddress]; ?>"/></td></tr>
<tr class="header"><td colspan="2"><?php echo ($item == 'add')?'新增':'编辑';?>房源-房屋联系人信息</td></tr>

<tr class="altbg2"><td width="14%">姓名</td>
<td><input type="text" name="linkman" value="<?php echo $house[linkman]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">身份证号</td>
<td><input type="text" name="lkidnum" value="<?php echo $house[lkidnum]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">性别</td>
<td><select name="lksex">
<?php 
$lksexselected=array($house[lksex]=>'selected');
$lksex = array('M'=>'男','F'=>'女');
foreach($lksex as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $lksexselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>
<tr class="altbg1"><td width="14%">电话</td>
<td><input type="text" name="Lktel" value="<?php echo $house[Lktel]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">手机</td>
<td><input type="text" name="lkmobile" value="<?php echo $house[lkmobile]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">E-mail</td>
<td><input type="text" name="lkemail" value="<?php echo $house[lkemail]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">详细地址</td>
<td><input type="text" name="lkaddress" value="<?php echo $house[lkaddress]; ?>"/></td></tr>
<tr class="header"><td colspan="2"><?php echo ($item == 'add')?'新增':'编辑';?>房源-具体信息</td></tr>
<tr class="altbg2"><td width="14%">所在区域</td>
<td><select name="province" onchange="build_menu(this.value,'city');">
<option value="">请选择</option>
<?php 
$provinceselected=array($house[province]=>'selected');
foreach($province as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $provinceselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select><select name="city" id="city" onchange="build_menu(this.value,'area');">
<option value="">请选择</option>
<?php 
$cityselected=array($house[city]=>'selected');
foreach($city as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $cityselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select><select name="area" id="area">
<option value="">请选择</option>
<?php 
$areaselected=array($house[area]=>'selected');
foreach($area as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $areaselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>

<tr class="altbg1"><td width="14%">产权证号</td>
<td><input type="text" name="hnumber" value="<?php echo $house[hnumber]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">房屋类型</td>
<td><select name="htype">
<?php 
$htypeselected=array($house[htype]=>'selected');
$htype = $Y_CATCH[houseType];
foreach($htype as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $htypeselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>
<tr class="altbg1"><td width="14%">户型情况</td>
<td>
<select name="familytype_1">
<?php
$housefamilytype = explode(',',$house[familytype]);
$familytype_1 = $housefamilytype[0];
$familytype_2 = $housefamilytype[1];
$familytype_3 = $housefamilytype[2];
$familytype_4 = $housefamilytype[3];
$familytype_5 = $housefamilytype[4];
$familytype_1selected=array($familytype_1=>'selected');
for($i = 0;$i<=6;$i++){?>
<option value="<?php echo $i ?>" <?php echo $familytype_1selected[$i];?>><?php echo $i ?></option>
<?php }?>
</select>
室、<select name="familytype_2">
<?php
$familytype_2selected=array($familytype_2=>'selected');
for($i = 0;$i<=6;$i++){?>
<option value="<?php echo $i ?>" <?php echo $familytype_2selected[$i];?>><?php echo $i ?></option>
<?php }?></select>
厅、
<select name="familytype_3">
<?php
$familytype_3selected=array($familytype_3=>'selected');
for($i = 0;$i<=6;$i++){?>
<option value="<?php echo $i ?>" <?php echo $familytype_3selected[$i];?>><?php echo $i ?></option>
<?php }?></select>
卫、<select name="familytype_4">
<?php
$familytype_4selected=array($familytype_4=>'selected');
for($i = 0;$i<=6;$i++){?>
<option value="<?php echo $i ?>" <?php echo $familytype_4selected[$i];?>><?php echo $i ?></option>
<?php }?></select>厨、<select name="familytype_5">
<?php
$familytype_5selected=array($familytype_5=>'selected');
for($i = 0;$i<=6;$i++){?>
<option value="<?php echo $i ?>" <?php echo $familytype_5selected[$i];?>><?php echo $i ?></option>
<?php }?></select>阳台
</td></tr>
<tr class="altbg2"><td width="14%">楼层/总层</td>
<td>
<?php 
$house_floor = split('/',$house[floor]);

?>楼层<input type="text" name="floor_1" onblur="if(isNaN(this.value)){alert('请输入数字!'); this.focus(); return(false); }" value="<?php echo $house_floor[0]; ?>" style="width:20px;"/>
总层<input type="text" name="floor_2" onblur="if(isNaN(this.value)){alert('请输入数字!'); this.focus(); return(false); }" value="<?php echo $house_floor[1]; ?>" style="width:20px;"/></td></tr>
<tr class="altbg1"><td width="14%">建筑面积</td>
<td><input type="text" name="buildarea" value="<?php echo $house[buildarea]; ?>"/>平方米</td></tr>
<tr class="altbg2"><td width="14%">建筑年代</td>
<td>
<select  name="builddate" >
<?php 
$builddateselected=array($house[builddate]=>'selected');
for($i = 1950;$i<=date('Y');$i++){?>
<option value="<?php echo $i ?>" <?php echo $builddateselected[$i];?>><?php echo $i ?></option>
<?php }?>
</select>
</td></tr>
<tr class="altbg1"><td width="14%">朝向</td>
<td><input type="text" name="direction" value="<?php echo $house[direction]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">装修情况</td>
<td>
<select name="repair">
<?php 
$repairselected=array($house[repair]=>'selected');
$repair = $Y_CATCH[houseRepair];
foreach($repair as $key=>$value){?>

<option value="<?php echo $key ?>" <?php echo $repairselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select>
</td></tr>
<tr class="altbg1"><td width="14%">配套设施</td>
<td>
<?php 
$facility = $Y_CATCH[houseFacility];
$housefacility = explode(',',$house[facility]);
foreach($facility as $key=>$value){?>
<input type="checkbox" name="facility[]" <?php echo in_array($value,$housefacility)?'checked':'' ?> value="<?php echo $value; ?>"/><?php echo $value; ?>
<?php }?>
</td></tr>
<tr class="altbg2"><td width="14%">停车场费</td>
<td><input type="text" name="parkcost" value="<?php echo $house[parkcost]; ?>"/></td></tr>
<tr class="altbg1"><td width="14%">物业费</td>
<td><input type="text" name="managecost" value="<?php echo $house[managecost]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">房源类型</td>
<td><select name="regtype" onchange="regtypechange(this.value);" >
<?php 
$regtypeselected=array($house[regtype]=>'selected');
$regtype = $Y_CATCH[houseRegType];

if($channel == '' || $channel == 'new' ||$channel == 'my' ){
	unset($regtype[1],$regtype[3]);
}elseif($channel == 'need' ){
	unset($regtype[2],$regtype[4],$regtype[5]);
}
foreach($regtype as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $regtypeselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select>
<span id="depositspan" style="display:none;">
押金 (租)：
<input type="text" name="deposit" value="<?php echo $house[deposit]; ?>"/>
&nbsp;&nbsp;付款方式：
<select name="paytype">
<?php 
$paytypeselected=array($house[paytype]=>'selected');
$paytype = $Y_CATCH[paytype];
foreach($paytype as $key=>$value){?>

<option value="<?php echo $key ?>" <?php echo $paytypeselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select>
</span>
</td></tr>
<tr class="altbg1"><td width="14%">售价/租价</td>
<td><input type="text" name="price" value="<?php echo $house[price]; ?>"/></td></tr>
<tr class="altbg2"><td width="14%">房屋描述</td>
<td><textarea name="description" cols="60" rows="6"><?php echo $house[description]; ?></textarea></td></tr>
<tr class="altbg1"><td width="14%">图片1</td>
<td><input type="file" name="pic1" value="<?php echo $house[pic1]; ?>"/>
<?php if($house[pic1]) {?>
<span id="textSpan_<?php echo pic1.$hid ?>">
<input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic1] ?>')" value="预览" />
<input type="button" onclick="if(confirm('确定删除吗?')){deletefile('<?php echo $hid ?>','pic1');}" value="删除" />
</span>
<?php }?>图片大小为95X110像素,jpg或gif格式</td></tr>
<tr class="altbg2"><td width="14%">图片2</td>
<td><input type="file" name="pic2" value="<?php echo $house[pic2]; ?>"/>
<?php if($house[pic2]) {?>
<span id="textSpan_<?php echo pic2.$hid ?>">
<input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic2] ?>')" value="预览" />
<input type="button" onclick="if(confirm('确定删除吗?')){deletefile('<?php echo $hid ?>','pic2');}" value="删除" />
</span>
<?php }?>图片大小为95X110像素,jpg或gif格式</td></tr>
<tr class="altbg1"><td width="14%">图片3</td>
<td><input type="file" name="pic3" value="<?php echo $house[pic3]; ?>"/>
<?php if($house[pic3]) {?>
<span id="textSpan_<?php echo pic3.$hid ?>">
<input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic3] ?>')" value="预览" />
<input type="button" onclick="if(confirm('确定删除吗?')){deletefile('<?php echo $hid ?>','pic3');}" value="删除" />
</span>
<?php }?>图片大小为95X110像素,jpg或gif格式</td></tr>
<tr class="altbg2"><td width="14%">图片4</td>
<td><input type="file" name="pic4" value="<?php echo $house[pic4]; ?>"/>
<?php if($house[pic4]) {?>
<span id="textSpan_<?php echo pic4.$hid ?>">
<input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic4] ?>')" value="预览" />
<input type="button" onclick="if(confirm('确定删除吗?')){deletefile('<?php echo $hid ?>','pic4');}" value="删除" />
</span>
<?php }?>图片大小为95X110像素,jpg或gif格式</td></tr>

<tr class="altbg1"><td width="14%">&nbsp;</td>
<td><input type="submit" name="submit22"class="button" value=" 提 交 "  /></td></tr>
</table>
</form>

<?php }elseif($item == 'confirm'){?>
<form name="houseformchange" action="admin.php?action=house&act=save" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">

<tr class="header"><td colspan="2">确认房源-房屋所有人信息</td></tr>
<input type="hidden" name="item" value="<?php echo $item ?>"/>
<input type="hidden" name="hid" value="<?php echo $house[hid]; ?>"/>
<input type="hidden" name="createusertype" value="<?php echo $house[createusertype]?$house[createusertype]:'admin'; ?>"/>
<input type="hidden" name="channel" value="<?php echo $channel; ?>"/>
<input type="hidden" name="operateuid" value="<?php echo $_DCOOKIE['uid']; ?>"/>

<tr class="altbg1"><td width="14%">姓名</td>
<td><?php echo $house[holderman]; ?></td></tr>
<tr class="altbg2"><td width="14%">身份证号</td>
<td><?php echo $house[hdidnum]; ?></td></tr>
<tr class="altbg1"><td width="14%">性别</td>
<td><?php 
$hdsex = array('M'=>'男','F'=>'女');
echo $hdsex[$house[hdsex]];
?>
</td></tr>
<tr class="altbg2"><td width="14%">电话</td>
<td><?php echo $house[hdtel]; ?></td></tr>
<tr class="altbg1"><td width="14%">手机</td>
<td><?php echo $house[hdmobile]; ?></td></tr>
<tr class="altbg2"><td width="14%">E-mail</td>
<td><?php echo $house[hdemail]; ?></td></tr>
<tr class="altbg1"><td width="14%">详细地址</td>
<td><?php echo $house[hdaddress]; ?></td></tr>
<tr class="header"><td colspan="2">确认房源-房屋联系人信息</td></tr>

<tr class="altbg2"><td width="14%">姓名</td>
<td><?php echo $house[linkman]; ?></td></tr>
<tr class="altbg1"><td width="14%">身份证号</td>
<td><?php echo $house[lkidnum]; ?></td></tr>
<tr class="altbg2"><td width="14%">性别</td>
<td>
<?php 
$lksex = array('M'=>'男','F'=>'女');
echo $lksex[$house[lksex]];
?>
</td></tr>
<tr class="altbg1"><td width="14%">电话</td>
<td><?php echo $house[Lktel]; ?></td></tr>
<tr class="altbg2"><td width="14%">手机</td>
<td><?php echo $house[lkmobile]; ?></td></tr>
<tr class="altbg1"><td width="14%">E-mail</td>
<td><?php echo $house[lkemail]; ?></td></tr>
<tr class="altbg2"><td width="14%">详细地址</td>
<td><?php echo $house[lkaddress]; ?></td></tr>
<tr class="header"><td colspan="2">确认房源-具体信息</td></tr>
<tr class="altbg2"><td width="14%">所在区域</td>
<td>
<?php echo $house[provincename].$house[cityname].$house[areaname]; ?>
</td></tr>

<tr class="altbg1"><td width="14%">产权证号</td>
<td><?php echo $house[hnumber]; ?></td></tr>
<tr class="altbg2"><td width="14%">房屋类型</td>
<td>
<?php 
$htype = $Y_CATCH[houseType];
echo $htype[$house[htype]];
?>
</td></tr>
<tr class="altbg1"><td width="14%">户型情况</td>
<td>
<?php
$housefamilytype = explode(',',$house[familytype]);
$familytype_1 = $housefamilytype[0];
$familytype_2 = $housefamilytype[1];
$familytype_3 = $housefamilytype[2];
$familytype_4 = $housefamilytype[3];
$familytype_5 = $housefamilytype[4];
echo $familytype_1;
?>室、
<?php echo $familytype_2; ?>厅、
<?php echo $familytype_3; ?>卫、
<?php echo $familytype_4; ?>厨、
<?php echo $familytype_5; ?>阳台
</td></tr>
<tr class="altbg2"><td width="14%">楼层/总层</td>
<td><?php echo $house[floor] ?>
</td></tr>
<tr class="altbg1"><td width="14%">建筑面积</td>
<td><?php echo $house[buildarea]; ?>平方米</td></tr>
<tr class="altbg2"><td width="14%">建筑年代</td>
<td><?php echo $house[builddate]; ?>

</td></tr>
<tr class="altbg1"><td width="14%">朝向</td>
<td><?php echo $house[direction]; ?></td></tr>
<tr class="altbg2"><td width="14%">装修情况</td>
<td>
<?php 

$repair = $Y_CATCH[houseRepair];
echo $repair[$house[repair]];
?>
</td></tr>
<tr class="altbg1"><td width="14%">配套设施</td>
<td>
<?php echo $house[facility]; ?>
</td></tr>
<tr class="altbg2"><td width="14%">停车场费</td>
<td><?php echo $house[parkcost]; ?></td></tr>
<tr class="altbg1"><td width="14%">物业费</td>
<td><?php echo $house[managecost]; ?></td></tr>
<tr class="altbg2"><td width="14%">房源类型</td>
<td>
<?php 
$regtype = $Y_CATCH[houseRegType];
echo $regtype[$house[regtype]];
if($house[regtype] == '4' || $house[regtype] == '5'){
?>
押金 (租)：<?php echo $house[deposit]; ?>
&nbsp;&nbsp;付款方式：
<?php 
$paytype = $Y_CATCH[paytype];
echo $paytype[$house[paytype]];
}
?>

</td></tr>
<tr class="altbg1"><td width="14%">售价/租价</td>
<td><?php echo $house[price]; ?></td></tr>
<tr class="altbg2"><td width="14%">房屋描述</td>
<td><?php echo $house[description]; ?></td></tr>
<tr class="altbg1"><td width="14%">图片1</td>
  <td><?php if($house[pic1]) {?>
  <span id="textSpan_<?php echo pic1.$hid ?>">
  <input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic1] ?>')" value="预览" />
  </span>
  <?php }?></td>
</tr>
<tr class="altbg2"><td width="14%">图片2</td>
  <td><?php if($house[pic2]) {?>
  <span id="textSpan_<?php echo pic2.$hid ?>">
  <input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic2] ?>')" value="预览" />
  </span>
  <?php }?></td>
</tr>
<tr class="altbg1"><td width="14%">图片3</td>
  <td><?php if($house[pic3]) {?>
  <span id="textSpan_<?php echo pic3.$hid ?>">
  <input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic3] ?>')" value="预览" />
  </span>
  <?php }?></td>
</tr>
<tr class="altbg2"><td width="14%">图片4</td>
  <td><?php if($house[pic4]) {?>
  <span id="textSpan_<?php echo pic4.$hid ?>">
  <input type="button" onclick="BrowseImage('housefile/<?php echo $house[pic4] ?>')" value="预览" />
  </span>
  <?php }?></td>
</tr>

<tr class="altbg1"><td width="14%">&nbsp;</td>
<td><input type="submit" name="submit22" class="button" value=" 审核通过 "  />
  <input type="button" name="submit222" class="button" onclick="hishory.back();" value=" 返 回 "></td></tr>
</table>
</form>

<?php }elseif($item == 'change'){?>
<form name="houseform2" onsubmit="return houseformsubmit2();" action="admin.php?action=house&act=save" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tableborder">

<tr class="header"><td colspan="2">编辑房源-基本信息</td></tr>
<input type="hidden" name="item" value="<?php echo $item ?>"/>
<input type="hidden" name="hid" value="<?php echo $house[hid]; ?>"/>
<input type="hidden" name="createusertype" value="<?php echo $house[createusertype]?$house[createusertype]:'admin'; ?>"/>
<input type="hidden" name="channel" value="<?php echo $channel; ?>"/>
<input type="hidden" name="operateuid" value="<?php echo $_DCOOKIE['uid']; ?>"/>

<tr class="altbg2"><td width="14%">是否已经分配</td>
<td>
<?php 
if($house[assign]){
$assignselected=1;
}else{
$assignselected=0;
}
$assign = array(0=>'未分配',1=>'已分配');
echo $assign[$assignselected];
?>&nbsp;&nbsp;&nbsp;&nbsp;
负责人名称
<input  name="assign" style="width:60px;" value="<?php echo $house[assign] ?>" />
<a href="javascript:;" onclick="showmaindiv_area();">选择负责人</a>
<div id="maindiv1">
<div id="maindiv_area"></div>
<div id="maindiv_shop"></div>
<div id="maindiv_admin"></div>
</div>
</td>
</tr>
<tr class="altbg1"><td width="14%">审核状态</td>
<td><select name="check">
<?php 
$checkselected=array($house[check]=>'selected');
$check = array(0=>'未审核',1=>'审核通过');
foreach($check as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $checkselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select>
</td></tr>
<tr class="altbg2"><td width="14%">上下架状态</td>
<td><select name="status">
<?php 
$statusselected=array($house[status]=>'selected');
$status = array(0=>'下架',1=>'上架');
foreach($status as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $statusselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select>
</td></tr>
<tr class="altbg1"><td width="14%">首页显示</td>
<td><?php $isfirstchecked=array($house[isfirst]=>'checked');?>
<input type="checkbox" name="isfirst" value="1"/></td></tr>
<tr class="altbg2"><td width="14%">首页审核状态 </td>
<td><select name="isfirstchk">
<?php 
$isfirstchkselected=array($house[isfirstchk]=>'selected');
$isfirstchk = array(0=>'未审核',1=>'审核通过');
foreach($isfirstchk as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $isfirstchkselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>
<tr class="altbg1"><td width="14%">是否已经成交</td>
<td><select name="bargain">
<?php 
$bargainselected=array($house[bargain]=>'selected');
$bargain = array(0=>'未成交',1=>'已成交');
foreach($bargain as $key=>$value){?>
<option value="<?php echo $key ?>" <?php echo $bargainselected[$key];?>><?php echo $value ?></option>
<?php }?>
</select></td></tr>
<tr class="altbg1"><td width="14%">&nbsp;</td>
<td><input type="submit" name="submit22"class="button" value=" 提 交 "  /></td></tr>
</table>
</form>

<?php } ?>