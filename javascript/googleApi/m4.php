<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"> 
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <title>Google Maps JavaScript API Example: Street View Data Example</title> 
    <script src="http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAzr2EBOXUKnm_jVnk0OJI7xSosDVG8KKPE1-m51RBrvYughuyMxQ-i1QfUnH94QxWIa6N4U6MouMmBA"
            type="text/javascript"></script> 
    <script type="text/javascript"> 
    var map;
    var myPano;   
    var panoClient;
    var nextPanoId;
 
    function initialize() {
      var fenwayPark = new GLatLng(36.114485,120.45090);
      var fenwayPOV = {yaw:370.64659986187695,pitch:-20};
      
      panoClient = new GStreetviewClient();      
      
      map = new GMap2(document.getElementById("map_canvas"));
      map.setCenter(fenwayPark, 15);
      GEvent.addListener(map, "click", function(overlay,latlng) {
        panoClient.getNearestPanorama(latlng, showPanoData);
      });
      
      myPano = new GStreetviewPanorama(document.getElementById("pano"));
      myPano.setLocationAndPOV(fenwayPark, fenwayPOV);
      GEvent.addListener(myPano, "error", handleNoFlash);  
      panoClient.getNearestPanorama(fenwayPark, showPanoData);
    }
    
    function showPanoData(panoData) {
      if (panoData.code != 200) {
        GLog.write('showPanoData: Server rejected with code: ' + panoData.code);
        return;
      }
      nextPanoId = panoData.links[0].panoId;
      var displayString = [
        "Panorama ID: " + panoData.location.panoId,
        "LatLng: " + panoData.location.latlng,
        "Copyright: " + panoData.copyright,
        "Description: " + panoData.location.description,
        "Next Pano ID: " + panoData.links[0].panoId
      ].join("<br/>");
      map.openInfoWindowHtml(panoData.location.latlng, displayString);
      
      GLog.write('Viewer moved to' + panoData.location.latlng);
      myPano.setLocationAndPOV(panoData.location.latlng);
    }
    
    function next() {
      // Get the next panoId
      // Note that this is not sophisticated. At the end of the block, it will get stuck
      panoClient.getPanoramaById(nextPanoId, showPanoData);
    }
    
    function handleNoFlash(errorCode) {
      if (errorCode == 603) {
        alert("Error: Flash doesn't appear to be supported by your browser");
        return;
      }
    }  
    </script> 
  </head> 
  <body onload="initialize()" onunload="GUnload()"> 
    <div id="map_canvas" style="width: 500px; height: 400px"></div> 
    <div name="pano" id="pano" style="width: 500px; height: 300px"></div> 
    <input type="button" onclick="next()" value="Next"/> 
  </body> 
</html> 