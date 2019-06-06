<div class="form">
<?php echo form_open_multipart('login/myhome2/',array("id"=>"myhomeform","class"=>"ajaxform")); ?>
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
         
<div class="row">
<!--<div class="input-holder">

<label><?php echo convert_lang('Suffix',$this->alphalocalization); ?> <?php $err=''; if(form_error('title')){ $err=' err'; echo form_error('title'); } ?></label> 
<input class="required" name="title" type="text" id="title" value="<?php echo $details->title; ?>" />
</div>-->
<div class="input-holder">

<label><?php echo convert_lang('Full Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('fname')){ $err=' err'; echo form_error('fname'); } ?></label> 
<input class="required" name="fname" type="text" id="fname" value="<?php echo $details->fname; ?>" />
</div>
<!--<div class="input-holder">

<label><?php echo convert_lang('Middle Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('mname')){ $err=' err'; echo form_error('mname'); } ?></label> 
<input class="required" name="mname" type="text" id="mname" value="<?php echo $details->mname; ?>" />
</div>-->
<!--<div class="input-holder">

<label><?php echo convert_lang('Last Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('lname')){ $err=' err'; echo form_error('lname'); } ?></label> 
<input class="required" name="lname" type="text" id="lname" value="<?php echo $details->lname; ?>" />
</div>-->

<!--<div class="input-holder">

<label><?php echo convert_lang('University or Institution',$this->alphalocalization); ?> <?php $err=''; if(form_error('university')){ $err=' err'; echo form_error('hospital'); } ?></label> 
<input class="required" name="hospital" type="text" id="hospital" value="<?php echo $details->university; ?>" />
</div>-->
<!--<div class="input-holder">

<label><?php echo convert_lang('Department',$this->alphalocalization); ?> <?php $err=''; if(form_error('department')){ $err=' err'; echo form_error('department'); } ?></label> 
<input class="required" name="department" type="text" id="department" value="<?php echo $details->department; ?>" />
</div>-->
<div class="input-holder">

<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 
<input class="required email" name="email" type="text" id="email" value="<?php echo $details->email; ?>"  />
</div>
<!--<fieldset>
<legend>Address:</legend>
<div class="input-holder">

<label><?php echo convert_lang('Address',$this->alphalocalization); ?> <?php $err=''; if(form_error('address')){ $err=' err'; echo form_error('address'); } ?></label> 
<textarea name="address" id="address"><?php echo $details->address; ?></textarea>
</div>
<div class="input-holder">

<label><?php echo convert_lang('State',$this->alphalocalization); ?> <?php $err=''; if(form_error('state')){ $err=' err'; echo form_error('state'); } ?></label> 
<input class="required" name="state" type="text" id="state" value="<?php echo $details->state; ?>" />

</div>
<div class="input-holder">

<label><?php echo convert_lang('City',$this->alphalocalization); ?> <?php $err=''; if(form_error('city')){ $err=' err'; echo form_error('city'); } ?></label> 
<input class="required" name="city" type="text" id="city" value="<?php echo $details->city; ?>" />

</div>
<div class="input-holder">

<label><?php echo convert_lang('Zip',$this->alphalocalization); ?> <?php $err=''; if(form_error('zip')){ $err=' err'; echo form_error('zip'); } ?></label> 
<input class="required" name="zip" type="text" id="zip" value="<?php echo $details->zip; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Country',$this->alphalocalization); ?><?php $err=''; if(form_error('country')){ $err=' err'; echo form_error('country'); } ?> </label> 
    <select class="required" id="country" name="country">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['name'] ?>" <?php echo ($country['name'] == @$details->country)?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>
</div>
</fieldset>-->
<div class="input-holder">

<label><?php echo convert_lang('Mobile Number',$this->alphalocalization); ?><?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?> </label> 
<input class="number required" name="mobile" type="text" id="mobile" value="<?php echo @$details->phone2; ?>" />
</div>
<!--<div class="input-holder">

<label><?php echo convert_lang('Phone Number',$this->alphalocalization); ?><?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?> </label> 
<input class="number" name="phone" type="text" id="phone" value="<?php echo @$details->phone; ?>" />
</div>-->
<!--<fieldset>
<legend>Mailing Address (Only If Different Than Above):</legend>
<div class="input-holder">
<label><?php echo convert_lang('Mailing Address (Only If Different Than Above)',$this->alphalocalization); ?><?php $err=''; if(form_error('address2')){ $err=' err'; echo form_error('address2'); } ?></label> 
<textarea name="address2" id="address2"><?php echo @$details->address2; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('City',$this->alphalocalization); ?><?php $err=''; if(form_error('city2')){ $err=' err'; echo form_error('city2'); } ?></label>
<input name="city2" type="text" id="city2" value="<?php echo @$details->city2; ?>"  />
</div>
<div class="input-holder">
<label><?php echo convert_lang('State/Province',$this->alphalocalization); ?><?php $err=''; if(form_error('state2')){ $err=' err'; echo form_error('state2'); } ?></label>
<input name="state2" type="text" id="state2" value="<?php echo @$details->state2; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Postal / Zip Code',$this->alphalocalization); ?><?php $err=''; if(form_error('zip2')){ $err=' err'; echo form_error('zip2'); } ?></label> 
<input class="number" name="zip2" type="text" id="zip2" value="<?php echo @$details->zip2; ?>"  />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Country',$this->alphalocalization); ?><?php $err=''; if(form_error('country2')){ $err=' err'; echo form_error('country2'); } ?> </label> 
    <select id="country2" name="country2">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['name'] ?>" <?php echo ($country['name'] == @$details->country2)?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>
</div>

</fieldset>-->

<!--<div class="input-holder">
<label><?php echo convert_lang('Highest/Primary Degree',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<input class="required" name="degree" type="text" id="degree" value="<?php echo @$details->degree; ?>" />
</div>-->
<!--<div class="input-holder">
<label><?php echo convert_lang('Profession',$this->alphalocalization); ?> <?php $err=''; if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?></label> 
<input class="required" name="profession" type="text" id="profession" value="<?php echo @$details->profession; ?>" />
</div>-->
<!--<div class="input-holder">
<label><?php echo convert_lang('Curriculum Vitae',$this->alphalocalization); ?> <?php $err=''; if(form_error('middlename')){ $err=' err'; echo form_error('middlename'); } ?><?php if(@$details->resume!="") { ?> - <?php echo @$details->resume; } ?></label> 
<input name="resume" type="file" id="resume" />
</div>-->
<!--<div class="input-holder">
<label><?php echo convert_lang('Professional Organizations of which you are a member ',$this->alphalocalization); ?> <?php $err=''; if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?></label> 
<textarea name="organizations" id="organizations"><?php echo @$details->organizations; ?></textarea>
</div>-->
<!--<div class="input-holder">
<label><?php echo convert_lang('Membership Type',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<p>
<input type="radio" name="membership_type" value="Regular Membership" <?php if(@$details->membership_type=="Regular Membership") { ?> checked="checked"<?php } ?> />Regular Membership
<input type="radio" name="membership_type" value="Associate (Student) Membership" <?php if(@$details->membership_type=="Associate (Student) Membership") { ?> checked="checked"<?php } ?> />Associate (Student) Membership
</p>
</div>-->

<!--<li class="mandatory">

<label><?php echo convert_lang('Password',$this->alphalocalization); ?><?php $err=''; if(form_error('password')){ $err=' err'; echo form_error('password'); } ?> </label> 
<div class="input-holder">
<input class="required" name="password" type="password" id="password" value="<?php echo set_value('password'); ?>" />
</div>
</li>-->	
<!--<li class="mandatory">

<label><?php echo convert_lang('Confirm Password',$this->alphalocalization); ?><?php $err=''; if(form_error('confirmdpassword')){ $err=' err'; echo form_error('confirmpassword'); } ?> </label> 
<div class="input-holder">
<input class="required" name="confirmpassword" type="password" id="confirmpassword" equalto="#password" value="<?php echo set_value('confirmpassword'); ?>" />
</div>
</li>-->					
			
<!--<li class="captcha-holder mandatory">
 <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
<div class="input-holder">
 
<?php echo $cap['image']; ?>

<input name="captcha" type="text" class="required" id="captcha" >

</div></li>-->
<div class="input-holder full">
                        
<button class="btn yellow btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div></div>					

<?php echo form_close(); ?>
</div>

<script type="text/javascript">

$(function() { 

  $("#myhomeform").submit(function(e){

    e.preventDefault();
	
        $.ajax({
            url: "<?php echo site_url('login/myhome2/');?>",
            type: "POST",
            data:  new FormData(this),
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
			$('#formcontainer3').html(msg);
            //$("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });

  });

}); 

</script>

    
