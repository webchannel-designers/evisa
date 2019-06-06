<?php $activearr=array('Y'=>'Shortlisted','N'=>'Waiting'); ?>
<div class="full_w view">
	<div class="h_title">View Application</div>
	<?php echo form_open('admin/careers/applications'); ?>
		<div class="element">
			<label for="refno">Job Title</label>
			<p><?php echo $job->title; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Name</label>
			<p><?php echo $job->firstname.' '.$job->lastname; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Email</label>
			<p><?php echo $job->email; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Phone No.</label>
			<p><?php echo $job->phone; ?></p>	
		</div>		
		<div class="element">
			<label for="refno">Cover Letter</label>
			<p><?php echo $job->coverletter; ?>	</p>
		</div>
		<div class="element">
			<label for="refno">Shortlist Status</label>
			<p><?php echo $activearr[$job->status]; ?></p>
		</div>		
		<div class="entry">
		<a class="button" href="<?php echo site_url('admin/careers/downloadresume/'.$job->id); ?>">View Resume</a><a class="button cancel" href="<?php echo site_url('admin/careers/applications/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>