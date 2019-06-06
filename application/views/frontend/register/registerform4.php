<?php echo form_open('login/register4/',array("id"=>"registerform4","class"=>"ajaxform")); ?>

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>

<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Highest/Primary Degree',$this->alphalocalization); ?> <?php $err=''; if(form_error('suffix')){ $err=' err'; echo form_error('suffix'); } ?></label> 
<input class="required" name="degree" type="text" id="degree" value="<?php echo @$data->degree; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Profession',$this->alphalocalization); ?> <?php $err=''; if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?></label> 
<input class="required" name="profession" type="text" id="profession" value="<?php echo @$data->profession; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Curriculum Vitae',$this->alphalocalization); ?> <?php $err=''; if(form_error('middlename')){ $err=' err'; echo form_error('middlename'); } ?></label> 
<input name="resume" type="file" id="resume" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Professional Organizations of which you are a member ',$this->alphalocalization); ?> <?php $err=''; if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?></label> 
<textarea name="organizations" id="organizations"><?php echo @$data->organizations; ?></textarea>
</div>

<!--<div class="input-holder">			
<label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<div class="captcha-holder">		
<?php echo $cap['image']; ?>
        <input placeholder="Security Code" name="captcha" type="text" class="required" id="captcha" >

</div>
</div>-->
<div class="btn-holder full">    
<a onclick="getregform3()" class="btn red">Back</a>                    
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub4">Next</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>					
<?php echo form_close(); ?>


<script type="text/javascript">

$(function() { 

  $("#registerform4").submit(function(e){

    e.preventDefault();
	
        $.ajax({
            url: "<?php echo site_url('login/register4/');?>",
            type: "POST",
            data:  new FormData(this),
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
			getregform5();
            //$("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });

  });

}); 

</script>
