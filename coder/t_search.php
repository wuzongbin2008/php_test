<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>

<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="style.css">
<title></title>

<? if($addedit_subed!="true"){ //********************** ?>
<script language="JavaScript" src="check.js"></script>
<script LANGUAGE="javascript">
<!--
function add_onsubmit(add) {
	
//if (!checkvalue(add.username,0,0,1,"用户名")) return false;
//if (!checkvalue(add.password,0,0,1,"密码")) return false;
//if (!checkvalue(add.name,0,0,1,"姓名")) return false;
//if (!checkvalue(add.code,0,0,1,"身份证号")) return false;
//if (!checkvalue(add.sex,0,0,1,"性别")) return false;
//if (!checkvalue(add.born,0,0,1,"生日")) return false;
//if (!checkvalue(add.shuxiang,0,0,1,"属相")) return false;
//if (!checkvalue(add.xinzuo,0,0,1,"星座")) return false;
//if (!checkvalue(add.xuexin,0,0,1,"血型")) return false;
//if (!checkvalue(add.minzhu,0,0,1,"民族")) return false;
//if (!checkvalue(add.shenggao,0,0,1,"身高")) return false;
//if (!checkvalue(add.tizhong,0,0,1,"体重")) return false;
//if (!checkvalue(add.hukou,0,0,1,"户口所在地")) return false;
//if (!checkvalue(add.life,0,0,1,"现居住地")) return false;
//if (!checkvalue(add.xueli,0,0,1,"学历")) return false;


}
//-->
</SCRIPT>
<? } //*************************************************?>
</head>

<body bgcolor="#FFFFFF">
<? require("top.inc"); ?>

<form method=GET action=t_list.php name=add LANGUAGE=javascript onsubmit="return add_onsubmit(this)">
<div align=center>
<table border=0 cellpadding=0 width=435 cellspacing=1>

<tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>用户名：</span></td>
<td width=359><input type=text name="username" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>密码：</span></td>
<td width=359><input type=text name="password" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>姓名：</span></td>
<td width=359><input type=text name="name" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>性别：</span></td>
<td width=359><input type=radio value="男" name="sex" class=fstyle>男<input type=radio value="女" name="sex" class=fstyle>女</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>生日：</span></td>
<td width=359><input type=text name="born" size=20 class=fstyle  value="">
</td></tr>

</table>
</div>
<div align=center>
<input type=submit value="提交"  name=B1 class=fstyle>
<input type=reset value="重填" name=B2 class=fstyle>
</div>
</form>

<? require("bottom.inc"); ?>
</body>
</html>

