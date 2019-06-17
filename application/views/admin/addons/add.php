<div class="full_w">

  <div class="h_title">Add New Addon</div>
  <?php echo $this->session->flashdata('message'); ?>

  <?php echo form_open_multipart('admin/addons/add',array('id'=>"productfrm")); ?>

    <div class="element">

    <label for="category_id">Company

      <?php if(form_error('company_id')){ $err=' err'; echo form_error('company_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="company_id" id="company_id" class="text" >
    
    <option value="">Company</option>

      <?php foreach($companies as $comp): ?>

      <option value="<?php echo $comp['id']; ?>"><?php echo $comp['name']; ?></option>

      <?php endforeach; ?>

    </select>

  </div> 
	

  <div class="element">

    <label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />

  </div> 
  
  <div class="element">

    <label for="price">Price (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('price')){ $err=' err'; echo form_error('price'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="price" name="price" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('price'); ?>" />

  </div> 
 

  <div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> />

    Disabled </div>    
	   

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/companies/lists'); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>


