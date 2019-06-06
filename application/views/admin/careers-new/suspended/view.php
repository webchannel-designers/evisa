<?php $activearr=array('Y'=>'Shortlisted','N'=>'Waiting'); ?>

<div class="full_w view">

	<div class="h_title">View Application</div>

	<?php echo form_open('admin/careers/rateapplication/'.$job->id.'/'.$this->uri->segment(5)); ?>

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

			<label for="refno">Nationality</label>

			<p><?php echo $job->nationality; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Language</label>

			<p><?php echo $job->language; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Language Fluent</label>

			<p><?php echo $job->language2; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Language Conversation</label>

			<p><?php echo $job->language3; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Language</label>

			<p><?php echo $job->language; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Visa Status</label>

			<p><?php echo $job->visa; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Education Level</label>

			<p><?php echo $job->level; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Study Field</label>

			<p><?php echo $job->studyfield; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Current Employer</label>

			<p><?php echo $job->employer; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Experience</label>

			<p><?php echo $job->experience; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Department</label>

			<p><?php echo $job->department; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">How did you here about us?</label>

			<p><?php echo $job->hereabout; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">UAE Driving License</label>

			<p><?php echo $job->uaelicense; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">UAE Driving License Expires on</label>

			<p><?php echo $job->expiry; ?>	</p>

		</div>
        
        <div class="element">

			<label for="refno">Notice Period</label>

			<p><?php echo $job->noticeperiod; ?>	</p>

		</div>

		<div class="element">

			<label for="refno">Shortlist Status</label>

			<p><?php echo $activearr[$job->status]; ?></p>

		</div>	
        
        <div class="element">

			<label for="refno">Rating</label>

			<p><input type="radio" name="r1" value="1" <?php if($job->rating==1) { ?> checked="checked"<?php } ?> />1</p>
            <p><input type="radio" name="r1" value="2" <?php if($job->rating==2) { ?> checked="checked"<?php } ?>  />2</p>
            <p><input type="radio" name="r1" value="3" <?php if($job->rating==3) { ?> checked="checked"<?php } ?>  />3</p>
            <p><input type="radio" name="r1" value="4" <?php if($job->rating==4) { ?> checked="checked"<?php } ?>  />4</p>
            <p><input type="radio" name="r1" value="5" <?php if($job->rating==5) { ?> checked="checked"<?php } ?>  />5</p>

		</div>	

		<div class="entry">
		<input type="submit" name="butSub" value="Rate" class="button" />
		<a class="button" href="<?php echo site_url('admin/careers/downloadresume/'.$job->id); ?>">View Resume</a><a class="button cancel" href="<?php echo site_url('admin/careers/applications/'.$this->uri->segment(5).'/'.$return); ?>">Back</a>

		</div>

	<?php echo form_close(); ?>

</div>