<?php echo form_open_multipart('endorsement/endorsement5/',array("id"=>"registerendform5","class"=>"ajaxform")); ?>
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
<input type="hidden" name="temp" value="0" />
<h2>Please note that all materials containing ECS content, including ECS logo and materials must be pre-approved in writing by ECS prior to release</h2>
<h2>Required Signatures</h2>
<p>
By signing this application for an ECS Endorsement, the applicant organization agrees that if this application is accepted in writing by ECS, the ECS endorsement shall be subject to the ECS Trademark License Agreement Standard Terms and Conditions attached hereto
</p>
<p>
Before you send in this application,
</p>
<p>
please be sure to attach the following documentation
</p>
<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('A letter of support from an ECS member ',$this->alphalocalization); ?> <?php $err=''; if(form_error('name')){ $err=' err'; echo form_error('name'); } ?></label> 
<input type="file" name="letter_member" />
</div>
<div class="input-holder">
<label><?php echo convert_lang("A copy of Society's non-profit certification, where applicable",$this->alphalocalization); ?> <?php $err=''; if(form_error('brief')){ $err=' err'; echo form_error('brief'); } ?></label> 
<!--<input class="required" name="description" placeholder="Brief Description of Event" type="text" id="description" value="<?php echo set_value('description'); ?>" />
-->
<input type="file" name="society" />
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
<a onclick="getendform3('<?php echo $_SESSION['uid']; ?>');" class="btn red">Back</a>                  
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub4">Submit</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>

</div>					
<?php echo form_close(); ?>

<script type="text/javascript">

$(function() { 

  $("#registerendform5").submit(function(e){

    e.preventDefault();
	
        $.ajax({
            url: "<?php echo site_url('endorsement/endorsement5/');?>",
            type: "POST",
            data:  new FormData(this),
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
			$('#formendcontainer').html(data);
            //$("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });

  });

}); 

</script>
