<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="jquery.min.js" type="text/javascript"></script>
<!-- Required for jQuery dialog demo-->
<script src="jquery-ui.min.js" type="text/javascript"></script>
<!-- AJAX Upload script doesn't have any dependencies
<script type="text/javascript" src="ajaxupload.3.6.js"></script>-->
<script type="text/javascript" src="jquery_ajaxupload2.js"></script>
<script type= "text/javascript">
/* 初始化控件*/
$(document).ready(function(){
	var button = $("#aaa"), interval;
	new AjaxUpload(button,"t",{
		name: '_attachments',
		autoSubmit: false,
		onChange : function(file, ext){
			//显示选中的文档
			alert($("input[name=_attachments]").val());
			//alert($("input[name=_attachments]").val());
			$("#aaa").html(file);
			//$("#delimg").show();
            
		}
	});
});
</script>
</head>

<body>
<input type="file" />
<form id="t">
<div id="aaa" style="width:130px; height:30px; text-align:center; vertical-align:middle; color:#F00; overflow:hidden; padding-top:4px">uploadfile</div>
</form>
</body>
</html>
