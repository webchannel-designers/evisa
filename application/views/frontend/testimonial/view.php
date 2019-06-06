<section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $this->pagetitle; ?></h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        
        <div class="testimonial-details">
        <div class="row">
        <div class="col-md-4">
        <?php if(count(@$images)>0) {  $descol=7;?>
        
              <div class="testiLargeSlider owl-carousel">
              <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                <div class="item"><img src="<?php echo $url; ?>" alt="" class="img-responsive"/></div>
              <?php } ?>
                
              </div>
              
          
        <?php }  ?>
        <p><strong>Profession</strong></p>    
        <p><?php echo $content->company; ?></p>
        <p><strong>Language</strong></p>    
        <p><?php echo $content->title; ?></p>
        <p><strong>Location</strong></p>    
        <p><?php echo $content->location; ?></p>
        <p><strong>Phone</strong></p>    
        <p><?php echo $content->phone; ?></p>
        <p><strong>Email</strong></p>    
        <p><?php echo $content->email; ?></p>
        </div>
        <div class="col-md-10">
        <h3>Brief Information</h3>
        <?php if($content->desc!='') { echo $content->desc; } ?>

        </div>
        </div>
       
        </div>
        
      </div>
    </section>
