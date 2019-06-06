<?php //print_r($_SESSION); ?>
<div class="full_w">

  <div class="h_title">Add Blog Content</div>

  <?php echo form_open_multipart('admin/blogs/add/'.$this->uri->segment(4)); ?>

  <div class="element">

    <label for="category_id">Category

      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="category_id[]" id="category_id" class="text" >

      <?php foreach($contentcats as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['name']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>
  
  <!--<div class="element">

    <label for="cross">Related Articles

      <?php if(form_error('cross')){ $err=' err'; echo form_error('cross'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="cross[]" id="cross" class="text" multiple="multiple">
    
    <option>Select</option>

      <?php foreach($contents as $item): ?>

      <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>-->
  
  <!--<div class="element">

    <label for="cross">Cross Links

      <?php if(form_error('cross')){ $err=' err'; echo form_error('cross'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="cross[]" id="cross" class="text" multiple="multiple">
    <option>Select</option>

      <?php foreach($contents as $item): ?>

      <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>

      <?php endforeach; ?>

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
  
  <div class="element">

    <label for="keywords">Keywords (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <textarea id="keywords" name="keywords" class="text"><?php echo set_value('keywords'); ?></textarea>

    <!--<input id="keywords" name="keywords" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('keywords'); ?>" />-->

  </div>
  
  <div class="element">

    <label for="meta_desc">Meta Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('meta_desc')){ $err=' err'; echo form_error('meta_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <textarea id="meta_desc" name="meta_desc" class="text"><?php echo set_value('meta_desc'); ?></textarea>

    <!--<input id="keywords" name="keywords" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('keywords'); ?>" />-->

  </div>
  
  <?php
  if($this->session->userdata('admin_role')==1)
  {
  ?>
  <div class="element">

    <label for="author">Author (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('author')){ $err=' err'; echo form_error('author'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>
    
    <select name="author[]" id="author" class="text pq-select">
    
    <!--<option value="">Select</option>-->
    <?php
	foreach($users as $user)
	{
	?>
    <!--<option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>-->
    <?php
	}
	?>
    <option value="1">Super Admin</option>
    <?php
	foreach($members as $user)
	{
	?>
    <option value="<?php echo $user['id']; ?>"><?php echo $user['fname']; ?></option>
    <?php
	}
	?>
    </select>


  </div>
  <?php
  }
  else
  {
  ?>
  <input type="hidden" name="author[]" value="<?php echo $_SESSION['admin_id']; ?>" />
  <?php
  }
  ?>
  
  <!--<div class="element">

    <label for="author">Author (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('author')){ $err=' err'; echo form_error('author'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="author" name="author" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('author'); ?>" />

  </div>-->

  <!--<div class="element">

    <label for="short_desc">Short Description (<?php //echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php //if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php //} ?>

    </label>

    <textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('short_desc'); ?></textarea>

  </div>-->

    <div class="element">

    <label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?> </div>

  <div class="element">

    <label for="image">Posted Date </label>

    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php echo @set_value('date_time'); ?>" />

  </div>
  
  <div class="element">

    <label for="alt">Alt Tag For Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('alt')){ $err=' err'; echo form_error('alt'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="alt" name="alt" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('alt'); ?>" />

  </div>

  <div class="element">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="image" />

  </div>

  

   <div class="element">

    <label for="attachment">File (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="banner_image" />

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

    <a class="button cancel" href="<?php echo site_url('admin/blogs/lists/'.$this->uri->segment(4)); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>