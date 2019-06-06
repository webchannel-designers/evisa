<?php $activearr=array('Y'=>'Active','N'=>'Inactive');
	  $termsarr=array('1'=>'Yes','0'=>'No'); 	
?>
<div class="full_w view">
	<div class="h_title">View Individual Account</div>
	<?php echo form_open('admin/enquires'); ?>    
        <div class="element">
			<label for="refno">Leverage </label>
			<p><?php echo $individual->leverage; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Other Leverage </label>
			<p><?php echo $individual->other_leverage; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Web Account Type </label>
			<p><?php echo $individual->account_type; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Currency </label>
			<p><?php echo $individual->currency; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Title </label>
			<p><?php echo $individual->title; ?></p>	
		</div>
        <div class="element">
			<label for="refno">First Name </label>
			<p><?php echo $individual->first_name; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Last Name </label>
			<p><?php echo $individual->last_name; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Date Of Birth </label>
			<p><?php echo $individual->dob; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Address </label>
			<p><?php echo $individual->address; ?></p>	
		</div>
        <div class="element">
			<label for="refno">City </label>
			<p><?php echo $individual->city; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Country </label>
			<p><?php echo $individual->country; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Zip Code </label>
			<p><?php echo $individual->zipcode; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Time At Current Address </label>
			<p><?php echo $individual->timeatcurrent; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Previous city </label>
			<p><?php echo $individual->prev_city; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Previous Country </label>
			<p><?php echo $individual->prev_country; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Previous ZipCode </label>
			<p><?php echo $individual->prev_zipcode; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Phone </label>
			<p><?php echo $individual->phone; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Fax </label>
			<p><?php echo $individual->fax; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Mobile </label>
			<p><?php echo $individual->mobile; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Email </label>
			<p><?php echo $individual->email; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Employment </label>
			<p><?php echo $individual->employment; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Business Name </label>
			<p><?php echo $individual->business_name; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Employer Business </label>
			<p><?php echo $individual->employer_business; ?></p>	
		</div>
        <div class="element">
			<label for="refno">FSA Registered </label>
			<p><?php echo $individual->fsa_register; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Employer Name </label>
			<p><?php echo $individual->employer_name; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Position Held </label>
			<p><?php echo $individual->position_held; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Self Business </label>
			<p><?php echo $individual->own_business; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Annual Revenue </label>
			<p><?php echo $individual->annualrevenue; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Savings </label>
			<p><?php echo $individual->savings; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Funds Avaialable </label>
			<p><?php echo $individual->availablefund; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Fund Source </label>
			<p><?php echo $individual->fundsource; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Other Fund Source </label>
			<p><?php echo $individual->otherfundsource; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Security Question </label>
			<p><?php echo $individual->security_question; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Security Answer </label>
			<p><?php echo $individual->security_answer; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Client Category </label>
			<p><?php echo $individual->client_category; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Risk Understanding </label>
			<p><?php echo $individual->riskunderstanding; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Demo Account </label>
			<p><?php echo $individual->demo_account; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment Forex </label>
			<p><?php echo $individual->investment_forex; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment CFD </label>
			<p><?php echo $individual->investment_cfd; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment Equities </label>
			<p><?php echo $individual->investment_equities; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment Equity Indices </label>
			<p><?php echo $individual->investment_equityindices; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment Financial Options </label>
			<p><?php echo $individual->investment_financialoptions; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Investment Spreadbetting </label>
			<p><?php echo $individual->investment_spreadbetting; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction Forex </label>
			<p><?php echo $individual->tran_forex; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction CFD</label>
			<p><?php echo $individual->tran_cfd; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction Equities </label>
			<p><?php echo $individual->tran_equities; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction EquityIndices</label>
			<p><?php echo $individual->tran_equityindices; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction Financial Options </label>
			<p><?php echo $individual->tran_financialoptions; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Transaction Spreadbetting</label>
			<p><?php echo $individual->tran_spreadbetting; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Introduces </label>
			<p><?php echo $individual->introducer?></p>	
		</div>
        <div class="element">
			<label for="refno">Disclosure Terms </label>
			<p><?php echo $termsarr[$individual->disclosureterms]; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Age Terms </label>
			<p><?php echo $termsarr[$individual->ageterms]; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Client Terms </label>
			<p><?php echo $termsarr[$individual->clientterms]; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Risk Terms </label>
			<p><?php echo $termsarr[$individual->riskterms]; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Signature </label>
			<p><?php echo $individual->signature; ?></p>	
		</div>
        <div class="element">
			<label for="refno">Date </label>
			<p><?php echo date('d-m-y H:i:s',strtotime($individual->date)); ?></p>	
		</div>
        <div class="element">
			<label for="refno">Status </label>
			<p><?php echo $activearr[$individual->status]?></p>	
		</div>
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/individual/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>