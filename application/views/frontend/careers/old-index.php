  <section class="company-wrap">
    <span id="company" class="pause"></span>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="title-wrap">
                <h2>Careers</h2>
              </div>
              <ul class="share-print">
  <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
  <li ><a class="a2a_dd icon-share" href="https://www.addtoany.com/share" title="Share"></a></li>
              </ul>
            </div>
          </div>
          <div class="row">           
            <div class="col-md-12">
             <ul class="row career-list">

 	<?php      

             $count=count($jobs); $i=0;

              foreach($jobs as $job): 

			  $i++;

			  $addclass="";

			  if($i%2==0){

				  // $addclass = 'class="careers_list"';

				  }

			  ?>

				<li class="col-md-4 col-sm-3">
          <div class="carees-wrap">

					<h3><?php echo $job['title']; ?></h3>

					<span class="location"><strong><?php echo convert_lang('Location',$this->alphalocalization); ?></strong> : <?php echo $job['location']; ?> </span>
                    
                    <span class="ref"><strong><?php echo convert_lang('Ref',$this->alphalocalization); ?></strong> : <?php echo $job['refno']; ?> </span>

                    <span class="date"><strong><?php echo convert_lang('Date',$this->alphalocalization); ?></strong> : <?php echo date('d/m/Y',strtotime($job['job_date'])); ?></span>

					<p><?php echo $job['short_desc']; ?></p>
<a href="<?php echo site_url('careers/apply/'.$job["slug"])?>" class="btn more-btn aplay">Apply</a>
<a href="<?php echo site_url('careers/details/'.$job["slug"])?>" class="btn more-btn" >More Details..</a>
		
</div>
				</li>

		<?php endforeach; ?>

 

</ul>
	<div class="pagination">

			<?php echo $this->pagination->create_links(); ?>

	</div>

            </div>
            
          </div>
        </div>
      </div>
    </div>        
  </section>        