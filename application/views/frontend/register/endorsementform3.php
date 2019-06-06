<?php echo form_open('endorsement/endorsement4/',array("id"=>"registerendform4","class"=>"ajaxform")); ?>
<?php
$fe=explode(",",@$data->fees);
$pa=explode(",",@$data->pay);
?>
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
<input type="hidden" name="temp" value="0" />
<h2>Application fees & payment</h2>
<div class="input-holder full">
<label><?php echo convert_lang('ALL FEES ARE NON-REFUNDABLE',$this->alphalocalization); ?> <?php $err=''; if(form_error('name')){ $err=' err'; echo form_error('name'); } ?></label> 
<p>
<input type="checkbox" name="fees[]" value="TEMPORARY PERMIT DHS" <?php if(in_array('TEMPORARY PERMIT DHS',$fe)) { ?> checked="checked"<?php } ?> />TEMPORARY PERMIT DHS
</p>
<p>
<input type="checkbox" name="fees[]" value="ANNUAL PERMIT DHS" <?php if(in_array('ANNUAL PERMIT DHS',$fe)) { ?> checked="checked"<?php } ?>/>ANNUAL PERMIT DHS
</p>
</div>
<h2>Application fees & payment</h2>
<p>Incomplete applications, including transcripts and failed examination files will be deleted and discarded when there has been no action in the file (i.e. correspondence from applicant, retake of exam, etc.)</p>
<h2>Renewal of endorsement</h2>
<p>There is an annual registration fee to apply to renew your registration. If you are granted endorsement of registration for acupuncture, payment of this annual fee includes both your application for registration renewal and the associated endorsement.</p>
<div class="input-holder">
<label><?php echo convert_lang('Payment method',$this->alphalocalization); ?> <?php $err=''; if(form_error('brief')){ $err=' err'; echo form_error('brief'); } ?></label> 
<!--<input class="required" name="description" placeholder="Brief Description of Event" type="text" id="description" value="<?php echo set_value('description'); ?>" />
-->
<p>
<input type="checkbox" name="pay[]" value="Bank Transfer/Money Order" <?php if(in_array('Bank Transfer/Money Order',$pa)) { ?> checked="checked"<?php } ?>/>Bank Transfer/Money Order
</p>
<p>
<input type="checkbox" name="pay[]" value="Bank check" <?php if(in_array('Bank check',$pa)) { ?> checked="checked"<?php } ?>/>Bank check
</p>
<p>
<input type="checkbox" name="pay[]" value="Credit card" <?php if(in_array('Credit card',$pa)) { ?> checked="checked"<?php } ?>/>Credit card 
</p>
</div>

<div class="cell-wrapper">			
<!-- <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
 
<div class="input-holder cell"> 
<?php echo $cap['image']; ?>
</div>
<div class="input-holder cell">
<input placeholder="Security Code" name="captcha" type="text" class="required" id="captcha" >

</div>
--><div class="input-holder cell">        
<a onclick="getendform2('<?php echo $_SESSION['uid']; ?>');" class="btn red">Back</a>                  
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub3">Next</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>

<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#registerendform4").submit(function(e){

    e.preventDefault();

  });

}); 

</script>
