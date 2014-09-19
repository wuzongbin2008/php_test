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
/*<![CDATA[*/
window.name="ba";
$(document).ready(function(){
 
	/* File Upload */
	var button = $('#button1'), interval;
	new AjaxUpload(button,{
		action: 'receive.php', // I disabled uploads in this example for security reasons
		//action: 'upload.htm', 
		name: 'myfile',
		onSubmit : function(file, ext){
			// change button text, when user selects file			
			button.text('Uploading');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 13){
					button.text(text + '.');					
				} else {
					button.text('Uploading');				
				}
			}, 200);
		},
		onComplete: function(file, response){
			button.text(response);		
			window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add delete button to the td
			$("#delimg").css("display", "block");
			window.parent.document.getElementById("fileupload").setAttribute('name',response);
			//alert("name="+parent.document.getElementById("fileupload").name);
		}
	});
	
	//delete image
	var delbtn=$("#delimg");
	delbtn.click(function(){
	    var imgName=button.text();
	    if(imgName)
		{
			$.ajax({
			   type: "POST",
			   url: "receive.php",
			   data: "action=ajax&imgName="+imgName,
			   success: function(msg){
				  if(msg==1)
				  {
					 button.text('+Attachment');
					 delbtn.css("display", "none");
					 window.parent.document.getElementById("fileupload").setAttribute('name',"");
				  }
			   }
			});
		}
	});
});

/*]]>*/
</script>
</head>
<body>
<table style=" background-color:#999" border="0" cellpadding="0" cellspacing="0">
 <tr>
     <td>
    <div id="button1" style="width:130px; height:30px; text-align:center; vertical-align:middle; color:#F00; overflow:hidden; padding-top:4px">+Attachment</div>
    </td>
    <td align="left" id="delTD" valign="middle"><input id='delimg' type='image' src='1.jpg' width='25px' height='25px' style="display:none" /></td>
</tr>
</table>
</body>
</html>