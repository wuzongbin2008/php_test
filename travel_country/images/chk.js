function chk_1(){
if (document.form1.userid.value==""){
alert("操作出错：请输入会员名！");
document.form1.userid.focus();
return false;
}
if (document.form1.userpsw.value==""){
alert("操作出错：请输入会员登录密码！");
document.form1.userpsw.focus();
return false;
}
return true;
}

function chk_4(){
if (document.form4.userid.value.length=="")
{alert("操作失败：留言者不能为空!");
document.form4.userid.focus();
return false;}
if (document.form4.title.value.length=="")
{alert("操作失败：留言标题不能为空!");
document.form4.title.focus();
return false;}
if (document.form4.content.value.length=="")
{alert("操作失败：请输入留言内容!");
document.form4.content.focus();
return false;}
return true;   
}

function re_so(){
if (document.order_form.cityname.value==0){
			alert("操作出错：请选择酒店所在城市！");
			document.order_form.cityname.focus();
			return false;
		}
if (document.order_form.date1.value==0){
			alert("操作出错：入住日期不能为空！");
			document.order_form.date1.focus();
			return false;}
if (document.order_form.date2.value==0){
			alert("操作出错：离开日期不能为空！");
			document.order_form.date2.focus();
			return false;}
if((document.order_form.date1.value.length>0)&&(!(isDateString(document.order_form.date1.value))))
{alert("入住日期不符合格式规范或为无效的日期!");
document.order_form.date1.focus();
return false;}
if((document.order_form.date2.value.length>0)&&(!(isDateString(document.order_form.date2.value))))
{alert("离开日期不符合格式规范或为无效的日期!");
document.order_form.date2.focus();
return false;}
if(stringToDate(document.order_form.date1.value,true)>=stringToDate(document.order_form.date2.value,true))
{alert("入住日期不能大于或者等于离开日期!");
return false;}

return true;   
}
