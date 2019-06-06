<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
<!--<h4>Send us a message</h4>-->
<?php echo form_open('contactus/enquiry/',array("id"=>"contactform","class"=>"ajaxform")); ?>
<div class="row">
  <div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('fullname')){ $err=' err'; echo form_error('fullname'); } ?>
    <label>My Name Is</label>
    <input class="required form-control <?php $err=''; if(form_error('fullname')){ ?> error <?php  } ?>" name="fullname" type="text" id="fullname" value="<?php echo set_value('fullname'); ?>" />
  </div>
  <div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?>
    <label>My Email Is</label>
    <input class="required email form-control <?php $err=''; if(form_error('email')){ ?> error <?php  } ?>" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
  </div>
  <div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?>
    <label>Call Me On</label>
    <input class="required number form-control <?php $err=''; if(form_error('mobile')){ ?> error <?php  } ?>" name="mobile" type="text" id="mobile" value="<?php echo set_value('mobile'); ?>" />
  </div>
  <div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('country')){ $err=' err'; echo form_error('country'); } ?>
    <label>I Want To Know About</label>
    <select class="required form-control <?php $err=''; if(form_error('country')){ ?> error <?php  } ?>" id="country" placeholder="Country" name="country">
      <option value=""><?php echo convert_lang('Select Service',$this->alphalocalization); ?></option>
      <option value="Flights">Flights</option>
      <option value="Hotels">Hotels</option>
      <option value="Travel Insurance">Travel Insurance</option>
      <option value="Meet & Greet">Meet & Greet</option>
      <option value="Transfers">Transfers</option>
      <option value="Sightseeing">Sightseeing</option>
      <option value="Car Hire">Car Hire</option>
      <option value="Visas">Visas</option>
      <option value="Holidays">Holidays</option>
      <option value="Cruises">Cruises</option>
    </select>
  </div>
  <?php /*?><div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?>
    <!--<label>City</label>-->
    <input class="required form-control <?php $err=''; if(form_error('city')){ ?> error <?php  } ?>" placeholder="City" name="city" type="text" id="city" value="<?php echo set_value('city'); ?>" />
  </div><?php */?>
  <?php /*?><div class="form-group col-lg-6">
    <?php //$err=''; if(form_error('subject')){ $err=' err'; echo form_error('subject'); } ?>
    <!--<label>Subject</label>-->
    <input class="required form-control <?php $err=''; if(form_error('subject')){ ?> error <?php  } ?>" placeholder="Subject" name="subject" type="text" id="subject" value="<?php echo set_value('subject'); ?>" />
  </div><?php */?>
  <div class="form-group col-lg-12">
    <?php //$err=''; if(form_error('message')){ $err=' err'; echo form_error('message'); } ?>
    <label>Here's Something More To Add</label>
    <textarea name="message" cols="" rows="6" class="required form-control <?php $err=''; if(form_error('message')){ ?> error <?php  } ?>" ><?php echo set_value('message'); ?></textarea>
  </div>
  <?php /*?><div class="form-group">
    <?php  if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?>
     <?php echo $this->recaptcha->render(); ?><?php //echo $cap['image']; ?>
    </div><?php */?><?php
	/**

 *     <div class="input-holder">
 *     <label>Security Code</label>
 *       <input name="captcha" type="text" class="required" id="captcha" >
 *     </div>
 */
?>
    <div class="btn-holder col-lg-12">
    <button class="btn blue1 btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
    </div>
</div>
<?php echo form_close(); ?> 

<script type="text/javascript">
$(document).ready(function(){
    //$("select").selectBoxIt();
});
$(function() { 
  $("#contactform").submit(function(e){
    e.preventDefault();
  });
}); 
</script>
