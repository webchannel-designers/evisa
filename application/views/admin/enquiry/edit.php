<div class="full_w">
  <div class="h_title">Edit Enquiry</div>
  <?php echo form_open_multipart('admin/enquiry/edit/'.$enquiry->id.'/'.$return); ?>
  <input id="id" name="id" type="hidden" value="<?php echo $enquiry->id; ?>" />
  <div class="element">
    <label for="title">Name (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_name; ?> 
    <!--<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_name; ?>" />--> 
    
  </div>
  <div class="element">
    <label for="title">Email-Id (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_email; ?> 
    <!--<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_email; ?>" />--> </div>
  <div class="element">
    <label for="title">Phone Number (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo ($enquiry->enq_phone)?$enquiry->enq_phone:$enquiry->enq_mobile; ?> 
    <!--<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_phone; ?>" />--> </div>
    <?php if($enquiry->enq_renttype!="") { ?>
<div class="element">
    <label for="title">Rent Type (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_renttype; ?> 
    <!--<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_phone; ?>" />--> </div> 
    <?php } ?>
    <?php if($enquiry->enq_piano!="") { ?>
    <div class="element">
    <label for="title">Piano Type (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_piano; ?> 
    <!--<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_phone; ?>" />--> </div>   
    <?php } ?>
    <?php if($enquiry->enq_date!="") { ?>
    <div class="element">
    <label for="title">Date of Event (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_date; ?> 
    <!--<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_phone; ?>" />--> </div>
    <?php } ?>
  <div class="element">
    <label for="title">Subject (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('subject')){ $err=' err'; echo form_error('subject'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo ($enquiry->enq_subject)?$enquiry->enq_subject:"Enquiry"; ?> 
    <!--<input id="subject" name="subject" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_subject; ?>" />--> </div>
  <div class="element">
    <label for="title">Message (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->enq_message; ?> </div>
    <?php if( $enquiry->enq_products) {   ?>
  <div class="element">
    <label for="title">Details </label>
    <?php echo $enquiry->enq_products;?> </div>
    <?php } ?>
  <div class="element">
    <label for="status">Status
      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input type="radio" name="status" value="Y" <?php if($enquiry->is_active=='Y'){ echo 'checked="checked"';} ?> />
    Enabled
    <input type="radio" name="status" value="N" <?php if($enquiry->is_active=='N'){ echo 'checked="checked"';} ?> />
    Disabled </div>
  <div class="entry">
    <button type="submit" class="add">Save</button>
    <a class="button cancel" href="<?php echo site_url('admin/enquiry/lists'); ?>">Cancel</a> </div>
  <?php echo form_close(); ?> </div>
