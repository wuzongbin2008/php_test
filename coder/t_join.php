<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>

<?
$table="test";
$onload="";

if($addedit_subed=="true"){
//���ύ��

	$dtime=date("Y-m-d H:i:s",time());


	//����������֤
	//outcheck(checkvalue($username,"","",1,"�û���"));
	//outcheck(checkvalue($password,"","",1,"����"));
	//outcheck(checkvalue($name,"","",1,"����"));
	//outcheck(checkvalue($code,"","",1,"���֤��"));
	//outcheck(checkvalue($sex,"","",1,"�Ա�"));
	//outcheck(checkvalue($born,"","",1,"����"));
	//outcheck(checkvalue($shuxiang,"","",1,"����"));
	//outcheck(checkvalue($xinzuo,"","",1,"����"));
	//outcheck(checkvalue($xuexin,"","",1,"Ѫ��"));
	//outcheck(checkvalue($minzhu,"","",1,"����"));
	//outcheck(checkvalue($shenggao,"","",1,"���"));
	//outcheck(checkvalue($tizhong,"","",1,"����"));
	//outcheck(checkvalue($hukou,"","",1,"�������ڵ�"));
	//outcheck(checkvalue($life,"","",1,"�־�ס��"));
	//outcheck(checkvalue($xueli,"","",1,"ѧ��"));


	if($editid==""){	//���״̬
		/* ��ֹ��������Ϣ�߼�
		$TEST_RESULT=mysql_query("SELECT * FROM ".$table." WHERE username='".$username."'");
		if(mysql_num_rows($TEST_RESULT)>0){
			outjsmsg("�û����Ѵ���!");
			exit();
		}
		*/

		//���ʱʹ�õ��ֶ�
		$field1=array("username","password","name","code","sex","born","shuxiang","xinzuo","xuexin","minzhu","shenggao","tizhong","hukou","life","xueli","dtime");
		$value1=array($username,$password,$name,$code,$sex,$born,$shuxiang,$xinzuo,$xuexin,$minzhu,$shenggao,$tizhong,$hukou,$life,$xueli,$dtime);


		for($i=0;$i<=sizeof($field1)-1;$i++){
			$value1[$i]=str_replace("'","''",$value1[$i]);
		}

		$sql = "INSERT INTO " . $table . " (" . implode($field1, ",") .") VALUES ('" .implode($value1, "','") . "')";
		$word="�����Ϣ�ѳɹ�����!";
	}else{	//�༭״̬

		//�༭ʱʹ�õ��ֶ�
		$field1=array("username","password","name","code","sex","born","shuxiang","xinzuo","xuexin","minzhu","shenggao","tizhong","hukou","life","xueli","dtime");
		$value1=array($username,$password,$name,$code,$sex,$born,$shuxiang,$xinzuo,$xuexin,$minzhu,$shenggao,$tizhong,$hukou,$life,$xueli,$dtime);


		$sql="UPDATE " . $table . " SET ";
		for($i=0;$i<=sizeof($field1)-1;$i++){
			$sql .= $field1[$i]."='".str_replace("'","''",$value1[$i])."'";
			if($i!=sizeof($field1)-1){
				$sql.=",";
			}else{
				$sql.=" where id=" . $editid;
			}
		}
		$word="�����Ϣ�ѳɹ��޸�!";
	}

	if(!mysql_query($sql)){
		$word="����ʧ��!";
	}

}else{
//����ҳ��ʱ(���ύ)
	$editid = $editid; //����˲�������Ϊ�༭״̬
	if($editid!=""){	//�༭״̬
		$onload="onload=\"page_onload();\"";
		$result=mysql_query("select * from " . $table . " where id =" . $editid);
		$row=mysql_fetch_array($result);

		$id=$row["id"];
		$username=$row["username"];
		$password=$row["password"];
		//���������ֵҪ���������ֶε�ֵ
		//$repassword=$row["password"];

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

	}else{	//���״̬
		$username="";
		$password="";
		$name="";
		$code="";
		$sex="";
		$born="";
		$shuxiang="";
		$xinzuo="";
		$xuexin="";
		$minzhu="";
		$shenggao="";
		$tizhong="";
		$hukou="";
		$life="";
		$xueli="";

	}
}
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="style.css">
<title></title>

<? if($addedit_subed!="true"){ //********************** ?>
<script language="JavaScript" src="check.js"></script>
<script LANGUAGE="javascript">
<!--
<? if($editid!=""){ ?>
function page_onload(){
//���õ�ѡ�򡢶�ѡ�������˵���ֵ
SetSelectedAndChecked(add.sex,"<? print(htmlspecialchars($sex));  ?>");
SetSelectedAndChecked(add.shuxiang,"<? print(htmlspecialchars($shuxiang));  ?>");
SetSelectedAndChecked(add.xinzuo,"<? print(htmlspecialchars($xinzuo));  ?>");
SetSelectedAndChecked(add.xuexin,"<? print(htmlspecialchars($xuexin));  ?>");
SetSelectedAndChecked(add.minzhu,"<? print(htmlspecialchars($minzhu));  ?>");
SetSelectedAndChecked(add.hukou,"<? print(htmlspecialchars($hukou));  ?>");
SetSelectedAndChecked(add.life,"<? print(htmlspecialchars($life));  ?>");
SetSelectedAndChecked(add.xueli,"<? print(htmlspecialchars($xueli));  ?>");


}
<? } ?>

function add_onsubmit(add) {
/* ������֤��������ʱ��
if(add.password.value!=add.repassword.value){
	alert('�������벻��ͬ!');
	return false;
}
*/

//�ͻ�����֤
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

<body bgcolor="#FFFFFF" <? print($onload); ?> >
<? require("top.inc"); ?>

<? if($addedit_subed=="true"){ //********************** ?>

<center><BR><BR><? print($word); ?></center>

<? }else{ ?>
<form method=POST name=add LANGUAGE=javascript onsubmit="return add_onsubmit(this)">
<input type=hidden name="addedit_subed" value="true">
<input type=hidden name=editid value="<? print($editid); ?>">
<div align=center>
<table border=0 cellpadding=0 width=435 cellspacing=1>

<tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�û�����</span></td>
<td width=359><input type=text name="username" size=20 class=fstyle  value="<? print(htmlspecialchars($username));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���룺</span></td>
<td width=359><input type=text name="password" size=20 class=fstyle  value="<? print(htmlspecialchars($password));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�������룺</span></td>
<td width=359><input type=password name="repassword" size=20 class=fstyle  value="<? print(htmlspecialchars($repassword));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>������</span></td>
<td width=359><input type=text name="name" size=20 class=fstyle  value="<? print(htmlspecialchars($name));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���֤�ţ�</span></td>
<td width=359><input type=text name="code" size=20 class=fstyle  value="<? print(htmlspecialchars($code));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�Ա�</span></td>
<td width=359><input type=radio value="��" name="sex" class=fstyle>��<input type=radio value="Ů" name="sex" class=fstyle>Ů</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���գ�</span></td>
<td width=359><input type=text name="born" size=20 class=fstyle  value="<? print(htmlspecialchars($born));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���ࣺ</span></td>
<td width=359><select name="shuxiang" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="��">��</option>
<option value="ţ">ţ</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
<option value="��">��</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>������</span></td>
<td width=359><select name="xinzuo" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="������">������</option>
<option value="��ţ��">��ţ��</option>
<option value="˫����">˫����</option>
<option value="��з��">��з��</option>
<option value="ʨ����">ʨ����</option>
<option value="��Ů��">��Ů��</option>
<option value="�����">�����</option>
<option value="��Ы��">��Ы��</option>
<option value="������">������</option>
<option value="ɽ����">ɽ����</option>
<option value="ˮƿ��">ˮƿ��</option>
<option value="˫����">˫����</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>Ѫ�ͣ�</span></td>
<td width=359><select name="xuexin" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���壺</span></td>
<td width=359><select name="minzhu" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�ɹ���">�ɹ���</option>
<option value="ά�����">ά�����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="׳��">׳��</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="��������">��������</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="������">������</option>
<option value="����">����</option>
<option value="���">���</option>
<option value="��ɽ��">��ɽ��</option>
<option value="������">������</option>
<option value="ˮ��">ˮ��</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="�¶�������">�¶�������</option>
<option value="����">����</option>
<option value="���Ӷ���">���Ӷ���</option>
<option value="������">������</option>
<option value="Ǽ��">Ǽ��</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="ë����">ë����</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="������">������</option>
<option value="��������">��������</option>
<option value="ŭ��">ŭ��</option>
<option value="���α����">���α����</option>
<option value="����˹��">����˹��</option>
<option value="���¿���">���¿���</option>
<option value="�°���">�°���</option>
<option value="������">������</option>
<option value="ԣ����">ԣ����</option>
<option value="����">����</option>
<option value="��������">��������</option>
<option value="������">������</option>
<option value="���״���">���״���</option>
<option value="������">������</option>
<option value="�Ű���">�Ű���</option>
<option value="�����">�����</option>
<option value="��ŵ��">��ŵ��</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>��ߣ�</span></td>
<td width=359><input type=text name="shenggao" size=20 class=fstyle  value="<? print(htmlspecialchars($shenggao));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>���أ�</span></td>
<td width=359><input type=text name="tizhong" size=20 class=fstyle  value="<? print(htmlspecialchars($tizhong));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�������ڵأ�</span></td>
<td width=359><select name="hukou" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="����">����</option>
<option value="�Ϻ�">�Ϻ�</option>
<option value="���">���</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㶫">�㶫</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�ӱ�">�ӱ�</option>
<option value="����">����</option>
<option value="������">������</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="���ɹ�">���ɹ�</option>
<option value="����">����</option>
<option value="�ຣ">�ຣ</option>
<option value="ɽ��">ɽ��</option>
<option value="ɽ��">ɽ��</option>
<option value="����">����</option>
<option value="�Ĵ�">�Ĵ�</option>
<option value="�½�">�½�</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㽭">�㽭</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>�־�ס�أ�</span></td>
<td width=359><select name="life" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="����">����</option>
<option value="�Ϻ�">�Ϻ�</option>
<option value="���">���</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㶫">�㶫</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�ӱ�">�ӱ�</option>
<option value="����">����</option>
<option value="������">������</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="���ɹ�">���ɹ�</option>
<option value="����">����</option>
<option value="�ຣ">�ຣ</option>
<option value="ɽ��">ɽ��</option>
<option value="ɽ��">ɽ��</option>
<option value="����">����</option>
<option value="�Ĵ�">�Ĵ�</option>
<option value="�½�">�½�</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="�㽭">�㽭</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>ѧ����</span></td>
<td width=359><select name="xueli" size=1  class=fstyle>
<option value="">-��ѡ��-</option>
<option value="Сѧ">Сѧ</option>
<option value="����">����</option>
<option value="����">����</option>
<option value="��ר">��ר</option>
<option value="��ר">��ר</option>
<option value="����">����</option>
<option value="˶ʿ">˶ʿ</option>
<option value="��ʿ">��ʿ</option>
<option value="��ʿ��">��ʿ��</option>
</select>
</td></tr>

</table>
</div>
<div align=center>
<input type=submit value="�ύ"  name=B1 class=fstyle>
<input type=reset value="����" name=B2 class=fstyle>
</div>
</form>
<? } ?>
<? require("bottom.inc"); ?>
</body>
</html>

