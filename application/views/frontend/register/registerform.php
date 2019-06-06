<?php echo form_open('login/register2/',array("id"=>"registerform","class"=>"ajaxform")); ?>

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>

<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Full Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<input class="required" name="fullname" type="text" id="fullname" value="<?php echo @$data->title; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Mobile Number',$this->alphalocalization); ?><?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?> </label> 
<input class="number required" name="mobile" type="text" id="mobile" value="<?php echo @$data->phone2; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 
<input class="required email" name="email" type="text" id="email" value="<?php echo @$data->email; ?>"  />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Confirm Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label>
<input class="required email" name="email2" type="text" id="email2" equalto="#email" value="<?php echo @$data->email; ?>"  />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Password',$this->alphalocalization); ?><?php $err=''; if(form_error('password')){ $err=' err'; echo form_error('password'); } ?> </label> 
<input class="required" name="password" type="password" id="password" value="<?php echo @$data->passwordcopy; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Confirm Password',$this->alphalocalization); ?><?php $err=''; if(form_error('confirmpassword')){ $err=' err'; echo form_error('confirmpassword'); } ?> </label> 
<input class="required" name="confirmpassword" type="password" id="confirmpassword" equalto="#password" value="<?php echo @$data->passwordcopy; ?>" />
</div>
<!--<div class="input-holder">			
<label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
 
<div class="captcha-holder">		
<?php echo $cap['image']; ?>
<input name="captcha" type="text" class="required" id="captcha" >

</div>
</div>-->
<div class="input-holder text-right">                        
					<button class="btn yellow btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
						<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>					
<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#registerform").submit(function(e){

    e.preventDefault();

  });

}); 

</script>
