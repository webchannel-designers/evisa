<?php $activearr=array('Y'=>'Active','N'=>'Inactive');?>
<div class="full_w view">
	<div class="h_title">View Demo Account</div>
	<?php echo form_open('admin/enquires'); ?>
		<div class="element">
			<label for="refno">First Name</label>
			<p><?php echo $demo->firstname; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Last Name</label>
			<p><?php echo $demo->lastname; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Email</label>
			<p><?php echo $demo->email; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Phone</label>
			<p><?php echo $demo->phone; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Mobile</label>
			<p><?php echo $demo->mobile; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Country</label>
			<p><?php echo $demo->country; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Account date</label>
			<p><?php echo date('d-m-Y H:i:s',strtotime($demo->account_createdon)); ?></p>		
		</div>
        <div class="element">
			<label for="refno">Status</label>
			<p><?php echo $activearr[$demo->status]; ?></p>	
		</div>
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/demo/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>