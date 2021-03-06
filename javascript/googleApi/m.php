<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" 
      xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
    <title>Google Maps JavaScript API Example: LocalSearch Control</title> 
    <style type="text/css"> 
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style> 
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAtyEIj_EKTtl_GfXzPh166hQUnlvwMuD7brVw2azPf9Kd5EktnhQPhqKZ6Z3jY_RjCLJuzLOCrgCNzA&hl=zh-CN" 
      type="text/javascript"></script> 
    <script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script> 
    <script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script>    
    <script type="text/javascript"> 
 
      function initialize() {
        if (GBrowserIsCompatible()) {
        
          // Create and Center a Map
          var map = new GMap2(document.getElementById("map_canvas"));
          map.setCenter(new GLatLng(36.1145,120.4562), 13);
          map.addControl(new GLargeMapControl());
          map.addControl(new GMapTypeControl());
 
          // bind a search control to the map, suppress result list
          map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
        }
      }
      GSearch.setOnLoadCallback(initialize);
    </script> 
  </head> 
  <body onload="initialize()" onunload="GUnload()"> 
    <div id="map_canvas" style="width: 500px; height: 300px"></div> 
  </body> 
</html> 
 