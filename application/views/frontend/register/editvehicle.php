   
    <section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2>Events List</h2>
        </div>
        <div class="row">
        <div class="col-md-4">
						<?php echo $this->load->view('frontend/register/usermenu'); ?>

            </div>
            
			<div class="col-md-8">
			<div class="row">
				<?php
                if($content->image!='')
                {
                $imagenews=base_url('public/uploads/contents/'.$content->image);	
                }
                else
                {
                $imagenews=base_url('public/frontend/images/noimage.jpg');		
                }

                $date=date("F j",strtotime($content->date_time));
                
                $dateend=date("F j",strtotime($content->end_time));
                
                $year=date("Y",strtotime($content->end_time));
				?>
				<?php
				if($content->image!='')
				{
				?>
          <div class="col-md-4">
            <div class="figure"><img src="<?php echo $imagenews; ?>" alt="" class="img-responsive"/></div>
          </div>
          <?php
			}
		  ?>
          <div class="col-md-8">
            <div class="section-title line">
              <h3><?php echo stripslashes($content->title); ?></h3>
            </div>
            <h4>
              <div class="cell"><strong>Date:</strong><span class="icon icon-calendar"></span><?php echo $date; ?> - <?php echo $dateend; ?>, <?php echo $year; ?></div>
            </h4>
            <h4>
              <div class="cell"><strong>Venue:</strong><?php echo stripslashes($content->keywords); ?></div>
            </h4>
            
		<?php if($content->desc!='') { echo $content->desc; } ?>            
            
          </div><span class="clearfix"></span>
        </div>		                                    
        </div>                        
        </div>
        <span class="clearfix"></span>
        
      </div>
    </section>
