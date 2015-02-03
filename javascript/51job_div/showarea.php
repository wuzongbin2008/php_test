<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Untitled Document</title>
<script language="javascript">
// JavaScript Document
var Y={/*get information*/getWindowSize:function(){var g=[0,0];if(window.innerWidth){g[0]=window.innerWidth;g[1]=window.innerHeight;}else if(document.documentElement&&document.documentElement.clientWidth){g[0]=document.documentElement.clientWidth;g[1]=document.documentElement.clientHeight;}else{g[0]=document.body.clientWidth;g[1]=document.body.clientHeight;}return g;},findPosX:function(a){var d=0;if(a.getBoundingClientRect)d=a.getBoundingClientRect().left+this.findScrollX();else if(a.offsetParent){do{d+=a.offsetLeft;a=a.offsetParent;}while(a);}else if(a.x)d+=a.x;return d;},findPosY:function(a){var e=0;if(a.getBoundingClientRect)e=a.getBoundingClientRect().top+this.findScrollY();else if(a.offsetParent){do{e+=a.offsetTop;a=a.offsetParent;}while(a);}else if(a.y)e+=a.y;return e;},findScrollX:function(){if(document.documentElement&&document.documentElement.scrollLeft)return document.documentElement.scrollLeft;else{return document.body.scrollLeft;}},findScrollY:function(){if(document.documentElement&&document.documentElement.scrollTop)return document.documentElement.scrollTop;else{return document.body.scrollTop;}},/* dom handle */gi:function(elementId){return document.getElementById(elementId);},giv:function(elementId){if(arguments.length > 1){document.getElementById(elementId).value = arguments[1];}else{return document.getElementById(elementId).value};},gt:function(root,elementTag){return root.getElementsByTagName(elementTag);},gn:function(elementName){return document.getElementsByName(elementName);},getTagValue:function(root,elementTag){var i=this.gt(root,elementTag);if(!i[0]||!i[0].firstChild)return null;else{return i[0].firstChild.nodeValue;}},gv:function(o){var obj =eval('document.' + o); if(arguments.length > 1){obj.value=arguments[1];}else{return obj.value;}},gh:function(elementId){if(arguments.length > 1){document.getElementById(elementId).innerHTML = arguments[1];}else{return document.getElementById(elementId).innerHTML;}},showMessage:function(Msg){var bodyscrolltop=this.findScrollY();var tipdiv=document.createElement('div');tipdiv.id='tipdiv';tipdiv.style.cssText='background:red; color:white; padding:3px 5px 3px 5px; position:absolute;z-index:30010; right:0px; top:'+bodyscrolltop+'px; font:14px tahoma;';tipdiv.innerHTML=Msg;document.body.appendChild(tipdiv);},hideMessage:function(){if(document.getElementById('tipdiv')){var tipdiv=document.getElementById('tipdiv');document.body.removeChild(tipdiv);}},GetAjax:function(url, queryString, callback){var z = url+'?'+queryString;var f;var Msg = ' 讀取中... ';if(arguments.length > 3)Msg = arguments[3];this.showMessage(Msg);if(window.ActiveXObject)f=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)f=new XMLHttpRequest();f.onreadystatechange=function(){if(f.readyState==4){ Y.hideMessage();callback(f);}};try{f.open('GET',z,true);f.send(null);}catch(ex){alert(ex);}},PostAjax:function (url, queryString, callback){var z = url;var f;var Msg = ' 讀取中... ';if(arguments.length > 3)Msg = arguments[3];this.showMessage(Msg);if(window.ActiveXObject)f=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)f=new XMLHttpRequest();f.onreadystatechange=function(){if(f.readyState==4){Y.hideMessage();callback(f);}};try{f.open('POST',z,true);f.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");f.send(queryString);}catch(ex){alert(ex);}},loadByAjax:function(resource,callbackFn){var bodyscrolltop=this.findScrollY();var c=document.createElement('div');c.style.cssText='background:red; color:white; padding:3px 5px 3px 5px; position:absolute; right:0px; top:'+bodyscrolltop+'px;font:12px tahoma;';c.innerHTML=' 讀取中... ';var b;if(window.ActiveXObject)b=new ActiveXObject('Microsoft.XMLHTTP');else if(window.XMLHttpRequest)b=new XMLHttpRequest();b.onreadystatechange=function(){if(b.readyState==4){document.body.removeChild(c);callbackFn(b);}};try{document.body.appendChild(c);b.open('GET',resource,true);b.send(null);}catch(ex){alert(ex);}},stringToDom:function(str){var h;if(window.ActiveXObject){h=new ActiveXObject("Microsoft.XMLDOM");h.loadXML(str);}else if(DOMParser){h=new DOMParser().parseFromString(str,"text/xml");}return h;},/* event handle */findTarget:function(ev,node){var target;if(window.event&&window.event.srcElement)target=window.event.srcElement;else if(ev&&ev.target)target=ev.target;while(node&&target&&target.nodeName.toLowerCase()!=node.toLowerCase())target=target.parentNode;return target;},twIdCard:function(str){var ID_Load=str.toUpperCase();if(ID_Load.length !=10){return false;}var ID_Input = new Array(10); for(var i=0;i<10;i++){ID_Input[i]=ID_Load.charAt(i);}var ENGString='ABCDEFGHIJKLMNOPQRSTUVWXYZ';ID_Input[0]=ENGString.indexOf(ID_Input[0]);if (ID_Input[0]==-1){return false;}if(ID_Input[1]!=1&&ID_Input[1]!=2){return false;}var Numstr='1,10,19,28,37,46,55,64,39,73,82,2,11,20,48,29,38,47,56,65,74,83,21,3,12,30';var NumArray=Numstr.split(',');var result=parseInt(NumArray[ID_Input[0]]);for (var i=1;i<10;i++){var NumString='0123456789';ID_Input[i]=NumString.indexOf(ID_Input[i]);if(ID_Input[i]==-1){return false;}else{result+=ID_Input[i]*(9-i);}}result+=1*ID_Input[9];if(result%10!=0){return false;}return true;},/*check english and number*/chEn:function(str){var pattern = /^[\w]+$/;return (pattern.test(str));},chEmail:function(str){var pattern = /(\S)+[@]{1}(\S)+[.]{1}(\w)+/;return (pattern.test(str));},/*tel number*/chT:function(str){var pattern = /^([\d]|-|#)*$/;return (pattern.test(str));},getByteLength:function(str){var st=new String(str);return (st.replace(/[^\x00-\xff]/g,"00").length);},/*idcard*/chIdCard:function(str){var pattern =/^([0-9]{15}|[0-9]{18})$/;return (pattern.test(str));}};

var hid = '';
function showmaindiv_area(id)
{
	hid = id;
	var x,y; 
	if(!document.all)
	{ 
		x=e.pageX; 
		y=e.pageY; 
	}
	else
	{ 
		x=document.body.scrollLeft+event.clientX; //alert('ok');
		y=document.body.scrollTop+event.clientY; 
	}
	
	y = y+20;
	document.getElementById('maindiv1').style.top = y+'px';
	
	if(document.getElementById('maindiv1').style.display =='none')
	{
		document.getElementById('maindiv1').style.display = '';
	}
	
	var result = function(f)
	{   
	    //alert('ok');alert('aa='+f.responseText);
		document.getElementById('maindiv_area').innerHTML = f.responseText;
		document.getElementById('maindiv_shop').innerHTML = '';
		document.getElementById('maindiv_admin').innerHTML = '';
	}
	Y.PostAjax('assign.php','type=province',result);
}

function showmaindiv_city(id){
	var result = function(f)
	{
	    alert('ok');alert('aa='+f.responseText);
		document.getElementById('maindiv_shop').innerHTML = f.responseText;
		document.getElementById('maindiv_admin').innerHTML = '';
	}
	alert(id);
	Y.PostAjax('assign.php','type=city&provinceID='+id,result);
}

function showmaindiv_admin(id){
	var result = function(f)
	{
		document.getElementById('maindiv_admin').innerHTML = f.responseText;
	}
	Y.PostAjax('assign.php','type=city&provinceID='+id,result);
}




</script>
</head>

<body>
<a href="javascript:;" onclick="showmaindiv_area(1);">选择负责人</a>

<div id="maindiv1" style="top:1px; left:240px; position:absolute; width:500px; height:auto; border:#999999 2px solid; z-index:5; background:#FFFFFF; display:none;">
<div id="maindiv_header" style=" padding-top:5px; padding-right:5px; height:22px;background:#000066; display:block; text-align:right">
	<span onclick="document.getElementById('maindiv1').style.display = 'none'" style="color:#FFFFFF; cursor:pointer;">关闭</span>
</div>
<div id="maindiv_area" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
<div id="maindiv_shop" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
<div id="maindiv_admin" style=" padding-top:5px; padding-right:5px; height:22px; display:block;"></div>
</div>
</body>
</html>
