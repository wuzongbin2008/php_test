<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>
<?

$table="test";


$result= mysql_query("select * from " . $table . " where id =" . $id);
$row=mysql_fetch_array($result);

$id=$row["id"];
$username=$row["username"];
$password=$row["password"];
$name=$row["name"];
$code=$row["code"];
$sex=$row["sex"];
$born=$row["born"];
$shuxiang=$row["shuxiang"];
$xinzuo=$row["xinzuo"];
$xuexin=$row["xuexin"];
$minzhu=$row["minzhu"];
$shenggao=$row["shenggao"];
$tizhong=$row["tizhong"];
$hukou=$row["hukou"];
$life=$row["life"];
$xueli=$row["xueli"];
$dtime=$row["dtime"];


?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="style.css">
<title></title>
</head>

<body bgcolor="#FFFFFF">
<? require("top.inc"); ?>

<div align=center>
<table border=0 cellpadding=0 width=435 cellspacing=1>

<tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>�û�����</span></td>
<td width=359  class=fstyle><? print(HtmlOut($username)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���룺</span></td>
<td width=359  class=fstyle><? print(HtmlOut($password)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>������</span></td>
<td width=359  class=fstyle><? print(HtmlOut($name)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���֤�ţ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($code)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>�Ա�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($sex)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���գ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($born)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���ࣺ</span></td>
<td width=359  class=fstyle><? print(HtmlOut($shuxiang)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>������</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xinzuo)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>Ѫ�ͣ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xuexin)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���壺</span></td>
<td width=359  class=fstyle><? print(HtmlOut($minzhu)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>��ߣ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($shenggao)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>���أ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($tizhong)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>�������ڵأ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($hukou)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>�־�ס�أ�</span></td>
<td width=359  class=fstyle><? print(HtmlOut($life)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>ѧ����</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xueli)); ?>
</td></tr>

</table>
</div>
<? require("bottom.inc"); ?>
</body>
</html>
