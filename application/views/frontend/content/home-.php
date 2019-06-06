<!--<section id="products" class="home-section">
 <div class="container">
<div class="row">
  <div class="col-sm-10"><h2><?php echo convert_lang('Our Products',$this->alphalocalization); ?></h2></div>
  <?php
  if($catalogue[0]['pdf']!="")
  {
  ?>
  <div class="col-sm-2"><a target="_blank" href="<?php echo base_url('public/uploads/products/'.$catalogue[0]['pdf']); ?>" class="btn download-cata btn-cmn pull-right"><?php echo convert_lang('Download  Catalogue',$this->alphalocalization); ?></a></div>
  <?php
  }
  ?>
</div>  
  <div class="owl-carousel product-carousel row" data-nav="fp_nav_" data-plugin-options='{"itemsCustom" : [[992,4],[768,2],[100,1]], "singleItem" : false, "navigation":true}'>
                            <?php
							$i=0;
							foreach($products as $product)
							{
								$img = $proimages[$i];
							?>
						 <a href="<?php echo site_url('products/view/'.$product['slug'])?>">	
							<div class="products-wrap">	
									
							<ul class="ch-grid">
								<li>
								
									<div class="ch-item" style="background-image:url(<?php
									if(@$img[0]['image']!="")
									{
									 echo base_url('public/uploads/gallery/'.$img[0]['image']);
									}
									else
									{
									 echo base_url('public/frontend/images/noimage.jpg');
									}
									 ?>
                                     
                                     );">
										<div class="ch-info">		
										 <h3></h3>									
										 <span class="view-det">View Details</span>										
										</div>
									</div>
									
									<div class="prod-info">										
										<?php echo stripslashes($product['title']); ?>										
									  </div>
									
																		
								</li>					
					
				          </ul>						  
						  
							</div>
                          </a>  
							<?php
							$i++;
							}
							?>
							
							<!--<figure class="products-wrap">	
									
							<ul class="ch-grid">
								<li>
								 <a href="#">
									<div class="ch-item" style="background-image:url(images/product1.png);">
										<div class="ch-info">											
										</div>
									</div>
									
									<div class="prod-info">										
										Al Bassam Fiberglass<br> Tanks										
									  </div>
									</a>																		
								</li>
				             </ul>					  
						  
							</figure>
							
							
							<figure class="products-wrap">	
									
							<ul class="ch-grid">
								<li>
								 <a href="#">
									<div class="ch-item" style="background-image:url(images/product1.png);">
										<div class="ch-info">											
										</div>
									</div>
									
									<div class="prod-info">										
										Al Bassam Fiberglass<br> Tanks										
									  </div>
									</a>
																		
								</li>					
					
				          </ul>						  
						  
							</figure>
							
							<figure class="products-wrap">	
									
							<ul class="ch-grid">
								<li>
								 <a href="#">
									<div class="ch-item" style="background-image:url(images/product1.png);">
										<div class="ch-info">											
										</div>
									</div>
									
									<div class="prod-info">										
										Al Bassam Fiberglass<br> Tanks										
									  </div>
									</a>
																		
								</li>					
					
				          </ul>						  
						  
							</figure>
							
						</div>
  
  
 </div>
  
</section>-->

<!--<section id="about" class="home-section"> 
  <div class="container">
   <div class="row">
    <div class="col-md-8 col-sm-8 home-content">
      <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo convert_lang('About Al Bassam',$this->alphalocalization); ?><br />
<?php echo convert_lang('International Factories',$this->alphalocalization); ?></h2>
	  <p data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo stripslashes(word_limiter($about->desc,180)); ?></p>
        <a href="<?php echo site_url('contents/view/'.$about->slug)?>" class="read-more btn-cmn abt-more" data-appear-animation="bounceInLeft" data-appear-animation-delay="300"><?php echo convert_lang('READ MORE INFO',$this->alphalocalization); ?></a>
	</div>
	<div class="col-md-4 col-sm-4">
	  
	  <div class="col-sm-12 abt-panel blue mar-bot40" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	  
	    <h3><?php echo stripslashes($vission->title); ?></h3>
	<div class="row">
		<div class="col-sm-8">
			<p><?php echo stripslashes($vission->desc); ?></p>
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
		  <p><?php echo stripslashes($mission->desc) ?></p>
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

<!--<section id="services" class="home-section">
<div class="srvc-top">
 <div class="container">
   
	 <div class="col-md-4 col-sm-4 pull-right srvc-box" data-appear-animation="fadeInUp" data-appear-animation-delay="400">
		  <h2><?php echo $tankcleaning->title ?></h2>
		   <p><?php echo stripslashes(word_limiter($tankcleaning->desc,55)); ?></p>
		   <a href="<?php echo site_url('contents/view/'.$tankcleaning->slug)?>" class="read-more btn-cmn"><?php echo convert_lang('READ MORE INFO',$this->alphalocalization); ?></a>
	 </div>
	 </div>
  </div>
   
   <div class="quality-top"></div>
</section>-->

<!--<section id="quality" class="home-section">

 <div class="container">
   <div class="row">    
	 <div class="col-md-8 col-sm-8">
		  <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="400"><?php echo $quality->title ?></h2>
		   <div class="row">
		    <div class="col-md-11"><p data-appear-animation="fadeInUp" data-appear-animation-delay="400"><?php echo stripslashes(word_limiter($quality->desc,35)); ?></p></div>
		   </div>      
		 	<a class="read-more btn-cmn qty-more" href="<?php echo site_url('contents/view/quality-policy');?>"><?php echo convert_lang('Read More',$this->alphalocalization); ?></a>
	<div class="row quality-pics" data-appear-animation="fadeInUp" data-appear-animation-delay="600">
	<div class="col-md-10">
	<div class="row">
		 <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic1.png')?>"></div>
	  <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic2.png')?>"></div>
	  <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic3.png')?>"></div>
	  <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic4.png')?>"></div>
	  <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic5.png')?>"></div>
	  <div class="col-md-2 col-sm-3 col-xs-6"><img src="<?php echo base_url('public/frontend/images/quality-pic6.png')?>"></div>
  </div>
  </div>
  </div>        
           
           		   
	 </div>
	 
	 <div class="col-md-4 col-sm-4 certification" data-appear-animation="fadeInUp" data-appear-animation-delay="600">
	   <h3><?php echo $certification->title ?></h3>
	   <p><?php echo stripslashes(word_limiter($certification->desc,50)); ?></p>
	  <div class="row">
		  <div class="col-sm-9">  
		   <a href="<?php echo site_url('contents/view/'.$certification->slug)?>" class="view-certi btn btn-cmn"><?php echo convert_lang('VIEW certification',$this->alphalocalization); ?></a>
		  </div> 
		  <div class="col-sm-3">  
		   <img src="<?php echo base_url('public/frontend/images/certi-icon.png')?>" alt="" class="img-responsive">
		  </div>
		</div>
	 </div>
	 
	 </div>
  </div>
    </div>
</section>
-->


	<!--<div id="preloader">
      <div class="logo"><img src="images/page-logo.png"/>
        <div id="status">&nbsp;</div>
      </div>
    </div>-->
    
    
              <section class="bg-grey">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-5 omega">
                        <div class="about-box">
                          <h2>About Ajman Oval</h2>
                          <?php echo stripslashes(word_limiter($about->desc,180)); ?>
                          <a href="<?php echo site_url('contents/view/'.$about->slug)?>" class="btn-more btn">View More</a>
                        </div>
                      </div>
                      <div class="col-lg-7 alpha">
                        <div class="search-box green">
                          <h2>Search Available Slots</h2>
                          <form>
                            <ul>
                              <li class="datepicker">
                                <input id="datepicker" placeholder="DATE"/>
                              </li>
                              <li>
                                <select>
                                  <option>FORMAT</option>
                                  <option>FORMAT1</option>
                                  <option>FORMAT2</option>
                                </select>
                              </li>
                              <li>
                                <select>
                                  <option>SLOT</option>
                                  <option>SLOT1</option>
                                  <option>SLOT2</option>
                                </select>
                              </li>
                            </ul>
                            <button class="btn btn-submit">Check Availability</button>
                          </form>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dumm</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="facilities-section">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="facilities-wrapper">
                        <div class="facilities">
                          <div class="wrap">
                            <div class="title-head">
                              <h2>Facility & Amenities</h2>
                            </div>
                            <?php echo stripslashes(word_limiter($facility->desc,180)); ?>
                            <!--<ul>
                              <li>Lorem ipsum Veniam id veniam aliquip velit  </li>
                              <li>dolore occaecat in sint laboris culpa qui  </li>
                              <li>Lorem ipsum Veniam id veniam aliquip velit  </li>
                              <li>dolore occaecat in sint laboris culpa qui  </li>
                              <li>Lorem ipsum Veniam id veniam aliquip velit  </li>
                              <li>dolore occaecat in sint laboris culpa qui  </li>
                              <li>Lorem ipsum Veniam id veniam aliquip velit  </li>
                              <li>dolore occaecat in sint laboris culpa qui  </li>
                            </ul>-->
                          </div>
                        </div>
                        <?php //print_r($events); ?>
                        <div class="events">
                          <div class="wrap">
                            <div class="title-head">
                              <h2>Current Events/Tournaments</h2><a href="<?php echo site_url('events/lists/events')?>" class="btn btn-view-more">View More</a>
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
                          <div class="wrap alpha">
                            <ul>
                              <li><img src="<?php echo base_url('public/frontend/images/img-planeve1.png')?>"/>
                                <div class="plan-wrap">
                                  <h2>Planning an event?</h2><a href="#" class="btn">Book Now</a>
                                </div>
                              </li>
                              <li><img src="<?php echo base_url('public/frontend/images/img-planeve2.png')?>"/>
                                <div class="plan-wrap">
                                  <h3>Looking to organization a tournament ?</h3>
                                  <p>For bulk booking Enquiry...</p>
                                  <div class="footer-plan"><a href="#" class="btn">Book Now</a><a href="#" class="btn callus"><span>Or Call us </span>0501234567</a></div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <section class="gallery-wrapper">
                <div class="container-fluid">
                  <div class="container">
                    <div class="row">
                      <div class="title-head">
                        <h2>Gallery</h2>
                      </div>
                      <?php
					  $i=1;
					  foreach($galleries as $gallery)
					  {
						  $images=$this->gallery_model->get_row_cond(array('category_id'=>$gallery['id']));
						  //print_r($images);
					  ?>
                      <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="gallery-header">
                          <h4><?php echo $gallery['title']; ?></h4><span><?php echo count($images); ?> Photos</span>
                        </div>
                        <ul>
                          <li>
                            <div class="gallery<?php echo $i; ?> connected-carousels">
                              <div class="stage">
                                <div class="carousel carousel-stage">
                                  <ul>
                                  <?php
								  foreach($images as $image)
								  {
									  if(@$image['image']!="")
									  {
								  ?>
                                    <li><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/uploads/gallery/'.@$image['image'])."&w=640&h=426&zc=1";?><?php //echo base_url('public/uploads/gallery/'.@$image['image'])?>" class="img-responsive"/></li>
                                    <?php
									  }
								  }
									?>
                                  </ul><a href="#" class="prev icon-left-open-big prev-stage"></a><a href="#" class="next icon-right-open-big next-stage"></a>
                                </div>
                                <div class="navigation"><a href="#" class="prev icon-left-open-big prev-navigation">              </a><a href="#" class="next icon-right-open-big next-navigation"></a>
                                  <div class="carousel carousel-navigation">
                                    <ul>
                                  <?php
		  						  $images2=$this->gallery_model->get_row_cond(array('category_id'=>$gallery['id']));
								  //print_r($images2);exit;
								  foreach($images2 as $image2)
								  {
									  //print_r($image2);exit;
									  if(@$image2['image']!="")
									  {
								  ?>
                                      <li><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/uploads/gallery/'.@$image2['image'])."&w=65&h=65&zc=1";?><?php //echo base_url('public/uploads/gallery/'.@$image2['image'])?>" class="img-responsive"/></li>
                                      <?php
									  }
								  }
									  ?>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <?php
					  $i++;
					  }
					  ?>
                      
				<!--<div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="gallery-header">
                          <h4>Sed ut perspiciatis unde omnis</h4><span>20 Photos</span>
                        </div>
                        <ul>
                          <li>
                            <div class="gallery1 connected-carousels">
                              <div class="stage">
                                <div class="carousel carousel-stage">
                                  <ul>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/1.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/2.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/3.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/4.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/5.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/6.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/7.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/8.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/9.jpg')?>" class="img-responsive"/></li>
                                  </ul><a href="#" class="prev icon-left-open-big prev-stage"></a>
                                  <a href="#" class="next icon-right-open-big next-stage"></a>
                                </div>
                                <div class="navigation"><a href="#" class="prev icon-left-open-big prev-navigation">              </a>
                                <a href="#" class="next icon-right-open-big next-navigation"></a>
                                  <div class="carousel carousel-navigation">
                                    <ul>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/1.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/2.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/3.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/4.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/5.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/6.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/7.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/8.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/9.jpg')?>" class="img-responsive"/></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>-->
                      
			<!--<div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="gallery-header">
                          <h4>Sed ut perspiciatis unde omnis</h4><span>20 Photos</span>
                        </div>
                        <ul>
                          <li>
                            <div class="gallery2 connected-carousels">
                              <div class="stage">
                                <div class="carousel carousel-stage">
                                  <ul>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/1.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/2.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/3.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/4.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/5.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/6.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/7.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/8.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/9.jpg')?>" class="img-responsive"/></li>
                                  </ul><a href="#" class="prev icon-left-open-big prev-stage"></a><a href="#" class="next icon-right-open-big next-stage"></a>
                                </div>
                                <div class="navigation"><a href="#" class="prev icon-left-open-big prev-navigation">              </a><a href="#" class="next icon-right-open-big next-navigation"></a>
                                  <div class="carousel carousel-navigation">
                                    <ul>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/1.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/2.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/3.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/4.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/5.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/6.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/7.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/8.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/9.jpg')?>" class="img-responsive"/></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>-->
                      
					<!--<div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="gallery-header">
                          <h4>Sed ut perspiciatis unde omnis</h4><span>20 Photos</span>
                        </div>
                        <ul>
                          <li>
                            <div class="gallery3 connected-carousels">
                              <div class="stage">
                                <div class="carousel carousel-stage">
                                  <ul>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/1.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/2.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/3.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/4.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/5.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/6.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/7.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/8.jpg')?>" class="img-responsive"/></li>
                                    <li><img src="<?php echo base_url('public/frontend/images/gallery/9.jpg')?>" class="img-responsive"/></li>
                                  </ul><a href="#" class="prev icon-left-open-big prev-stage"></a><a href="#" class="next icon-right-open-big next-stage"></a>
                                </div>
                                <div class="navigation"><a href="#" class="prev icon-left-open-big prev-navigation">              </a><a href="#" class="next icon-right-open-big next-navigation"></a>
                                  <div class="carousel carousel-navigation">
                                    <ul>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/1.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/2.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/3.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/4.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/5.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/6.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/7.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/8.jpg')?>" class="img-responsive"/></li>
                                      <li><img src="<?php echo base_url('public/frontend/images/gallery/thumbs/9.jpg')?>" class="img-responsive"/></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>-->                      
                    </div>
                  </div>
                </div>
              </section>
              <section class="map">
                <div class="map-wrapper">
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
 
        <!-- fail nicely if the browser has no Javascript -->
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
					marker14_lg9dq_0.openInfoWindowHtml('<?php echo "Ajman Oval";?>');
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

                <!--<img src="images/img-map.png" class="img-responsive"/>--></div>
              </section>
              