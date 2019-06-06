<section id="products" class="home-section">
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
						  
							</figure>-->
							
							
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
						  
							</figure>-->
							
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
						  
							</figure>-->
							
						</div>
  
  
 </div>
  
</section>

<section id="about" class="home-section"> 
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
  
</section>

<section id="services" class="home-section">
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
</section>

<section id="quality" class="home-section">

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