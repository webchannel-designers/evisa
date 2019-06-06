<!--
<div class="help even-list">
 <?php
 
 
  if(@$eventcontents->desc!='') { echo @$eventcontents->desc; } ?>   

<ul>

<?php echo @$content->desc; ?>
<?php
//print_r($pagelists);exit;
//if(isset($eventcontents)){

	foreach($pagelists as $category): 

	$ndesc1=word_limiter($category['desc'],30);
	$ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 

	$nid=$category['id'];

	$slug=$category['slug'];
	
	$image=base_url('public/uploads/contents/'.$category['image']);

	$date=date("F j",strtotime($category['date_time']));
	
	$dateend=date("F j",strtotime($category['end_time']));
	$year=date("Y",strtotime($category['end_time']));
	
//$date=date("M Y",strtotime($category['date_time']));
	
	$date1=date("j ",strtotime($category['date_time']));
	
	$days = (strtotime($category['end_time']) - strtotime($category['date_time'])) / (60 * 60 * 24);
?>



	<li><div class="col-sm-3">
    <?php
if($category['image']!='')
{
$imagenews=base_url('public/uploads/contents/'.$category['image']);	
}
else
{
$imagenews=base_url('public/frontend/images/no-image.png');		
}
?>
		<a href="<?php echo site_url('events/view/'.$slug)?>"><img class="img-responsive" src="<?php echo $imagenews ?>" /></a></div>
	<div class="col-sm-9">
<?php
if($days!=0)
{
?>
<h3 class="addedon"><?php echo $date." to ".$dateend.",".$year; ?></h3>
<?php
}
else
{
?>
<h3 class="addedon"><?php echo $date.",".$year; ?></h3>

<?php
}
?>
<h2><a href="<?php echo site_url('events/view/'.$slug)?>"><?php echo $category['title']; ?></a></h2>
<span>Category: <?php echo $content->name; ?>

	<?php if($category['desc']!='') { echo $ndesc; } ?>

</div>
<a class="read-more blue icon-angle-right"  style="float:right" href="<?php echo site_url('events/view/'.$slug)?>">Read More</a>

</li>



<?php

endforeach;

//}

?>
</ul>
</div>-->
<!--<section class="inner-page">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="inner-content">
                        <div class="col-lg-8">
                          <h2><?php echo stripslashes($this->pagetitle); ?></h2>
                          <div class="lists events">
                            <ul>
<?php
//print_r($pagelists);exit;
//if(isset($eventcontents)){

	foreach($pagelists as $category): 
	//$format = $this->events_model->get_format($category['format_id']);
	$ndesc1=word_limiter($category['desc'],30);
	
	$ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 

	//$nid=$category['id'];

	$slug=$category['slug'];
	
	$image=base_url('public/uploads/contents/'.$category['image']);

	//$date=date("F j",strtotime($category['date_time']));
	
	//$dateend=date("F j",strtotime($category['end_time']));
	
	//$year=date("Y",strtotime($category['end_time']));
	
	//$date=date("M Y",strtotime($category['date_time']));
	
	//$date1=date("j ",strtotime($category['date_time']));
	
	//$days = (strtotime($category['end_time']) - strtotime($category['date_time'])) / (60 * 60 * 24);
?>    
<?php
if($category['image']!='')
{
$imagenews=base_url('public/uploads/contents/'.$category['image']);	
}
else
{
$imagenews=base_url('public/frontend/images/noimage.jpg');		
}
?>
                          <li>
                                <figure><a href="<?php echo site_url('blogs/view/'.$slug)?>"><img class="img-responsive" src="<?php echo $imagenews ?>"></a></figure>
                                <div class="figure-detail">
                                  <h4><a href="<?php echo site_url('blogs/view/'.$slug)?>"><?php echo $category['title']; ?></a></h4>
                                  <div class="date-format">
                                    <!--<div class="date icon-calendar">From : <?php echo date('jS M', strtotime($category['date_time'])); ?>  TO <?php echo date('jS M', strtotime($category['end_time'])); ?></div>
                                    <!--<div class="format">Match Format: <span><?php echo stripslashes($format[0]['title']); ?></span></div>
                                  </div>
                                  <div class="figure-content"><?php echo $ndesc; ?></div><a class="btn read-more" href="<?php echo site_url('blogs/view/'.$slug)?>">Read more</a>
                                </div>
                              </li>
<?php

endforeach;

//}

?>
                              
                            </ul>
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
                                    <input placeholder="DATE" id="datepicker" class="hasDatepicker"><img class="ui-datepicker-trigger" src="images/calendar.png" alt="Select date" title="Select date">
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
                                    <input placeholder="DATE" id="datepicker1" class="hasDatepicker"><img class="ui-datepicker-trigger" src="images/calendar.png" alt="Select date" title="Select date">
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
                          <div class="plan-event">
                            <div class="wrap">
                              <ul>
                                <li style="height: 196px;"><img src="<?php echo base_url('public/frontend/images/img-planeve1.png')?>">
                                  <div class="plan-wrap">
                                    <h2>Planning an event?</h2><a class="btn" href="#">Book Now</a>
                                  </div>
                                </li>
                                <li style="height: 199px;"><img src="<?php echo base_url('public/frontend/images/img-planeve2.png')?>"/>">
                                  <div class="plan-wrap">
                                    <h3>Looking to organization a tournament ?</h3>
                                    <p>For bulk booking Enquiry...</p>
                                    <div class="footer-plan"><a class="btn" href="#">Book Now</a><a class="btn callus" href="#"><span>Or Call us </span>0501234567</a></div>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="facilities">
                            <div class="wrap">
                              <div class="title-head">
                                <h2>Facility &amp; Amenities</h2>
                              </div>
                              <?php //print_r($facility); ?>
                              <?php
							  echo stripslashes($facility->desc);
							  ?>
                             <a class="btn" href="<?php echo site_url('contents/view/'.$facility->slug)?>">View More</a>
                            </div>
                          </div>
                        </aside>
                      </div>
                    </div>
                  </div>
                </div>
              </section>-->
              
	<section>
		<div class="container">
			<div class="adv-holder">
				<div><img src="public/images/adv2.png" alt="" /></div>
				<div><img src="public/images/adv3.png" alt="" /></div>
			</div>
		</div>
	</section>

	<section class="main-content">
		<div class="container">
			<ol class="breadcrumb">
			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>
            
			</ol>
			<h2><?php echo stripslashes($this->pagetitle); ?></h2>
			<div class="inner-content">
				<div class="list-head">
					<div class="showing"><!--Showing 5 of 100--></div>
					<div class="sort">
						<!--<div class="form">
							<form action="#">
								<label for="">sort by: </label>
								<span>
									<select name="" id="">
										<option value="new">Newest to oldest</option>
										<option value="old">Oldest to Newest</option>
									</select>
								</span>
							</form>
						</div>-->
					</div>
				</div>
				<div class="list search-list">
					<ul>
					<?php
                
                    if(count($pagelists)>0) {
                    
                    foreach($pagelists as $pagelist): 
                    //print_r($pagelist);
                    //$this->load->model('frontend/login_model');
                    //$proIm=$this->login_model->get_image($pagelist['id']);
                    //echo $pagelist['id'];
                    $author = $pagelist['author'];
                    //$img = $this->gallery_model->get_array_cond($pagelist['id']);
                    //print_r($loc);
                    @$pimage=$pagelist['image'];
                    if($pimage!="")
                    {
                    $url = base_url('public/uploads/gallery/'.$pimage);
                    }
                    else
                    {
                    $url = base_url('public/frontend/images/noimage.jpg');
                    }
                    ?>
						<li>
							<figure>
								<a href="<?php echo site_url('blogs/view/'.$pagelist['slug']); ?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url."&w=282&h=189&zc=1"; ?>" alt=""></a>
							</figure>
							<div class="figure-detail">
								<div class="detail-head">
									<h4><a href="<?php echo site_url('blogs/view/'.$pagelist['slug']); ?>"><?php echo $pagelist['title']; ?></a></h4>
									<div class="author">Author : <?php echo $author; ?> </div>
									
								</div>
								<?php echo substr(stripslashes($pagelist['desc']),0,30); ?>
								
							</div>
							<div class="clearfix"></div>
						</li>
<?php 
endforeach; 
?>
<?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} ?>

			
						
					</ul>
				</div>
<div class="list-pagination">

	<?php echo $this->pagination->create_links(); ?>

</div>
				<!--<ul class="pagination">
					<li class='left'><a href="#">Prev</a></li>
					<li><a href="#">1</a></li>
					<li class='active'><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li class='right'><a href="#">Next</a></li>
				</ul>-->
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
