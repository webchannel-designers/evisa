 <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url('public/frontend/images/favicon.ico'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/style.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/fonts/stylesheet.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jcarousel.responsive.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/responsive.css'); ?>"/>  
   
   <div class="contact-form form inside container">      
   
   <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200">Make an Enquiry</h2>
      

<?php echo form_open('contactus/enquiry2/',array("id"=>"enquiryform","class"=>"ajaxform")); ?>
<input name="key" type="hidden" id="key" value="<?php echo $_REQUEST['key']; ?>" />

            <ul class="row">
              <li class="col-sm-6">

                            <label><?php echo convert_lang('Your Name',$this->alphalocalization); ?> <?php $err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?></label>

<input class="required form-control" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
</li>
                    
              <li class="col-sm-6">

<label><?php echo convert_lang('Company Name',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('companyname'); } ?></label>

<input class="required form-control" name="companyname" type="text" id="companyname" value="<?php echo set_value('companyname'); ?>" />
</li>
               
              <li class="col-sm-6">

<label><?php echo convert_lang('Email',$this->alphalocalization); ?><?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label>

<input class="required form-control" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
</li>
              <li class="col-sm-6">

<label><?php echo convert_lang('Telephone',$this->alphalocalization); ?><?php $err=''; if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?></label>

<input class="required form-control" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>" />
</li>               
               
                 
              <li class="col-sm-6">

<label><?php echo convert_lang('Subject',$this->alphalocalization); ?><?php $err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?></label>

<input class="required form-control" name="subject" type="text" id="subject" value="<?php echo set_value('subject'); ?>" />

</li>                 
				 
              <li class="col-sm-6">

<label><?php echo convert_lang('Message',$this->alphalocalization); ?><?php $err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?></label>

<textarea name="message" cols="" class="form-control" rows="4"><?php echo set_value('message'); ?></textarea>
</li>				 
                
               
              <li class="col-sm-3">
                        
                          
<label><?php echo convert_lang('Security code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>

<input name="captcha" type="text" class="form-control"></li>
              <li class="col-sm-3">
<?php echo $cap['image']; ?>
</li>			   <li class="col-sm-6">

<input name="butSub" type="submit" class="submit btn" value="Submit" id="butSub">
</li>

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
    <script src="<?php echo base_url('public/frontend/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.selectBoxIt.js'); ?>"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
    
    $("select").selectBoxIt();
    
      });
      
    </script>  


<script type="text/javascript">

$(function() { 

  $("#enquiryform").submit(function(e){

    e.preventDefault();

  });

}); 

</script>