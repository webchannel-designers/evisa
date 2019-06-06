<?php
				  function getYoutubeIdFromUrl($url) {
					$parts = parse_url($url);
					if(isset($parts['query'])){
						parse_str($parts['query'], $qs);
						if(isset($qs['v'])){
							return $qs['v'];
						}else if($qs['vi']){
							return $qs['vi'];
						}
					}
					if(isset($parts['path'])){
						$path = explode('/', trim($parts['path'], '/'));
						return $path[count($path)-1];
					}
					return false;
				}

?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h1><?php echo stripslashes($content->title); ?></h1>
      </div>
      <div class="col-md-2 col-sm-3">
        <ul class="tools">
          <!--<li class="print-icon"><a href="">print</a></li>-->
          <li class="mail-icon"><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe">mail</a></li>
          <li class="share-icon"><a class="a2a_dd" href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt">share</i></a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <aside  class="left-nav">
        <ul>
          <li> <a href="#product-details"><i><img src="<?php echo base_url('public/frontend/images/overview.png') ?>" alt="overview" ></i>overview</a> </li>
          <?php
if($content->specification!="")
{
?>
          <li> <a href="#specification"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-2.png') ?>" alt="specification" ></i>specification</a> </li>
          <?php
}
			?>
          <li> <a href="#features"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-3.png') ?>" alt="features  &  benefits" ></i>features  &  benefits</a> </li>
          <li class="green-bg"> <a href="#enq-btns" ><i><img src="<?php echo base_url('public/frontend/images/Downloadbrochue.png') ?>" alt="Download brochure" ></i>Downloads</a> </li>
          <li class="green-bg"> <a href="#enq-btns"><i><img src="<?php echo base_url('public/frontend/images/GetIntouch.png') ?>" alt="Get In touch" ></i>Get In touch</a> </li>
          <li class="green-bg"> <a href="#enq-btns"><i><img src="<?php echo base_url('public/frontend/images/addtoenquirybasket.png') ?>" alt="add to enquiry basket" ></i>add to enquiry basket</a> </li>
          <?php if(count($related)>0) { ?>
          <li class="yellow-bg"> <a href="#suggested"><i><img src="<?php echo base_url('public/frontend/images/SuggestedProducts.png') ?>" alt="suggested" ></i>OTHER RECOMENDED PRODUCTS</a> </li>
          <?php
			}
			?>
        </ul>
      </aside>
      <div class="col-md-9 pull-right">
        <div class="overview-wrap" id="overview" >
          <h2 class="page-sub-header">Overview</h2>
          <div class="pr-desc"> <?php echo stripslashes($content->desc); ?> </div>
          <?php
							
							if(count(@$images)>0)
							{
							?>
          <div class="pr-images">
            <ul class="bxslider">
              <?php
								foreach($images as $image)
								{
								//$url = base_url('public/uploads/gallery/'.$image['image']);
								$url=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/gallery/'.$image['image'])."&w=800&h=477&zc=1";	

								?>
              <li><img src="<?php echo $url; ?>" /></li>
              <?php
								}
								?>
            </ul>
            <div id="bx-pager" class="bx-pager">
              <?php
								$i=0;
								foreach($images as $image)
								{
								//$url = base_url('public/uploads/gallery/'.$image['image']);
								$url=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/gallery/'.$image['image'])."&w=60&h=43&zc=1";	
								?>
              <a data-slide-index="<?php echo $i; ?>" href=""><img src="<?php echo $url; ?>" /></a>
              <?php
								$i++;
								}
								?>
            </div>
          </div>
          <?php
							}
							if(count(@$videos)>0)
							{
						?>
          <div class="pr-videos">
            <ul class="bxvideoslider">
              <?php
    foreach($videos as $gallery)
    {
         $vname = getYoutubeIdFromUrl($gallery['video']);
    ?>
              <li>
                <?php
			echo('<object style="z-index:0;" width="600px" height="374px"><param style="z-index:0;" name="movie" value="http://www.youtube.com/v/'.$vname.'&hl=en_US&fs=1&autoplay=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="transparent"></param><embed style="z-index:0;" src="http://www.youtube.com/v/'.$vname.'&hl=en_US&fs=1&autoplay=0" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="transparent" allowfullscreen="true" width="600px" height="374px"></embed></object>');           
	?>
              </li>
              <?php
    }
    ?>
            </ul>
          </div>
          <?php
							}
						?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
if($content->specification!="")
{
?>
<section class="specification-wrapper" id="specification">
  <div class="container">
    <div class="row">
      <div class="col-md-9 pull-right">
        <div class="product-specification" >
          <h2 class="page-sub-header" style="background:none;">Specification</h2>
          <div class="pr-desc"> <?php echo stripslashes(str_replace('border="1"','border="0" class="spec-table"',$content->specification)); ?> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
		?>
<section class="features-wrapper" id="features" >
  <div class="container">
    <div class="row">
      <div class="col-md-9 pull-right">
        <?php
if($content->feat!="")
{
?>
        <div class="product-features" >
          <h2 class="page-sub-header" >Features & Benefits</h2>
          <?php echo stripslashes($content->feat); ?> </div>
        <?php
}
				?>
        <div class="col-md-9 product-features product-features-btns" id="enq-btns"  >
          <div class="features-buttons"> <a href="<?php echo site_url('contactus/enquiry2')?>?key=<?php echo $content->title; ?>&lightbox[iframe]=true&lightbox[width]=1000&lightbox[height]=500" class="enq-btn enquiry">Make an enquiry</a>
          <p> <b>OR ADD TO</b></p> <a class="basket-btn" onclick="cartform('<?php echo $content->id; ?>')" style="color:#191919; text-decoration:underline;"> ENQUIRY BASKET</a>
            <?php
			
									if(count($downloads)>0)
									{
									?>
            <a href="<?php echo site_url('products/popup/'.$content->id); ?>" class="dl-btn enquiry fancybox.iframe">Downloads</a>
            <?php
                                    }
                                    ?>
            <a href="<?php echo site_url('products/printproduct/'.$content->slug)?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="printcontent fancybox.iframe print-btn">Print this page</a> </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<?php if(count($related)>0) { ?>
<section class="interest-wrapper" id="suggested">
  <div class="container">
    <div class="row">
      <div class="col-md-9 pull-right">
        <div class="interest-holder">
          <h2 class="sub-header">products might also interest</h2>
          <ul class="bxscroller">
            <?php
 	foreach($related as $relay)
	{
					$this->load->model('frontend/gallery_model');
                    $loc=$this->location_model->load($relay['location_id']);
                    $img = $this->gallery_model->get_array_cond($relay['id']);
                     @$pimage=$img->image;
                    if($pimage!="")
                    {
                    $url = base_url('public/uploads/gallery/'.$pimage);
                    }
                    else
                    {
                    $url = base_url('public/frontend/images/noimage.jpg');
                    }
	?>
            <li>
              <div class="product-box">
                <div class="pr-image"><a href="<?php echo site_url('products/view/'.$relay['slug']); ?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url."&w=282&h=224&zc=1"; ?>" alt="product1" /></a></div>
                <h3><?php echo $relay['title']; ?></h3>
                <h6><?php echo $relay['short_desc']; ?></h6>
              </div>
            </li>
            <?php
	}
	  ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
				}
				?>
