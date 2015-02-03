<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="http://ditu.google.cn/maps?file=api&amp;v=2&amp;key=ABQIAAAAtyEIj_EKTtl_GfXzPh166hQUnlvwMuD7brVw2azPf9Kd5EktnhQPhqKZ6Z3jY_RjCLJuzLOCrgCNzA&hl=zh-CN" type="text/javascript"></script> 
    <script type="text/javascript"> 
    
    function initialize() 
	{
      if (GBrowserIsCompatible()) 
	  {
        var map = new GMap2(document.getElementById("map_canvas"));
        map.setCenter(new GLatLng(36.1145,120.4562), 14);
 
        var point = new GLatLng(36.1145,120.4562);
        map.addOverlay(new GMarker(point));
        
      }
    }
 
    </script> 
</head>
<body onload="initialize()" onunload="GUnload()"> 
    <div id="map_canvas" style="width: 500px; height: 300px"></div> 
  </body> 
<!--<body>
<img src="http://ditu.google.cn/staticmap?center=36.1145,120.4562&zoom=14&size=312x312&maptype=mobile\
&markers=39.949328,116.3875,blues%7C39.949328,116.3775,greeng%7C39.943028,116.3975,redc\
&key=ABQIAAAAtyEIj_EKTtl_GfXzPh166hQUnlvwMuD7brVw2azPf9Kd5EktnhQPhqKZ6Z3jY_RjCLJuzLOCrgCNzA&sensor=false" />
</body>-->
</html>
