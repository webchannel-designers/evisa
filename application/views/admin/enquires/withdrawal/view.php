<div class="full_w view">
	<div class="h_title">View Funds Withdrawal</div>
	<?php echo form_open('admin/enquires'); ?>
		<div class="element">
			<label for="refno">First Name</label>
			<p><?php echo $withdrawal->first_name; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Last Name</label>
			<p><?php echo $withdrawal->last_name; ?></p>		
		</div>
		<div class="element">
			<label for="refno">Account Address</label>
			<p><?php echo $withdrawal->account_address; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Security Question</label>
			<p><?php echo $withdrawal->security_question; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Security Answer</label>
			<p><?php echo $withdrawal->security_answer; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Bank Account</label>
			<p><?php echo $withdrawal->bank_account; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Bank Name</label>
			<p><?php echo $withdrawal->bank_name; ?></p>		
		</div>
        <div class="element">
			<label for="refno">IBN Number</label>
			<p><?php echo $withdrawal->ibn_number; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Swift Code</label>
			<p><?php echo $withdrawal->swift_code; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Sort Code</label>
			<p><?php echo $withdrawal->sort_code; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Bank Address</label>
			<p><?php echo $withdrawal->bank_address; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Withdrawal Amount</label>
			<p><?php echo $withdrawal->withdrawal_amount; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Reason</label>
			<p><?php echo $withdrawal->reason; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Signature</label>
			<p><?php echo $withdrawal->signature; ?></p>		
		</div>
        <div class="element">
			<label for="refno">Date</label>
			<p><?php echo $withdrawal->date; ?></p>		
		</div>
        <div class="element">
			<label for="refno"> I require Next Day Bank Payment and understand that am liable for, and will received funds not of any bank changes that ACM Plc incur as a result of this request</label>
			<p><?php echo ($withdrawal->terms=='1')?'Yes':'No' ?></p>		
		</div>
         <div class="element">
			<label for="refno">I wish to withdraw my full account balance</label>
			<p><?php echo ($withdrawal->accept=='1')?'Yes':'No'; ?></p>		
		</div>
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/withdrawal/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>