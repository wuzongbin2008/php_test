<? require("connection.php"); ?>
<? require("tools.php"); ?>
<? //require("checkpass.php"); ?>

<?
$table="test";
$onload="";

if($addedit_subed=="true"){
//表单提交后

	$dtime=date("Y-m-d H:i:s",time());


	//服务器端验证
	//outcheck(checkvalue($username,"","",1,"用户名"));
	//outcheck(checkvalue($password,"","",1,"密码"));
	//outcheck(checkvalue($name,"","",1,"姓名"));
	//outcheck(checkvalue($code,"","",1,"身份证号"));
	//outcheck(checkvalue($sex,"","",1,"性别"));
	//outcheck(checkvalue($born,"","",1,"生日"));
	//outcheck(checkvalue($shuxiang,"","",1,"属相"));
	//outcheck(checkvalue($xinzuo,"","",1,"星座"));
	//outcheck(checkvalue($xuexin,"","",1,"血型"));
	//outcheck(checkvalue($minzhu,"","",1,"民族"));
	//outcheck(checkvalue($shenggao,"","",1,"身高"));
	//outcheck(checkvalue($tizhong,"","",1,"体重"));
	//outcheck(checkvalue($hukou,"","",1,"户口所在地"));
	//outcheck(checkvalue($life,"","",1,"现居住地"));
	//outcheck(checkvalue($xueli,"","",1,"学历"));


	if($editid==""){	//添加状态
		/* 防止二义性信息逻辑
		$TEST_RESULT=mysql_query("SELECT * FROM ".$table." WHERE username='".$username."'");
		if(mysql_num_rows($TEST_RESULT)>0){
			outjsmsg("用户名已存在!");
			exit();
		}
		*/

		//添加时使用的字段
		$field1=array("username","password","name","code","sex","born","shuxiang","xinzuo","xuexin","minzhu","shenggao","tizhong","hukou","life","xueli","dtime");
		$value1=array($username,$password,$name,$code,$sex,$born,$shuxiang,$xinzuo,$xuexin,$minzhu,$shenggao,$tizhong,$hukou,$life,$xueli,$dtime);


		for($i=0;$i<=sizeof($field1)-1;$i++){
			$value1[$i]=str_replace("'","''",$value1[$i]);
		}

		$sql = "INSERT INTO " . $table . " (" . implode($field1, ",") .") VALUES ('" .implode($value1, "','") . "')";
		$word="你的信息已成功加入!";
	}else{	//编辑状态

		//编辑时使用的字段
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
		$word="你的信息已成功修改!";
	}

	if(!mysql_query($sql)){
		$word="操作失败!";
	}

}else{
//进入页面时(非提交)
	$editid = $editid; //传入此参数则视为编辑状态
	if($editid!=""){	//编辑状态
		$onload="onload=\"page_onload();\"";
		$result=mysql_query("select * from " . $table . " where id =" . $editid);
		$row=mysql_fetch_array($result);

		$id=$row["id"];
		$username=$row["username"];
		$password=$row["password"];
		//二次密码的值要等于密码字段的值
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

	}else{	//添加状态
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
//设置单选框、多选框、下拉菜单的值
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
/* 如需验证二次密码时用
if(add.password.value!=add.repassword.value){
	alert('两次密码不相同!');
	return false;
}
*/

//客户端验证
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

<tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>用户名：</span></td>
<td width=359><input type=text name="username" size=20 class=fstyle  value="<? print(htmlspecialchars($username));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>密码：</span></td>
<td width=359><input type=text name="password" size=20 class=fstyle  value="<? print(htmlspecialchars($password));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>重输密码：</span></td>
<td width=359><input type=password name="repassword" size=20 class=fstyle  value="<? print(htmlspecialchars($repassword));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>姓名：</span></td>
<td width=359><input type=text name="name" size=20 class=fstyle  value="<? print(htmlspecialchars($name));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>身份证号：</span></td>
<td width=359><input type=text name="code" size=20 class=fstyle  value="<? print(htmlspecialchars($code));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>性别：</span></td>
<td width=359><input type=radio value="男" name="sex" class=fstyle>男<input type=radio value="女" name="sex" class=fstyle>女</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>生日：</span></td>
<td width=359><input type=text name="born" size=20 class=fstyle  value="<? print(htmlspecialchars($born));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>属相：</span></td>
<td width=359><select name="shuxiang" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="鼠">鼠</option>
<option value="牛">牛</option>
<option value="虎">虎</option>
<option value="兔">兔</option>
<option value="龙">龙</option>
<option value="蛇">蛇</option>
<option value="马">马</option>
<option value="羊">羊</option>
<option value="猴">猴</option>
<option value="鸡">鸡</option>
<option value="狗">狗</option>
<option value="猪">猪</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>星座：</span></td>
<td width=359><select name="xinzuo" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="白羊座">白羊座</option>
<option value="金牛座">金牛座</option>
<option value="双子座">双子座</option>
<option value="巨蟹座">巨蟹座</option>
<option value="狮子座">狮子座</option>
<option value="处女座">处女座</option>
<option value="天秤座">天秤座</option>
<option value="天蝎座">天蝎座</option>
<option value="人马座">人马座</option>
<option value="山羊座">山羊座</option>
<option value="水瓶座">水瓶座</option>
<option value="双鱼座">双鱼座</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>血型：</span></td>
<td width=359><select name="xuexin" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="1">1</option>
<option value="2">2</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>民族：</span></td>
<td width=359><select name="minzhu" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="汉族">汉族</option>
<option value="回族">回族</option>
<option value="蒙古族">蒙古族</option>
<option value="维吾尔族">维吾尔族</option>
<option value="藏族">藏族</option>
<option value="满族">满族</option>
<option value="苗族">苗族</option>
<option value="彝族">彝族</option>
<option value="壮族">壮族</option>
<option value="布依族">布依族</option>
<option value="朝鲜族">朝鲜族</option>
<option value="侗族">侗族</option>
<option value="瑶族">瑶族</option>
<option value="白族">白族</option>
<option value="土家族">土家族</option>
<option value="哈尼族">哈尼族</option>
<option value="哈萨克族">哈萨克族</option>
<option value="傣族">傣族</option>
<option value="黎族">黎族</option>
<option value="傈僳族">傈僳族</option>
<option value="佤族">佤族</option>
<option value="畲族">畲族</option>
<option value="高山族">高山族</option>
<option value="拉祜族">拉祜族</option>
<option value="水族">水族</option>
<option value="东乡族">东乡族</option>
<option value="纳西族">纳西族</option>
<option value="景颇族">景颇族</option>
<option value="柯尔克孜族">柯尔克孜族</option>
<option value="土族">土族</option>
<option value="达斡尔族">达斡尔族</option>
<option value="仫佬族">仫佬族</option>
<option value="羌族">羌族</option>
<option value="布朗族">布朗族</option>
<option value="撒拉族">撒拉族</option>
<option value="毛南族">毛南族</option>
<option value="仡佬族">仡佬族</option>
<option value="锡伯族">锡伯族</option>
<option value="阿昌族">阿昌族</option>
<option value="普米族">普米族</option>
<option value="塔吉克族">塔吉克族</option>
<option value="怒族">怒族</option>
<option value="乌孜别克族">乌孜别克族</option>
<option value="俄罗斯族">俄罗斯族</option>
<option value="鄂温克族">鄂温克族</option>
<option value="德昂族">德昂族</option>
<option value="保安族">保安族</option>
<option value="裕固族">裕固族</option>
<option value="京族">京族</option>
<option value="塔塔尔族">塔塔尔族</option>
<option value="独龙族">独龙族</option>
<option value="鄂伦春族">鄂伦春族</option>
<option value="赫哲族">赫哲族</option>
<option value="门巴族">门巴族</option>
<option value="珞巴族">珞巴族</option>
<option value="基诺族">基诺族</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>身高：</span></td>
<td width=359><input type=text name="shenggao" size=20 class=fstyle  value="<? print(htmlspecialchars($shenggao));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>体重：</span></td>
<td width=359><input type=text name="tizhong" size=20 class=fstyle  value="<? print(htmlspecialchars($tizhong));  ?>">
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>户口所在地：</span></td>
<td width=359><select name="hukou" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="北京">北京</option>
<option value="上海">上海</option>
<option value="天津">天津</option>
<option value="重庆">重庆</option>
<option value="广西">广西</option>
<option value="安徽">安徽</option>
<option value="福建">福建</option>
<option value="甘肃">甘肃</option>
<option value="广东">广东</option>
<option value="贵州">贵州</option>
<option value="海南">海南</option>
<option value="河北">河北</option>
<option value="河南">河南</option>
<option value="黑龙江">黑龙江</option>
<option value="湖北">湖北</option>
<option value="湖南">湖南</option>
<option value="吉林">吉林</option>
<option value="江苏">江苏</option>
<option value="江西">江西</option>
<option value="辽宁">辽宁</option>
<option value="内蒙古">内蒙古</option>
<option value="宁夏">宁夏</option>
<option value="青海">青海</option>
<option value="山东">山东</option>
<option value="山西">山西</option>
<option value="陕西">陕西</option>
<option value="四川">四川</option>
<option value="新疆">新疆</option>
<option value="西藏">西藏</option>
<option value="云南">云南</option>
<option value="浙江">浙江</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>现居住地：</span></td>
<td width=359><select name="life" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="北京">北京</option>
<option value="上海">上海</option>
<option value="天津">天津</option>
<option value="重庆">重庆</option>
<option value="广西">广西</option>
<option value="安徽">安徽</option>
<option value="福建">福建</option>
<option value="甘肃">甘肃</option>
<option value="广东">广东</option>
<option value="贵州">贵州</option>
<option value="海南">海南</option>
<option value="河北">河北</option>
<option value="河南">河南</option>
<option value="黑龙江">黑龙江</option>
<option value="湖北">湖北</option>
<option value="湖南">湖南</option>
<option value="吉林">吉林</option>
<option value="江苏">江苏</option>
<option value="江西">江西</option>
<option value="辽宁">辽宁</option>
<option value="内蒙古">内蒙古</option>
<option value="宁夏">宁夏</option>
<option value="青海">青海</option>
<option value="山东">山东</option>
<option value="山西">山西</option>
<option value="陕西">陕西</option>
<option value="四川">四川</option>
<option value="新疆">新疆</option>
<option value="西藏">西藏</option>
<option value="云南">云南</option>
<option value="浙江">浙江</option>
</select>
</td></tr><tr><td width=208 align=right bgcolor=#D2D8BE><span class=fstyle>学历：</span></td>
<td width=359><select name="xueli" size=1  class=fstyle>
<option value="">-请选择-</option>
<option value="小学">小学</option>
<option value="初中">初中</option>
<option value="高中">高中</option>
<option value="中专">中专</option>
<option value="大专">大专</option>
<option value="本科">本科</option>
<option value="硕士">硕士</option>
<option value="博士">博士</option>
<option value="博士后">博士后</option>
</select>
</td></tr>

</table>
</div>
<div align=center>
<input type=submit value="提交"  name=B1 class=fstyle>
<input type=reset value="重填" name=B2 class=fstyle>
</div>
</form>
<? } ?>
<? require("bottom.inc"); ?>
</body>
</html>

