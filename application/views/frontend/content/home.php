<?php if($this->brands!="") { ?>

<?php /*?><section class="section section-brands animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-200">
  <div class="container-fluid">
    <div class="section-title">
      <h2>Brands</h2>
    </div>
    <div class="row">
      <?php $i=0; foreach($this->brands as $brand) { ?>
      <?php
		if($brand['author']!="")
		{
			$url=$brand['author'];
		}
		else
		{
			$url="javascript:void(0)";
		}
		
		?>
      <?php
		if($brand['image']!="")
		{
           $imgurl=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/contents/'.$brand['image'])."&w=309&h=147&zc=3";	
		}
		else
		{
           $imgurl=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=309&h=147&zc=1";		
		}
			  ?>
      <div class="item cell animated fadeInRightShort" data-id="<?php echo $i; ?>">
        <div class="inner"><a href="<?php echo site_url('brands/view/'.$brand['slug']); ?>"><img class="img-fluid" src="<?php echo $imgurl; ?>" alt=""/></a></div>
      </div>
      <?php $i++; } ?>
    </div>
  </div>
</section><?php */?>
<?php } ?>
<?php /*?><section class="section animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-300">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9">
        <div class="section-title">
          <h2>Product Category</h2>
        </div>
      </div>
      <?php if($catalogue->pdf!="") { ?>
      
      <?php } ?>
    </div>
    
  </div>
</section><?php */?>
<?php /*?><section class="section lightGrey section-featured animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-300">
  <div class="container-fluid">
    <div class="section-title">
      <h2>Featured Products</h2>
    </div>
    <div class="row">
      <div class="featured-slider owl-carousel animated fadeInUpShort" data-id="1">
        <?php $i=3;foreach($featured as $item) { ?>
        <?php
				if($item['image']!="")
				{
				$url = base_url('public/uploads/products/'.$item['image']);
				}
				else
				{
				$url = base_url('public/frontend/images/noimage.jpg');
				}
			  ?>
        <div class="item " >
          <h4 class="title"><a href="<?php echo site_url('products/view/'.$item['slug']); ?>"><?php echo $item['title']; ?></a></h4>
          <figure><a href="<?php echo site_url('products/view/'.$item['slug']); ?>"><img class="img-fluid" src="<?php echo $url; ?>" alt=""/></a></figure>
          <div class="content">
            <p><?php echo $item['short_desc']; ?></p>
          </div>
          <div class="item-footer"><a class="btn blue br" href="<?php echo site_url('products/view/'.$item['slug']); ?>">More Details</a></div>
        </div>
        <?php $i++; } ?>
      </div>
    </div>
  </div>
</section><?php */?>
<?php /*?><section class="section section-about animatedParent animateOnce" data-sequence="500" data-appear-top-offset="-300">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h2 class="col-white animated fadeInUpShort" data-id="<?php echo $i++; ?>">About Us</h2>
        </div>
        <!--<h3 class="mb-4 animated fadeInUpShort" data-id="<?php echo $i++; ?>"><?php echo $about->short_desc; ?></h3>-->
        <div class="row">
          <div class="col-lg-6 col-md-8"> <?php echo $about->short_desc; ?> </div>
          <div class="col-lg-6 col-md-4"> <a href="<?php echo base_url('public/uploads/contents/'.$about->image3); ?>" class="fancybox"><img class="img-fluid" src="<?php echo base_url('public/uploads/contents/'.$about->image3); ?>"></a></div>
        </div>
        <p class="animated fadeInUpShort" data-id="<?php echo $i++; ?>">
        <div class="btn-wrapper mt-5 animated fadeInUpShort" data-id="<?php echo $i++; ?>"><a class="btn white br" href="<?php echo site_url('contents/lists/about-us'); ?>">More Details</a></div>
      </div>
    </div>
  </div>
  </div>
</section><?php */?>
<?php /*?><section class="section section-branches">
  <div class="container-fluid">
    <div class="section-title">
      <h2>Branches</h2>
    </div>
    <div class="row">
      <div class="col-lg-2 col-md-3 pr-md-0">
        <ul class="nav nav-tabs" role="tablist">
          <?php $i=0; foreach($contacts as $item) { ?>
          <li class="nav-item"><a class="nav-link <?php if($i==0) { ?>active<?php } ?>" data-toggle="tab" href="#branch<?php echo $item['id']; ?>" role="tab" onclick="myclick(<?php echo $i; ?>)" ><?php echo $item['location']; ?></a></li>
          <?php $i++; } ?>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4 blue2 pl-md-0">
        <div class="tab-content">
          <?php $i=0; foreach($contacts as $item) { ?>
          <div class="tab-pane <?php if($i==0) { ?>active<?php } ?>" id="branch<?php echo $item['id']; ?>" role="tabpanel"> <?php echo $item['address2']; ?> </div>
          <?php $i++; } ?>
        </div>
      </div>
    </div>
  </div>
  <?php $who=count($contacts); ?>
  <div class="map" id="map" style="width: 100%; height: 466px; "> 
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
    <script src="<?php echo base_url('public/frontend/js/markerwithlabel.js'); ?>" type="text/javascript"></script> 
    <script language="javascript">
								var locations = [
                                <?php 
								$t=1;
								$scriptstr=''; foreach($contacts as $contact):
								
								$condesc="<b>Name</b> : ".$contact['location']."<br> <b>Address</b> : ".$contact['address2'];
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
  </div>
</section><?php */?>
<?php //$this->load->view('frontend/include/social'); ?>

<section class="orange-bg">
         <div class="section-booking">
            <div class="booking-vertical">
               <div class="container">
                  <div class="row m1">

                            <div class="offset-xl-2 offset-md-1 offset-sm-0 col-xl-8 col-md-10 col-sm-12">
<?php echo form_open_multipart('checkout/process'); ?>                                  

                                  <div class="row align-items-center">

                                    <div class="cell col-xl-2 col-sm-2">
                                        <div class="icon"><img class="img-fluid" src="public/frontend/images/online-book.png" alt=""/></div>
                                    </div>

                                    <div class="cell col-xl-8 col-sm-10 content">

                                            <div class="row align-items-center">

                                                <div class="col-xl-4 col-sm-3 ">
                                                    <h2>
                                                       Apply  <br>HERE
                                                       <!--<p>GET UAE VISA <br> EASIER & FASTER</p>-->
                                                    </h2>
                                                 </div>

                                                <div class="col-xl-8 col-sm-9 visa-form">
                                                    <div class="row">
                                                        <?php /*?><div class="col-xl-6 col-lg-12">
                                                          <div class="form-group">
                                                              <label>I am a resident of</label>
                                                              <?php /*?><select class="form-control form-box">
                                                                 <option>Select</option>
                                                                 <option>2</option>
                                                                 <option>3</option>
                                                                 <option>4</option>
                                                                 <option>5</option>
                                                              </select>
                                                                  <select class="required form-control form-box <?php $err=''; if(form_error('country')){ ?> error <?php  } ?>" id="country" placeholder="Country" name="country">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['id'] ?>" <?php echo ($country['name'] == $this->input->post('country'))?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>

                                                          </div>
                                                        </div><?php */?>
                                                        <div class="col-xl-12 ">
                                                          <div class="form-group">
                                                              <label>I am a national of</label>
                                                              <?php /*?><select class="form-control form-box">
                                                                 <option>Select</option>
                                                                 <option>2</option>
                                                                 <option>3</option>
                                                                 <option>4</option>
                                                                 <option>5</option>
                                                              </select><?php */?>
                                                                                                                                <select class="required form-control form-box <?php $err=''; if(form_error('country')){ ?> error <?php  } ?>" id="nationality" placeholder="Country" name="nationality" >
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['id'] ?>" <?php echo ($country['id'] == @$_REQUEST['nationality'])?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>

                                                          </div>
                                                        </div>
                                                        <?php /*?><div class="col-xl-4 col-lg-4 pr-0">
                                                          <div class="form-group">
                                                              <label>Choose Date</label>
                                                              <div class="date">
                                                                <input class="form-control form-box" name="traveldate" id="date" type="text" placeholder="DD/MM/YYYY"/>
                                                              </div>
                                                          </div>
                                                      </div><?php */?>
                                                    </div>
                                                </div>
                                           </div>
                                        </div>


                                  <div class="cell col-xl-2 col-sm-12 pl-0"><?php /*?><a class="btn white br" href="<?php echo site_url('checkout/process'); ?>">CLICK HERE</a><?php */?>
                                  <button class="btn white br" type="submit" id="butCountry">Click here</button>
                                  </div>

                                </div>
                                </form>
                            </div>
                        </div>
                     </div>                  
         </div>      
    </section>
    
    <section class="section bg-2">
      <div class="container-fluid pad-lr">
        <div class="section-title">
           <h2 class="text-center br col-white"><?php echo $steps->title; ?></h2>
        </div>
        <div class="why-list">
           <?php echo $steps->desc; ?>
        </div>
      </div>
    </section>
                                  
    <section class="section">
        <div class="container">
          <div class="section-title">
            <h2 class="text-center col-blue br">Select your visa</h2>
          </div>
          
          <div class="col-md-12">
            <div class="row">            
              <dl class="gridtab-1 gird-visa">
        <?php $i=3;foreach($services as $item) { ?>
        

        <?php
				if($item['image']!="")
				{
				$url = base_url('public/uploads/products/'.$item['image']);
				}
				else
				{
				$url = base_url('public/frontend/images/noimage.jpg');
				}
			  ?>
                <dt><img src="<?php echo $url; ?>">
                  <h2>
                  <?php echo $item['title']; ?>
                  </h2>
                </dt>
                <dd>
                <?php echo form_open_multipart('checkout/process'); ?>
              <input type="hidden" name="visa_type" value="<?php echo $item['id']; ?>"  />
                  <?php echo $item['desc']; ?>
                  
                  <div class="required-docs">
                    <h1 class="">Required Documents</h1>
                      <?php echo $item['specification']; ?>
                    
                    
                  </div>  
                  <hr class="my-4">
                  <button class="btn btn-doc" type="submit">Continue</button>      
                  </form>           
                </dd>
                
<?php } ?>
                
           
              </dl>
            </div>
          </div>
        </div>
    </section>
    
    <?php if($why) { ?>
    <section class="section bg-1">
         <div class="container">
            <div class="section-title">
               <h2 class="text-center br col-white"><?php echo $why->title; ?></h2>
            </div>
            <div class="why-visa">
               
               <?php echo $why->desc; ?>
            </div>
         </div>
    </section>
<?php } ?>