<section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2><?php echo stripslashes($this->pagetitle); ?></h2>
        </div>
        <div class="row">
          					<?php
							if($content->image!='')
							{
								$imagenews=base_url('public/uploads/contents/'.$content->image);	
							?>
                             <?php /*?> <figure><a href="#"><img class="img-responsive" src="<?php echo $imagenews; ?>"></a></figure><?php */?>
                              <?php
							}

                $date=date("F j",strtotime($content->date_time));
                
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
            <!--<div class="section-title line">
              <h3><?php echo stripslashes($content->title); ?></h3>
            </div>-->
            <h4>
              <div class="cell"><strong><?php echo convert_lang('Published on',$this->alphalocalization); ?>:</strong><span class="icon icon-calendar"></span><?php echo date("F Y",strtotime($content->date_time));?></div>
            </h4>
            <h4>
              <div class="cell">
			  
                                <?php 
								if($content->author==1)
								{
                                if(isset($content->author) && $content->author !='') { 
                                $authors=array();
                               ?>
                                
                                    <?php                              
                                	foreach($users as $user)
                                	{
                                    if(in_array($user['id'],explode(',',$content->author))) { $authors[] = $user['name'];  }
                                	}
                                    if($authors) {  
                                    echo '<strong>Author(s):</strong>'.implode(',',$authors);
                                    }
                                    ?>  
                                                              
                                <?php } } else { ?>
                                
                                    <?php                              
                                	foreach($users2 as $user)
                                	{
                                    if(in_array($user['id'],explode(',',$content->author))) { $authors[] = $user['fname'];  }
                                	}
                                    if($authors) {  
                                    echo '<strong>Author(s):</strong>'.implode(',',$authors);
                                    }
                                    ?>  
                                
                                <?php } ?>
              
              </div>
            </h4>
		<?php if($content->desc!='') { echo $content->desc; } ?>    
            
          </div><span class="clearfix"></span>
        </div>
        <!--<div class="oraganisers-content">
          <div class="cell-wrapper">
            <div class="cell">
              <h3 class="line">ORGANISERS</h3>
              <figure><img src="images/page-logo.png" alt="" class="img-responsive"/></figure>
            </div>
            <div class="cell">
              <h4 class="line">Address</h4>
              <p>
                <div class="icon icon-location"> </div><span>123 Main Street, Al Mamzar, Dubai,<br></span>United Arab Emirates
              </p>
            </div>
            <div class="cell">
              <h4 class="line">Quick Contact</h4>
              <p>
                <div class="icon icon-mail"> </div><span>info@emiratescardiac.com</span>
              </p>
              <p>
                <div class="icon icon-phone"> </div><span>+971 (04) 123 6789</span>
              </p>
            </div>
          </div>
        </div>-->
        <!--<div class="more-details">
          <div class="row">
            <div class="cell-wrapper">
              <div class="cell register-box">
                <h3 class="section-title"><a href="#">REGISTRATION</a></h3><a href="<?php echo site_url('login/register'); ?>" class="readmore">More</a>
              </div>
              <div class="cell guide-box">
                <h3 class="section-title"><a href="#">ATTENDANCE GUIDE</a></h3><a href="#" class="readmore">More</a>
              </div>
              <div class="cell figures-box">
                <h3 class="section-title"><a href="#">COMMITTEE FIGURES</a></h3><a href="#" class="readmore">More</a>
              </div>
            </div>

          </div>
        </div>-->
      </div>
    </section>