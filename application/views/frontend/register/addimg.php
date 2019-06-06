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
			<h2><?php echo convert_lang('Gallery',$this->alphalocalization); ?></h2>
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
					      <!--<p>Please fill in the online contact form below and we will get back to you.</p>-->
                          <div class="comments" id="formcommon">
                          
  <?php 
	$uris=$this->uri->segment(4);
	echo $this->session->flashdata('message'); ?>
  <?php echo form_open_multipart('login/addgal/'.$uris); ?>
  <ul>
<!--  <li class="mandatory">
    <label for="title">Title 
      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>
      <?php } ?>
    </label>
    <div class="input-holder">
    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />
    </div>
  </li>
-->  <!--<div class="element">

    <label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("short_desc",html_entity_decode(set_value('short_desc'))); ?> </div>--> 
  <!--<div class="element">

    <label for="icon">Icon (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="icon" />

  </div>-->
  <li class="mandatory">
    <label for="image">Image </label>
    <div class="input-holder">
    <input type="file" name="image[]" multiple="multiple" />
    </div>
  </li>
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
        <li >
    <button type="submit" class="btn btn-submit">Save</button>
    <button type="button" class="btn btn-submit" onclick="window.location='<?php echo site_url('login/myhome'); ?>?&tab=list'">Cancel</button>
    </li>
    </ul>
    </div>
  <?php echo form_close(); ?> <?php echo form_open_multipart('login/updateimg/'.$uris); ?>
  <?php if(count($records) > 0)  {  ?>
  <div class="gal_img comments">
    <ul class="updateform">
      <?php foreach($records as $record){?>
      <li>
      <figure>
         <img src="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>" />
         </figure> 
         <div class="veh-details">
         <!--<a class="lightbox view" href="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>"   style="float:right"><img src="<?php echo base_url()."public/admin/images/zoom.png"?>" title="View Image" /></a>-->
          <!--<label> Title</label>
          <input id="title" name="title_<?php echo $record['id']; ?>" type="text" class="text"  value="<?php echo $record['title']; ?>" />-->
          <label>Display Order</label>
          <input type="text" name="sort_<?php echo $record['id']; ?>"  class="text"   id="sort_<?php echo $record['id']; ?>" value="<?php echo $record['sort_order']; ?>" />
          <?php if($record['is_default'] == 'Y') {?>
          <!--<a href="<?php echo site_url("login/setdefault/N/".$record['id']."/".$uris); ?>" style="float:right"> <img src="<?php echo base_url()."public/admin/images/default.gif"?>" title="Set as Default" /> </a>-->
          <?php } else {?>
          <!--<a href="<?php echo site_url("login/setdefault/Y/".$record['id']."/".$uris); ?>" style="float:right"><img src="<?php echo base_url()."public/admin/images/empty.png"?>" title="Remove Default" /> </a>--> <a href="<?php echo site_url("login/deleteimg/".$record['id']."/".$uris); ?>" style="float:right" onclick="return confirmBox();"><img src="<?php echo base_url()."public/admin/img/i_delete.png"?>" title="Delete Image" /></a>
          <?php } ?>
        </div>
      </li>
      <?php } ?>
      <li>
    <button type="submit" name="butUpdate" id="butUpdate" class="btn btn-submit">Update</button>
    <button type="button" class="btn btn-submit" onclick="window.location='<?php echo site_url('login/myhome'); ?>?&tab=list'">Cancel</button>
    <!--<input type="submit" name="butUpdate" id="butUpdate" value="Update" class="add" />--> 
      </li>
    </ul>
  </div>
  <div class="clear"></div>
  <?php
	}
	else
	{
	echo "No Data Found";
	}
	?>
  <?php echo form_close(); ?> 



                            
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
