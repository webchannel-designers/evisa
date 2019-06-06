<!--<section class="content-main">
  <div class="container">
    <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo convert_lang('Contact Us',$this->alphalocalization); ?></h2>
    <div class="head-wrap">
      <div class="row">
        <div class="col-md-8">
          <ol class="breadcrumb">
            <?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
            <li<?php echo $attr; ?>>
              <?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?>
            </li>
            <?php endforeach; ?>
          </ol>
        </div>
        <div class="col-md-4">
          <div class="pull-right right-side-icon"><a href="#" class="st_sharethis"></a><a class="fancybox fancybox.iframe mail-icon" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'> </a>
            <!--<a href="#" class="print-icon"></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-8 inner-content">
        <div class="contact-content">
          <h3><?php echo convert_lang('make an enquiry',$this->alphalocalization); ?></h3>
          <p><?php echo convert_lang("Questions?  Please don't hesitate to contact us . Our  Business representative will get back to you shortly.",$this->alphalocalization); ?></p>
          <div class="contact-form">
            <div id="formcontainer"> </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="locations-wrap">
          <h3><?php echo convert_lang('our locations',$this->alphalocalization); ?></h3>
          <div class="panel-group" id="accordion">
            <?php 
			$t=1;
			$scriptstr=''; foreach($contacts as $contact):
			
			$condesc=$contact['address'];
			
			$place = $contact['location'];
			
			$latitude=$contact['latitude'];
			
			$longitude=$contact['longitude'];
			
			//echo stripslashes($condesc); 
			
			$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
			
			$lines = explode("\n", $condesc);
			
			$new_lines = array();
			
			foreach ($lines as $i => $line) {
			
				if(!empty($line))
			
					$new_lines[] = trim($line);
			
			}
			
			$condesc =implode($new_lines);
			?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $t;?>"> <?php echo stripslashes($place); ?> </a> </h4>
              </div>
              <div id="collapse<?php echo $t;?>" 
    class="panel-collapse collapse<?php if($t==1) { ?> in<?php } ?>">
                <div class="panel-body">
                  <div class="address"> <?php echo stripslashes($condesc); ?> </div>
                  <div class="loc-map-btn-wrap"> <a href="<?php echo site_url('contactus/location/'.$contact['id']); ?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="btn loc-map-btn map fancybox.iframe"><?php echo convert_lang('Location Map',$this->alphalocalization); ?></a> </div>
                </div>
              </div>
            </div>
            <?php

			if(	$latitude != "" and $longitude != "")
			
			{
			
			?>
            <!--<div id="map_canvas<?php echo $contact['id']; ?>" style="width:339px; height:228px;" class="contact-map commmon-right"></div> 

            <?php

			}
			
			?>
            <?php 
			$scriptstr.="googlemapfun('map_canvas".$contact['id']."','".$latitude."','".$longitude."','".stripslashes($condesc)."');";
			$t++;
			endforeach; 
			
			?>
          </div>
        </div>
      </div>
    </div>
    <!--<div class="row">
    
    <div class="col-md-8 col-sm-8 inner-content">                
<div class="contentdiv commmon-left">

  <div class="form-main commmon-left">
  <h2><?php echo convert_lang('Write your Feedback',$this->alphalocalization); ?></h2>
  
<div id="formcontainer">  

</div>
  
  </div>
  
   <div class="contact-rgt commmon-right">
<div class="contact-top commmon-left">
<h2><?php echo convert_lang('Contact details',$this->alphalocalization); ?></h2>

<?php $scriptstr=''; foreach($contacts as $contact):

$condesc=$contact['address'];

$latitude=$contact['latitude'];

$longitude=$contact['longitude'];

//echo stripslashes($condesc); 

$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);

$lines = explode("\n", $condesc);

$new_lines = array();

foreach ($lines as $i => $line) {

    if(!empty($line))

        $new_lines[] = trim($line);

}

$condesc =implode($new_lines);
echo stripslashes($condesc); 
?>


</div><br />
<br />

<div class="contact-map commmon-right"><img src="images/map.jpg" width="339" height="228" alt="" /></div>

<?php

if(	$latitude != "" and $longitude != "")

{

?>

<div id="map_canvas<?php echo $contact['id']; ?>" style="width:339px; height:228px;" class="contact-map commmon-right"></div> 

<?php

}

?>
   </div>



</div>

<?php 

$scriptstr.="googlemapfun('map_canvas".$contact['id']."','".$latitude."','".$longitude."','".stripslashes($condesc)."');";

endforeach; ?>

<script type="text/javascript">

function intialize(){

 <?php echo $scriptstr; ?>

 }

</script>

</div>

<script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=AIzaSyAIDTZgRG-hYjVq86JYbsuhPAzHYZXmgOg" type="text/javascript">

</script>

<script type="text/javascript">

function googlemapfun(divid,lat,lng,address) {

 if (GBrowserIsCompatible()) {

  var map = new GMap2(document.getElementById(divid));

  var point = new GLatLng(lat,lng);

        map.setCenter(point, 15);

        map.setUIToDefault();

  map.setMapType(G_NORMAL_MAP);

  var marker = new GMarker(point);

   map.addOverlay(marker);

  GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(address);});

 }

} 

window.onload = intialize;

window.onunload = GUnload;

</script>                

</div>
  </div>
  <!--<div class="col-md-4 col-sm-4">
	  
	  <div class="col-sm-12 abt-panel blue mar-bot40" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	  
	    <h3><?php echo stripslashes($vission->title) ?></h3>
	<div class="row">
		<div class="col-sm-8">
			<?php echo stripslashes($vission->desc); ?>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/vision-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
		</div>
		
	  </div>
	  
	  <div class="clearfix"></div>
	  
	  <div class="col-sm12 abt-panel green" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	    <h3><?php echo stripslashes($mission->title); ?></h3>
		<div class="row">
		 <div class="col-sm-8">
		  <?php echo stripslashes($mission->desc) ?>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/mission-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
	</div>
	  </div>
	  
	</div>
  </div>
  </div>
</section>-->

	<section>
		<div class="container">
			<div class="adv-holder">
				<div><img src="<?php echo base_url('public/frontend/images/adv2.png')?>" alt="" /></div>
				<div><img src="<?php echo base_url('public/frontend/images/adv3.png')?>" alt="" /></div>
			</div>
		</div>
	</section>

	<section class="main-content">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<a href="#">Browse results in :</a>
				</li>
            <?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
            <li<?php echo $attr; ?>>
              <?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?>
            </li>
            <?php endforeach; ?>
			</ol>
			<h2><?php echo convert_lang('Advance Search',$this->alphalocalization); ?></h2>
			<div class="inner-content">
				<!--<div class="list-head">
					<div class="showing">Showing 5 of 100</div>
					<div class="sort">
						<div class="form">
							<form action="#">
								<label for="">sort by: </label>
								<span>
									<select name="" id="">
										<option value="new">Newest to oldest</option>
										<option value="old">Oldest to Newest</option>
									</select>
								</span>
							</form>
						</div>
					</div>
				</div>-->
				<div class="list">
					      <p>Please fill in the online contact form below and we will get back to you.</p>
                          <div id="formcommon">
                          <div class="comments">
                          
            <?php 
			$attributes = array( 'id' => 'target', 'method' => 'get');
			echo form_open('search', $attributes); ?>
	    					<div class="form">
	    							<h4>Search In</h4>
			    					<ul>
		    						  <li>
                                      <input type="text" name="keyword" id="keyword" placeholder="keywords" />
		    						  </li>
		    						  <li>
        <select name="category" id="category_id" class="required" onchange="load_make(this.value);showType(this.value);">
        <option value="">Category</option>
          <?php foreach($contentcats as $contentcat): ?>
    
          <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['name']; ?></option>
    
          <?php endforeach; ?>
    
        </select>
		    						  </li>
		    						  <li>
    <select name="city" id="location_id" class="required">
      <option value="">City</option>
      <?php foreach($locations as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>
		    						  </li>
			    						<li>    <select name="make" id="make_id" class="required" onchange="load_model(this.value);">

			    								<option value="">All Makes</option>
      <?php foreach($makes as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>
			    							</select>
			    						</li>
	<li class="mandatory" id="type1" style="display:none;">

    <select name="type" id="veh-type">
      <option value="">Vehicle Type</option>

    </select>
  </li>			    						
  <li id="mode1" style="display:none;">    
  <select name="model" id="model_id" class="required">
      <option value="">Model</option>

    </select>

			    						</li>
                                <script language="javascript" type="text/javascript">
function load_model(va)

{

	var dataString = new Object();

	dataString = "make="+va;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/load_model/'); ?>", 	 	

		data: dataString, 

		success: function(msg) {
		$('#model_id').html(msg);
		// var selectBox = $("select#model_id").selectBoxIt().data("selectBoxIt");
		 $("#model_id").data("selectBox-selectBoxIt").refresh();
		 
		}, error: function(){ alert('Error while request..'); }

	});

}

function load_make(va)

{

	var dataString = new Object();

	dataString = "make="+va;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/load_make/'); ?>", 	 	

		data: dataString, 

		success: function(msg) {
		$('#make_id').html(msg);
		// var selectBox = $("select#model_id").selectBoxIt().data("selectBoxIt");
		 $("#make_id").data("selectBox-selectBoxIt").refresh();
		 
		}, error: function(){ alert('Error while request..'); }

	});

}

function showType(va)

{
	if(va==47 || va==48)
	{
	$('#type1').show();
	
	$('#mode1').hide();
	
	var dataString = new Object();

	dataString = "type="+va;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/load_type/'); ?>", 	 	

		data: dataString, 

		success: function(msg) {
			
		$('#veh-type').html(msg);
		// var selectBox = $("select#model_id").selectBoxIt().data("selectBoxIt");
		 $("#veh-type").data("selectBox-selectBoxIt").refresh();
		 
		}, error: function(){ alert('Error while request..'); }

	});
	}
	else
	{
	$('#type1').hide();
	
	$('#mode1').show();
	}

}

</script>
									<h4>Year</h4>
			    						<li><select name="yearfrom" id="yearfrom">
			    								<option value="">From</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014</option>
			    							</select>
			    						</li>
			    						<li><select name="yearto" id="yearto">
			    								<option value="">To</option>
                                                <option value="1995">1995</option>
                                                <option value="1996">1996</option>
                                                <option value="1997">1997</option>
                                                <option value="1998">1998</option>
                                                <option value="1999">1999</option>
                                                <option value="2000">2000</option>
                                                <option value="2001">2001</option>
                                                <option value="2002">2002</option>
                                                <option value="2003">2003</option>
                                                <option value="2004">2004</option>
                                                <option value="2005">2005</option>
                                                <option value="2006">2006</option>
                                                <option value="2007">2007</option>
                                                <option value="2008">2008</option>
                                                <option value="2009">2009</option>
                                                <option value="2010">2010</option>
                                                <option value="2011">2011</option>
                                                <option value="2012">2012</option>
                                                <option value="2013">2013</option>
                                                <option value="2014">2014+</option>
			    							</select>
			    						</li>
									<h4>Price in AED</h4>
										<li><select name="pricefrom" id="pricefrom">
												<option value="">Price From</option>
			    								<option value="300000">300000</option>
			    								<option value="400000">400000</option>
			    								<option value="500000">500000</option>
			    								<option value="600000">600000</option>
			    								<option value="700000">700000</option>
			    								<option value="800000">800000</option>
			    								<option value="900000">900000</option>
			    								<option value="1000000">1000000</option>
			    								<option value="2000000">2000000</option>
			    								<option value="4000000">4000000</option>
			    								<option value="6000000">6000000</option>
			    								<option value="10000000">10000000</option>
			    								<option value="20000000">20000000</option>
			    								<option value="30000000">30000000</option>
			    								<option value="40000000">40000000</option>
			    								<option value="50000000">50000000</option>
			    								<option value="100000000">100000000</option>
			    								<option value="200000000">200000000</option>
											</select>
										</li>
										<li><select name="priceto" id="priceto">
												<option value="">Price To</option>
			    								<option value="400000">400000</option>
			    								<option value="500000">500000</option>
			    								<option value="600000">600000</option>
			    								<option value="700000">700000</option>
			    								<option value="800000">800000</option>
			    								<option value="900000">900000</option>
			    								<option value="1000000">1000000</option>
			    								<option value="2000000">2000000</option>
			    								<option value="4000000">4000000</option>
			    								<option value="6000000">6000000</option>
			    								<option value="10000000">10000000</option>
			    								<option value="20000000">20000000</option>
			    								<option value="30000000">30000000</option>
			    								<option value="40000000">40000000</option>
			    								<option value="50000000">50000000</option>
			    								<option value="100000000">100000000</option>
			    								<option value="200000000">200000000+</option>
											</select>
										</li>
										<li class='radios'>
											<input id='used' class='styled' type="radio" value="used" name='useType' >
											<label for="used">Used</label>
										</li>
										<li class='radios'>
											<input id='new' class='styled' type="radio" value="new" name='useType'>
											<label for="new">New</label>
										</li>
										<li class="submit-wrapper">
											
											<input class='btn btn-search' type='submit' value='Search'>
										</li>
                                        <span class="clearfix"></span>
									</ul>
	    					</div>
	    				<?php echo form_close(); ?>
                          </div>
                          </div>
                          <address>
                        <?php 
                        $t=1;
                        $scriptstr=''; foreach($contacts as $contact):
                        
                        $condesc=$contact['address'];
                        
                        $place = $contact['location'];
                        
                        $latitude=$contact['latitude'];
                        
                        $longitude=$contact['longitude'];
                        
                        //echo stripslashes($condesc); 
                        
                        $condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
                        
                        $lines = explode("\n", $condesc);
                        
                        $new_lines = array();
                        
                        foreach ($lines as $i => $line) {
                        
                            if(!empty($line))
                        
                                $new_lines[] = trim($line);
                        
                        }
                        
                        $condesc =implode($new_lines);
                        //echo stripslashes(strip_tags($condesc,'<br>')); 
                        $t++;
                        endforeach; 
                        ?>
                        </address>
                          
<section class="map">
                <!--<div class="map-wrapper">
                <?php 
$t=1;

$scriptstr=''; foreach($contacts as $contact):

$condesc=$contact['address'];

$place = $contact['location'];

$latitude=$contact['latitude'];

$longitude=$contact['longitude'];

//echo stripslashes($condesc); 

$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);

$lines = explode("\n", $condesc);

$new_lines = array();

foreach ($lines as $i => $line) {

    if(!empty($line))

        $new_lines[] = trim($line);

}

$condesc =implode($new_lines);
?>
<?php	//session_start();
#======================================================================================================================
# Includes
#======================================================================================================================	
	//include("connect.php");
	
$longi = $longitude;
$lati = $latitude;
	
?>

<script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=AIzaSyAIDTZgRG-hYjVq86JYbsuhPAzHYZXmgOg" 
type="text/javascript">
</script>
 
        <!-- fail nicely if the browser has no Javascript 
<noscript>
<b>JavaScript must be enabled in order for you to use Google Maps.</b> <br/>
However, it seems JavaScript is either disabled or not supported by your browser. <br/>
To view Google Maps, enable JavaScript by changing your browser options, and then try again.
</noscript>
<div >
  <div id="googlemap14_lg9dq_0" style="width:100%;height:325px; margin:auto;"></div>
</div>
<script type='text/javascript'> 
//<![CDATA[
var tst14_lg9dq_0=document.getElementById('googlemap14_lg9dq_0');
			var tstint14_lg9dq_0;
			var map14_lg9dq_0;
			
DirectionMarkersubmit14_lg9dq_0 = function( formObj ){
						if(formObj.dir[1].checked ){
							tmp = formObj.daddr.value;
							formObj.daddr.value = formObj.saddr.value;
							formObj.saddr.value = tmp;
						}
						formObj.submit();
						if(formObj.dir[1].checked ){
							tmp = formObj.daddr.value;
							formObj.daddr.value = formObj.saddr.value;
							formObj.saddr.value = tmp;
						}
					}
function checkMap14_lg9dq_0() {
				if (tst14_lg9dq_0)
					if (tst14_lg9dq_0.offsetWidth != tst14_lg9dq_0.getAttribute("oldValue")) {
						tst14_lg9dq_0.setAttribute("oldValue",tst14_lg9dq_0.offsetWidth);
 
						if (tst14_lg9dq_0.getAttribute("refreshMap")==0)
							if (tst14_lg9dq_0.offsetWidth > 0) {
								clearInterval(tstint14_lg9dq_0);
								getMap14_lg9dq_0();
								tst14_lg9dq_0.setAttribute("refreshMap", 1);
							} 
					}
			}
			function getMap14_lg9dq_0(){
				if (tst14_lg9dq_0.offsetWidth > 0) {
					map14_lg9dq_0 = new GMap2(document.getElementById('googlemap14_lg9dq_0'));
					map14_lg9dq_0.addControl(new GSmallMapControl());
					map14_lg9dq_0.addControl(new GMapTypeControl());
					map14_lg9dq_0.setMapType(G_NORMAL_MAP);
					map14_lg9dq_0.setCenter(new GLatLng(<?php echo $lati?>,<?php echo $longi?>), 14);
					var point = new GPoint(<?php echo $longi?>,<?php echo $lati?>);
					var marker14_lg9dq_0 = new GMarker(point);
					map14_lg9dq_0.addOverlay(marker14_lg9dq_0);
					marker14_lg9dq_0.openInfoWindowHtml('<?php echo "Satpi <br> Sell and Buy your car online in UAE.";?>');
					GEvent.addListener(marker14_lg9dq_0, 'click', function() {
					//marker14_lg9dq_0.openInfoWindowHtml('<strong>Prestige Real Estate</strong>,<br/>Unit no 408, 1-Lake Plaza,<br/>Jumeirah Lakes Towers,<br/> Dubai, UAE.');
									});
							}
		}
//]]>
</script>
<script type="text/javascript"> 
//<![CDATA[
	if (GBrowserIsCompatible()) {
		tst14_lg9dq_0.setAttribute("oldValue",0);
		tst14_lg9dq_0.setAttribute("refreshMap",0);
		tstint14_lg9dq_0=setInterval("checkMap14_lg9dq_0()",500);
	}
//]]>
</script>
                <?php endforeach; ?>

                <!--<img src="images/img-map.png" class="img-responsive"/></div>-->
              </section>                          
                                                  
				</div>
				
			</div>
			<aside>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower1.png')?>" alt="" />
				</div>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower2.png')?>" alt="" />
				</div>
			</aside>
		</div>
	</section>

<!--<section class="inner-page">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="inner-content">
                        <div class="col-lg-8">
                          <h2><?php echo convert_lang('Contact Us',$this->alphalocalization); ?></h2>
                          <p>Please fill in the online contact form below and we will get back to you.</p>
                          <div class="form" id="formcontainer">
                            
                          </div>
                          <div class="contact-help contact-details">
                            <div>
                              <h3>Address</h3>
                              <address>
            <?php 
			$t=1;
			$scriptstr=''; foreach($contacts as $contact):
			
			$condesc=$contact['address'];
			
			$place = $contact['location'];
			
			$latitude=$contact['latitude'];
			
			$longitude=$contact['longitude'];
			
			//echo stripslashes($condesc); 
			
			$condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
			
			$lines = explode("\n", $condesc);
			
			$new_lines = array();
			
			foreach ($lines as $i => $line) {
			
				if(!empty($line))
			
					$new_lines[] = trim($line);
			
			}
			
			$condesc =implode($new_lines);
			//echo stripslashes(strip_tags($condesc,'<br>')); 
			$t++;
			endforeach; 
			?>
                              </address>
                            </div>
                            <div class="contact-icon-holder">
                              <h3>Contact</h3><a class="icon-call" href="#">Phone : <?php echo $this->alphasettings['PHONE_SLUG']; ?></a><a class="icon-mail-2" href="#">Email : <a href="mailto:<?php echo $this->alphasettings['ADMIN_EMAIL']; ?>"><?php echo $this->alphasettings['ADMIN_EMAIL']; ?></a></a>
                            </div>
                            <div>
                              <h3>Follow Us</h3>
                              <nav class="social-nav">
                                <ul>
							<?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
                            <li><a href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank" class="icon-facebook"></a></li>
                            <?php } ?>
                            <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
                            <li><a href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank" class="icon-gplus"></a></li>
                            <?php } ?>
                            <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
                            <li><a href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank" class="icon-twitter"></a></li>
                            <?php } ?>
                            <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
                            <li><a href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank" class="icon-instagram"></a></li>
                            <?php } ?>
                                </ul>
                              </nav>
                            </div><span class="clearfix"></span>
                          </div>
                        </div>
                        <aside class="col-lg-4 page-aside">
                          <div class="search-box green">
                            <h2>Search Available Slots</h2>
                            <div class="tabs">
                              <ul>
                                <li class="active"><a href="#singleBook" class="active">Single Booking</a></li>
                                <li><a href="#multiBook">Multiple Booking</a></li>
                              </ul>
                            </div>
                            <div id="singleBook">
                              <form>
                                <ul>
                                  <li class="datepicker" style="width: 50px;">
                                    <input placeholder="DATE" id="datepicker" class="hasDatepicker"><img class="ui-datepicker-trigger" src="<?php echo base_url('public/frontend/images/calendar.png')?>" alt="Select date" title="Select date">
                                  </li>
                                  <li style="width: 50px;">
                                    <select style="display: none;">
                                      <option value="FORMAT">FORMAT</option>
                                      <option value="FORMAT1">FORMAT1</option>
                                      <option value="FORMAT2">FORMAT2</option>
                                    </select>
                                  </li>
                                  <li style="width: 50px;">
                                    <select style="display: none;">
                                      <option value="SLOT">SLOT</option>
                                      <option value="SLOT1">SLOT1</option>
                                      <option value="SLOT2">SLOT2</option>
                                    </select>
                                  </li>
                                </ul>
                                <button class="btn btn-submit">Check Availability</button>
                                <div class="clearfix"></div>
                              </form>
                            </div>
                            <div id="multiBook" style="display: none;">
                              <form>
                                <ul>
                                  <li class="datepicker" style="width: 50px;">
                                    <input placeholder="DATE" id="datepicker1" class="hasDatepicker"><img class="ui-datepicker-trigger" src="<?php echo base_url('public/frontend/images/calendar.png')?>" alt="Select date" title="Select date">
                                  </li>
                                  <li style="width: 50px;">
                                    <select style="display: none;">
                                      <option value="FORMAT">FORMAT</option>
                                      <option value="FORMAT1">FORMAT1</option>
                                      <option value="FORMAT2">FORMAT2</option>
                                    </select>
                                  </li>
                                  <li style="width: 50px;">
                                    <select style="display: none;">
                                      <option value="SLOT">SLOT</option>
                                      <option value="SLOT1">SLOT1</option>
                                      <option value="SLOT2">SLOT2</option>
                                    </select>
                                  </li>
                                </ul>
                                <button class="btn btn-submit">Check Availability</button>
                                <div class="clearfix"></div>
                              </form>
                            </div>
                          </div>
                          <div class="events">
                            <div class="wrap">
                              <div class="title-head">
                                <h2>Current Events/Tournaments</h2>
                              </div>
                              <ul>
                            <?php
							foreach($events as $event)
							{
								$format = $this->events_model->get_format($event['format_id']);
								//print_r($format);
							?>
                                <li>
                                  <figure><img src="<?php echo base_url('public/uploads/contents/'.$event['image'])?>" class="img-responsive"/></figure>
                                  <div class="figure-detail">
                                    <h4><a href="<?php echo site_url('events/view/'.$event['slug'])?>"><?php echo stripslashes($event['title']); ?></a></h4>
                                    <div class="date icon-calendar">From : <?php echo date('jS M', strtotime($event['date_time'])); ?>  TO <?php echo date('jS M', strtotime($event['end_time'])); ?></div>
                                    <p>Match Format: <span><?php echo stripslashes($format[0]['title']); ?></span></p><a href="<?php echo site_url('events/view/'.$event['slug'])?>" class="btn read-more">Read more</a>
                                  </div>
                                </li>
                              <?php
							}
							  ?>
                                
                              </ul>
                            </div>
                          </div>
                        </aside>
                      </div>
                    </div>
                  </div>
                </div>
              </section>-->
