<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!--js读取b.html的宽和高,把读取到的宽和高设置到和a.html在同一个域的中间代理页面车c.html的src的hash里面-->  
<iframe id="c_iframe"  height="0" width="0"  src="http://match.club.hinet.net/c.php" style="display:none" ></iframe>
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
/*alert("s="+document.body.scrollWidth);*/
//alert("c="+document.body.clientHeight);
//alert("o="+document.body.offsetHeight);
var b_width = Math.max(document.body.scrollWidth,document.body.clientWidth);   //alert("f="+b_width);
var b_height = Math.max(document.body.scrollHeight,document.body.clientHeight); //alert("fh="+b_height);
var c_iframe = document.getElementById("c_iframe");   
c_iframe.src = c_iframe.src+"#"+b_width+"|"+b_height; //http://www.taobao.com/c.html#width|height"  
</script>
</html>