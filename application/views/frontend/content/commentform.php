<div class="form">

<h2>Leave a comment</h2>
<?php echo form_open('contactus/comment/',array("id"=>"commentform","class"=>"ajaxform")); ?>
<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Your Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?></label>
<input class="required" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label>
<input class="required email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
</div>

<div class="input-holder">
<label><?php echo convert_lang('Message',$this->alphalocalization); ?><?php $err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?></label>

<textarea name="message" cols="" class="required" rows="4"><?php echo set_value('message'); ?></textarea>
</div>
<div class="input-holder">
<?php echo $cap['image']; ?>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Security code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<input name="captcha" type="text" class="">
		</div>
        <div class="input-holder">
<!--<input name="butSub" type="submit" class="submit btn" value="Submit" id="butSub">-->
<button class="btn yellow btn-submit" value="Submit" id="butSub" name="butSub" type="submit">Write</button>
</div>
</div>
<!--<ul class="form-main">

<li><label><?php echo convert_lang('Your Name',$this->alphalocalization); ?> <img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?></label>

<input class="required" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />

</li>

<li><label><?php echo convert_lang('Company Name',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('companyname'); } ?></label>

<input class="required" name="companyname" type="text" id="companyname" value="<?php echo set_value('companyname'); ?>" />

</li>

<li><label><?php echo convert_lang('Email',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label>

<input class="required" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />

</li>

<li style="float:right;">

<label><?php echo convert_lang('Telephone',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?></label>

<input class="required" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>" />

</li>

<li><label><?php echo convert_lang('Subject',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?></label>

<input class="required" name="subject" type="text" id="subject" value="<?php echo set_value('subject'); ?>" />

</li>

<li id="area"><label><?php echo convert_lang('Message',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?></label>

<textarea name="message" cols="" rows=""><?php echo set_value('message'); ?></textarea>

</li>

<li class="last" style="width:344px;" >

<label><?php echo convert_lang('Security code',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/asterisk-icon.png') ?>" alt="" /><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<?php echo $cap['image']; ?>

<input name="captcha" type="text">

<input name="butSub" type="submit" class="submit" value="" id="butSub">

</li>

</ul>-->	   

<?php echo form_close(); ?>
</div>
<script type="text/javascript">

$(function() { 

  $("#commentform").submit(function(e){

    e.preventDefault();

  });

}); 

</script>