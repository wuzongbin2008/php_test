<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!--js读取b.html的宽和高,把读取到的宽和高设置到和a.html在同一个域的中间代理页面车c.html的src的hash里面-->  
<!--<iframe id="c_iframe"  height="0" width="0"  src="http://match.club.hinet.net/c.php" style="display:none" ></iframe>-->
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>

<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>

<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
<p>Hello World!</p>
</body>
<script type="text/javascript">
//auto resize
alert(location.search);
if(location.search=="?match")
{
	var b=document.getElementsByTagName("body")[0];
	var hashH = document.documentElement.scrollHeight; 
	var f=document.createElement("iframe");
		f.id="c_iframe";
		f.style.height=0;
		f.src="http://match.club.hinet.net/c.php"+'#'+hashH;
		b.appendChild(f);
}
</script>
</html>
