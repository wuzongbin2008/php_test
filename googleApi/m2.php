<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Control Initialization</title> 
	 <style type="text/css"> 
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style> 
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAtyEIj_EKTtl_GfXzPh166hQUnlvwMuD7brVw2azPf9Kd5EktnhQPhqKZ6Z3jY_RjCLJuzLOCrgCNzA&hl=zh-CN" type="text/javascript"></script> 
    <script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script> 
    <script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script>  
    <script type="text/javascript"> 
    //<![CDATA[
 
    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"),
            { size: new GSize(640,320) } );
		
		var center = new GLatLng(36.114485,120.45090);
        map.setCenter(center, 14);
        
		// 设置 GMarkerOptions 对象
		markerOptions = {draggable: true };
		var marker = new GMarker(center, markerOptions);
 
        GEvent.addListener(marker, "dragstart", function() {
          map.closeInfoWindow();
        });
 
        GEvent.addListener(marker, "dragend", function() {
          marker.openInfoWindowHtml("正在反弹...");
        });
 
        map.addOverlay(marker);
 
        var customUI = map.getDefaultUI();
        // Remove MapType.G_HYBRID_MAP
        customUI.maptypes.hybrid = false;
        map.setUI(customUI);
		
		// bind a search control to the map, suppress result list
        map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
      }
    }
	 GSearch.setOnLoadCallback(initialize);
    //]]>
    </script> 
  </head> 
 
  <body onload="initialize()" onunload="GUnload()"> 
    <div id="map_canvas" style="width: 640px; height: 320px"></div> 
  </body> 
</html> 