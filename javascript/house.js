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
function showmaindiv_area(id){
hid = id;
var x,y; 
if(!document.all){ 
x=e.pageX; 
y=e.pageY; 
}else{ 
x=document.body.scrollLeft+event.clientX; 
y=document.body.scrollTop+event.clientY; 
}
y = y+20;
	document.getElementById('maindiv1').style.top = y+'px';
	if(document.getElementById('maindiv1').style.display =='none'){
		document.getElementById('maindiv1').style.display = '';
	}
	var result = function(f){
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
	if(document.getElementById(hid+'span'))document.getElementById(hid+'span').innerHTML = uid;
	if(document.getElementById(hid+'span11'))document.getElementById(hid+'span11').innerHTML = '已分配给';
	if(document.getElementById('maindiv1'))document.getElementById('maindiv1').style.display = 'none';
	}
	Y.PostAjax('assign01.php','type=assign&hid='+hid+'&assign='+uid,result);	
}
function lookeditrecord(hid){
	var result = function(f){
		document.getElementById('diveditrecord').innerHTML = f.responseText;
	}
	Y.PostAjax('editrecord.php','hid='+hid,result);	
}