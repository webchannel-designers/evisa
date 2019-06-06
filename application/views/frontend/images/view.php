    
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $category->title?></h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        <div class="product-list wowoffer">
        
							<?php
							$i=0;
                            foreach($galleries as $gallery)
                            {
								
                            ?>
        
          <div class="item">
            <div class="item-cell">
              
              <figure>
              <?php
				if($this->uri->segment(4)=='partners')	
				{	
				if($gallery['link']!="")
				{	
				?>
              <a target="_blank" href="<?php echo $gallery['link']; ?>">
                <?php
				}
				else
				{
					?>
                    <a target="_blank" href="javascript:void(0)">
                    <?php
				}
				}
				else
				{
				?>
              <a rel="gallery" class="reset-fancybox" href="<?php echo site_url('images/detail/'.$gallery['slug']);//base_url("public/uploads/gallery/".$gallery['image']); ?>" title="<?php //echo $gallery['title'];?>">
              <?php } ?>
              <img class="img-responsive" src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/uploads/gallery/'.@$gallery['image']);//."&w=360&h=180&zc=1";?>"></a></figure>
            </div>
          </div>
          
							<?php
							$i++;
                            }
                            ?>
          
        </div>
        <span class="clearfix"></span>
    <?php 
	//echo $this->load->view('frontend/include/comments');
			if($this->session->userdata('userid'))
			{
			}
			else
			{
				?>
                <!--<div class="button-wrap">
            <a class="btn yellow btn-submit" href="<?php echo site_url('login/register'); ?>">Register</a>
            or
            <a class='login fancybox.iframe btn yellow btn-submit' href="<?php echo site_url('login'); ?>">Login</a></li>
                to post comments
                </div>-->
                <?php
			}
	
	?>
      </div>
    </section>
    
                