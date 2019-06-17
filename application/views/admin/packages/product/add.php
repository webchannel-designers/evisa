<div class="full_w">

  <div class="h_title">Add New Service</div>
  <?php echo $this->session->flashdata('message'); ?>

  <?php echo form_open_multipart('admin/packages/add',array('id'=>"productfrm")); ?>

  <div class="element">

    <label for="category_id">Category

      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="category_id[]" id="category_id" class="text" >
    
    <option value="">Category</option>

      <?php foreach($contentcats as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['name']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>
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
  
	<!--<div class="element">

    <label for="supplier">Supplier Category

      <?php if(form_error('supplier')){ $err=' err'; echo form_error('supplier'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="supplier" id="supplier" class="text" >
    
    <option value="">Supplier Category</option>

      <?php foreach($suppliers as $supplier): ?>

      <option value="<?php echo $supplier['id']; ?>"><?php echo $supplier['type']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>-->  
  <!--<div class="element">

    <label for="category_id">Machine Type

      <?php if(form_error('type_id')){ $err=' err'; echo form_error('type_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="type_id" id="type_id" class="text">
    
    <option value="Compact Machinery">Compact Machinery</option>
    <option value="Heavy Machinery">Heavy Machinery</option>
    <option value="Light Machinery">Light Machinery</option>

    </select>

  </div>-->

  <div class="element">

    <label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />

  </div>
  
  <!--<div class="element">

    <label for="yoututbe">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('youtube')){ $err=' err'; echo form_error('youtube'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="youtube" name="youtube" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('youtube'); ?>" />

  </div>-->
  
  <!--<div class="element">

    <label for="make_id">Brand

      <?php if(form_error('make_id')){ $err=' err'; echo form_error('make_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="make_id" id="make_id" class="text" onchange="load_model(this.value);">
    <option value="">Brand</option>

    </select>

  </div>-->
  
	<!--<div class="element" id="type1" style="display:none;">

    <label for="type">Vehicle Type

      <?php if(form_error('type')){ $err=' err'; echo form_error('type'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select name="veh-type" id="veh-type" class="text">
      <option value="">Vehicle Type</option>

    </select>

  </div>-->  
  <!--<div class="element" id="mode1">

    <label for="model_id">Model

      <?php if(form_error('model_id')){ $err=' err'; echo form_error('model_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="model_id" id="model_id" class="text">
      <option value="">Model</option>

    </select>

  </div>-->
  
  <!--<div class="element">

    <label for="location_id">City

      <?php if(form_error('location_id')){ $err=' err'; echo form_error('location_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="location_id" id="location_id" class="text">
      <option value="">City</option>
      <?php foreach($locations as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>-->
  
  <!--<div class="element">

    <label for="kilometer">Kilometer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('kilometer')){ $err=' err'; echo form_error('kilometer'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="kilometer" name="kilometer" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('kilometer'); ?>" />

  </div>-->
  
	<!--<div class="element">

    <label for="year">Year 

      <?php if(form_error('year')){ $err=' err'; echo form_error('year'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <select id="year" name="year" class="text">
    <option value="">Year</option>
    <?php
	for($i=1995;$i<=date('Y');$i++)
	{
	?>
    <option value="<?php echo $i; ?>" <?php if(set_value('year')==$i) { ?> selected="selected"<?php } ?>><?php echo $i; ?></option>
    <?php
	}
	?>
    </select>

  </div>--> 
  
	<!--<div class="element">

    <label for="milage">Milage 

      <?php if(form_error('milage')){ $err=' err'; echo form_error('milage'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="milage" name="milage" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('milage'); ?>" />

  </div>-->  
  
  <!--<div class="element">

    <label for="engine">Engine (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('engine')){ $err=' err'; echo form_error('engine'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="engine" name="engine" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('engine'); ?>" />

  </div>-->
  
  <!--<div class="element">

    <label for="fuel">Fuel (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('fuel')){ $err=' err'; echo form_error('fuel'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <select id="fuel" name="fuel" class="text">
    <option value="">Fuel</option>
    <option value="Petrol" <?php if(set_value('fuel')=="Petrol") { ?> selected="selected"<?php } ?>>Petrol</option>
    <option value="Diesel" <?php if(set_value('fuel')=="Diesel") { ?> selected="selected"<?php } ?>>Diesel</option>
    <option value="CNG" <?php if(set_value('fuel')=="CNG") { ?> selected="selected"<?php } ?>>CNG</option>
    <option value="LPG" <?php if(set_value('fuel')=="LPG") { ?> selected="selected"<?php } ?>>LPG</option>
    <option value="Electric" <?php if(set_value('fuel')=="Electric") { ?> selected="selected"<?php } ?>>Electric</option>
    </select>

  </div>-->
  
  <!--<div class="element">

    <label for="color">Color (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('color')){ $err=' err'; echo form_error('color'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="color" name="color" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('color'); ?>" />

  </div>-->
  
  <!--<div class="element">

    <label for="transmission">Mobility (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('transmission')){ $err=' err'; echo form_error('transmission'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <select id="transmission" name="transmission" class="text">
    <option value="">Mobility</option>
    <option value="Mobile" >Mobile</option>
    <option value="Stationary" >Stationary</option>
    <option value="Tool" >Tool</option>
    </select>


  </div>-->
  
  <!--<div class="element">

    <label for="steering">Steering (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('steering')){ $err=' err'; echo form_error('steering'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <select id="steering" name="steering" class="text">
    <option value="">Steering Wheel</option>
    <option value="Left" <?php if(set_value('steering')=="Left") { ?> selected="selected"<?php } ?>>Left</option>
    <option value="Right" <?php if(set_value('steering')=="Right") { ?> selected="selected"<?php } ?>>Right</option>
    </select>


  </div>-->
  
  <!--<div class="element">

    <label for="drive">Drive (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('drive')){ $err=' err'; echo form_error('drive'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <select id="drive" name="drive" class="text">
    <option value="">Drive</option>
    <option value="FWD" <?php if(set_value('drive')=="FWD") { ?> selected="selected"<?php } ?>>FWD</option>
    <option value="RWD" <?php if(set_value('drive')=="RWD") { ?> selected="selected"<?php } ?>>RWD</option>
    <option value="AWD" <?php if(set_value('drive')=="AWD") { ?> selected="selected"<?php } ?>>AWD</option>
    </select>

  </div>-->
  
  <!--<div class="element">

    <label for="condition">Condition (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('condition')){ $err=' err'; echo form_error('condition'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="condition" name="condition" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('condition'); ?>" />

  </div>-->
  
  <div class="element">

    <label for="price">Price (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('price')){ $err=' err'; echo form_error('price'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="price" name="price" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('price'); ?>" />

  </div>

  <div class="element">

    <label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('short_desc'); ?></textarea>

  </div>

  <div class="element">

    <label for="meta_desc">Meta Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('meta_desc')){ $err=' err'; echo form_error('meta_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <textarea id="meta_desc" name="meta_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('meta_desc'); ?></textarea>

  </div>

  <div class="element">

    <label for="keywords">Keywords (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <textarea id="keywords" name="keywords" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('keywords'); ?></textarea>

  </div>
  
	<div class="element">

    <label for="desc">Description  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('overview')){ $err=' err'; echo form_error('overview'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("overview",html_entity_decode(set_value('desc'))); ?> </div>
  <div class="element">

    <label for="specification">Below Tab Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('specification')){ $err=' err'; echo form_error('specification'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("specification",html_entity_decode(set_value('specification'))); ?> </div>
    
	<!--<div class="element">

    <label for="feat">Description (Features) (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('feat')){ $err=' err'; echo form_error('feat'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("feat",html_entity_decode(set_value('feat'))); ?> </div>-->    

  <!--<div class="element">

    <label for="image">Posted Date </label>

    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php echo @set_value('date_time'); ?>" />

  </div>-->

  <div class="element">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="image" />

  </div>

  <div class="element">

    <label for="attach_title">Banner Text (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input id="attach_title" name="banner_text" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('banner_text'); ?>" />

  </div>

  <div class="element">

    <label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="banner_image" />

  </div>
  
  <div class="element">

    <label for="attachment">PDF (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="pdf" />

  </div>

  <div class="element">

    <label for="widgets">Widget Type

      <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="widgets[]" id="widgets" class="text" multiple="multiple">

      <?php foreach($widgets as $widget): ?>

      <option value="<?php echo $widget['id']; ?>" <?php echo set_select('widgets', $widget['id']); ?>><?php echo $widget['title']; ?></option>

      <?php endforeach; ?>

    </select>

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
    
	<div class="element">

    <label for="status">Featured

      <?php if(form_error('featured')){ $err=' err'; echo form_error('featured'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="featured" value="Y" <?php echo set_radio('featured', 'Y', TRUE); ?> />

    Enabled

    <input type="radio" name="featured" value="N" <?php echo set_radio('featured', 'N'); ?> />

    Disabled </div>    

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/packages/lists'); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>


