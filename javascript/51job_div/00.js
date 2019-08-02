// JavaScript Document
//window.onerror = function(){ return true;};
/*
get information:getWindowSize(), findPosX(a),findPosY(a),findScrollX(),findScrollY();
dom handle :gi(elementId),giv(elementId,[arg]),gt(root,elementTag),gn(elementName),getTagValue(root,elementTag),gv(o,[arg]),gh(elementId,[arg]),ShowMessage(Msg),HideMessage(),GetAjax(url, queryString, callback,[arg]),PostAjax(url, queryString, callback,[arg]),loadByAjax(url, queryString, callback),stringToDom:function(str)
event handle :findTarget(ev,node)
string check:chEn(str),chT(str),chEmail(str),getByteLength(str),chIdCard(str),twIdCard(str)
var m=this.getWindowSize();var bodyscrollleft=this.findScrollX();var left =bodyscrollleft+m[0]/2-80;+m[1]/2-20
*/
var Y={/*get information*/
getWindowSize:function()
{
	var g=[0,0];
	if(window.innerWidth)
	{
		g[0]=window.innerWidth;
		g[1]=window.innerHeight;
	}
	else if(document.documentElement&&document.documentElement.clientWidth)
	{
		g[0]=document.documentElement.clientWidth;
		g[1]=document.documentElement.clientHeight;
	}
	else
	{
		g[0]=document.body.clientWidth;
		g[1]=document.body.clientHeight;
	}
	return g;
},

findPosX:function(a)
{
	var d=0;
	if(a.getBoundingClientRect)
	d=a.getBoundingClientRect().left+this.findScrollX();
	else if(a.offsetParent)
	{
		do
		{
			d+=a.offsetLeft;a=a.offsetParent;
		 
		}while(a);
	}
	else if(a.x)
	d+=a.x;
	return d;
},

findPosY:function(a)
{
	var e=0;
	if(a.getBoundingClientRect)
	e=a.getBoundingClientRect().top+this.findScrollY();
	else if(a.offsetParent)
	{do{e+=a.offsetTop;a=a.offsetParent;}while(a);}else if(a.y)e+=a.y;return e;},findScrollX:function(){if(document.documentElement&&document.documentElement.scrollLeft)return document.documentElement.scrollLeft;else{return document.body.scrollLeft;}},findScrollY:function(){if(document.documentElement&&document.documentElement.scrollTop)return document.documentElement.scrollTop;else{return document.body.scrollTop;}},/* dom handle */gi:function(elementId){return document.getElementById(elementId);},giv:function(elementId){if(arguments.length > 1){document.getElementById(elementId).value = arguments[1];}else{return document.getElementById(elementId).value};},gt:function(root,elementTag){return root.getElementsByTagName(elementTag);},gn:function(elementName){return document.getElementsByName(elementName);},getTagValue:function(root,elementTag){var i=this.gt(root,elementTag);if(!i[0]||!i[0].firstChild)return null;else{return i[0].firstChild.nodeValue;}},gv:function(o){var obj =eval('document.' + o); if(arguments.length > 1){obj.value=arguments[1];}else{return obj.value;}},gh:function(elementId){if(arguments.length > 1){document.getElementById(elementId).innerHTML = arguments[1];}else{return document.getElementById(elementId).innerHTML;}},showMessage:function(Msg){var bodyscrolltop=this.findScrollY();var tipdiv=document.createElement('div');tipdiv.id='tipdiv';tipdiv.style.cssText='background:red; color:white; padding:3px 5px 3px 5px; position:absolute;z-index:30010; right:0px; top:'+bodyscrolltop+'px; font:14px tahoma;';tipdiv.innerHTML=Msg;document.body.appendChild(tipdiv);},hideMessage:function(){if(document.getElementById('tipdiv')){var tipdiv=document.getElementById('tipdiv');document.body.removeChild(tipdiv);}},GetAjax:function(url, queryString, callback){var z = url+'?'+queryString;var f;var Msg = ' 讀取中... ';if(arguments.length > 3)Msg = arguments[3];this.showMessage(Msg);if(window.ActiveXObject)f=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)f=new XMLHttpRequest();f.onreadystatechange=function(){if(f.readyState==4){ Y.hideMessage();callback(f);}};try{f.open('GET',z,true);f.send(null);}catch(ex){alert(ex);}},PostAjax:function (url, queryString, callback){var z = url;var f;var Msg = ' 讀取中... ';if(arguments.length > 3)Msg = arguments[3];this.showMessage(Msg);if(window.ActiveXObject)f=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)f=new XMLHttpRequest();f.onreadystatechange=function(){if(f.readyState==4){Y.hideMessage();callback(f);}};try{f.open('POST',z,true);f.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");f.send(queryString);}catch(ex){alert(ex);}},loadByAjax:function(resource,callbackFn){var bodyscrolltop=this.findScrollY();var c=document.createElement('div');c.style.cssText='background:red; color:white; padding:3px 5px 3px 5px; position:absolute; right:0px; top:'+bodyscrolltop+'px;font:12px tahoma;';c.innerHTML=' 讀取中... ';var b;if(window.ActiveXObject)b=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)b=new XMLHttpRequest();b.onreadystatechange=function(){if(b.readyState==4){document.body.removeChild(c);callbackFn(b);}};try{document.body.appendChild(c);b.open('GET',resource,true);b.send(null);}catch(ex){alert(ex);}},stringToDom:function(str){var h;if(window.ActiveXObject){h=new ActiveXObject("Microsoft.XMLDOM");h.loadXML(str);}else if(DOMParser){h=new DOMParser().parseFromString(str,"text/xml");}return h;},/* event handle */findTarget:function(ev,node){var target;if(window.event&&window.event.srcElement)target=window.event.srcElement;else if(ev&&ev.target)target=ev.target;while(node&&target&&target.nodeName.toLowerCase()!=node.toLowerCase())target=target.parentNode;return target;},twIdCard:function(str){var ID_Load=str.toUpperCase();if(ID_Load.length !=10){return false;}var ID_Input = new Array(10); for(var i=0;i<10;i++){ID_Input[i]=ID_Load.charAt(i);}var ENGString='ABCDEFGHIJKLMNOPQRSTUVWXYZ';ID_Input[0]=ENGString.indexOf(ID_Input[0]);if (ID_Input[0]==-1){return false;}if(ID_Input[1]!=1&&ID_Input[1]!=2){return false;}var Numstr='1,10,19,28,37,46,55,64,39,73,82,2,11,20,48,29,38,47,56,65,74,83,21,3,12,30';var NumArray=Numstr.split(',');var result=parseInt(NumArray[ID_Input[0]]);for (var i=1;i<10;i++){var NumString='0123456789';ID_Input[i]=NumString.indexOf(ID_Input[i]);if(ID_Input[i]==-1){return false;}else{result+=ID_Input[i]*(9-i);}}result+=1*ID_Input[9];if(result%10!=0){return false;}return true;},/*check english and number*/chEn:function(str){var pattern = /^[\w]+$/;return (pattern.test(str));},chEmail:function(str){var pattern = /(\S)+[@]{1}(\S)+[.]{1}(\w)+/;return (pattern.test(str));},/*tel number*/chT:function(str){var pattern = /^([\d]|-|#)*$/;return (pattern.test(str));},getByteLength:function(str){var st=new String(str);return (st.replace(/[^\x00-\xff]/g,"00").length);},/*idcard*/chIdCard:function(str){var pattern =/^([0-9]{15}|[0-9]{18})$/;return (pattern.test(str));}};
/*
Function Name：CheckData
功能描述：檢查欄位資料正確性
傳入參數：
1.ObjName：檢查欄位名稱，Form Name + Object Name
2.ObjLen：檢查長度
3.ObjValue：檢查值
4.AlerMsg：顯示錯誤訊息
5.CheckFlag：檢查方式，
  1:檢查長度(小於)，2:檢查值，3:是否存在某值,4:是否為數字,5:檢查是否有特殊符號,6：檢查長度(大於),7：檢查CheckBox是否有勾選
  8:大於某值,9:小於某值,12:身分證字號格式,13:檢查是英文或數位
傳回值：True/False
*/
function CheckData(ObjName,ObjLen,ObjValue,AlertMsg,CheckFlag){
	var i=0;
	var j=0;
	var chstr=new Array("'",";",","," ");
	var blnCheck=true;
	var Obj = eval('document.' + ObjName );
	switch(CheckFlag)
	{
		case '1': if(Obj.value.length < ObjLen){ blnCheck=false; }break;
		case '2': if(Obj.value != ObjValue ){ blnCheck=false; }break;
		case '3': if(Obj.value.indexOf(ObjValue) ==-1){ blnCheck=false; }break;
		case '4': if(isNaN(Number(Obj.value))==true){ blnCheck=false; }break;
		case '5': 
				for(i=0;i<=chstr.length;i++){if(Obj.value.indexOf(chstr[i]) !=-1 ){ blnCheck=false; break;}}
				break;
		case '6': if( Y.getByteLength(Obj.value)  >  ObjLen){ blnCheck=false; }break;
		case '7': 
				if(ObjValue == 'php'){
				var objForm = document.forms[ObjName];var checkBox=null;for(var i=0;i<objForm.length;i++){if(objForm.elements[i].type == "checkbox"){if(objForm.elements[i].checked == true){j+=1;break;}else if(checkBox==null){checkBox=objForm.elements[i];}}}
				}else{
				if(ObjLen=='0'){if(Obj.checked==true){j++;}}else{for(i=0;i<ObjLen;i++){if(Obj[i].checked ==true){j++;break;}}}
				} 
				if(j==0){ blnCheck=false; }	
				break;
		case '8': if(Obj.value >  ObjValue ){ blnCheck=false; }break;
		case '9': if(Obj.value  <  ObjValue){ blnCheck=false; }break;
		case '10':if(isNaN(Number(ObjValue))==true){ blnCheck=false; } break;
		case '11': if(ObjValue != '_'){ blnCheck=false; }break;
		case '12': if(!Y.twIdCard(Obj.value)){ blnCheck=false; }break;
		case '13': if(!Y.chEn(Obj.value)){ blnCheck=false; }break;
		case '14': if(!Y.chT(Obj.value)){ blnCheck=false; }break;
		case '15': if(!Y.chEmail(Obj.value)){ blnCheck=false; }break;
	}
	if (blnCheck==false){
		if (AlertMsg!='') { alert(AlertMsg);}
		if(CheckFlag=='7'){
			if(ObjValue=='php'){if(checkBox != null)checkBox.focus();}
			else if(ObjLen!='0'){Obj[0].focus();}else{Obj.focus();}
		}else{Obj.focus();}
		return false;
	}
	return true;
}
/*
Function Name：ConfirmMsg
功能描述：顯示確認的訊息框，例如是否確定刪除
傳入參數：
1.ErrMsg：確認的訊息
傳回值：True/False
*/
function ConfirmMsg(ErrMsg){
  if(ErrMsg != ''){
	  if(window.confirm(ErrMsg)){return true;}
	  return false;
  }
}
function ConfirmMsg2(ErrMsg,Url){
  if(ErrMsg != ''){
	  if(window.confirm(ErrMsg)){
		 window.location.href=Url;
	  }
	  return false;
  }
}
/*轉址*/
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
/*
Function Name：ShowDay
功能描述：顯示日期
傳入參數：
1.Obj：Form Name+Object Name
2.Num：顯示的日期
傳回值：無
*/
function ShowDay(Obj,Num) {  
    var x=0; 
	var y="document." + Obj +"_Y";
	var m="document." + Obj +"_M";
	var d="document." + Obj +"_D";
	var yi=eval("document." + Obj +"_Y.selectedIndex");
	var mi=eval("document." + Obj +"_M.selectedIndex");	
    var ar=new Array(1,31,2,28,3,31,4,30,5,31,6,30,7,31,8,31,9,30,10,31,11,30,12,31);
	for (i=eval(d +".options.length")-1;i>=0;i--) {
        eval(d + ".options[" + i + "]=null;");
    } 

	if (eval(m + ".options[" + mi +"].value")==2){
        if((eval(y + ".options[" + yi + "].value")-2000) % 4 == 0 ){
		   x=29;
		}else{
		   x=28;
		}
	}else{
	
	      for(i=0;i<ar.length;i+=2){
		      if(eval(m + ".options[" + mi + "].value")==ar[i]){
			     x=ar[i+1];
			  }
		  } 
	}	
	for (i=1;i<=x;i++) {
		eval(d + ".options[" + (i-1) + "]=new Option(" + i + "," + i +")");
	} 
	eval(d+".options[" + (Num-1) + "].selected=true");
}
/*
Function Name：BrowseImage
功能描述：預覽圖片
傳入參數：
1.ImageFile：圖片名稱(包含路徑)
傳回值：無
*/
function BrowseImage(ImageFile){
	if(ImageFile!=''){
		window.open(ImageFile);
	}
}

/*
Function Name：FocusColumn
功能描述：Focus在表單的欄位
傳入參數：
1.FormName：表單名稱
2.ColumnName：欄位名稱
傳回值：無
*/
function FocusColumn(FormName,ColumnName){
  eval('document.' + FormName + '.' + ColumnName + '.focus();');
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
	var url=selObj.options[selObj.selectedIndex].value;
	if(url.length>1)eval(targ+".location='"+url+"'");
	if (restore) selObj.selectedIndex=0;
}

/*另開視窗*/
function MM_openBrWindow(theURL,winName,features) { //v2.0
  var win = window.open(theURL,winName,features);
  win.focus();
}

/*
Function Name：Form_Submit
功能描述：各個列表中送出新增/修改/刪除表單使用
傳入參數：
1.Flag：1表新增,2表修改,3表刪除，並轉到FormNum+02.asp,4表刪除，並轉到FormNum+03.asp
2.FormNum：表單名稱中的數字
傳回值：true/false
*/
function Form_Submit(Flag,FormNum){
  var str;
  str="請輸入序號！";
  if(FormNum=='09') {str="請輸入帳號！";}
  if(Flag==1){
     window.location.href=FormNum + '01.asp?Flag=1';
  }else if(Flag==2){
			 if(CheckData('Form' + FormNum + '.ID','1','',str,'1')==false){
				return false;
			 }else if(FormNum!='09'){
			          if(CheckData('Form' + FormNum + '.ID','','',str,'4')==false){
					     return false;
					  }else{
					        window.location.href=FormNum + '01.asp?Flag=2&uniqid=' + eval('document.Form' + FormNum + '.ID.value');
					  }
			 }else{
				   window.location.href=FormNum + '01.asp?Flag=2&uniqid=' + eval('document.Form' + FormNum + '.ID.value');
			 }	
  }else if(Flag==3 || Flag==4){
			 if(CheckData('Form' + FormNum + '.ID','1','',str,'1')==false){
				return false;
			 }else if(FormNum!='09'){	
			          if(CheckData('Form' + FormNum + '.ID','','',str,'4')==false){
					     return false;
					  }else{
						   if(ConfirmMsg('請問是否確定刪除？')){ 
							  if (Flag==3){window.location.href= FormNum + '02.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value');};
							  if (Flag==4){window.location.href= FormNum + '03.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value');};
						   }
					  }
			 }else{
			       if(ConfirmMsg('請問是否確定刪除？')){ 
				      if (Flag==3){window.location.href= FormNum + '02.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value');};
					  if (Flag==4){window.location.href= FormNum + '03.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value');};
				   }
			 }	  
  }
  return false;
}

/*
Function Name：Form_Submit2
功能描述：各個列表中送出新增/修改/刪除表單使用
傳入參數：
1.Flag：1表新增,2表修改,3表刪除，並轉到FormNum+02.asp,4表刪除，並轉到FormNum+03.asp
2.FormNum：表單名稱中的數字
3.OtherVar：其他參數
傳回值：true/false
*/
function Form_Submit2(Flag,FormNum,OtherVar){
  if(Flag==1){
     window.location.href=FormNum + '01.asp?Flag=1' + OtherVar;
  }else if(Flag==2){
			 if((CheckData('Form' + FormNum + '.ID','1','','請輸入序號！','1')==false) || (CheckData('Form' + FormNum + '.ID','','','請輸入序號！','4')==false)){
				return false;
			 }else{
				   window.location.href=FormNum + '01.asp?Flag=2&uniqid=' + eval('document.Form' + FormNum + '.ID.value') + OtherVar;
			 }	
  }else if(Flag==3 || Flag==4){
			 if((CheckData('Form' + FormNum + '.ID','1','','請輸入序號！','1')==false) || (CheckData('Form' + FormNum + '.ID','','','請輸入序號！','4')==false)){
				return false;
			 }else{
			       if(ConfirmMsg('請問是否確定刪除？')){ 
				      if (Flag==3){window.location.href= FormNum + '02.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value') + OtherVar;};
					  if (Flag==4){window.location.href= FormNum + '03.asp?Flag=3&uniqid=' + eval('document.Form' + FormNum + '.ID.value') + OtherVar;};
				   }
			 }	  
  }
  return false;
}
/*
Function Name：CheckDate
功能描述：判斷日期格式是否正確
傳回值：無
*/
function CheckDate(ObjName,Msg){
  if(CheckData(ObjName+'_Y','4','','請輸入'+Msg+'-年！','1')==false){return false;}
  if(CheckData(ObjName+'_Y','','','日期格式不正確，請重新輸入'+Msg+'-年！','4')==false){return false;}
  if(CheckData(ObjName+'_Y','','2100','日期格式不正確，請重新輸入'+Msg+'-年！','8')==false){return false;}
  if(CheckData(ObjName+'_Y','','1911','日期格式不正確，請重新輸入'+Msg+'-年！','9')==false){return false;}
  if(CheckData(ObjName+'_M','1','','請輸入'+Msg+'-月！','1')==false){return false;}
  if(CheckData(ObjName+'_M','','','日期格式不正確，請重新輸入'+Msg+'-月！','4')==false){return false;}
  if(CheckData(ObjName+'_M','','12','日期格式不正確，請重新輸入'+Msg+'-月！','8')==false){return false;}
  if(CheckData(ObjName+'_M','','1','日期格式不正確，請重新輸入'+Msg+'-月！','9')==false){return false;}
  if(CheckData(ObjName+'_D','1','','請輸入'+Msg+'-日！','1')==false){return false;}
  if(CheckData(ObjName+'_D','','','日期格式不正確，請重新輸入'+Msg+'-日！','4')==false){return false;}
  if(CheckData(ObjName+'_D','','31','日期格式不正確，請重新輸入'+Msg+'-日！','8')==false){return false;}
  if(CheckData(ObjName+'_D','','1','日期格式不正確，請重新輸入'+Msg+'-日！','9')==false){return false;}
  return true;
}
/*
Function Name：ChkAll
功能描述：全選checkbox 或著 非全選
input1 表單名稱
input2 主使控件 this
onclick = ChkAll(form1,this);
傳回值：無
*/

function ChkAll(input1,input2)
{
    var objForm = document.forms[input1];
    var objLen = objForm.length;
    for (var iCount = 0; iCount < objLen; iCount++)
    {
        if (input2.checked == true)
        {
            if (objForm.elements[iCount].type == "checkbox")
            {
                objForm.elements[iCount].checked = true;
            }
        }
        else
        {
            if (objForm.elements[iCount].type == "checkbox")
            {
                objForm.elements[iCount].checked = false;
            }
        }
    }
}
/*
Function Name：ChkAllWithFlag
功能描述：全選checkbox 或著 非全選
input1 表單名稱
input2 主使控件 this
onclick = ChkAll(form1,this);
傳回值：無
*/

//function ChkAllWithFlag(input1,input2)
function ChkAllWithFlag(input1)
{
    var objForm = document.forms[input1];
    var objLen = objForm.length;
	var IndexFlag = 1;
	for (var iCount = 0; iCount < objLen; iCount++)
	{
		if (objForm.elements[iCount].type == "checkbox")
		{
			if (objForm.elements[iCount].checked == true)
			{IndexFlag = IndexFlag*1;}
			else
			{IndexFlag = IndexFlag*0;}
		}
	}
	//alert(IndexFlag);
	if(IndexFlag == 1)
	{
		for (var iCount = 0; iCount < objLen; iCount++)
		{
            if (objForm.elements[iCount].type == "checkbox")
            {
                objForm.elements[iCount].checked = false;
            }
		}
	}
	else
	{
		for (var iCount = 0; iCount < objLen; iCount++)
		{
            if (objForm.elements[iCount].type == "checkbox")
            {
                objForm.elements[iCount].checked = true;
            }
		}
	}
}
//圖片寬度
function DrawImage(ckp)
{
	var image=new Image();
	image.src=ckp.src;
	if(image.width>0 && image.height>0)
	{
		if(image.width>600)
		{
			ckp.width=600;
		}
	}
}