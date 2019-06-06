<div class="careers">

 <?php echo $this->session->flashdata('message'); ?>

<?php if($this->desc!=''){ ?><h4><?php echo $this->desc; ?></h4><?php } ?>

 <ul>

 	<?php      

             $count=count($jobs); $i=0;

              foreach($jobs as $job): 

			  $i++;

			  $addclass="";

			  if($i%2==0){

				  $addclass = 'class="careers_list"';

				  }

			  ?>

				<li <?php echo $addclass?>>

					<h3><?php echo $job['title']; ?></h3>

					<span class="location"><?php echo convert_lang('Location',$this->alphalocalization); ?> : <?php echo $job['location']; ?> </span>

                    

                    <span class="date"><?php echo convert_lang('Date',$this->alphalocalization); ?> : <?php echo date('d/m/Y',strtotime($job['job_date'])); ?></span>

                    <span class="ref"><?php echo convert_lang('Ref',$this->alphalocalization); ?> . <?php echo $job['refno']; ?> </span>

					<p><?php echo $job['short_desc']; ?></p>
<a href="<?php echo site_url('careers/apply/'.$job["slug"])?>" class="btn apply submit">Apply</a>
		 <?php /*?><a href="<?php echo site_url('careers/apply/'.$job["slug"])?>"><img src="<?php echo base_url('public/frontend/images/more_details.png'); ?>" onMouseOver="this.src='<?php echo base_url('public/frontend/images/more_details_hvr.png'); ?>'"

		 onMouseOut="this.src='<?php echo base_url('public/frontend/images/more_details.png'); ?>'">More Details..</a><?php */?>

				</li>

		<?php endforeach; ?>

 

</ul>

<div class="entry">

	<div class="pagination">

			<?php echo $this->pagination->create_links(); ?>

	</div>

   </div> 

</div>