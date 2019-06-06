    
    <section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2>Articles</h2>
        </div>
        <div class="row">
        <div class="col-md-4">
			<?php echo $this->load->view('frontend/register/usermenu'); ?>
            </div>
            
			<div class="col-md-8">
              <?php echo $this->session->flashdata('message'); ?>              
		<div class="event-slider list">
        <p>
        <a class="btn red" href="<?php echo site_url('login/addblog'); ?>">Add Article</a>
        </p>
          <div class="row">
          
			<?php
            
                foreach($contents as $category): 
                
                
                $ndesc1=word_limiter($category['desc'],30);
                
                $ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 
            
                $nid=$category['id'];
            
                $slug=$category['slug'];
                
                $image=base_url('public/uploads/contents/'.$category['image']);
            
                $date=date("F j",strtotime($category['date_time']));
                
                //$dateend=date("F j",strtotime($category['end_time']));
                
                //$year=date("Y",strtotime($category['end_time']));
                
                $date=date("M Y",strtotime($category['date_time']));
                
                $date1=date("j ",strtotime($category['date_time']));
                
                //$days = (strtotime($category['end_time']) - strtotime($category['date_time'])) / (60 * 60 * 24);
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
          
            <div class="item col-md-6 col-xs-12">
              <figure><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $imagenews."&w=360&h=180&zc=1"; ?>" alt="" class="img-responsive"/></figure>
              <div class="item-detail dark">
                <div class="title"><?php echo $category['title']; ?></div>
                <div class="content"> 
                  <p><strong>Date : </strong><?php echo $date; ?></p>
                  <!--<p><strong>Venue :</strong><?php echo $category['keywords']; ?></p>-->
                </div>
                <div class="item-footer btn-blog"><a title="Edit" href="<?php echo site_url('login/editblog/'.$category['id']."/N/0")?>" class="icon glyphicon glyphicon-edit"></a><a href="<?php echo site_url('login/deleteblog/'.$category['id']."/N/0")?>" title="Delete" class="icon glyphicon glyphicon-trash" onclick="return confirm('Are you sure?');"></a></div>
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
        </div>
        <span class="clearfix"></span>
        
      </div>
    </section>