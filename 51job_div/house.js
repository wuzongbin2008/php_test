// JavaScript Document
function houseformsubmit(){
if( document.houseform.operatetype.value == '2'){
	if(CheckData('houseform.opercause','1','','請輸入操作事由！','1') == false){return false;}
}
if(CheckData('houseform.check','1','','請輸入審核狀態！','1') == false){return false;}
if(CheckData('houseform.htype','1','','請輸入户型情况！','1') == false){return false;}
if(CheckData('houseform.regtype','1','','請輸入户型情况！','1') == false){return false;}
if(CheckData('houseform.hnumber','1','','請輸入产权证号！','1') == false){return false;}
if(CheckData('houseform.floor_1','1','','請輸入楼层，必须是数字！','4') == false){return false;}
if(CheckData('houseform.floor_2','1','','請輸入总层，必须是数字！','4') == false){return false;}
if(CheckData('houseform.buildarea','1','','請輸入建筑面积！','1') == false){return false;}
if(CheckData('houseform.builddate','1','','請輸入建筑年代！','1') == false){return false;}
if(CheckData('houseform.repair','1','','請輸入装修情况！','1') == false){return false;}
if(CheckData('houseform.facility','1','','請輸入配套设施！','1') == false){return false;}
if(CheckData('houseform.price','1','','請輸入售价/租价！','1') == false){return false;}
if(CheckData('houseform.direction','1','','請輸入朝向！','1') == false){return false;}
return true;
}

function  operatetypechange(value)
{
	if( value == '2'){
		document.getElementById('opercausetd').style.display = '';
		if(CheckData('houseform.opercause','1','','請輸入操作事由！','1') == false){return false;}
	}else{
		document.getElementById('opercausetd').style.display = 'none';
	}
}

function  regtypechange(value){
	if( value == '4' || value == '5'){
		document.getElementById('depositspan').style.display = '';
	}else{
		document.getElementById('depositspan').style.display = 'none';
	}
}

function build_menu(code,type)
{
	Y.PostAjax('address.php','code='+code+'&type='+type,handle_menu);
}

function handle_menu(json){
	var content = eval('(' + json.responseText + ')');
	var type = content['type'];
	var opts = content['address'];
	var menu = document.getElementById(type);
	menu.length = 1;
	for(i=0;i<opts.length;i++)
	{
		menu[i+1] = new Option(opts[i].title, opts[i].code);
	}
	if(type == 'city'){
		var submenu = document.getElementById('area');
		submenu.length = 1;
	}
}

function build_menu_init(code,type)
{
	Y.PostAjax('address.php','code='+code+'&type='+type,handle_menu_init);
}

function handle_menu_init(json){
	var content = eval('(' + json.responseText + ')');
	var type = content['type'];
	var opts = content['address'];
	var menu = document.getElementById(type);
	var selectedopt = eval('s'+type);
	for(i=0;i<opts.length;i++)
	{
		var code = opts[i].code;
		menu[i+1] = new Option(opts[i].title, code);
		if(code == selectedopt){menu[i+1].selected=true;}
	}
}

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
		x=document.body.scrollLeft+event.clientX; 
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
		document.getElementById('maindiv_area').innerHTML = f.responseText;
		document.getElementById('maindiv_shop').innerHTML = '';
		document.getElementById('maindiv_admin').innerHTML = '';
	}
	Y.PostAjax('assign.php','type=area',result);
}

function showmaindiv_shop(id){
	var result = function(f){
		document.getElementById('maindiv_shop').innerHTML = f.responseText;
		document.getElementById('maindiv_admin').innerHTML = '';
	}
	Y.PostAjax('assign.php','type=shop&id='+id,result);
}

function showmaindiv_admin(id){
	var result = function(f){
		document.getElementById('maindiv_admin').innerHTML = f.responseText;
	}
	Y.PostAjax('assign.php','type=admin&id='+id,result);
}

function selectadmin(uid){
	var result = function(f){
	document.getElementById(hid+'span').innerHTML = uid;
	document.getElementById('maindiv1').style.display = 'none';
	}
	Y.PostAjax('assign01.php','type=assign&hid='+hid+'&assign'+uid,result);	
}