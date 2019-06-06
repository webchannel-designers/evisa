<?php $activearr=array('Y'=>'Shortlisted','N'=>'Waiting'); ?>
<?php $jobtitle2=$this->jobs_model->load($job->jobs_id);$jobs=$this->jobs_model->get_active(); ?>
<div class="full_w view careers">

	<div class="h_title">View Application</div>

	<?php echo form_open('admin/careers/jobpostupdate/'.$job->id.'/'.$this->uri->segment(5)); ?>
    
    <?php
	if($job->jobs_id!=0)
	{
	?>
		<div class="element">

			<label for="refno">Job Post(Applied)</label>

			<!--<p><?php echo $jobtitle2->title; ?></p>-->	
            
            <?php
			foreach($jobs as $item)
			{
			?>
             <?php if($item['jobs_id']==$job->jobs_id) { echo $item['title']; } ?>
            <?php
			}
			?>
           	

		</div>
        <?php
        }
        else
        {
			?>
		<div class="element">

			<label for="refno">Job Title</label>

			<p>Candidate pool Application</p>		

		</div>
            <?php
        }
		?>

		<div class="element">

			<label for="refno">Name</label>

			<p><?php echo $job->title.' '.$job->firstname.' '.$job->lastname; ?></p>		

		</div>

		<div class="element">

			<label for="refno">Email</label>

			<p><?php echo $job->email; ?></p>		

		</div>

		<div class="element">

			<label for="refno">Phone No.</label>

			<p><?php echo $job->phone; ?></p>	

		</div>		
        
        <?php if(@$job->nationality!="") { ?>

		<div class="element">

			<label for="refno">Nationality</label>

			<p><?php echo $job->nationality; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->language!="") { ?>
        
        <div class="element">

			<label for="refno">Language</label>

			<p><?php echo $job->language; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->language2!="") { ?>
        
        <div class="element">

			<label for="refno">Language Fluent</label>

			<p><?php echo $job->language2; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->language3!="") { ?>
        
        <div class="element">

			<label for="refno">Language Conversation</label>

			<p><?php echo $job->language3; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->visa!="") { ?>
        
        <div class="element">

			<label for="refno">Visa Status</label>

			<p><?php echo $job->visa; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->level!="") { ?>
        
        <div class="element">

			<label for="refno">Education Level</label>

			<p><?php echo $job->level; ?>	</p>

		</div>
        
        <?php
		}
		?>
        
        <?php if(@$job->studyfield!="") { ?>
        
        <div class="element">

			<label for="refno">Study Field</label>

			<p><?php echo $job->studyfield; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->employer!="") { ?>
        
        <div class="element">

			<label for="refno">Current Employer</label>

			<p><?php echo $job->employer; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->experience!="") { ?>
        
        <div class="element">

			<label for="refno">Experience</label>

			<p><?php echo $job->experience; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->department!="") { ?>
        
        <div class="element">

			<label for="refno">Department</label>

			<p><?php echo $job->department; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->hereabout!="") { ?>
        
        <div class="element">

			<label for="refno">How did you here about us?</label>

			<p><?php echo $job->hereabout; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->uaelicense!="") { ?>
        
        <div class="element">

			<label for="refno">UAE Driving License</label>

			<p><?php echo $job->uaelicense; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->expiry!="") { ?>
        
        <div class="element">

			<label for="refno">UAE Driving License Expires on</label>

			<p><?php echo $job->expiry; ?>	</p>

		</div>
        
        <?php } ?>
        
        <?php if(@$job->noticeperiod!="") { ?>
        
        <div class="element">

			<label for="refno">Notice Period</label>

			<p><?php echo $job->noticeperiod; ?>	</p>

		</div>
        
        <?php } ?>

		<div class="element">

			<label for="refno">Shortlist Status</label>

			<p><?php echo $activearr[$job->status]; ?></p>

		</div>	
        
        <!--<div class="element rating">

			<label for="refno">Rating</label>

			<input type="radio" name="r1" value="1" <?php if($job->rating==1) { ?> checked="checked"<?php } ?> />1
           <input type="radio" name="r1" value="2" <?php if($job->rating==2) { ?> checked="checked"<?php } ?>  />2
           <input type="radio" name="r1" value="3" <?php if($job->rating==3) { ?> checked="checked"<?php } ?>  />3
            <input type="radio" name="r1" value="4" <?php if($job->rating==4) { ?> checked="checked"<?php } ?>  />4
            <input type="radio" name="r1" value="5" <?php if($job->rating==5) { ?> checked="checked"<?php } ?>  />5

		</div>-->	

		<div class="entry">
		<!--<input type="submit" name="butSub" value="Rate" class="button" />-->
        <input style="display: none;" type="submit" name="butSub2" value="Update Job Post" class="button" />
        <?php
		if($job->resume!="")
		{
		?>
		<a class="button" href="<?php echo site_url('admin/careers/downloadresume/'.$job->id); ?>">View Resume</a>
        <?php
		}
		?>
        <a class="button cancel" href="<?php echo site_url('admin/careers/applications/'.$this->uri->segment(5).'/'.$return); ?>">Back</a>

		</div>

	<?php echo form_close(); ?>

</div>
<style>
#main .full_w p { margin: 0px; }
#content #main { line-height: 28px}

</style>