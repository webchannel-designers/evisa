<div class="full_w view">
	<div class="h_title">View Leverage Change</div>
	<?php echo form_open('admin/enquires'); ?>
		<div class="element">
			<label for="refno">First Name</label>
			<p><?php echo $leverage->first_name; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Last Name</label>
			<p><?php echo $leverage->last_name; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Account Number</label>
			<p><?php echo $leverage->account_number; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Leverage</label>
			<p><?php echo $leverage->leverage; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Other Leverage</label>
			<p><?php echo $leverage->other_leverage; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Signature</label>
			<p><?php echo $leverage->signature; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Date</label>
			<p><?php echo $leverage->date; ?></p>		
		</div>
        
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/leverage/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>