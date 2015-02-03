<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
<script type='text/javascript' src='lib/jquery.js'></script>
<script type='text/javascript' src='lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='lib/thickbox-compressed.js'></script>
<script type='text/javascript' src='jquery.autocomplete.js'></script>
<script type="text/javascript" src="multi-friend-input.js"></script>
<script type="text/javascript">
$(function(){
	  var selected_rows=0;
	  var selected_friends=0;
	  console.log("selected_friends=",selected_friends);
	  
	 var friendarr=new Array();
	 for(var i=0;i<17;i++)
	 {
		  friendarr.push({"name": "wj"+i,"uid": i});
	 }
	 multi_friend_input("#friendname",friendarr,selected_rows,selected_friends);   
});
</script>
</head>

<body>
<div id="selected_name">
  <input type="text" id="friendname" value="Select receiver" />
</div>
</body>
</html>
