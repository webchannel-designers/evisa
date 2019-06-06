<?php echo form_open_multipart('buysell/request',array("id"=>"sellform","class"=>"ajaxform")); ?>
<div class="row">
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('firstname')){ ?> error <?php  } ?>">First Name</label>
    <input class="required" name="firstname" type="text"  value="<?php echo set_value('firstname'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('lastname')){ ?> error <?php  } ?>"> Last Name</label>
    <input class="required " name="lastname" type="text"  value="<?php echo set_value('lastname'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('mobile')){ ?> error <?php  } ?>">Mobile Number</label>
    <input class="required number " name="mobile" type="text" id="mobile" value="<?php echo set_value('mobile'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('email')){ ?> error <?php  } ?>">Email Id</label>
    <input class="required email " name="email" type="text" id="email" value="<?php echo set_value('email'); ?>" />
  </div>
  <?php /*
	<div class="input-holder ">
    <label class="<?php $err=''; if(form_error('country')){ ?> error <?php  } ?>">Country</label>
    <select class="required " id="country" name="country">
      <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
      <?php foreach($countries as $country) { ?>
      <option value="<?php echo $country['name'] ?>" <?php echo ($country['name'] == $this->input->post('country'))?'selected="selected"':'' ?>><?php echo $country['name'] ?></option>
      <?php } ?>
    </select>
  </div>*/
?>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('city')){ ?> error <?php  } ?>">City</label>
    <input class="required " name="city" type="text" id="city" value="<?php echo set_value('city'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('iwantto')){ ?> error <?php  } ?>">I want to</label>
    <select class="required "  name="iwantto">
      <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
      <?php $wants =array('Sell Piano','Buy used Piano');foreach($wants as $want) { ?>
      <option value="<?php echo $want?>" <?php echo ($want== $this->input->post('iwantto'))?'selected="selected"':'' ?>><?php echo $want?></option>
      <?php } ?>
    </select>
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('type')){ ?> error <?php  } ?>">Type of Piano</label>
    <select class="required "  name="type">
      <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
      <?php $types =array('Concert grand Piano','Grand Piano','Baby grand Piano','Upright Piano','Digital Piano','Piano Bench','Piano books');foreach($types as $type) { ?>
      <option value="<?php echo $type?>" <?php echo ($type== $this->input->post('type'))?'selected="selected"':'' ?>><?php echo $type?></option>
      <?php } ?>
    </select>
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('brand')){ ?> error <?php  } ?>">Piano Brand</label>
    <select class="required "  name="brand">
      <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
      <?php $brands =array('Bluthner','Yamaha','Steinway','Kawai','Roland','Ritmuller','Samick','Nord','Bosendorfer','Irmler
','Haessler','Other');foreach($brands as $brand) { ?>
      <option value="<?php echo $brand?>" <?php echo ($brand== $this->input->post('brand'))?'selected="selected"':'' ?>><?php echo $brand?></option>
      <?php } ?>
    </select>
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('model')){ ?> error <?php  } ?>">Model Number</label>
    <input class="required " name="model" type="text" value="<?php echo set_value('model'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('color')){ ?> error <?php  } ?>">Color</label>
    <input class="required " name="color" type="text"  value="<?php echo set_value('color'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('condition')){ ?> error <?php  } ?>">Condition of Piano</label>
    <select class="required "  name="condition">
      <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
      <?php $conditions =array('Like new','Good condition with few scratches','Old piano with many scartches','Used few times');foreach($conditions as $condition) { ?>
      <option value="<?php echo $condition?>" <?php echo ($condition== $this->input->post('condition'))?'selected="selected"':'' ?>><?php echo $condition?></option>
      <?php } ?>
    </select>
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('serialno')){ ?> error <?php  } ?>">Serial number</label>
    <input class="required " name="serialno" type="text"  value="<?php echo set_value('serialno'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('reason')){ ?> error <?php  } ?>">Reason for selling</label>
    <select class="required "  name="reason">
      <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
      <?php $reasons =array('Relocating','Want to buy another piano','Piano not needed any more','Piano is damaged/cant be used');foreach($reasons as $reason) { ?>
      <option value="<?php echo $reason?>" <?php echo ($reason== $this->input->post('reason'))?'selected="selected"':'' ?>><?php echo $reason?></option>
      <?php } ?>
    </select>
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('sellprice')){ ?> error <?php  } ?>">I wish to sell it for</label>
    <input class="required " name="sellprice" type="text"  value="<?php echo set_value('sellprice'); ?>" />
  </div>
  <div class="input-holder ">
    <label class="<?php $err=''; if(form_error('selltime')){ ?> error <?php  } ?>">When do you wish to sell?</label>
    <input class="required " name="selltime" type="text"  value="<?php echo set_value('selltime'); ?>" />
  </div>
  <div class="input-holder full">
    <label class="">Upload photos of piano</label>
    <input class="" name="photos[]" type="file" multiple  />
  </div>
  <div class="input-holder full <?php  if(form_error('captcha')){ $err=' err'; echo 'error'; } ?>">
    <div class="captcha-holder"> <?php echo $this->recaptcha->render(); ?></div>
  </div>
  <div class="col-md-12">
    <h4>Do you require professional Piano assessment service by our technicians? </h4>
    <?php /*
	<div class="radio">
      <label class="radio-inline">
        <input type="radio" name="assesment" <?php echo set_checkbox('assesment', 'Y'); ?> value="Y">
        Yes</label>
      <label class="radio-inline">
        <input type="radio" name="assesment" value="No" <?php echo set_checkbox('assesment', 'N',true); ?>>
        No</label>
    </div>*/
?>
    <p>Piano assessment will cost 100 AED in Dubai and AED 250 in other Emirates.									
      After the assessment you will get a full report and market price estimate for your Piano and Certificate from HOUSE OF PIANOS.</p>
  </div> 
  <div class="input-holder full">
    <div class="checkbox row">
      <label class="<?php $err=''; if(form_error('iaccept')){ ?> error <?php  } ?>">
      <input type="checkbox" name="iaccept" class="check-box" />
      <p>By submitting this form, <a href="<?php echo site_url('contents/view/terms-conditions')?>" class="text-default" title="I accept Terms & Conditions">I accept Terms & Conditions</a> .</p>
      </label>
    </div>
  </div>
  <div class="input-holder full">
    <button class="btn yellow btn-submit" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
  </div>
</div>
<?php echo form_close(); ?> 
<script type="text/javascript">
$(document).ready(function(){
    $("select").selectBoxIt();
    $('[data-toggle="popover"]').popover(); 
    $("#sellform").submit(function(e){
    e.preventDefault();
    $.ajax({ 
		type: "post", 
		url: "<?php echo site_url('buysell/request/');?>", 			 
        data:  new FormData(this),
        mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
	    success: function(msg) {    
			$('#sellformcontainer').html(msg); 
		}, error: function(){ console.log('Error while request..'); } 
	});
  });
}); 
</script>
<style>
label.error{color:yellow;}
<?php
	/**
 * .captcha-holder{margin-top: -10px;}
 * @media screen and (max-height: 575px){}
 * #rc-imageselect, .g-recaptcha {transform:scale(0.75);-webkit-transform:scale(0.75);transform-origin:0 0;-webkit-transform-origin:0 0;}
 */
?>
</style>