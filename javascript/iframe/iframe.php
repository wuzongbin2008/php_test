<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function SetCwinHeight(obj)
{
  var cwin=obj;
  if (document.getElementById)
  {
    if (cwin && !window.opera)
    {alert("ok");
	   alert("h="+cwin.contentDocument.body.offsetHeight);
       if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight)
	   {
         cwin.height = cwin.contentDocument.body.offsetHeight; 
	   }
       else if(cwin.Document && cwin.Document.body.scrollHeight)
	   {
         cwin.height = cwin.Document.body.scrollHeight;
	   }
    }
  }
}
alert(navigator.appVersion);
</script>
</head>

<body>
<iframe width="100%" src="http://match.ek21.com" align="center" id="cwin" name="cwin" style="padding: 0pt; overflow-y: auto;"  frameborder="0" scrolling="no"></iframe>
</body>
</html>
