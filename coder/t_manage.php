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

//��ο������������
//$sql="select * from " . $table . $search  ." order by dtime DESC";


//echo $sql;exit();

$result=mysql_query($sql);

$pagesize=25;  //ÿҳ��¼����

$result_num=mysql_num_rows($result);

if($result_num<=0){
	if($search==""){
		$word="Ŀǰ��û�м�¼!";
	}else{	
		$word="û�в鵽���������ļ�¼!";
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
    <td>��������<font color="#FF0000"><? print($result_num); ?></font>��������������Ϣ</td>
  </tr>
</table>


<table width="600" border="0" cellspacing="1" cellpadding="0" align="center">
  <tr align=center bgcolor=#97D0FB>
    <td><b>�û���</b></td>
    <td><b>����</b></td>
    <td><b>����</b></td>
    <td><b>�Ա�</b></td>
    <td><b>����</b></td>

    <td><b>����һ</b></td>
    <td><b>������</b></td>
  </tr>
<? while($row = mysql_fetch_array($result)){ ?>   
  <tr bgcolor=#EEF8FD> 
    <td  align=center><a href="t_show.php?id=<? print($row["id"]); ?>"><? print(HtmlOut($row["username"])); ?></a></td>
    <td  align=center><? print(HtmlOut($row["password"])); ?></td>
    <td  align=center><? print(HtmlOut($row["name"])); ?></td>
    <td  align=center><? print(HtmlOut($row["sex"])); ?></td>
    <td  align=center><? print(HtmlOut($row["born"])); ?></td>

    <td> 
      <div align="center"><a href="t_join.php?editid=<? print(HtmlOut($row["id"])); ?>">�༭</a></div>
    </td>
    <td> 
      <div align="center"><a href="t_del.php?id=<? print(HtmlOut($row["id"])); ?>">ɾ��</a></div>
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
      <div align="center"><a href="t_join.php?editid=<? print(HtmlOut($row["id"])); ?>">�༭</a></div>
    </td>
    <td> 
      <div align="center"><a href="t_del.php?id=<? print(HtmlOut($row["id"])); ?>">ɾ��</a></div>
    </td>
  </tr>


<? $n++;if($n > $pagesize) break;}  ?> 
</table>


<? LastNextPage($maxpage,$page,"width=100% ","<p  align=center class=font2>"); ?>

<? } ?>
<? require("bottom.inc"); ?>
</body>
</html>


