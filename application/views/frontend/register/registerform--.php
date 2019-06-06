<?php echo form_open('contactus/enquiry/',array("id"=>"contactform","class"=>"ajaxform")); ?>
         
<ul>
<li class="mandatory">

<label><?php echo convert_lang('Full Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?></label> 
<div class="input-holder">

<input class="required" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
</div>
</li>
<li class="mandatory">

<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 
<div class="input-holder">
<input class="required email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />
</div>
</li>
<li class="mandatory">

<label><?php echo convert_lang('Mobile',$this->alphalocalization); ?><?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?> </label> 
<div class="input-holder">
<input class="required number" name="mobile" type="text" id="mobile" value="<?php echo set_value('mobile'); ?>" />
</div>
</li>
<li class="mandatory">

<label><?php echo convert_lang('Subject',$this->alphalocalization); ?><?php $err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?> </label> 
<div class="input-holder">
<input class="required" name="subject" type="text" id="subject" value="<?php echo set_value('subject'); ?>" />
</div>
				</li>		
					
			<li class="mandatory">		
					
			<label><?php echo convert_lang('Message',$this->alphalocalization); ?><?php $err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?></label>
            <div class="input-holder">
<textarea name="message" cols="" rows="6" class="required" ><?php echo set_value('message'); ?></textarea>
</div>
</li>
<li class="captcha-holder mandatory">
 <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
            <div class="input-holder">
 
								 <?php echo $cap['image']; ?>


                            <input name="captcha" type="text" class="required" id="captcha" >

</div></li>
<li>						
                        
					<button class="btn btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
						<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
	</li></ul>					

<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#contactform").submit(function(e){

    e.preventDefault();

  });

}); 

</script>