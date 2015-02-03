<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>新建网页 1</title>
</head>

<body>
<div id="img" style="position:absolute;">
<a href="http://www.pcschool.com.tw/Activity/9702_office/index.asp?fromto=10UK" target="_blank">
<img src="../../chat/xuite/images/3week300x100.gif" width="85px" height="50px" border="0" >
</a>
</div>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var xPos = 600; //20
var yPos = document.body.clientHeight-300;alert(yPos);
var step = 1; //原值是：1；此值控制图片的移动速度
var delay = 20;//变更位置的时间间隔
var height = 0;
var Hoffset = 0;
var Woffset = 0;
var yon = 0;
var xon = 0;
var pause = true;
var interval;
img.style.top = yPos;
function changePos()
{
   width = document.body.clientWidth;
   height = document.body.clientHeight;
   Hoffset = img.offsetHeight;
   Woffset = img.offsetWidth;
   img.style.left = xPos + document.body.scrollLeft;
   img.style.top = yPos + document.body.scrollTop;
   if (yon)
  {
    yPos = yPos + step;
  }
	else {
	yPos = yPos - step;
	}
	if (yPos < 0) {
	yon = 1;
	yPos = 0;
	}
	if (yPos >= (height - Hoffset)) {
	yon = 0;
	yPos = (height - Hoffset);
	}
	if (xon) {
	xPos = xPos + step;
	}
	else {
	xPos = xPos - step;
	}
	if (xPos < 0) {
	xon = 1;
	xPos = 0;
	}
	if (xPos >= (width - Woffset)) {
	xon = 0;
	xPos = (width - Woffset);
	}
}
function start() {
img.visibility = "visible";
interval = setInterval('changePos()', delay);}
start();
//End -->
</script >  

</body>

</html>