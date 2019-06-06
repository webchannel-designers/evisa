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
			<h2><?php echo convert_lang('Comments',$this->alphalocalization); ?></h2>
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
                          <div id="formcommon">
                          
							<div class="dash-list">  <!--<div class="h_title">Manage Products - List</div>-->
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('login/actions'); ?>
  <!--<div class="entry">
<!--    <input class="button" type="submit" name="enable" value="Enable" style="width:50px;" />
    <input class="button" type="submit" name="disable" value="Disable" style="width:55px;" />
    <input class="button" type="submit" name="delete" value="Delete" style="width:50px;" onclick="return confirmDelete();" />
    <?php $return=0; ?>
	<input type="hidden" name="return" value="<?php echo @$return; ?>" />
    <div style="float:right;"> Sort :
      <select name="sortby" style="width:75px;margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('sort_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="orderby" style="width:75px; margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($sortorders as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('order_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      Category :
      <select name="category" style="width:75px; margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($contentcats as $contentcat): ?>
        <option value="<?php echo $contentcat['id']; ?>" <?php if($this->session->userdata('content_category_id')==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
        <?php endforeach; ?>
      </select>
      Search :
      <input style="margin-right:5px;width:75px;" type="text" name="keyword" value="<?php echo $this->session->userdata('content_key'); ?>" />
      <select name="field" style="width:75px;margin-right:5px;">
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('content_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <input class="button" type="submit" name="search" value="Search"  style="width:50px;"/>
      <input class="button" type="submit" name="reset" value="Reset"  style="width:50px;" />
    </div>
  </div>-->
  <table cellpadding='0' cellspacing='0' border='0' width="100%" class="vehicle-listing">
    <thead>
      <tr>
        <!--<th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>-->
        <th scope="col">Name</th>
        <!--<th scope="col" style="width: 100px;">Sort Order  <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>-->
        <!--<th scope="col">Slug</th>
		<th scope="col">Category</th>-->
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col" style="width: 80px;">Email</th>
        <th scope="col" style="width: 20px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	  //print_r($contents);
	  if(count($contents)>0)
	  {
		foreach($contents as $content): 
		//if(isset($categories[$content['category_id']])){ $catname=$categories[$content['category_id']]; } else { $catname='Root Category'; }
		?>
      <tr>
        <!--<td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $content['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>-->
        <td><?php echo substr($content['name'],0,100); ?></td>
        <!--<td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $content['id']; ?>]" value="<?php echo $content['sort_order']; ?>" /></td>-->
        <!--<td><?php echo substr($content['slug'],0,100); ?></td>
		<td><?php echo substr($catname,0,100); ?></td>-->
        <td><?php if($content['is_active']=='Y') { echo "Active"; } else { echo "Inactive";} ?></td>
        <td><?php echo $content['email']; ?></td>
        <td>
        <table cellpadding='0' cellspacing='0' border='0' width="100%">
<tr> <td><a href="<?php echo site_url('login/editcomment/'.$content['id'].'/'.@$return); ?>" title="Edit"><img src="<?php echo base_url('public/frontend/images/icon-edit.png')?>" alt="" /></a></td>
 <td><a href="<?php echo site_url('login/deletecomment/'.$content['id'].'/'.@$return); ?>" title="Delete" onclick="return confirmBox();"><img src="<?php echo base_url('public/frontend/images/icon-delete.png')?>" alt="" /></a></td></tr>
</table>
          </td>
      </tr>
      <?php endforeach; } else { ?>
      <tr>
        <!--<td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $content['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>-->
        <td colspan="4">No data found</td>
        <!--<td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $content['id']; ?>]" value="<?php echo $content['sort_order']; ?>" /></td>-->
        <!--<td><?php echo substr($content['slug'],0,100); ?></td>
		<td><?php echo substr($catname,0,100); ?></td>-->
        <!-- <td><?php //echo $activearr[$content['featured']]; ?></td>-->
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <!--<a class="button add" href="<?php //echo site_url('admin/products/add'); ?>">Add New Product</a>--> </div>
</div>
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

		}, error: function(){ alert('Error while request..'); }

	});

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
