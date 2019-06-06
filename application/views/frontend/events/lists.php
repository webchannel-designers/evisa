              
<section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2>Events</h2>
        </div>
        <div class="event-slider list">
          <div class="row">
          
			<?php
            
                foreach($pagelists as $category): 
                
                $format = $this->events_model->get_format($category['format_id']);
                
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
          
            <div class="item col-md-4 col-xs-12">
              <figure><a href="<?php echo site_url('events/view/'.$slug)?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $imagenews."&w=360&h=180&zc=1"; ?>" alt="" class="img-responsive"/></a></figure>
              <div class="item-detail dark">
                <div class="title"><a href="<?php echo site_url('events/view/'.$slug)?>"><?php echo $category['title']; ?></a></div>
                <div class="content"> 
                  <p><strong>Date : </strong><?php echo $date; ?> - <?php echo $dateend; ?>, <?php echo $year; ?></p>
                  <p><strong>Venue :</strong><?php echo $category['keywords']; ?></p>
                </div>
                <div class="item-footer"><a href="<?php echo site_url('events/view/'.$slug)?>" class="btn red">View Details</a></div>
              </div>
            </div>
            
			<?php
            
            endforeach;
            
            //}
            
            ?>
            
          </div>
          <nav class="pagination-wrapper text-right">
            <?php echo $this->pagination->create_links(); ?> 
          </nav>
        </div>
      </div>
    </section>              