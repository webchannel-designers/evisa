<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Web</title>
<meta name="desription" content= ""/>
<meta name="keywords" content=""/>
<base href="<?php echo base_url('/'); ?>" />
<style type="text/css">
body {
	font:normal 12px Arial, Helvetica, sans-serif;
	color:#FFF;
	line-height:17px;
}
</style>
<style type="text/css">
.wrap-map {
	float:left;
	width:610px;
	height:410px;
	z-index:999999!important;
}
h3 {
	margin:0;
	padding:0;
}
</style>
</head>
<body onLoad="initialize()">
<div class="wrap-map">
  <div id="map_canvas" style="width:610px; height:410px"></div>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

/* An InfoBox is like an info window, but it displays
 * under the marker, opens quicker, and has flexible styling.
 * @param {GLatLng} latlng Point to place bar at
 * @param {Map} map The map on which to display this InfoBox.
 * @param {Object} opts Passes configuration options - content,
 *   offsetVertical, offsetHorizontal, className, height, width
 */
function InfoBox(opts) {
  google.maps.OverlayView.call(this);
  this.latlng_ = opts.latlng;
  this.map_ = opts.map;
  this.offsetVertical_ = -220;
  this.offsetHorizontal_ = -2;
  this.height_ = 200;
  this.width_ = 275;

  var me = this;
  this.boundsChangedListener_ =
    google.maps.event.addListener(this.map_, "bounds_changed", function() {
      return me.panMap.apply(me);
    });

  // Once the properties of this OverlayView are initialized, set its map so
  // that we can display it.  This will trigger calls to panes_changed and
  // draw.
  this.setMap(this.map_);
}

/* InfoBox extends GOverlay class from the Google Maps API
 */
InfoBox.prototype = new google.maps.OverlayView();

/* Creates the DIV representing this InfoBox
 */
InfoBox.prototype.remove = function() {
  if (this.div_) {
    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
  }
};

/* Redraw the Bar based on the current projection and zoom level
 */
InfoBox.prototype.draw = function() {
  // Creates the element if it doesn't exist already.
  this.createElement();
  if (!this.div_) return;

  // Calculate the DIV coordinates of two opposite corners of our bounds to
  // get the size and position of our Bar
  var pixPosition = this.getProjection().fromLatLngToDivPixel(this.latlng_);
  if (!pixPosition) return;

  // Now position our DIV based on the DIV coordinates of our bounds
  this.div_.style.width = this.width_ + "px";
  this.div_.style.left = (pixPosition.x + this.offsetHorizontal_) + "px";
  this.div_.style.height = this.height_ + "px";
  this.div_.style.top = (pixPosition.y + this.offsetVertical_) + "px";
  this.div_.style.display = 'block';
};

/* Creates the DIV representing this InfoBox in the floatPane.  If the panes
 * object, retrieved by calling getPanes, is null, remove the element from the
 * DOM.  If the div exists, but its parent is not the floatPane, move the div
 * to the new pane.
 * Called from within draw.  Alternatively, this can be called specifically on
 * a panes_changed event.
 */
InfoBox.prototype.createElement = function() {
  var panes = this.getPanes();
  var div = this.div_;
  if (!div) {
    // This does not handle changing panes.  You can set the map to be null and
    // then reset the map to move the div.
    div = this.div_ = document.createElement("div");
    div.style.border = "0px none";
    div.style.position = "absolute";
    div.style.background = "url('<?php echo base_url('public/frontend/images/map-info-bg.png') ?>')";
    div.style.width = this.width_ + "px";
    div.style.height = this.height_ + "px";
    var contentDiv = document.createElement("div");
    contentDiv.style.paddingLeft = "23px"
    contentDiv.innerHTML = '<div  style="float:left; width:67px; height:118px;"><img src="<?php echo base_url('public/frontend/images/map-logo.png') ?>"></div><?php echo $location->location.'<br />'.(str_replace(array("<p>","</p>","\r\n","\r","\n","\0","\t"),array("","<br />","","","","",""),trim(stripslashes($location->address))));?>';

    var topDiv = document.createElement("div");
    topDiv.style.textAlign = "right";
    var closeImg = document.createElement("img");
    closeImg.style.width = "15px";
    closeImg.style.height = "15px";
	closeImg.style.marginRight = "10px";
	closeImg.style.marginTop = "11px";
    closeImg.style.cursor = "pointer";
    closeImg.src = "<?php echo base_url('public/frontend/images/close-map-info.png') ?>";
    topDiv.appendChild(closeImg);
	


    function removeInfoBox(ib) {
      return function() {
        ib.setMap(null);
      };
    }

    google.maps.event.addDomListener(closeImg, 'click', removeInfoBox(this));

    div.appendChild(topDiv);
    div.appendChild(contentDiv);
    div.style.display = 'none';
    panes.floatPane.appendChild(div);
    this.panMap();
  } else if (div.parentNode != panes.floatPane) {
    // The panes have changed.  Move the div.
    div.parentNode.removeChild(div);
    panes.floatPane.appendChild(div);
  } else {
    // The panes have not changed, so no need to create or move the div.
  }
}






/* Pan the map to fit the InfoBox.
 */
InfoBox.prototype.panMap = function() {
  // if we go beyond map, pan map
  var map = this.map_;
  var bounds = map.getBounds();
  if (!bounds) return;

  // The position of the infowindow
  var position = this.latlng_;

  // The dimension of the infowindow
  var iwWidth = this.width_;
  var iwHeight = this.height_;

  // The offset position of the infowindow
  var iwOffsetX = this.offsetHorizontal_;
  var iwOffsetY = this.offsetVertical_;

  // Padding on the infowindow
  var padX = 40;
  var padY = 40;

  // The degrees per pixel
  var mapDiv = map.getDiv();
  var mapWidth = mapDiv.offsetWidth;
  var mapHeight = mapDiv.offsetHeight;
  var boundsSpan = bounds.toSpan();
  var longSpan = boundsSpan.lng();
  var latSpan = boundsSpan.lat();
  var degPixelX = longSpan / mapWidth;
  var degPixelY = latSpan / mapHeight;

  // The bounds of the map
  var mapWestLng = bounds.getSouthWest().lng();
  var mapEastLng = bounds.getNorthEast().lng();
  var mapNorthLat = bounds.getNorthEast().lat();
  var mapSouthLat = bounds.getSouthWest().lat();

  // The bounds of the infowindow
  var iwWestLng = position.lng() + (iwOffsetX - padX) * degPixelX;
  var iwEastLng = position.lng() + (iwOffsetX + iwWidth + padX) * degPixelX;
  var iwNorthLat = position.lat() - (iwOffsetY - padY) * degPixelY;
  var iwSouthLat = position.lat() - (iwOffsetY + iwHeight + padY) * degPixelY;

  // calculate center shift
  var shiftLng =
      (iwWestLng < mapWestLng ? mapWestLng - iwWestLng : 0) +
      (iwEastLng > mapEastLng ? mapEastLng - iwEastLng : 0);
  var shiftLat =
      (iwNorthLat > mapNorthLat ? mapNorthLat - iwNorthLat : 0) +
      (iwSouthLat < mapSouthLat ? mapSouthLat - iwSouthLat : 0);

  // The center of the map
  var center = map.getCenter();

  // The new map center
  var centerX = center.lng() - shiftLng;
  var centerY = center.lat() - shiftLat;

  // center the map to the new shifted center
  map.setCenter(new google.maps.LatLng(centerY, centerX));

  // Remove the listener after panning is complete.
  google.maps.event.removeListener(this.boundsChangedListener_);
  this.boundsChangedListener_ = null;
};


function initialize() {
    var myOptions = {
      zoom: 16,
      center: new google.maps.LatLng(<?php echo $location->latitude ?>,<?php echo $location->longitude ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      sensor: 'true'
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $location->latitude ?>,<?php echo $location->longitude ?>),
        map: map,
		icon: '<?php echo base_url('public/frontend/images/marker-icon.png') ?>',
		animation: google.maps.Animation.DROP
    });
	
  google.maps.event.addListener(marker, 'click', function(e) {      
	  var infoBox = new InfoBox({latlng: marker.getPosition(), map: map});
	  
    });
   // google.maps.event.trigger(marker, "click");
    
  }  

</script>
</div>
</body>
</html>