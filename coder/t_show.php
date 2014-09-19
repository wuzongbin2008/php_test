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

<tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>用户名：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($username)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>密码：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($password)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>姓名：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($name)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>身份证号：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($code)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>性别：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($sex)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>生日：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($born)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>属相：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($shuxiang)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>星座：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xinzuo)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>血型：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xuexin)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>民族：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($minzhu)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>身高：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($shenggao)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>体重：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($tizhong)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>户口所在地：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($hukou)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>现居住地：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($life)); ?>
</td></tr><tr><td width=208  align=right bgcolor=#D2D8BE><p><span class=fstyle>学历：</span></td>
<td width=359  class=fstyle><? print(HtmlOut($xueli)); ?>
</td></tr>

</table>
</div>
<? require("bottom.inc"); ?>
</body>
</html>
