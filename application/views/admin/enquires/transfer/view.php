<div class="full_w view">
	<div class="h_title">View Funds transfer</div>
	<?php echo form_open('admin/enquires'); ?>
		<div class="element">
			<label for="refno">First Name</label>
			<p><?php echo $transfer->first_name; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Last Name</label>
			<p><?php echo $transfer->last_name; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Email</label>
			<p><?php echo $transfer->email; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Security Question</label>
			<p><?php echo $transfer->security_question; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Security Answer</label>
			<p><?php echo $transfer->security_answer; ?></p>		
		</div>
        <div class="element">
			<label for="refno">From Account</label>
			<p><?php echo $transfer->from_account; ?></p>		
		</div>
        <div class="element">
			<label for="refno">To Account</label>
			<p><?php echo $transfer->to_account; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Transfer Amount</label>
			<p><?php echo $transfer->transfer_amount; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Reason</label>
			<p><?php echo $transfer->reason; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Signature</label>
			<p><?php echo $transfer->signature; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Date</label>
			<p><?php echo $transfer->date; ?></p>		
		</div>
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/transfer/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>