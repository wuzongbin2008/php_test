<html>
<head>
<title> Over-Domain Data Fetching Test Page</title>
<script type="text/javascript">
var lastScript;
var h=document.getElementsByTagName("head")[0];
alert(location.search);
function loadScript(url)
{
	var f=document.createElement("script");
	var d=new Date().getTime();
	f.type="text/javascript";
	f.id=d;
	f.src=url+'?'+d;
	h.appendChild(f);
	if(lastScript&&g(lastScript))
	{
	  g(lastScript).parentNode.removeChild(g(lastScript));
	}
	lastScript=d;
}

function g(x){return document.getElementById(x)};
</script>
</head>

<body>
<button onClick="loadScript('http://match.ek21.com/test/alert.js')">Test Alert</button><br />
<button onClick="loadScript('http://match.ek21.com/test/info.js')">Get My Info</button><br />
My Name: <input id="myname" type="text" value="" /><br />
My Blog: <input id="myblog" type="text" value="" />
</body>
</html>
