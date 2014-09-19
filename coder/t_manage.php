<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>

<?
$search = "";


if($username<>""){
	if($search==""){
		$search .= " WHERE ";
	}else{
		$search .= " AND ";
	}
	$search .= " username = '" . $username . "' ";
}

if($password<>""){
	if($search==""){
		$search .= " WHERE ";
	}else{
		$search .= " AND ";
	}
	$search .= " password = '" . $password . "' ";
}

if($name<>""){
	if($search==""){
		$search .= " WHERE ";
	}else{
		$search .= " AND ";
	}
	$search .= " name = '" . $name . "' ";
}

if($sex<>""){
	if($search==""){
		$search .= " WHERE ";
	}else{
		$search .= " AND ";
	}
	$search .= " sex = '" . $sex . "' ";
}

if($born<>""){
	if($search==""){
		$search .= " WHERE ";
	}else{
		$search .= " AND ";
	}
	$search .= " born = '" . $born . "' ";
}



$table="test";

$sql="select * from " . $table . $search;

//请参考下面代码排序
//$sql="select * from " . $table . $search  ." order by dtime DESC";


//echo $sql;exit();

$result=mysql_query($sql);

$pagesize=25;  //每页记录条数

$result_num=mysql_num_rows($result);

if($result_num<=0){
	if($search==""){
		$word="目前还没有记录!";
	}else{	
		$word="没有查到符合条件的记录!";
	}	
	
}else{

	$maxpage=ceil($result_num/$pagesize);

	if(is_long($page) or $page==""){
		$page=1;
	}else{
		$page=(int)($page);
	}
	
	if($page<1){
		$page=1;
	}else if( $page>$maxpage){
		$page=$maxpage;
	}
	

	mysql_data_seek($result,($page-1)*$pagesize);
	$n=1;
}

?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="style.css">
<title></title>
</head>

<body bgcolor="#FFFFFF" topmargin="0" leftmargin="0">
<? require("top.inc"); ?>

<? if($result_num<=0){ ?>

<center><BR><BR><? print($word); ?></center>

<? }else{ ?>	
<table width="598" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>共搜索到<font color="#FF0000"><? print($result_num); ?></font>条符合条件的信息</td>
  </tr>
</table>


<table width="600" border="0" cellspacing="1" cellpadding="0" align="center">
  <tr align=center bgcolor=#97D0FB>
    <td><b>用户名</b></td>
    <td><b>密码</b></td>
    <td><b>姓名</b></td>
    <td><b>性别</b></td>
    <td><b>生日</b></td>

    <td><b>操作一</b></td>
    <td><b>操作二</b></td>
  </tr>
<? while($row = mysql_fetch_array($result)){ ?>   
  <tr bgcolor=#EEF8FD> 
    <td  align=center><a href="t_show.php?id=<? print($row["id"]); ?>"><? print(HtmlOut($row["username"])); ?></a></td>
    <td  align=center><? print(HtmlOut($row["password"])); ?></td>
    <td  align=center><? print(HtmlOut($row["name"])); ?></td>
    <td  align=center><? print(HtmlOut($row["sex"])); ?></td>
    <td  align=center><? print(HtmlOut($row["born"])); ?></td>

    <td> 
      <div align="center"><a href="t_join.php?editid=<? print(HtmlOut($row["id"])); ?>">编辑</a></div>
    </td>
    <td> 
      <div align="center"><a href="t_del.php?id=<? print(HtmlOut($row["id"])); ?>">删除</a></div>
    </td>
  </tr>
<? $n++;if(!($row = mysql_fetch_array($result)) || $n > $pagesize) break; ?>
  <tr bgcolor=#D7EFFB> 
    <td  align=center><a href="t_show.php?id=<? print($row["id"]); ?>"><? print(HtmlOut($row["username"])); ?></a></td>
    <td  align=center><? print(HtmlOut($row["password"])); ?></td>
    <td  align=center><? print(HtmlOut($row["name"])); ?></td>
    <td  align=center><? print(HtmlOut($row["sex"])); ?></td>
    <td  align=center><? print(HtmlOut($row["born"])); ?></td>

    <td> 
      <div align="center"><a href="t_join.php?editid=<? print(HtmlOut($row["id"])); ?>">编辑</a></div>
    </td>
    <td> 
      <div align="center"><a href="t_del.php?id=<? print(HtmlOut($row["id"])); ?>">删除</a></div>
    </td>
  </tr>


<? $n++;if($n > $pagesize) break;}  ?> 
</table>


<? LastNextPage($maxpage,$page,"width=100% ","<p  align=center class=font2>"); ?>

<? } ?>
<? require("bottom.inc"); ?>
</body>
</html>


