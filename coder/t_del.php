<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>

<?

$table="test";

mysql_query("DELETE FROM " . $table . " WHERE id in (" .  $id . ")");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="style.css">
<title></title>
</HEAD>
<body leftmargin="0" topmargin="0" bgcolor="#FFFFFF">
<? require("top.inc"); ?>
<BR><BR>
<DIV align=center>����Ϣ�ѳɹ�ɾ��! </DIV>

<? require("bottom.inc"); ?>
</BODY>
</HTML>




