<?php //print_r($catcontent); ?>
<!--<div class="row">

	<div class="col-sm-3">
    <?php
if($content->image!='')
{
$imagenews=base_url('public/uploads/contents/'.$content->image);	
}
else
{
$imagenews=base_url('public/frontend/images/noimage.jpg');		
}

$days = (strtotime($content->end_time) - strtotime($content->date_time)) / (60 * 60 * 24);
?>

		<img class="img-responsive" src="<?php //echo $imagenews ?>" /></div>
	<div class="col-sm-12">
<p>
<a class="btn violet pull-right"  href="<?php echo site_url('register/events/'.$content->slug) ?>">Register Here</a></p>
<h3 class="addedon">Date : <?php echo date("l, jS F",strtotime($content->date_time)); if($days!=0) {?> - <?php echo date("l, jS F Y",strtotime($content->end_time)); }?></h3>
<p>Category : <?php echo $catcontent->name; ?></p>
<!--<p>Duration : <?php //echo $days ?> days</p>
<p>Venue : <?php echo $content->short_desc;?></p>


<p>Telephone : <?php echo $content->keywords;?></p>
<?php
if($content->image!='')
{
?>
<img class="img-responsive" src="<?php echo $imagenews ?>" />
<?php
}
?>
	<p><?php if($content->desc!='') { echo $content->desc; } ?></p>
<p>
<a class="btn violet pull-right"  href="<?php echo site_url('register/events/'.$content->slug) ?>">Register Here</a></p>
</div>
</div>-->

<?php

//$format = $this->events_model->get_format($content->format_id);

if($content->image!='')
{
$imagenews=base_url('public/uploads/contents/'.$content->image);	
}
else
{
$imagenews=base_url('public/frontend/images/noimage.jpg');		
}

//$days = (strtotime($content->end_time) - strtotime($content->date_time)) / (60 * 60 * 24);
?>

<!--<section class="inner-page">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="inner-content">
                        <div class="col-lg-8">
                          <h2><?php echo stripslashes($content->title); ?></h2>
                          <div class="lists events">
                            <div class="eve-detail">
                            <?php
							if($content->image!='')
							{
							?>
                              <figure><a href="#"><img class="img-responsive" src="<?php echo $imagenews; ?>"></a></figure>
                              <?php
							}
							  ?>
                              <div class="figure-detail">
                                <h4><a href="#"><?php echo stripslashes($content->title); ?></a></h4>
                                <!--<div class="date-format">
                                  <div class="date icon-calendar">From : <?php echo date('jS M', strtotime($content->date_time)); ?>  TO <?php echo date('jS M', strtotime($content->end_time)); ?></div>
                                  <div class="format">Match Format: <span><?php echo stripslashes($format[0]['title']); ?></span></div>
                                </div>
                                <div class="figure-content">
                                <?php if($content->desc!='') { echo $content->desc; } ?>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                            </div>
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
                                <li style="height: 196px;"><img src="<?php echo base_url('public/frontend/images/img-planeve1.png')?>"/>">
                                  <div class="plan-wrap">
                                    <h2>Planning an event?</h2><a class="btn" href="#">Book Now</a>
                                  </div>
                                </li>
                                <li style="height: 199px;"><img src="<?php echo base_url('public/frontend/images/img-planeve2.png')?>">
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
			<h2><?php echo stripslashes($content->title); ?></h2>
			<div class="inner-content">
                        <div class="author">Author : <?php echo stripslashes($content->author); ?></div>

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
				<div class="blog-details">
                            <?php
							if($content->image!='')
							{
							?>
                              <figure><a href="#"><img class="img-responsive" src="<?php echo base_url('public/uploads/contents/'.$content->image);	
; ?>"></a></figure>
                            <?php
							}
							?>

					<div class="figure-content"><?php if($content->desc!='') { echo $content->desc; } ?></div>
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
		