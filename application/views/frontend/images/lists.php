 
    
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $this->pagetitle; ?></h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        
        <div class="product-list">
        
							<?php
                            foreach($galleries as $gallery)
                            {
								
							$images=$this->gallery_model->get_row_cond(array('category_id'=>$gallery['id']));
                            ?>
        
          <div class="item">
            <div class="item-cell">
              <div class="title"><a href="<?php echo site_url('gallery/view/'.$gallery['slug']); ?>"><?php echo stripslashes($gallery['title']); ?></a></div>
              <div class="content"> 
                  <p><strong>Photos :</strong><?php echo count($images); ?></p>
                </div>
              <figure><a href="<?php echo site_url('gallery/view/'.$gallery['slug']); ?>"><img class="img-responsive" src="<?php if($gallery['image']!="") { echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/uploads/gallery/'.@$gallery['image'])."&w=360&h=180&zc=1"; } else { echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/frontend/images/noimage.jpg')."&w=360&h=180&zc=1"; } ?>"></a></figure>
            </div>
          </div>
          
							<?php
                            }
                            ?>
          
          
        </div>
        
              
        
      </div>
    </section>