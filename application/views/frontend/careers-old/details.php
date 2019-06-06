<section class="content-main"> 
  <div class="container">

<div class="row">
		<h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200">Careers</h2>
    <div class="col-md-8">
		  <ol class="breadcrumb">
			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>
            
            <li><a>Careers</a></li>
            
			</ol> 
	</div>
	<div class="col-md-4">
	  <div class="pull-right right-side-icon"><a href="#" class="st_sharethis"></a><a class="fancybox fancybox.iframe mail-icon" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'></a><!--<a href="<?php echo site_url('contents/printcontent/'.$content->slug)?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="printcontent fancybox.iframe print-icon"></a>--></div>
	</div>
	</div>
   <div class="row">
    <div class=" col-md-12 col-sm-12 inner-content">                

<div class="careers_details careers">

<h3><?php echo $jobs->title; ?> </h3>

	<span class="location"><?php echo convert_lang('Location',$this->alphalocalization); ?> : <?php echo $jobs->location; ?> </span>

	<span class="date"><?php echo convert_lang('Date',$this->alphalocalization); ?>: <?php echo date('d/m/Y',strtotime($jobs->job_date)); ?> </span>

	 <span class="ref"><?php echo convert_lang('Ref',$this->alphalocalization); ?>. <?php echo $jobs->refno; ?> </span>

<p><?php echo convert_lang('We are seeking for qualified individual for the position of',$this->alphalocalization); ?> <?php echo $jobs->title; ?>. </p>

<p><?php echo $jobs->desc; ?></p>
<!--<a class="vacancy fancybox.iframe" href="<?php echo site_url('careers/apply/'.$jobs->slug)?>">Apply</a>-->
<a href="<?php echo site_url('careers/apply/'.$jobs->slug)?>" class="btn apply submit">Apply</a>
<!-- <a href="<?php echo site_url('careers/apply/'.$jobs->slug)?>"><img src="<?php echo base_url('public/frontend/images/apply_now.png'); ?>" onMouseOver="this.src='<?php echo base_url('public/frontend/images/apply_now_hover.png'); ?>'" onMouseOut="this.src='<?php echo base_url('public/frontend/images/apply_now.png'); ?>'">Apply Now</a>
-->
</div>
</div>
</div>
</div></section>