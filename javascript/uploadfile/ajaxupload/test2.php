<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="fileuploader.css" rel="stylesheet" type="text/css">	
<script src="jquery.min.js" type="text/javascript"></script>
<style>
.file {
   position: absolute; right: 0px; top: 0px; font-family: Arial; font-size: 118px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; cursor: pointer; opacity: 0; 
}
.div1 {
  position: relative; overflow-x: hidden; overflow-y: hidden; direction: ltr; 
}
</style>
<script type= "text/javascript">
/*<![CDATA[*/
function fileFromPath(file){
	return file.replace(/.*(\/|\\)/, "");			
}

function getExt(file){
	return (/[.]/.exec(file)) ? /[^.]+$/.exec(file.toLowerCase()) : '';
}

$(document).ready(function(){
   $("#_attachments").change(function(){
      var val=$(this).val();
      console.log(val);
      $("#text").text(val);
});
});

/*]]>*/
</script>
</head>

<body>

<form id="t">
<div id="aaa" class="qq-upload-button qq-upload-button-hover" style="position: relative; overflow-x: hidden; overflow-y: hidden; direction: ltr; ">
<span id="text">uploadfile</span><input type="file" id="_attachments" class="file" /></div>
</form>
</body>
</html>
