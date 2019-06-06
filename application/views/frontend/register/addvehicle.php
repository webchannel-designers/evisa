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

	<section class="main-content light-blue">
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
			<h2><?php echo convert_lang('Add Vehicle',$this->alphalocalization); ?></h2>
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
				<div class="dash-tab">
					      <!--<p>Please fill in the online contact form below and we will get back to you.</p>-->
                          <div class="form">

  <?php echo form_open_multipart('login/add',array('id' => 'addVeh')); ?>

    <ul>
    
    <li class="mandatory">

    <label for="category_id">Category

      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>

      <?php } ?>

    </label>
    
        <select name="category_id" id="category_id" class="required" onchange="load_make(this.value);showType(this.value);">
        
          <option value="">Category</option>
    
          <?php foreach($contentcats as $contentcat): ?>
    
          <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['name']; ?></option>
    
          <?php endforeach; ?>
    
        </select>
        
  </li>
  
	<li class="mandatory">

    <label for="type_id">Type

      <?php if(form_error('type_id')){ $err=' err'; echo form_error('type_id'); } else { $err=''; ?>

      <?php } ?>

    </label>
    
    <select name="type_id" id="type_id" class="required">
    
    <option value="used">Used</option>
    
    <option value="new">New</option>

    </select>
    
</li>

<li class="mandatory">

    <label for="title">Title 

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="title" name="title" type="text" class="required" value="<?php echo set_value('title'); ?>" />
  </li>
  
	<li class="mandatory">

    <label for="make_id">Makes

      <?php if(form_error('make_id')){ $err=' err'; echo form_error('make_id'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select name="make_id" id="make_id" class="required" onchange="load_model(this.value);">
    <option value="">Make</option>

      <?php foreach($makes as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>
  </li>
  
  <li class="mandatory" id="type1" style="display:none;">

    <label for="type">Vehicle Type

      <?php if(form_error('type')){ $err=' err'; echo form_error('type'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select name="veh-type" id="veh-type">
      <option value="">Vehicle Type</option>

    </select>
  </li>
  
	<li class="mandatory" id="mode1" style="display:none;">

    <label for="model_id">Model

      <?php if(form_error('model_id')){ $err=' err'; echo form_error('model_id'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select name="model_id" id="model_id" >
      <option value="">Model</option>

    </select>
  </li>
  
	<li class="mandatory">

    <label for="location_id">City

      <?php if(form_error('location_id')){ $err=' err'; echo form_error('location_id'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select name="location_id" id="location_id" class="required">
      <option value="">City</option>
      <?php foreach($locations as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </li>
  
	<li class="mandatory">

    <label for="kilometer">Kilometer 

      <?php if(form_error('kilometer')){ $err=' err'; echo form_error('kilometer'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="kilometer" name="kilometer" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('kilometer'); ?>" />

  </li>
	<li class="mandatory">

    <label for="year">Year 

      <?php if(form_error('year')){ $err=' err'; echo form_error('year'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select id="year" name="year">
    <option value="">Year</option>
    <?php
	for($i=1995;$i<=date('Y');$i++)
	{
	?>
    <option value="<?php echo $i; ?>" <?php if(set_value('year')==$i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
    <?php
	}
	?>
    </select>
    <!--<input id="year" name="year" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('year'); ?>" />-->

  </li>  
	<li class="mandatory">

    <label for="milage">Milage 

      <?php if(form_error('milage')){ $err=' err'; echo form_error('milage'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="milage" name="milage" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('milage'); ?>" />

  </li>  
	<li class="mandatory">

    <label for="engine">Engine 

      <?php if(form_error('engine')){ $err=' err'; echo form_error('engine'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="engine" name="engine" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('engine'); ?>" />

  </li>
  
	<li class="mandatory">

    <label for="fuel">Fuel 

      <?php if(form_error('fuel')){ $err=' err'; echo form_error('fuel'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select id="fuel" name="fuel">
    <option value="">Fuel</option>
    <option value="Petrol" <?php if(set_value('fuel')=="Petrol") { ?> selected="selected"<?php } ?>>Petrol</option>
    <option value="Diesel" <?php if(set_value('fuel')=="Diesel") { ?> selected="selected"<?php } ?>>Diesel</option>
    <option value="CNG" <?php if(set_value('fuel')=="CNG") { ?> selected="selected"<?php } ?>>CNG</option>
    <option value="LPG" <?php if(set_value('fuel')=="LPG") { ?> selected="selected"<?php } ?>>LPG</option>
    <option value="Electric" <?php if(set_value('fuel')=="Electric") { ?> selected="selected"<?php } ?>>Electric</option>
    </select>
    <!--<input id="fuel" name="fuel" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('fuel'); ?>" />-->
    
  </li>
  
	<li class="mandatory">

    <label for="color">Color 

      <?php if(form_error('color')){ $err=' err'; echo form_error('color'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="color" name="color" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('color'); ?>" />

  </li>
  
	<li class="mandatory">

    <label for="transmission">Transmission 

      <?php if(form_error('transmission')){ $err=' err'; echo form_error('transmission'); } else { $err=''; ?>

      <?php } ?>

    </label>
    
    <select id="transmission" name="transmission">
    <option value="">Transmission</option>
    <option value="Manual" <?php if(set_value('transmission')=="Manual") { ?> selected="selected"<?php } ?>>Manual</option>
    <option value="Automatic" <?php if(set_value('transmission')=="Automatic") { ?> selected="selected"<?php } ?>>Automatic</option>
    </select>
    
    <!--<input id="transmission" name="transmission" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('transmission'); ?>" />-->

  </li>
  
	<li class="mandatory">

    <label for="steering">Steering Wheel

      <?php if(form_error('steering')){ $err=' err'; echo form_error('steering'); } else { $err=''; ?>

      <?php } ?>

    </label>
    
    <select id="steering" name="steering">
    <option value="">Steering Wheel</option>
    <option value="Left" <?php if(set_value('steering')=="Left") { ?> selected="selected"<?php } ?>>Left</option>
    <option value="Right" <?php if(set_value('steering')=="Right") { ?> selected="selected"<?php } ?>>Right</option>
    </select>
    
    <!--<input id="steering" name="steering" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('steering'); ?>" />-->

  </li>
  
	<li class="mandatory">

    <label for="drive">Drive 

      <?php if(form_error('drive')){ $err=' err'; echo form_error('drive'); } else { $err=''; ?>

      <?php } ?>

    </label>
    
    <select id="drive" name="drive">
    <option value="">Drive</option>
    <option value="FWD" <?php if(set_value('drive')=="FWD") { ?> selected="selected"<?php } ?>>FWD</option>
    <option value="RWD" <?php if(set_value('drive')=="RWD") { ?> selected="selected"<?php } ?>>RWD</option>
    <option value="AWD" <?php if(set_value('drive')=="AWD") { ?> selected="selected"<?php } ?>>AWD</option>
    </select>
    
    <!--<input id="drive" name="drive" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('drive'); ?>" />-->

  </li>
  
	<li class="mandatory">

    <label for="condition">Condition 

      <?php if(form_error('condition')){ $err=' err'; echo form_error('condition'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="condition" name="condition" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('condition'); ?>" />

  </li>
  
	<li class="mandatory">

    <label for="price">Price 

      <?php if(form_error('price')){ $err=' err'; echo form_error('price'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="price" name="price" type="text" class="text<?php echo $err; ?> required" value="<?php echo set_value('price'); ?>" />

  </li>
  
	<li class="mandatory">

    <label for="short_desc">Short Description 

      <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('short_desc'); ?></textarea>

  </li>

	<!--<li class="mandatory">

    <label for="meta_desc">Meta Description 

      <?php if(form_error('meta_desc')){ $err=' err'; echo form_error('meta_desc'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <textarea id="meta_desc" name="meta_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('meta_desc'); ?></textarea>

  </li>-->

	<!--<li class="mandatory">

    <label for="keywords">Keywords 

      <?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <textarea id="keywords" name="keywords" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('keywords'); ?></textarea>

  </li>-->

	<li class="mandatory">

    <label for="desc">Description (Specification) 

      <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <?php //echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?> 
     <textarea id="desc" name="desc" type="text" class="textarea<?php echo $err; ?> required"><?php echo set_value('desc'); ?></textarea>

    </li>
    
	<li class="mandatory">

    <label for="feat">Description (Features) 

      <?php if(form_error('feat')){ $err=' err'; echo form_error('feat'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <?php //echo $this->ckeditor->editor("feat",html_entity_decode(set_value('feat'))); ?> 
     <textarea id="feat" name="feat" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('feat'); ?></textarea>
    </li>    

	<!--<li class="mandatory">

    <label for="image">Posted Date </label>
    <div class="input-holder">
    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php echo @set_value('date_time'); ?>" />
    </div>

  </li>-->

	<!--<li class="mandatory">

    <label for="image">Image </label>
    <div class="input-holder">
    <input type="file" name="image" />
    </div>

  </li>-->

	<!--<li class="mandatory">

    <label for="attach_title">Banner Text </label>
    <div class="input-holder">
    <input id="attach_title" name="banner_text" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('banner_text'); ?>" />
    </div>

  </li>-->

	<!--<li class="mandatory">

    <label for="attachment">Banner Image </label>
    <div class="input-holder">
    <input type="file" name="banner_image" />
    </div>

  </li>-->

  <!--<div class="element">

    <label for="widgets">Widget Type

      <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="widgets[]" id="widgets" class="text" multiple="multiple">

      <?php foreach($widgets as $widget): ?>

      <option value="<?php echo $widget['id']; ?>" <?php echo set_select('widgets', $widget['id']); ?>><?php echo $widget['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>-->

  <!--<div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> />

    Disabled </div>-->
    
	<!--<div class="element">

    <label for="status">Featured

      <?php if(form_error('featured')){ $err=' err'; echo form_error('featured'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="featured" value="Y" <?php echo set_radio('featured', 'Y', TRUE); ?> />

    Enabled

    <input type="radio" name="featured" value="N" <?php echo set_radio('featured', 'N'); ?> />

    Disabled </div>-->    

	<li>

    <button type="submit" class="btn btn-submit">Save</button>

    <button onclick="window.location='<?php echo site_url('login/myhome'); ?>?&tab=list'"  class="btn btn-submit cancel" type="button" >Cancel</button>
     
    </li>
    
  </ul>

  <?php echo form_close(); ?> 


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

                            
                          </div>
                                                  
				</div>
				
			</div>
			<aside>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower1.png')?>" alt="" />
                    <!--<ul class="aside-nav">
            <?php
			if($this->session->userdata('userid'))
			{
			//echo 'Welcome '.$this->session->userdata('fname');
			?>
            <li><a href="<?php echo site_url('login/myhome'); ?>">My Home</a></li>
            <li><a href="<?php echo site_url('login/changepass'); ?>">Change Password</a></li>
            <li><a href="<?php echo site_url('login/lists'); ?>">Vehicle List</a></li>
            <li><a href="<?php echo site_url('home/do_logout'); ?>">Logout</a></li>
            <?php
			}
			else
			{
			?>
            <li><a class='icon-sign login fancybox.iframe' href="<?php echo site_url('login'); ?>">Sign In</a></li>
            <?php
			}
			?>
          </ul>-->
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
			echo stripslashes(strip_tags($condesc,'<br>')); 
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
