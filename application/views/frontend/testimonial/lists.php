<section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $this->pagetitle; ?></h2>
            </div>
          </div>
        </div>
        
        <div class="testimonial-list">
        <div class="button-wrap">
<a class="btn yellow btn-submit" href="<?php echo site_url('friends/lists'); ?>?profession=teacher">Teacher</a><a class="btn yellow btn-submit" href="<?php echo site_url('friends/lists'); ?>?profession=pianist">Pianist</a>        
</div>
        <div class="row">
            <?php
			$i=1;
                $len1 =10;
                if(isset($pagelists)){
                     foreach($pagelists as $category): 
               	 if(str_word_count($category['title']) > 6) $len1 =6;
                    $ndesc1=word_limiter(strip_tags($category['desc']),$len1);
                    
                    $ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 
                
                    $nid=$category['id'];
                
                    $slug=$category['slug'];
                
                    $date1=date("d",strtotime($category['date_time']));
                    
                    $date2=date("M Y",strtotime($category['date_time']));
                
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
        
          <div class="item col-md-4 col-sm-6">
          
          <figure><a href="<?php echo site_url('friends/view/'.$category['slug']); ?>"><img src="<?php echo $imagenews;//echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php //echo base_url('public/uploads/gallery/'.@$pagelist['image'])."&w=360&h=180&zc=1";?>" alt="" class="img-responsive"/></a></figure>
          <div class="fig-details">
             <!-- <p class="testi-text"><?php echo $ndesc; ?></p>-->
              <div class="name">
                <p><strong><?php echo $category['title']; ?></strong><strong><?php echo $category['author']; ?></strong><?php echo $category['company']; ?></p>
              </div>
            </div>
            
          </div>
          
            <?php
                $i++;
                endforeach;
                
                }
            ?>
          
          
        </div>
        </div>
			<div class="pagination-wrap text-center"> 
                <!--<p>Showing 6 out of 100</p>-->
                <?php echo $this->pagination->create_links(); ?> 
              </div>        
      </div>
    </section>