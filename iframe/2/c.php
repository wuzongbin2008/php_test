<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">

	var b_iframe = parent.parent.document.getElementById("b_iframe");   
	if(b_iframe)
	{
		var hash_url = window.location.hash;   
		//var hash_width = hash_url.split("#")[1].split("|")[0]+"px"; 
		var h= parseInt(hash_url.split("#")[1].split("|")[0]);//alert(h);
		var hash_height;  
		
		//b_iframe.style.width = hash_width;  
		if(navigator.appName == "Microsoft Internet Explorer")
		{
		   if(navigator.appVersion.match(/8./i)=='8.') 
		   {
			  //h+=39;
			  hash_height = h+"px"; 
		   }
		   if(navigator.appVersion.match(/7./i)=='7.') 
		   {
			  hash_height = h+"px"; 
		   }
		   if(navigator.appVersion.match(/6./i)=='6.') 
		   {
			  hash_height = h+"px"; 
		   }
		}
		else if(navigator.appName == "Netscape")
		{
		   //h+=39;
		   hash_height = h+"px"; 
		}
		b_iframe.style.height = hash_height;
    }
</script>  
</head>

<body>
</body>
</html>
