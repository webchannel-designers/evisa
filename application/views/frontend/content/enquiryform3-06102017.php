<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap-grid.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap-reboot.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
<?php echo form_open('home/enquiry3/',array("id"=>"enquiryform4","class"=>"ajaxform")); ?>
<input name="key" type="hidden" id="key" value="<?php echo @$_REQUEST['key']; ?>" />
<input name="method" type="hidden"   value="<?php echo $method; ?>" /> 
<input name="slug" type="hidden"   value="<?php echo $slug; ?>" /> 
<div class="col-lg-12">
<div class="form style-3">
<h2 class="mb-4">Service Enquiry</h2>
<div class="row align-items-start m-0">

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
    
    <div class="input-holder">
      <!--<label><?php echo convert_lang('Model Number',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?>
      </label>-->
      <input class="form-control <?php $err=''; if(form_error('model')){ $err=' err'; echo 'error'; } ?>" placeholder="Model Number" name="model" type="text" id="model" value="<?php echo set_value('model'); ?>" />
      
    </div>
    
    <div class="input-holder">
      <!--<label><?php echo convert_lang('Model Number',$this->alphalocalization); ?>
        <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?>
      </label>-->
      <input class="form-control <?php $err=''; if(form_error('serial')){ $err=' err'; echo 'error'; } ?>" placeholder="Serial Number" name="serial" type="text" id="serial" value="<?php echo set_value('serial'); ?>" />
      
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
    <div class="input-holder col-lg-6 col-md-6">
    <?php  if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?>
     <?php echo $this->recaptcha->render(); ?><?php //echo $cap['image']; ?>
    </div>
     <div class="btn-holder"> 
       <button class="btn blue" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>

    </div>
    </div>
    </div>
  </div>
<?php echo form_close(); ?> 
    <script src="<?php echo base_url('public/frontend/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.selectBoxIt.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("select").selectBoxIt();
});
$(function() { 

  $("#enquiryform3").submit(function(e){

    e.preventDefault();

  });

}); 
$('#datetimepicker').datetimepicker({
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d'
});

</script>