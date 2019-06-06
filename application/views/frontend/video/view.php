<?php 
				  function getYoutubeIdFromUrl($url) {
					$parts = parse_url($url);
					if(isset($parts['query'])){
						parse_str($parts['query'], $qs);
						if(isset($qs['v'])){
							return $qs['v'];
						}else if($qs['vi']){
							return $qs['vi'];
						}
					}
					if(isset($parts['path'])){
						$path = explode('/', trim($parts['path'], '/'));
						return $path[count($path)-1];
					}
					return false;
				}

 ?>
<!--<div>
<div class='title_wraper'><h3 class='gal_title'><?php echo $category->title?></h3>
<span class='right'><a href='<?php echo site_url("video/lists")?>'>Back To List</a></span>
</div>
<ul class='gallery video'>
<?php
foreach($galleries as $gallery)
{
	//echo $gallery['video'];
	$vname = getYoutubeIdFromUrl($gallery['video']);
?>
<li>
<a class="enquiry" href="<?php echo site_url("video/view2/".$vname); ?>">

 <img src="http://img.youtube.com/vi/<?php echo $vname; ?>/default.jpg" width=243 height=148>
<span><?php $gallery['title']?></span>
</a>
</li>
<?php
}
?>
</ul>
</div>-->

<section class="inner-page">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="inner-content">
                        <div class="col-lg-8">
                          <h2>Video</h2>
                          <h3 class="spec"><?php echo $category->title?></h3>
                          <hr>
                          <div class="album-wrap album-list video-list">
                            <ul>
<?php
$i=1;
foreach($galleries as $gallery)
{
	//echo $gallery['video'];
	$vname = getYoutubeIdFromUrl($gallery['video']);
?>
                              <li <?php if($i%4==0) { ?>class="omega_margin"<?php } ?>>
                                <div class="figure-head"><?php echo stripslashes($gallery['title']); ?></div>
                                <figure><a class="btn btn-lg gallon enquiry fancybox.iframe" href="<?php echo site_url("video/view2/".$vname."/".$gallery['id']); ?>"><img class="img-responsive" src="http://img.youtube.com/vi/<?php echo $vname; ?>/default.jpg"><div class="hover-wrapper"></div></a></figure>
                              </li>
<?php
$i++;
}
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
                          <div class="plan-event">
                            <div class="wrap">
                              <ul>
                                <li style="height: 196px;"><img src="<?php echo base_url('public/frontend/images/img-planeve1.png')?>">
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
                        </aside>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              
              