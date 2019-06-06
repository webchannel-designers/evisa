
<section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2>Blogs</h2>
        </div>
        <div class="event-slider list">
          <div class="row">
          
          <?php if(isset($pagelists)){
					foreach($pagelists as $category): 
 					$ndesc1=word_limiter($category['desc'],45);
 					$ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 
 					$nid=$category['id'];
 					$slug=$category['slug'];
 					$date=date("M",strtotime($category['date_time']));
					$date2=date("Y",strtotime($category['date_time']));
					if($category['image']!='')
					{
                                 //$imagenews=base_url('public/uploads/contents/'.$category['image']);	
 				$imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/contents/'.$category['image'])."&w=371&h=195&zc=1";
                     }
                     else
                     {
                                 //$imagenews=base_url('public/frontend/images/noimage.jpg');	
 				$imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=371&h=195&zc=1";	
                      }
           ?>
          
            <div class="item col-md-4 col-xs-12">
              <figure><a href="<?php echo site_url('blogs/view/'.$slug)?>"><img class="img-responsive" alt="<?php echo $category['alt'] ?>" src="<?php echo $imagenews ?>"></a></figure>
              <div class="item-detail dark">
                <div class="title"><a href="<?php echo site_url('events/view/'.$slug)?>"><?php echo $category['title']; ?></a></div>
                <div class="content"> 
                  <p><strong>Date : </strong><?php echo $date; ?> - <?php echo $date2; ?></p>
                </div>
                <div class="item-footer"><a href="<?php echo site_url('blogs/view/'.$slug)?>" class="btn red">View Details</a></div>
              </div>
            </div>
            
          <?php  endforeach; } if(count($pagelists)==0) { ?>
          <h4 class="text-center">No Results Found</h4>
          <?php }?>
            
          </div>
          <nav class="pagination-wrapper text-right">
            <?php echo $this->pagination->create_links(); ?> 
          </nav>
        </div>
      </div>
    </section>
