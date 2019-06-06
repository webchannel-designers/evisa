<?php $activearr=array('Y'=>'Active','N'=>'Inactive');
	  $termsarr=array('1'=>'Yes','0'=>'No');  	
?>
<div class="full_w view">
	<div class="h_title">View Corporate Account</div>
	<?php echo form_open('admin/enquires'); ?>		  
      <div class="element">
                <label for="refno">Company Name</label>
                <p><?php echo $corporate->company ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Address</label>
                <p><?php echo $corporate->address ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">City</label>
                <p><?php echo $corporate->city ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Country</label>
                <p><?php echo $corporate->country ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Zip Code</label>
                <p><?php echo $corporate->zipcode ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Business Address</label>
                <p><?php echo $corporate->business_address ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Business City</label>
                <p><?php echo $corporate->business_city ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Business Country</label>
                <p><?php echo $corporate->business_country ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Business Zip code</label>
                <p><?php echo $corporate->business_zipcode ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Registration Number</label>
                <p><?php echo $corporate->register_number ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Business Type</label>
                <p><?php echo $corporate->business_type ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">FSA Resgistered</label>
                <p><?php echo $corporate->fsa_register ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">FSA Details</label>
                <p><?php echo $corporate->fsa_details ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Listed in Stock</label>
                <p><?php echo $corporate->listedinstock ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Parent Company</label>
                <p><?php echo $corporate->parent_company ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Director 1</label>
                <p><?php echo $corporate->director1 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Director 2</label>
                <p><?php echo $corporate->director2 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Director 3</label>
                <p><?php echo $corporate->director3 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Director 4</label>
                <p><?php echo $corporate->director4 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Shareholder 1</label>
                <p><?php echo $corporate->shareholder1 ;?></p>		
            </div>
        <div class="element">
                <label for="refno">Shareholder Value </label>
                <p><?php echo $corporate->shareholdervalue1 ;?></p>		
          </div>
            
      <div class="element">
                <label for="refno">Shareholder 2</label>
                <p><?php echo $corporate->shareholder2 ;?></p>		
            </div>
       <div class="element">
                <label for="refno">Shareholder Value</label>
                <p><?php echo $corporate->shareholdervalue2 ;?></p>		
            </div>     
            
      <div class="element">
                <label for="refno">Shareholder 3</label>
                <p><?php echo $corporate->shareholder3 ;?></p>		
            </div>
        <div class="element">
                <label for="refno">Shareholder Value</label>
                <p><?php echo $corporate->shareholdervalue3 ;?></p>		
            </div>     
            
      <div class="element">
                <label for="refno">Shareholder 4</label>
                <p><?php echo $corporate->shareholder4 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Shareholder Value</label>
                <p><?php echo $corporate->shareholdervalue4 ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Contact Title</label>
                <p><?php echo $corporate->contact_title ;?></p>		
            </div>
            <div class="element">
                <label for="refno">Contact Name</label>
                <p><?php echo $corporate->contact_name ;?></p>		
            </div>
            
            
      <div class="element">
                <label for="refno">Contact Phone</label>
                <p><?php echo $corporate->contact_phone ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Contact Fax</label>
                <p><?php echo $corporate->contact_fax ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Contact Mobile</label>
                <p><?php echo $corporate->contact_mobile ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Contact Email</label>
                <p><?php echo $corporate->contact_email ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Currency</label>
                <p><?php echo $corporate->currency ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Account Type</label>
                <p><?php echo $corporate->account_type ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Leverage</label>
                <p><?php echo $corporate->leverage ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno"></label>
                <p><?php echo $corporate->other_leverage ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Other Leverage</label>
                <p><?php echo $corporate->annualrevenue ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Savings</label>
                <p><?php echo $corporate->savings ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Fund available</label>
                <p><?php echo $corporate->availablefund ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Audit date</label>
                <p><?php echo $corporate->auditdate ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Security Question</label>
                <p><?php echo $corporate->security_question ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Security Answer</label>
                <p><?php echo $corporate->security_answer ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Client Category</label>
                <p><?php echo $corporate->client_category ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Risk Understanding</label>
                <p><?php echo $corporate->riskunderstanding ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Demo Account</label>
                <p><?php echo $corporate->demo_account ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment Forex</label>
                <p><?php echo $corporate->investment_forex ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment CDF</label>
                <p><?php echo $corporate->investment_cfd ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment Equities</label>
                <p><?php echo $corporate->investment_equities ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment Equity Indices</label>
                <p><?php echo $corporate->investment_equityindices ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment Financial Options</label>
                <p><?php echo $corporate->investment_financialoptions ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Investment Spreadbetting</label>
                <p><?php echo $corporate->investment_spreadbetting ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction Forex</label>
                <p><?php echo $corporate->tran_forex ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction CFD</label>
                <p><?php echo $corporate->tran_cfd ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction Equities</label>
                <p><?php echo $corporate->tran_equities ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction Equity Indices</label>
                <p><?php echo $corporate->tran_equityindices ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction Financial Options</label>
                <p><?php echo $corporate->tran_financialoptions ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Transaction  Spreadbetting</label>
                <p><?php echo $corporate->tran_spreadbetting ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Introducer</label>
                <p><?php echo $corporate->introducer ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Disclosure terms</label>
                <p><?php echo $termsarr[$corporate->disclosureterms] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Notice Terms1</label>
                <p><?php echo $termsarr[$corporate->noticeterms1] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Notice Terms2</label>
                <p><?php echo $termsarr[$corporate->noticeterms2] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Notice Terms3</label>
                <p><?php echo $termsarr[$corporate->noticeterms3] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Notice Terms4</label>
                <p><?php echo $termsarr[$corporate->noticeterms4] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Client Terms</label>
                <p><?php echo $termsarr[$corporate->clientterms] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Risk Terms</label>
                <p><?php echo $termsarr[$corporate->riskterms] ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Signature</label>
                <p><?php echo $corporate->signature ;?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Date</label>
                <p><?php echo date('d-m-Y H:i:s ',strtotime($corporate->date));?></p>		
            </div>
            
      <div class="element">
                <label for="refno">Status</label>
                <p><?php echo $activearr[$corporate->status] ;?></p>		
            </div>
        
  
        <div class="entry">
			<a class="button cancel" href="<?php echo site_url('admin/enquires/corporate/'.$return); ?>">Back</a>
		</div>
	<?php echo form_close(); ?>
</div>