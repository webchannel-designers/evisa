<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
<?php echo form_open('home/enquiry2/',array("id"=>"enquiryform3","class"=>"ajaxform")); ?>
<input name="key" type="hidden" id="key" value="<?php echo $_REQUEST['key']; ?>" />
<input name="method" type="hidden"   value="<?php echo $method; ?>" /> 
<input name="slug" type="hidden"   value="<?php echo $slug; ?>" /> 
<div class="row align-items-start m-0">
<div class="col-lg-12 p-0">
  <div class="module-title">
<h2 class="mb-4">Make An Enquiry</h2>
</div>
</div>
  <div class="col-lg-6 p-0">
  
  <div class="input-holder">
      <!--<label><?php echo convert_lang('Your Name',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?>
      </label>-->
      <input class="required form-control <?php $err=''; if(form_error('fullname')){ $err=' err'; echo 'error'; } ?>" placeholder="Your Name" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
    </div>
    
    <div class="input-holder ">
      <!--<label><?php echo convert_lang('Company Name',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('companyname')){ $err=' err'; echo form_error('companyname'); } ?>
      </label>-->
      <input class="required form-control <?php $err=''; if(form_error('companyname')){ $err=' err'; echo 'error'; } ?>" placeholder="Company Name" name="companyname" type="text" id="companyname" value="<?php echo set_value('companyname'); ?>" />
    </div>
  <div class="input-holder ">
      <!--<label><?php echo convert_lang('Email',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?>
      </label>-->
      <input class="required form-control <?php $err=''; if(form_error('email')){ $err=' err'; echo 'error'; } ?>" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
    </div>
  <div class="input-holder ">
      <!--<label>Telephone
        <?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?>
      </label>-->
      <input class="required form-control <?php $err=''; if(form_error('phone')){ $err=' err'; echo 'error'; } ?>" placeholder="Telephone" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>" />
    </div>
    </div>
    <?php
	  // if($_REQUEST['key'] == ''){
	    //if(!in_array($slug,array('piano-tuning','buy-sell','qrs-self-playing-system','humidity-control-systems'))){
         /*?>
    <!--<li class="col-sm-12">
      <label><?php echo convert_lang('Subject',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?>
      </label>
      <input class="required form-control" name="subject" type="text" id="subject" value="<?php echo set_value('subject'); ?>" />
    </li>-->  
   <li class="col-sm-3">
      <label><?php echo convert_lang('Security code',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?>
      </label>
      <input name="captcha" type="text" class="form-control">
    </li>
    <li class="col-sm-3">
      <label>&nbsp;</label>
      <?php echo $cap['image']; ?> </li><?php */?>
      
      
      <div class="col-lg-6 p-0 align-top">
    <div class="input-holder ">
      <!--<label><?php echo convert_lang('Message',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?>
      </label>-->
      <textarea name="message" placeholder="Message" cols="" class="form-control <?php $err=''; if(form_error('message')){ $err=' err'; echo 'error'; } ?>" rows="2"><?php echo set_value('message'); ?></textarea>
    </div>
     <div class="btn-holder"> 
       <button class="btn blue" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>

    </div>
    </div>
  </div>
<?php echo form_close(); ?> 
<script type="text/javascript">
$(document).ready(function(){
    $("select").selectBoxIt();
});
$(function() { 

  $("#enquiryform2").submit(function(e){

    e.preventDefault();

  });

}); 
$('#datetimepicker').datetimepicker({
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d'
});

</script>