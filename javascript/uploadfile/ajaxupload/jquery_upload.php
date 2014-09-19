<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ajax upload demo</title>
<!-- We will use version hosted by Google-->
<script src="jquery.min.js" type="text/javascript"></script>
<!-- Required for jQuery dialog demo-->
<script src="jquery-ui.min.js" type="text/javascript"></script>
<!-- AJAX Upload script doesn't have any dependencies-->
<script type="text/javascript" src="ajaxupload.3.6.js"></script>
<link rel="stylesheet" href="jquery-ui.css" type="text/css" media="all" />
<style type="text/css"> 
body {font-family: verdana, arial, helvetica, sans-serif;font-size: 12px;background: #373A32;color: #D0D0D0;}
h1 {color: #C7D92C;	font-size: 18px; font-weight: 400;}
a {	color: white;}
a:hover, a.hover {color: #C7D92C;}
#text {	margin: 25px; }
ul { list-style: none; }
 
.example {	
	padding: 0 20px;
	float: left;		
	width: 230px;
}
 
.wrapper {
	width: 133px;
	margin: 0 auto;
}
 
div.button {
	height: 29px;	
	width: 133px;
	background: url(button.png) 0 0;
	
	font-size: 14px;
	color: #C7D92C;
	text-align: center;
	padding-top: 15px;
}
/* 
We can't use ":hover" preudo-class because we have
invisible file input above, so we have to simulate
hover effect with javascript. 
 */
div.button.hover {
	background: url(button.png) 0 56px;
	color: #95A226;	
}
#button2.hover, #button4.hover {
	text-decoration:underline;
}
</style>
<script type= "text/javascript">/*<![CDATA[*/
$(document).ready(function(){
 
	/* example 1 */
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
			button.text('Upload Completed');
						
			window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
			$('<li></li>').appendTo('#example1 .files').text(file);						
		}
	});
 
	/* example 2 */
	new AjaxUpload('#button2', {
		//action: 'upload.php',
		action: 'receive.php', // I disabled uploads in this example for security reaaons
		data : {
			'key1' : "This data won't",
			'key2' : "be send because",
			'key3' : "we will overwrite it"
		},
		onSubmit : function(file , ext){
			//if (ext && new RegExp('^(' + allowed.join('|') + ')$').test(ext)){
			if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)){
				/* Setting data */
				this.setData({
					'key': 'This string will be send with the file'
				});
				
				$('#example2 .text').text('Uploading ' + file);	
			} else {
				
				// extension is not allowed
				$('#example2 .text').text('Error: only images are allowed');
				// cancel upload
				return false;				
			}
	
		},
		onComplete : function(file){
			$('#example2 .text').text('Uploaded ' + file);				
		}		
	});
	
	/* example3 */
	new AjaxUpload('#button3', {
		//action: 'upload.php',
		action: 'receive.php', // I disabled uploads in this example for security reaaons
		name: 'myfile',
		onComplete : function(file){
			$('<li></li>').appendTo($('#example3 .files')).text(file);
		}	
	});		
	
	/* example4 */
	$("#dialog").dialog({ autoOpen: false });
	
	$('#open_dialog').click(function(){
		$("#dialog").dialog("open");
		return false;	
	});	
	
	new Ajax_upload('button4', {
		action: 'upload.htm',
		onSubmit : function(file , ext){
			$('#button4').text('Uploading ' + file);
			this.disable();	
		},
		onComplete : function(file){
			$('#button4').text('Uploaded ' + file);				
		}		
	});	
});/*]]>*/</script>
</head>
<body>
<div id="text">
<h1>Ajax upload for jQuery demo</h1>
<p>
	Feel free to view the source code of this page to see how the demo is done.
	Back to the <a href="http://valums.com/ajax-upload/">AJAX upload</a> project page
</p>
</div>
 
<ul>
	<li id="example1" class="example">
		<p>You can style button as you want</p>
		<div class="wrapper">
			<div id="button1" class="button">Upload</div>
		</div>
		<p>Uploaded files:</p>
		<ol class="files"></ol>
	</li>
	
	<li id="example2" class="example">
		<p>You can make a list of allowed file types</p>
		<a href="#" id="button2">Upload Image</a>
		<p class="text"></p>		
		
		<!-- Example 4 -->
		<p>You can use Ajax Uploader with jQuery UI dialog</p>
		<p><a id="open_dialog" href="#">Open dialog</a></p>
		
		<div id="dialog" style="display:none;" title="Basic dialog with Upload button">
			<p>The Ajax Upload script works perfectly with jQuery UI dialog</p>
			<a id="button4">Click to Upload</a>
		</div>
		<!-- /Example 4 -->
	</li>
	<li id="example3" class="example">
		<p>This script even works inside a form</p>		
		<form action="#" method="post">
			<p>Field 1 <input type="text" /></p>		
			<div>
				<input id="button3" type="file" />
			</div>
			<p>Uploaded files:</p>
			<ol class="files"></ol>
			<p>
				<input class="submit" type="submit" value="Submit form"/>	
			</p>
		</form>
	</li>
</ul>
 
</body>
</html>
