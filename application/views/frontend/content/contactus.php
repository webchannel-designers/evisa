<section class="section orange1 content-contact">
      <div class="container">
        <div class="address-wrapper">
          <div class="row">
            <div class="col-lg-6">
              <h4>leisure <br>
              travel</h4>
              
              <?php echo $contacts[1]['address'] ?>
            </div>
            <div class="col-lg-6">
              <h4>head office &amp; <br>
              business travel</h4>
              
              <?php echo $contacts[0]['address'] ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php $who=count($contacts); ?>
    <section class="section content-getTouch">
      <div class="container-fluid">
        <div class="h-text">GET IN TOUCH</div>
        <div class="row">
          <div class="col-lg-6">
            <div class="section-title mb-5">
              <p>OUR LOCATION</p>
            </div>
            <div class="map">
              <div class="location-list">
                <ul>
                  <li class="active"><a href="javascript:void(0)" onclick="myclick(1)">Leisure travels</a></li>
                  <li><a href="javascript:void(0);" onclick="myclick(0)">Head Office</a></li>
                </ul>
              </div>
              <div id="map" style="height: 408px; width: 100%;">
                              <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
				<script src="<?php echo base_url('public/frontend/js/markerwithlabel.js'); ?>" type="text/javascript"></script> 
                <script language="javascript">
								var locations = [
                                <?php 
								$t=1;
								$scriptstr=''; foreach($contacts as $contact):
								
								$condesc=$contact['address'];
//								if($contact['working']!="")
//								{
//								$condesc.="<br><b>Working Time</b> : ".$contact['working'];
//								}
								//$condesc.="<br><b>Phone</b> : ".$contact['phone']."<br><b>Fax</b> : ".$contact['fax'];
								//$place = $contact['area'];
								
								//$cord = explode(",",$contact['location']);
								
								//print_r($cord);
								
								//echo stripslashes($condesc); 
								
								//  $maddress=$contact['location'];
								//  $lat_langArray=json_decode(file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$maddress.'&sensor=false'));
								//  $ee=$lat_langArray->results;
								//  if($ee[0]->geometry->location->lat!=''){
								//  $latLong=$ee[0]->geometry->location->lat;
								//  $latLon=$ee[0]->geometry->location->lng;								
								
								$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
								
								$lines = explode("\n", $condesc);
								
								$new_lines = array();
								
								foreach ($lines as $i => $line) {
								
									if(!empty($line))
								
										$new_lines[] = trim($line);
								
								}
								
								$condesc =implode($new_lines);
								$latitude=$contact['latitude'];
								
								@$longitude=$contact['longitude'];
								if($latitude=="" and $longitude=="")
								{
									
								}
								else
								{
									$lat=$latitude;
									$lon=$longitude;
								}
								if($longitude!="")
								{
								?>
									['<?php echo $condesc; ?>', '<?php echo $latitude; ?>', <?php echo $longitude; ?>, 4]<?php if($t!=$who) { ?>,<?php } ?>
								<?php
								}
								$t++;
								endforeach; 
								?>
								];
								var map = new google.maps.Map(document.getElementById('map'), {
									zoom: 11,
									center: new google.maps.LatLng('<?php echo $lat; ?>', '<?php echo $lon; ?>'),
									scrollwheel: false,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								});
								
								var infowindow = new google.maps.InfoWindow();
								
								var marker, i;
								var markers = [];
								//alert(locations.length);
								for (i = 0; i < locations.length; i++) {
									//marker = new google.maps.Marker({
//										position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//										icon: '<?php echo base_url('public/frontend/images/icon-map-pointer-new.png'); ?>',
//										map: map,
//										title: '<?php echo $contact['location']; ?>'
//									});
if(i==0)
{
	pointer='<?php echo base_url('public/frontend/images/map-pointer-1.png'); ?>';
}
else
{
	pointer='<?php echo base_url('public/frontend/images/map-pointer-2.png'); ?>';
}

									var marker = new MarkerWithLabel({
									   position: new google.maps.LatLng(locations[i][1], locations[i][2]),
									   //mapTypeControl: true,

									   //position: google.maps.ControlPosition.RIGHT_CENTER,
									   icon: pointer,
									   map: map,
									   draggable: true,
									   raiseOnDrag: true,
									   //labelContent: "<?php echo $contact['location']; ?><br><?php echo $contact['location']; ?>",
									   //labelAnchor: new google.maps.Point(3, 30),
									   //labelClass: "labels", // the CSS class for the label
									   labelInBackground: false
									 });

									google.maps.event.addListener(marker, 'click', (function (marker, i) {
										return function () {
											infowindow.setContent(locations[i][0]);
											infowindow.open(map, marker);
										}
									})(marker, i));
									markers.push(marker);
								}	
								
									function myclick(i) {

									google.maps.event.trigger(markers[i], 'click');
									map.setCenter(markers[i].getPosition());	
									//alert(markers[i].getPosition().lng());
									//map.setCenter(markers[i].getPosition().lat()+1,markers[i].getPosition().lng()-1);								
									//$(this).addClass('active').siblings().removeClass('active');
									//alert("hi");
								  	}
						</script> 
</div>
              
            </div>
          </div>
          <div class="col-lg-6">
            <div class="section-title mb-5">
              <p>How can we help you?</p>
            </div>
            <h5>We are here to assist!</h5>
            <div class="form style-2 enquiry-form" id="formcontainer">
              <?php /*?><form action="#">
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="name">My Name is</label>
                    <input class="form-control" id="name" type="text" placeholder=""/>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="about">I want to know about</label>
                    <select class="form-control" id="about" type="text" placeholder="">
                      <option value="1">about 1</option>
                      <option value="2">about 2</option>
                      <option value="3">about 3</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="phone">Call me on</label>
                    <input class="form-control" id="phone" type="text" placeholder=""/>
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="email">My email is</label>
                    <input class="form-control" id="email" type="text" placeholder=""/>
                  </div>
                  <div class="form-group col-lg-12">
                    <label for="message">Here’s something more to add</label>
                    <textarea class="form-control" id="message" type="text" placeholder=""></textarea>
                  </div>
                  <div class="btn-holder col-lg-12">
                    <button class="btn blue1 btn-submit">Send</button>
                  </div>
                </div>
              </form><?php */?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php /*?><div class="breadcrumb-holder">
      <div class="container">
        <?php $this->load->view('frontend/include/breadcrumb'); ?>
      </div>
    </div>
<section class="section text-center">
      <div class="container">
        <div class="title">
          <h2><?php echo $this->pagetitle; ?></h2>
        </div>
      </div>
    </section>
    
    <section class="section quick-contact grey2 animatedParent animateOnce" data-sequence='500' data-appear-top-offset='-300'>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 animated fadeInUpShort" data-id='1'>
            <h4>Auto Body Center L.L.C</h4>
            <p>To be the market leader in multi-brand Body repair through distinctive solutions.</p>
          </div>
          <div class="col-lg-8">
            <address class="row">
              <div class="col animated fadeInUpShort" data-id='2'>
                <p class="col-red1 mb-3">VISIT OUR LOCATION</p>
                <?php echo $contacts[0]['address'] ?>
              </div>
              <div class="col animated fadeInUpShort" data-id='3'>
                <p class="col-red1 mb-3">LET'S TALK</p>
                <p>
                  Phone:  <?php echo $this->alphasettings['PHONE_SLUG']; ?><br>
                  Fax:  <?php echo $this->alphasettings['FAX_SLUG']; ?>
                </p>
              </div>
              <div class="col animated fadeInUpShort" data-id='4'>
                <p class="col-red1 mb-3">E-MAIL US NOW</p>
                <p><?php echo $this->alphasettings['ADMIN_EMAIL']; ?></p>
              </div>
            </address>
          </div>
        </div>
      </div>
    </section>
    
    <section class="section">
      <div class="container">
        <div class="title mb-5">
          <h2>Our Location</h2>
        </div>
      </div>
      <div class="location-wrapper">
        <div class="container-fluid">
          <div class="row">
          <?php $who=count($contacts); ?>
            <div class="col-lg-6 map" id="map" style="height: 735px;">
                <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
				<script src="<?php echo base_url('public/frontend/js/markerwithlabel.js'); ?>" type="text/javascript"></script> 
                <script language="javascript">
								var locations = [
                                <?php 
								$t=1;
								$scriptstr=''; foreach($contacts as $contact):
								
								$condesc=$contact['address'];
//								if($contact['working']!="")
//								{
//								$condesc.="<br><b>Working Time</b> : ".$contact['working'];
//								}
								//$condesc.="<br><b>Phone</b> : ".$contact['phone']."<br><b>Fax</b> : ".$contact['fax'];
								//$place = $contact['area'];
								
								//$cord = explode(",",$contact['location']);
								
								//print_r($cord);
								
								//echo stripslashes($condesc); 
								
								//  $maddress=$contact['location'];
								//  $lat_langArray=json_decode(file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$maddress.'&sensor=false'));
								//  $ee=$lat_langArray->results;
								//  if($ee[0]->geometry->location->lat!=''){
								//  $latLong=$ee[0]->geometry->location->lat;
								//  $latLon=$ee[0]->geometry->location->lng;								
								
								$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
								
								$lines = explode("\n", $condesc);
								
								$new_lines = array();
								
								foreach ($lines as $i => $line) {
								
									if(!empty($line))
								
										$new_lines[] = trim($line);
								
								}
								
								$condesc =implode($new_lines);
								$latitude=$contact['latitude'];
								
								@$longitude=$contact['longitude'];
								if($latitude=="" and $longitude=="")
								{
									
								}
								else
								{
									$lat=$latitude;
									$lon=$longitude;
								}
								if($longitude!="")
								{
								?>
									['<?php echo $condesc; ?>', '<?php echo $latitude; ?>', <?php echo $longitude; ?>, 4]<?php if($t!=$who) { ?>,<?php } ?>
								<?php
								}
								$t++;
								endforeach; 
								?>
								];
								var map = new google.maps.Map(document.getElementById('map'), {
									zoom: 11,
									center: new google.maps.LatLng('<?php echo $lat; ?>', '<?php echo $lon; ?>'),
									scrollwheel: false,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								});
								
								var infowindow = new google.maps.InfoWindow();
								
								var marker, i;
								var markers = [];
								//alert(locations.length);
								for (i = 0; i < locations.length; i++) {
									//marker = new google.maps.Marker({
//										position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//										icon: '<?php echo base_url('public/frontend/images/icon-map-pointer-new.png'); ?>',
//										map: map,
//										title: '<?php echo $contact['location']; ?>'
//									});

									var marker = new MarkerWithLabel({
									   position: new google.maps.LatLng(locations[i][1], locations[i][2]),
									   //mapTypeControl: true,

									   //position: google.maps.ControlPosition.RIGHT_CENTER,
									   icon: '<?php echo base_url('public/frontend/images/map-pointer.png'); ?>',
									   map: map,
									   draggable: true,
									   raiseOnDrag: true,
									   //labelContent: "<?php echo $contact['location']; ?><br><?php echo $contact['location']; ?>",
									   //labelAnchor: new google.maps.Point(3, 30),
									   //labelClass: "labels", // the CSS class for the label
									   labelInBackground: false
									 });

									google.maps.event.addListener(marker, 'click', (function (marker, i) {
										return function () {
											infowindow.setContent(locations[i][0]);
											infowindow.open(map, marker);
										}
									})(marker, i));
									markers.push(marker);
								}	
								
									function myclick(i) {

									google.maps.event.trigger(markers[i], 'click');
									map.setCenter(markers[i].getPosition());	
									//alert(markers[i].getPosition().lng());
									//map.setCenter(markers[i].getPosition().lat()+1,markers[i].getPosition().lng()-1);								
									//$(this).addClass('active').siblings().removeClass('active');
									//alert("hi");
								  	}
						</script> 

            <!--<img class="img-fluid" src="images/location-map.jpg" alt="" style="height: 735px;"/>-->
            </div>
            <div class="col-lg-6 loc-eqHeight grey2"></div>
          </div>
        </div>
        <div class="container">
          <div class="row justify-content-end">
            <div class="col-lg-6 loc-eqHeight grey2">
              <div class="title mb-5">
                <h2>Enquiries</h2>
              </div>
              <h4 class="mb-4">LEAVE YOUR MESSAGE</h4>
              <div class="form style-1" id="formcontainer">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><?php */?>