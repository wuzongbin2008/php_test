<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
    <title>子页面</title>
    <SCRIPT LANGUAGE="JavaScript">
    //在body.onload中调用
    function AutoResizeHeight(){
      try{
          var control = window.navigator.createFrame(this);
          control.resizeHeight();
       }catch(ex){}
    }
    </script>
</head>

<body onload="window.clipboardData.setData('text',String('frameHeight='+window.document.body.scrollHeight));">
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
</html>