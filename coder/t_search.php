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
	
//if (!checkvalue(add.username,0,0,1,"�û���")) return false;
//if (!checkvalue(add.password,0,0,1,"����")) return false;
//if (!checkvalue(add.name,0,0,1,"����")) return false;
//if (!checkvalue(add.code,0,0,1,"���֤��")) return false;
//if (!checkvalue(add.sex,0,0,1,"�Ա�")) return false;
//if (!checkvalue(add.born,0,0,1,"����")) return false;
//if (!checkvalue(add.shuxiang,0,0,1,"����")) return false;
//if (!checkvalue(add.xinzuo,0,0,1,"����")) return false;
//if (!checkvalue(add.xuexin,0,0,1,"Ѫ��")) return false;
//if (!checkvalue(add.minzhu,0,0,1,"����")) return false;
//if (!checkvalue(add.shenggao,0,0,1,"���")) return false;
//if (!checkvalue(add.tizhong,0,0,1,"����")) return false;
//if (!checkvalue(add.hukou,0,0,1,"�������ڵ�")) return false;
//if (!checkvalue(add.life,0,0,1,"�־�ס��")) return false;
//if (!checkvalue(add.xueli,0,0,1,"ѧ��")) return false;


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

<tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�û�����</span></td>
<td width=359><input type=text name="username" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���룺</span></td>
<td width=359><input type=text name="password" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>������</span></td>
<td width=359><input type=text name="name" size=20 class=fstyle  value="">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�Ա�</span></td>
<td width=359><input type=radio value="��" name="sex" class=fstyle>��<input type=radio value="Ů" name="sex" class=fstyle>Ů</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���գ�</span></td>
<td width=359><input type=text name="born" size=20 class=fstyle  value="">
</td></tr>

</table>
</div>
<div align=center>
<input type=submit value="�ύ"  name=B1 class=fstyle>
<input type=reset value="����" name=B2 class=fstyle>
</div>
</form>

<? require("bottom.inc"); ?>
</body>
</html>

