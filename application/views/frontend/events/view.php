           
              
<section class="section inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2><?php echo stripslashes($content->title); ?></h2>
        </div>
        <div class="row">
    <?php
	if($content->detail_image!='')
	{
	$imagenews=base_url('public/uploads/contents/'.$content->detail_image);	
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
if($content->detail_image!='')
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
              <div class="cell"><strong>Date:</strong><span class="icon icon-calendar"></span><?php echo $date; ?> - <?php echo $dateend; ?>, <?php echo $year; ?></div>
            </h4>
            <h4>
              <div class="cell"><strong>Venue:</strong><?php echo stripslashes($content->keywords); ?></div>
            </h4>
            <?php
			if($content->maplocation!="")
			{
            ?>
            <h4>
              <div class="cell"><strong>Get Driving Location:</strong><a href="<?php echo $content->maplocation; ?>" target="_black"><span class="icon icon-location"></span></a></div>
            </h4>
            <?php } ?>
		<?php if($content->desc!='') { echo $content->desc; } ?>     
            
          </div><span class="clearfix"></span>
        </div>
		<?php if($content->organisers!='') { echo $content->organisers; } ?>            
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
    
    <?php
	if(count($images)>0)
	{
	?>
    <section class="section lightGrey">
      <div class="container">
        <div class="text-center">
          <div class="section-title line">
            <h2>Endorsed by</h2>
          </div>
        </div>
        <div id="committee-slider" class="owl-carousel committee-slider">
        <?php
		foreach($images as $image)
		{
		if($image['image']!='')
		{
		$imagenews=base_url('public/uploads/gallery/'.$image['image']);	
		}
		else
		{
		$imagenews=base_url('public/frontend/images/noimage.jpg');		
		}
		?>
          <div class="item">
            <figure><a href="<?php if($image['url']!="") { echo $image['url']; } else { echo "javascript:void(0)"; } ?>" target="_blank"><img src="<?php echo $imagenews; ?>" alt="" class="img-responsive"/></a></figure>
            <figcaption>
              <h4><a href="<?php if($image['url']!="") { echo $image['url']; } else { echo "javascript:void(0)"; } ?>" target="_blank"><?php echo $image['title']; ?></a></h4>
        
            </figcaption>
          </div>
          <?php
		}
		  ?>
          
        </div>
      </div>
    </section>
    <?php
	}
	?>