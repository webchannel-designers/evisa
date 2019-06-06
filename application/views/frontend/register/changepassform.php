<div class="form">

<?php echo form_open('login/changepass2/',array("id"=>"changepassform","class"=>"ajaxform")); ?>
                          <?php //print_r($details); ?>
         
<div class="row">
<!--<li class="mandatory">

<label><?php echo convert_lang('Full Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?></label> 
<div class="input-holder">
<input class="required" name="fullname" type="text" id="fullname" value="<?php echo $details->fname; ?>" />
</div>
</li>-->
<!--<li class="mandatory">

<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 
<div class="input-holder">
<input class="required email" name="email" type="text" id="email" value="<?php echo $details->email; ?>"  />
</div>
</li>-->
<!--<li class="mandatory">

<label><?php echo convert_lang('Mobile',$this->alphalocalization); ?><?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?> </label> 
<div class="input-holder">
<input class="required number" name="mobile" type="text" id="mobile" value="<?php echo $details->phone; ?>" />
</div>
</li>-->

<div class="input-holder ">

<label><?php echo convert_lang('Current Password',$this->alphalocalization); ?><?php $err=''; if(form_error('currentpassword')){ $err=' err'; echo form_error('currentpassword'); } ?> </label> 
<input class="required" name="currentpassword" type="password" id="currentpassword" value="<?php echo set_value('currentpassword'); ?>" />
</div>

<div class="input-holder ">

<label><?php echo convert_lang('New Password',$this->alphalocalization); ?><?php $err=''; if(form_error('password')){ $err=' err'; echo form_error('password'); } ?> </label> 
<input class="required" name="password" type="password" id="password" value="<?php echo set_value('password'); ?>" />
</div>	
<div class="input-holder ">

<label><?php echo convert_lang('Confirm Password',$this->alphalocalization); ?><?php $err=''; if(form_error('confirmdpassword')){ $err=' err'; echo form_error('confirmpassword'); } ?> </label> 
<input class="required" name="confirmpassword" type="password" id="confirmpassword" equalto="#password" value="<?php echo set_value('confirmpassword'); ?>" />
</div>					
			
<!--<li class="captcha-holder mandatory">
 <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
<div class="input-holder">
 
								 <?php echo $cap['image']; ?>

                            <input name="captcha" type="text" class="required" id="captcha" >

</div></li>-->
<div class="input-holder full">
                        
		<button class="btn yellow btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
	<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>
</div>					

<?php echo form_close(); ?>
</div>

<script type="text/javascript">

$(function() { 

  $("#changepassform").submit(function(e){

    e.preventDefault();

  });

}); 

</script>

    
