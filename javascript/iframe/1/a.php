<html>
<head>
    <title>父页面</title>
	<script>
function resetIframeHeight()
{
	try{
	
	  var str=window.clipboardData.getData('text');
	
	  var obj=document.getElementById('iframeID');
	
	  if(str.match(/^frameHeight=\d+$/))
	  {
	
		obj.style.height=parseInt(str.match(/\d+/))+'px';
	
		window.clipboardData.setData('text','null');
	
	  }
	}catch(e){}
	
	setTimeout(resetIframeHeight,100);
}
</script>
</head>

<body onload="resetIframeHeight();">
    <iframe id="iframeID" frameborder="0" name="iframeID" src="http://match.ek21.com/b.php" width="100%" height="50px"  ></iframe>
</body>
</html>

