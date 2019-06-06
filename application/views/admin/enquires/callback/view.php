<?php $activearr=array('Y'=>'Active','N'=>'Inactive'); ?>
<div class="full_w view">
	<div class="h_title">View Callbak</div>
	<?php echo form_open('admin/enquires'); ?>
		<div class="element">
			<label for="refno">Name</label>
			<p><?php echo $callback->name; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Email</label>
			<p><a href="mailto:<?php echo $callback->email; ?>"><?php echo $callback->email; ?></a></p>		
		</div>
		<div class="element">
			<label for="refno">Phone No.</label>
			<p><?php echo $callback->phone; ?></p>	
		</div>	
		<div class="element">
			<label for="refno">Status</label>
			<p><?php echo $activearr[$callback->status]; ?></p>
		</div>		
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/callback/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>