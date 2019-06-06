<h2 class="popuphead">Call Back Request</h2>
<?php if($message=='') { ?>
<?php echo form_open_multipart('home/callback'); ?>
<div class="account_leverage emailurl_form">
    <ul>
		<li>
		 <label><?php echo convert_lang('Your Name',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/mandatory.png'); ?>"><?php if(form_error('yourname')){ $err=' err'; echo form_error('yourname'); } ?></label> 
		 <input class="required" name="yourname" type="text" id="yourname" value="<?php echo set_value('yourname'); ?>">
		</li>
		<li>
		 <label><?php echo convert_lang('Email',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/mandatory.png'); ?>"><?php if(form_error('youremail')){ $err=' err'; echo form_error('youremail'); } ?></label> 
		 <input class="required" name="youremail" type="text" id="youremail" value="<?php echo set_value('youremail'); ?>">
		</li> 
		<li>
		<label><?php echo convert_lang('Phone',$this->alphalocalization); ?><img src="<?php echo base_url('public/frontend/images/mandatory.png'); ?>"><?php if(form_error('yourphone')){ $err=' err'; echo form_error('yourphone'); } ?></label> 
		 <input class="required" name="yourphone" type="text" value="<?php echo set_value('yourphone'); ?>" id="yourphone">
		</li>
		
 	</ul>
</div>
<input type="submit" name="demo-btn" class="input-btn" value="Submit" id="callback-btn">
<?php echo form_close(); ?>
<?php echo form_close(); ?>
<?php } else { ?>
<h3 class="popupmessagecallback"><?php echo $message; ?></h3>
<?php } ?>