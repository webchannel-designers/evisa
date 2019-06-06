 
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $this->pagetitle; ?></h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        
       
        
		 
<?php
	/**
 * 	<div class="row">
 *         
 *         <div class="col-md-14">
 *          
 *         </div>
 *         </div>   
 */
?>
        <div class="row">
      
        <?php if(count(@$images)>0) {  $descol=7;?>
        
          <div class="col-md-7 <?php  if($this->uri->segment(4)!="piano-rent") { ?>col-md-push-3<?php }  ?> ">
            <div class="gallerySlider">
              <div id="gallery-large" class="gallery owl-carousel">
              <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                <div class="item"><img src="<?php echo $url; ?>" alt="" class="img-responsive"/></div>
              <?php } ?>
                
              </div>
              <div id="gallery-thumb" class="gallery owl-carousel">
              
              <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                <div class="item"><img src="<?php echo $url; ?>" alt="" class="img-responsive"/></div>
              <?php } ?>
                
              </div>
            </div>
        
        <div class="clearfix">&nbsp;</div>
          </div>
        <?php } ?>
          <?php  if($this->uri->segment(4)=="piano-rent") { ?>
        <div class="col-md-7">
		<?php if($content->desc!='') { echo $content->desc; } ?>  </div><?php }  ?> 
        <?php if($this->uri->segment(4)!="piano-rent") { ?>
        <div class="col-md-12">
		<?php if($content->desc!='') { echo $content->desc; } ?>
        </div>
          
        </div>
        <?php } //else {
            if($this->uri->segment(4)=="piano-rent") { ?>
        
		<?php /*
	<div class="row">
        
        <div class="col-md-14">
        
		<?php if($content->desc!='') { echo $content->desc; } ?>    
        </div>
        </div> */
?>
        
	<section class="section white section-products" style=" padding:0px;">
      <div class=""> 
        <div class="product-tab">
          <ul class="nav nav-tabs">
          <?php $i=1;foreach($categories2 as $items) { ?>
            <li <?php if($i==1) { ?>class="active"<?php } ?>><a href="#rentalTab<?php echo $i; ?>" data-toggle="tab"><?php echo $items['name']; ?></a></li>
            <?php $i++; } ?>
          </ul>
          <div class="tab-content">
          <?php $i=1;foreach($categories2 as $items) { ?>
            <div id="rentalTab<?php echo $i; ?>" class="tab-pane fade <?php if($i==1) { ?>in active<?php } ?>">
            <?php //$catproducts=$this->products_model->get_featured_active(array('type'=>1,'category_id'=>$items['id'])); 
			?>
              <div class="owl-carousel product-slider">
                <div class="item">
              <?php
			  $j=1;
			  if(isset($products[$items['id']]))foreach($products[$items['id']] as $key => $item)
			  {
			  ?>
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
                  <div class="item-cell">
                    <div class="title"><a href="<?php echo site_url('products/view/'.$item['slug']); ?>"><?php echo $item['title'] ?></a></div>
                    <figure><a href="<?php echo site_url('products/view/'.$item['slug']); ?>"><img src="<?php echo $url; ?>" alt="" class="img-responsive"/></a></figure>
                    <div class="btn-holder"><a href="<?php echo site_url('products/view/'.$item['slug']); ?>#enq" class="btn yellow">REQUEST A QUOTE</a></div>
                  </div>
                  <?php
				  if($j%1==0)
				  {
					  if($j<count($products[$items['id']]))
					  {
					  ?>
                      </div>
                <div class="item">
                      <?php
					  }
				  }
				  ?>
                  <?php
				  $j++;
			  }
				  ?>
                  
                </div>
                
              </div>
            </div>
            <?php $i++; } ?>
            
          </div>
          <?php /* ?>
          <div class="btn-holder"><a href="<?php echo site_url('products/lists'); ?>?type=rental" class="btn yellow">VIEW ALL</a></div>
		  <?php */ ?>
        </div>
      </div>
      <div class="clearfix">&nbsp;</div>
    </section>    
		<div class="row">
        
        <div class="col-md-14">
		<?php if($content->specification!='') { echo $content->specification; } ?>
        </div>
          
        </div>
        <?php  } ?> 
       		        
      </div>
    </section>
    <?php  if($this->uri->segment(4)!="piano-rent") { ?> <section class="section yellow section-interested" id="enq">
      <div class="container">
        <div class="inner">
          <h3 class="text-center">Interested in this Service?</h3>
          <p class="text-center">Please give us your contact details and <br>get a callback</p>
          <div class="form-interest" id="enquirycontainer">
          </div>
        </div>
      </div>
    </section> <?php  } ?> 
       		        	
