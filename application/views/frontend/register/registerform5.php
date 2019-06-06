<?php echo form_open('login/register5/',array("id"=>"registerform5","class"=>"ajaxform")); ?>

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>

<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Membership Type',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<p>
<input type="radio" name="membership_type" value="Regular Membership" <?php if(@$data->membership_type=="Regular Membership") { ?> checked="checked"<?php } ?> />Regular Membership
<input type="radio" name="membership_type" value="Associate (Student) Membership" <?php if(@$data->membership_type=="Associate (Student) Membership") { ?> checked="checked"<?php } ?> />Associate (Student) Membership
</p>
</div>

<!--<div class="input-holder">			
<label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<div class="captcha-holder">		
<?php echo $cap['image']; ?>
        <input placeholder="Security Code" name="captcha" type="text" class="required" id="captcha" >

</div>
</div>-->
<div class="btn-holder full">   
<a onclick="getregform4('<?php echo $_SESSION['rid']; ?>')" class="btn red">Back</a> 
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub5">Submit</button>
						<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>					
<?php echo form_close(); ?>

<script type="text/javascript">

$(function() { 

  $("#registerform5").submit(function(e){

    e.preventDefault();

  });

}); 

</script>
