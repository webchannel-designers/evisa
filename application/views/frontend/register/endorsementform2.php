<?php echo form_open('endorsement/endorsement3/',array("id"=>"registerendform3","class"=>"ajaxform")); ?>

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
<h2>Applicant information</h2>
<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Organization Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('name')){ $err=' err'; echo form_error('name'); } ?></label> 
<input class="required" name="name" type="text" id="name" value="<?php echo @$data->name; ?>" />
</div>

<div class="input-holder">
<label><?php echo convert_lang('Brief about the organization',$this->alphalocalization); ?> <?php $err=''; if(form_error('brief')){ $err=' err'; echo form_error('brief'); } ?></label> 
<!--<input class="required" name="description" placeholder="Brief Description of Event" type="text" id="description" value="<?php echo set_value('description'); ?>" />
-->
<textarea class="" name="brief" id="brief"><?php echo @$data->brief; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Primary Contact Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('contact_name')){ $err=' err'; echo form_error('contact_name'); } ?></label> 
<input class="required" name="contact_name" type="text" id="contact_name" value="<?php echo @$data->contact_name; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Primary Contact Title',$this->alphalocalization); ?> <?php $err=''; if(form_error('contact_title')){ $err=' err'; echo form_error('contact_title'); } ?></label> 
<input class="required" name="contact_title" type="text" id="contact_title" value="<?php echo @$data->contact_title; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Preferred Mailing Address',$this->alphalocalization); ?> <?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 
<input class="required emil" name="email" type="text" id="email" value="<?php echo @$data->email; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('City',$this->alphalocalization); ?> <?php $err=''; if(form_error('city')){ $err=' err'; echo form_error('city'); } ?></label> 
<input class="required" name="city" type="text" id="city" value="<?php echo @$data->city; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Country',$this->alphalocalization); ?> <?php $err=''; if(form_error('country')){ $err=' err'; echo form_error('country'); } ?></label> 
<input class="required" name="country" type="text" id="country" value="<?php echo @$data->country; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Zip/Postal Code',$this->alphalocalization); ?> <?php $err=''; if(form_error('zip')){ $err=' err'; echo form_error('zip'); } ?></label> 
<input class="required" name="zip" type="text" id="zip" value="<?php echo @$data->zip; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Telephone',$this->alphalocalization); ?> <?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?></label> 
<input class="required number" name="phone" type="text" id="phone" value="<?php echo @$data->phone; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('E-Mail',$this->alphalocalization); ?> <?php $err=''; if(form_error('email2')){ $err=' err'; echo form_error('email2'); } ?></label> 
<input class="" name="email2" type="text" id="email2" value="<?php echo @$data->email2; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Website',$this->alphalocalization); ?> <?php $err=''; if(form_error('website')){ $err=' err'; echo form_error('website'); } ?></label> 
<input class="url" name="website" type="text" id="website" value="<?php echo @$data->website; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Year organization was incorporated or started',$this->alphalocalization); ?> <?php $err=''; if(form_error('year')){ $err=' err'; echo form_error('year'); } ?></label> 
<input class="required number" name="year" type="text" id="year" value="<?php echo @$data->year; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Does a Board of Directors govern your organization?',$this->alphalocalization); ?><?php $err=''; if(form_error('board')){ $err=' err'; echo form_error('board'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="board" value="Y" <?php if(@$data->board=='Y') { ?> checked="checked"<?php } ?> />Yes
<input type="radio" name="board" value="N" <?php if(@$data->board=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="input-holder">
<label><?php echo convert_lang('What countries/bodies are represented within the membership of your organization',$this->alphalocalization); ?> <?php $err=''; if(form_error('membership')){ $err=' err'; echo form_error('membership'); } ?></label> 
<input class="required" name="membership" type="text" id="membership" value="<?php echo @$data->membership; ?>" />
</div>


<div class="input-holder">
<label><?php echo convert_lang('Does the organization have not-for-profit status (or the legal equivalent) under applicable law?',$this->alphalocalization); ?><?php $err=''; if(form_error('profit')){ $err=' err'; echo form_error('profit'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="profit" value="Y" <?php if(@$data->profit=='Y') { ?> checked="checked"<?php } ?>/>Yes
<input type="radio" name="profit" value="N" <?php if(@$data->profit=='N') { ?> checked="checked"<?php } ?>/>No
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
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub">Next</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>

</div>					
<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#registerendform3").submit(function(e){

    e.preventDefault();

  });

}); 

</script>
