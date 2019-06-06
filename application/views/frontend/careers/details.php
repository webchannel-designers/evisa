 <section class="company-wrap">
    <span id="company" class="pause"></span>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap">
                <h2><?php echo stripslashes($this->pagetitle); ?></h2>
              </div>
              <ul class="share-print">
  <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
  <li><a href="<?php echo site_url('contents/printcontent/'.$jobs->slug)?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="printcontent fancybox.iframe icon-print"></a></li>
<li ><a class="a2a_dd icon-share" href="https://www.addtoany.com/share" title="Share"></a></li>
              </ul>
            </div>
          </div>
          <div class="row">           
            <div class="col-md-12">
            <div class="careers_details careers">

<h3><?php echo $jobs->title; ?> </h3>

	<span class="location"><strong><?php echo convert_lang('Location',$this->alphalocalization); ?> :</strong> <?php echo $jobs->location; ?> </span>

	<span class="date"><strong><?php echo convert_lang('Date',$this->alphalocalization); ?>:</strong> <?php echo date('d/m/Y',strtotime($jobs->job_date)); ?> </span>

	 <span class="ref"><strong><?php echo convert_lang('Ref',$this->alphalocalization); ?>:</strong> <?php echo $jobs->refno; ?> </span>

<p><?php echo convert_lang('We are seeking for qualified individual for the position of',$this->alphalocalization); ?> <?php echo $jobs->title; ?>. </p>

<p><?php echo $jobs->desc; ?></p>
<!--<a class="vacancy fancybox.iframe" href="<?php echo site_url('careers/apply/'.$jobs->slug)?>">Apply</a>-->
<a href="<?php echo site_url('careers/apply/'.$jobs->slug)?>" class="btn more-btn">Apply</a>
<!-- <a href="<?php echo site_url('careers/apply/'.$jobs->slug)?>"><img src="<?php echo base_url('public/frontend/images/apply_now.png'); ?>" onMouseOver="this.src='<?php echo base_url('public/frontend/images/apply_now_hover.png'); ?>'" onMouseOut="this.src='<?php echo base_url('public/frontend/images/apply_now.png'); ?>'">Apply Now</a>
-->
</div>
            </div>
            
          </div>
        </div>
      </div>
    </div>        
  </section>
  
  
  
  
