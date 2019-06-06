    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/style.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/fonts/stylesheet.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/frontend/css/bxslider.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jcarousel.responsive.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/responsive.css'); ?>"/>
     <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">


<?php
//print_r($related);exit;
//print_r($content);
//$cou = $content->views;
//$cou = $cou+1;
//$this->products_model->update_view_count($content->desc_id,$cou);
//$makes=$this->makes_model->load($content->make_id);
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
    
    <section class="print-wrap">
	<div class="container">
		<div class="row">
        <div class="col-md-10 col-sm-9">
          <h1><?php echo stripslashes($content->title); ?></h1>
        </div>
        
        <div class="col-md-2 col-sm-3">
          <ul class="tools">
            <li class="print-icon"><a class="printcontent" onclick="window.print();">print</a></li>
          </ul>
        </div>
        
		<div class="col-md-9 pull-right">
				<div class="overview-wrap" id="overview" >
					<h2 class="page-sub-header">Overview</h2>
					<div class="pr-desc">
						<?php echo stripslashes($content->desc); ?>
						</div>
                            <?php
			//$this->load->model('frontend/gallery_model');
							//$images = $this->gallery_model->get_array_cond2($content->id);
							
							if(count(@$images)>0)
							{
							?>
						<div class="pr-images">

							<ul class="bxslider">
                                <?php
								foreach($images as $image)
								{
								$url = base_url('public/uploads/gallery/'.$image['image']);
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
								$url = base_url('public/uploads/gallery/'.$image['image']);
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

						<!--<div class="pr-videos">					

							<ul class="bxvideoslider">
	<?php
    foreach($videos as $gallery)
    {
        //echo $gallery['video'];
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
						</div>-->
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
						<div class="pr-desc">
<?php echo stripslashes($content->specification); ?>
						</div>

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
<?php echo stripslashes($content->feat); ?>

							</div>
                <?php
}
				?>
							<!--<div class="col-md-9 product-features product-features-btns" id="enq-btns"  >
								<div class="features-buttons">
									<a href="<?php echo site_url('contactus/enquiry2')?>?key=<?php echo $content->title; ?>&lightbox[iframe]=true&lightbox[width]=1000&lightbox[height]=500" class="enq-btn enquiry">Make an enquiry</a>
                                    <?php
									if($content->pdf!="")
									{
									?>
									<a href="<?php echo site_url('products/downloads/'.$content->slug); ?>" class="dl-btn">Download Brochure</a>
                                    <?php
                                    }
                                    ?>
									<a href="#" class="print-btn">Print this page</a>
								</div>

								<p> <b>OR ADD TO <a onclick="cartform('<?php echo $content->id; ?>')" style="color:#191919; text-decoration:underline;"> ENQUIRY BASKET</a></b></p>
							</div>-->
							</div>
						</div>
					</div>

				</section>
                
    <script src="<?php echo base_url('public/frontend/js/jquery.min.js'); ?>"></script>

<script type="text/javascript">
		  $(window).scroll(function(){
		      if ($(this).scrollTop() > 300) {
		          $('.left-nav').addClass('fixed');
		      } else {
		          $('.left-nav').removeClass('fixed');
		      }
		  });
         $('.left-nav a').click(function(event){
     event.preventDefault();
        var dest = 0;
            dest = $(this.hash).offset().top;

       $('html,body').animate({scrollTop: dest}, 900, 'swing');
       return false;
    });
  $( document ).ready(function() {
    $(".left-nav li:first ").addClass("active").show(); 
        $(".left-nav li a").click(function() {
     $('.left-nav li.active').removeClass('active');
    $(this).closest('li').addClass('active');
      
    });
});


       
</script>    
<script async src="//static.addtoany.com/menu/page.js"></script>
    <script src="<?php echo base_url('public/frontend/js/jquery.validate.js'); ?>"></script>
    
    <script src="<?php echo base_url('public/frontend/js/bootstrap.min.js'); ?>"></script>
    
    <script src="<?php echo base_url('public/frontend/js/jquery.jcarousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/frontend/js/jcarousel.responsive.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.equalheights.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>	
    
	<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.selectBoxIt.js'); ?>"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
    
    $("select").selectBoxIt();
    
      });
      
    </script>  
    
  <script src="<?php echo base_url('public/frontend/js/jquery.fitvids.js'); ?>"></script>
  <script src="<?php echo base_url('public/frontend/js/jquery.bxslider.js'); ?>"></script>
  <script type="text/javascript">


$('.bxslider').bxSlider({
	  pagerCustom: '#bx-pager'
	});
	$('.bxvideoslider').bxSlider({
	  video: true,
	  useCSS: false
	});
	
	$(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
      var $window = $(window);
        var windowsize = $window.width();
        if (windowsize > 767) {
	  $('.bxscroller').bxSlider({	
	  minSlides: 1,
	  maxSlides: 3,
	  slideWidth: 350,
	  slideMargin: 25
	});
	} else {
	$('.bxscroller').bxSlider({	
	  minSlides: 1,
	  maxSlides: 3,
	  slideWidth: 300,
	  slideMargin: 10
	});
	}
	});
</script>
