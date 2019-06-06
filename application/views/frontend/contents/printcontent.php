<section class="content-main print-wrap"> 
  <div class="container">
   <div class="row">
    <div class="col-md-8">
		<h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo stripslashes($content->title); ?></h2>
		  <!--<ol class="breadcrumb">
          
			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>
            
			</ol>--> 
	</div>
	<div class="col-md-4">
	  <div class="pull-right right-side-icon"><!--<a href="#" class="share-icon"></a><a class="fancybox fancybox.iframe mail-icon" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'>Mail</a>--><a href="#" onclick="window.print();" class="print-icon"></a></div>
	</div>
	</div>
   <div class="row">
    <div class="col-md-8 col-sm-8 inner-content">                
<?php if($content->desc!='') { echo stripslashes($content->desc); } ?>
<?php
if($content->slug=='careers')
{
	//print_r($jobs);
	foreach($jobs as $job)
	{
	?>
    <h2><?php echo stripslashes($job['title']); ?></h2>
    <?php echo stripslashes($job['desc']); ?>
    <a class="vacancy fancybox.iframe" href="<?php echo site_url('careers/apply/'.$job['slug'])?>">Apply</a>
    <?php
	}
}
?>
<?php
if($content->slug=='certification')
{
	$img = $this->gallery_model->get_array_cond($content->id);
	 if(!empty($img)) {
		 $i=0;
?>
				<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
								<ul>
                                <?php
								 foreach($img as $imag)
								 {
								 ?>
									<li><a href="#"><img src="<?php echo base_url('public/uploads/gallery/'. $imag['image']); ?>" data-large="<?php echo base_url('public/uploads/gallery/'. $imag['image']); ?>" alt="image01" data-description="" /></a></li>
                                 <?php
								  $i++;
								 }
								 ?>
								</ul>
							</div>
						</div>	
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div>
<?php
      }
}
?>
	</div>
	<!--<div class="col-md-4 col-sm-4">
	  
	  <div class="col-sm-12 abt-panel blue mar-bot40" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	  
	    <h3><?php echo stripslashes($vission->title) ?></h3>
	<div class="row">
		<div class="col-sm-8">
			<?php echo stripslashes($vission->desc); ?>
   
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/vision-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
		</div>
		
	  </div>
	  
	  <div class="clearfix"></div>
	  
	  <div class="col-sm12 abt-panel green" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	    <h3><?php echo stripslashes($mission->title); ?></h3>
		<div class="row">
		 <div class="col-sm-8">
		  <?php echo stripslashes($mission->desc) ?>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/mission-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
	</div>
	  </div>
	  
	</div>-->
	</div>
  </div>
  
</section>

<!--<div id="brudcrumbs-main" class="commmon-left">
       <div id="brudcrumbs" class="commmon-left">
         <ul>

			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>

			</ul>

       </div>
       <div id="print-mail" class="commmon-right">
         <ul>
         <li class="commmon-left"><a href="#">Print&nbsp; <img src="images/print.png" width="16" height="15" alt="" /></a></li>
        <li class="commmon-left"><a class="fancybox fancybox.iframe" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'>Mail&nbsp; <img src="<?php echo base_url('images/mail.png')?>" width="16" height="11" alt="" /></a></li>
         </ul>
       </div>
       
       </div>-->
<!--<h2><?php echo stripslashes($content->title); ?></h2>-->
<!--<div class="inner_content">

<?php if($content->desc!='') { echo stripslashes($content->desc); } ?>
<?php
if($content->slug=='careers')
{
	//print_r($jobs);
	foreach($jobs as $job)
	{
	?>
    <h2><?php echo stripslashes($job['title']); ?></h2>
    <?php echo stripslashes($job['desc']); ?>
    <a class="vacancy fancybox.iframe" href="<?php echo site_url('careers/apply/'.$job['slug'])?>">Apply</a>
    <?php
	}
}
?>
</div>-->