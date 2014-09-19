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
 
    function initialize() 
	{
      if (GBrowserIsCompatible()) 
	  {
        var map = new GMap2(document.getElementById("map_canvas"),
            { size: new GSize(640,320) } );
		
		var center = new GLatLng(36.114485,120.45090);
        map.setCenter(center, 14);
		
		// 为所有标记创建指定阴影、图标尺寸灯的基础图标
        var baseIcon = new GIcon();
        baseIcon.shadow = "http://www.google.cn/mapfiles/shadow50.png";
        baseIcon.iconSize = new GSize(20, 34);
        baseIcon.shadowSize = new GSize(37, 34);
        baseIcon.iconAnchor = new GPoint(9, 34);
        baseIcon.infoWindowAnchor = new GPoint(9, 2);
        baseIcon.infoShadowAnchor = new GPoint(18, 25);
        
		// 创建信息窗口显示对应给定索引的字母的标记
        function createMarker(point, index) {
          // Create a lettered icon for this point using our icon class
          var letter = String.fromCharCode("A".charCodeAt(0) + index);
          var letteredIcon = new GIcon(baseIcon);
          letteredIcon.image = "http://www.google.cn/mapfiles/marker" + letter + ".png";
 
          // 设置 GMarkerOptions 对象
          markerOptions = { icon:letteredIcon,draggable: true};
          var marker = new GMarker(point, markerOptions);
 
          GEvent.addListener(marker, "click", function() {
            marker.openInfoWindowHtml("标记  <b>" + letter + "</b>");
          });
		  
          return marker;
        }
		
		var marker=createMarker(center,0);
		
		GEvent.addListener(marker, "dragstart", function() {map.closeInfoWindow();});
 
        GEvent.addListener(marker, "dragend", function() {marker.openInfoWindowHtml("正在反弹...");});
		  
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