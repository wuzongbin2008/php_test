function chk_1(){
if (document.form1.userid.value==""){
alert("���������������Ա����");
document.form1.userid.focus();
return false;
}
if (document.form1.userpsw.value==""){
alert("���������������Ա��¼���룡");
document.form1.userpsw.focus();
return false;
}
return true;
}

function chk_4(){
if (document.form4.userid.value.length=="")
{alert("����ʧ�ܣ������߲���Ϊ��!");
document.form4.userid.focus();
return false;}
if (document.form4.title.value.length=="")
{alert("����ʧ�ܣ����Ա��ⲻ��Ϊ��!");
document.form4.title.focus();
return false;}
if (document.form4.content.value.length=="")
{alert("����ʧ�ܣ���������������!");
document.form4.content.focus();
return false;}
return true;   
}

function re_so(){
if (document.order_form.cityname.value==0){
			alert("����������ѡ��Ƶ����ڳ��У�");
			document.order_form.cityname.focus();
			return false;
		}
if (document.order_form.date1.value==0){
			alert("����������ס���ڲ���Ϊ�գ�");
			document.order_form.date1.focus();
			return false;}
if (document.order_form.date2.value==0){
			alert("���������뿪���ڲ���Ϊ�գ�");
			document.order_form.date2.focus();
			return false;}
if((document.order_form.date1.value.length>0)&&(!(isDateString(document.order_form.date1.value))))
{alert("��ס���ڲ����ϸ�ʽ�淶��Ϊ��Ч������!");
document.order_form.date1.focus();
return false;}
if((document.order_form.date2.value.length>0)&&(!(isDateString(document.order_form.date2.value))))
{alert("�뿪���ڲ����ϸ�ʽ�淶��Ϊ��Ч������!");
document.order_form.date2.focus();
return false;}
if(stringToDate(document.order_form.date1.value,true)>=stringToDate(document.order_form.date2.value,true))
{alert("��ס���ڲ��ܴ��ڻ��ߵ����뿪����!");
return false;}

return true;   
}
