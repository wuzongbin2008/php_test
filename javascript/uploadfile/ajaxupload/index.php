<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax upload demo</title>
<!-- We will use version hosted by Google-->
<script src="jquery.min.js" type="text/javascript"></script>
<!-- Required for jQuery dialog demo-->
<script src="jquery-ui.min.js" type="text/javascript"></script>
<!-- AJAX Upload script doesn't have any dependencies-->
<script type="text/javascript" src="ajaxupload.3.6.js"></script>
<style type="text/css"> 
  body {
	  margin-left: 0px;
	  margin-top: 0px;
	  margin-right: 0px;
	  margin-bottom: 0px;
  }
  div.button {
	  height: 30px;	
	  width: 100px;
  
	  font-size: 14px;
	  color: #C7D92C;
	  text-align: center;
	  padding-top:5px;
  }
</style>
<script type= "text/javascript">
//alert("ok");
/*<![CDATA[*/
window.name="ba";
$(document).ready(function(){
 
	/* File Upload */
	var button = $('#button1'), interval;
	new AjaxUpload(button,{
		autoSubmit: false,
		name: 'myfile',
		onChange : function(file, ext){
			//显示选中的文档
			console.log($("input[name=myfile]").val());
			$("#button1").text(file);
			$("#delimg").show();
                        
		}
	});
	
	$("#a").click(function a(){
	    alert(document.getElementsByName("myfile")[0].value);
		alert($('input[name=myfile]').val());
	});
});
/*]]>*/
</script>
</head>
<body>
<table style="" border="0" cellpadding="0" cellspacing="0">
 <tr>
     <td>
    <div id="button1" style="width:130px; background-color:#999; height:30px; text-align:center; vertical-align:middle; color:#F00; overflow:hidden; padding-top:4px">+Attachment</div>
    </td>
    <td id="a" >aaaaa</td>
</tr>
</table>
</body>
</html>
