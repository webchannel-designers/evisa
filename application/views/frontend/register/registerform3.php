<?php echo form_open('login/register3/',array("id"=>"registerform3","class"=>"ajaxform")); ?>

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>

<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Suffix',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<input class="required" name="suffix" type="text" id="suffix" value="<?php echo @$data->title; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('First Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?></label> 
<input class="required" name="firstname" type="text" id="firstname" value="<?php echo @$data->fname; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Middle Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('middlename')){ $err=' err'; echo form_error('middlename'); } ?></label> 
<input name="middlename" type="text" id="middlename" value="<?php echo @$data->mname; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Last name',$this->alphalocalization); ?> <?php $err=''; if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?></label> 
<input class="required" name="lastname" type="text" id="lastname" value="<?php echo @$data->lname; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('University or Institution',$this->alphalocalization); ?> <?php $err=''; if(form_error('university')){ $err=' err'; echo form_error('university'); } ?></label> 
<input class="required" name="university" type="text" id="university" value="<?php echo @$data->university; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Department or Division ',$this->alphalocalization); ?> <?php $err=''; if(form_error('department')){ $err=' err'; echo form_error('department'); } ?></label> 
<input class="required" name="department" type="text" id="department" value="<?php echo @$data->department; ?>" />
</div>
<fieldset>
<legend>Address:</legend>
<div class="input-holder">
<label><?php echo convert_lang('Address',$this->alphalocalization); ?><?php $err=''; if(form_error('address')){ $err=' err'; echo form_error('address'); } ?></label> 
<textarea name="address" id="address" class="required"><?php echo @$data->address; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('City',$this->alphalocalization); ?><?php $err=''; if(form_error('city')){ $err=' err'; echo form_error('city'); } ?></label>
<input class="required" name="city" type="text" id="city" value="<?php echo @$data->city; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('State/Province',$this->alphalocalization); ?><?php $err=''; if(form_error('state')){ $err=' err'; echo form_error('state'); } ?></label>
<input class="" name="state" type="text" id="state" value="<?php echo @$data->state; ?>"  />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Postal / Zip Code',$this->alphalocalization); ?><?php $err=''; if(form_error('zip')){ $err=' err'; echo form_error('zip'); } ?></label> 
<input class="required number" name="zip" type="text" id="zip" value="<?php echo @$data->zip; ?>"  />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Country',$this->alphalocalization); ?><?php $err=''; if(form_error('country')){ $err=' err'; echo form_error('country'); } ?> </label> 
    <select class="required" id="country" name="country">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['name'] ?>" <?php echo ($country['name'] == @$data->country)?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>
</div>
</fieldset>
<hr />
<div class="input-holder">

<label><?php echo convert_lang('Mobile Number',$this->alphalocalization); ?><?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?> </label> 
<input class="number required" name="mobile" type="text" id="mobile" value="<?php echo @$data->phone2; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Phone Number',$this->alphalocalization); ?><?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?> </label> 
<input class="number" name="phone" type="text" id="phone" value="<?php echo @$data->phone; ?>" />
</div>

<fieldset>
<legend>Mailing Address (Only If Different Than Above:</legend>

<div class="input-holder">
<label><?php echo convert_lang('Mailing Address (Only If Different Than Above)',$this->alphalocalization); ?><?php $err=''; if(form_error('address2')){ $err=' err'; echo form_error('address2'); } ?></label> 
<textarea name="address2" id="address2"><?php echo @$data->address2; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('City',$this->alphalocalization); ?><?php $err=''; if(form_error('city2')){ $err=' err'; echo form_error('city2'); } ?></label>
<input name="city2" type="text" id="city2" value="<?php echo @$data->city2; ?>"  />
</div>
<div class="input-holder">
<label><?php echo convert_lang('State/Province',$this->alphalocalization); ?><?php $err=''; if(form_error('state2')){ $err=' err'; echo form_error('state2'); } ?></label>
<input name="state2" type="text" id="state2" value="<?php echo @$data->state2; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Postal / Zip Code',$this->alphalocalization); ?><?php $err=''; if(form_error('zip2')){ $err=' err'; echo form_error('zip2'); } ?></label> 
<input class="number" name="zip2" type="text" id="zip2" value="<?php echo @$data->zip2; ?>"  />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Country',$this->alphalocalization); ?><?php $err=''; if(form_error('country2')){ $err=' err'; echo form_error('country2'); } ?> </label> 
    <select id="country2" name="country2">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['name'] ?>" <?php echo ($country['name'] == @$data->country2)?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>
</div>
</fieldset>
<hr />

<!--<div class="input-holder">			
<label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<div class="captcha-holder">		
<?php echo $cap['image']; ?>
        <input placeholder="Security Code" name="captcha" type="text" class="required" id="captcha" >

</div>
</div>-->
<div class="btn-holder full">    
<a onclick="getform2();" class="btn red">Back</a>                    
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub3">Next</button>
						<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>					
<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#registerform3").submit(function(e){

    e.preventDefault();

  });

}); 

</script>
