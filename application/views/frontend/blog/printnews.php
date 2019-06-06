<section class="content-main"> 
  <div class="container">
   <div class="row">
    <div class="col-md-8">
		<h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo stripslashes($content->title); ?></h2>
		   
	</div>
	<div class="col-md-4">
	  <div class="pull-right right-side-icon"><a href="#" onclick="window.print();" class="fancybox fancybox.iframe print-icon" ></a></div>
	</div>
	</div>
   <div class="row">
    <div class="col-md-8 col-sm-8 inner-content">                
<h3 class="addedon"><?php echo convert_lang('Published on ',$this->alphalocalization); ?><?php echo date("F j  Y",strtotime($content->date_time));?></h3>
	<?php if($content->desc!='') { echo stripslashes($content->desc); } ?>
       
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