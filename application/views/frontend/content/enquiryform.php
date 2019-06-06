<div class="title blue1">
        <h4 class='col-white text-center'>Planning your next trip?</h4> <p class='col-white text-center'>We would love to help you. Fill in the details below & we will get back to you soon.</p>
</div>
<div class="form">
<?php echo form_open('home/enquiry/',array("id"=>"enquiryform2","class"=>"ajaxform")); ?>
<input name="key" type="hidden" id="key" value="<?php echo $_REQUEST['key']; ?>" />
<input name="method" type="hidden"   value="<?php echo $method; ?>" />
<input name="slug" type="hidden"   value="<?php echo $slug; ?>" />

<div class="form-row">
  <div class="form-group col-lg-12">
      <input class="required form-control <?php $err=''; if(form_error('fullname')){ $err=' err'; echo 'error'; } ?>" placeholder="Your Name" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
    </div>
  <div class="form-group col-lg-12">
      <input class="required form-control <?php $err=''; if(form_error('email')){ $err=' err'; echo 'error'; } ?>" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
    </div>
  <!--<div class="form-group col-lg-4">
      <input class="required number form-control <?php $err=''; if(form_error('isd')){ $err=' err'; echo 'error'; } ?>" placeholder="ISD" name="isd" type="text" id="isd" value="<?php echo set_value('isd'); ?>" maxlength="2" />
    </div>-->
  <div class="form-group col-lg-12">
      <input class="required form-control <?php $err=''; if(form_error('phone')){ $err=' err'; echo 'error'; } ?>" placeholder="Mobile" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>" />
    </div>
      <div class="form-group col-lg-12">
      <textarea name="message" placeholder="Message" cols="" class="form-control <?php $err=''; if(form_error('message')){ $err=' err'; echo 'error'; } ?>" rows="2"><?php echo set_value('message'); ?></textarea>
    </div>

  <div class="btn-holder col-lg-12">
        <button class="btn blue1 btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Send</button>
        </div>
        <button class="close" id="popup-close" aria-label="Close" type="button"><span aria-hidden="true">&times;</span></button>
</div>
<?php echo form_close(); //echo current_url(); ?> 

</div>
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script> 
<script type="text/javascript">  var CaptchaCallback = function() {
    $('.g-recaptcha').each(function(index, el) {
      grecaptcha.render(el, {'sitekey' : '6Lc-Wx0UAAAAAHuC_o2Z3WaJBtJULCrFU5X1WPsY'});
    });
  };
</script> 
<script type="text/javascript">
$(document).ready(function(){
    //$("select").selectBoxIt();
$("#leave").click(function() {
	$("#leave").hide();
  	getform6();
	$("#enquirycontainer").show();
});
	
$("#popup-close").click(function() {
	$.cookie("popup", 0);
	$("#leave").show();
  	$("#enquirycontainer").hide();
});
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