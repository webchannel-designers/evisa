<div class="full_w">
  <div class="h_title">Add New Content</div>
  <?php echo form_open_multipart('admin/events/add'); ?>
  <div class="element">
    <label for="category_id">Category
      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <select name="category_id" id="category_id" class="text">
      <?php foreach($contentcats as $contentcat): ?>
      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  
  <!--<div class="element">
    <label for="format_id">Format
      <?php if(form_error('format_id')){ $err=' err'; echo form_error('format_id'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <select name="format_id" id="format_id" class="text">
      <?php foreach($formats as $format): ?>
      <option value="<?php echo $format['id']; ?>"><?php echo $format['title']; ?></option>
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
    <label for="driving">Driving Location (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('driving')){ $err=' err'; echo form_error('driving'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input id="driving" name="driving" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('driving'); ?>" />
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

    <label for="venue">Venue (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('venue')){ $err=' err'; echo form_error('venue'); } else { $err=''; ?>

      <?php } ?>

    </label>
 <input id="keywords" name="keywords"  type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('keywords'); ?>" />

  </div>
  
    <div class="element">
    <label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <?php echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?> </div>
    <div class="element">
    <label for="org">Organiser and Registrations (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('org')){ $err=' err'; echo form_error('org'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <?php echo $this->ckeditor->editor("org",html_entity_decode(set_value('org'))); ?> </div>
  <div class="element">
    <label for="image">Start Date </label>
    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php echo @set_value('date_time'); ?>" />
  </div>
  
  <div class="element">
    <label for="image">End Date </label>
    <input type="text" name="date_times" id="date_times" class="text datepicker" value="<?php echo @set_value('date_times'); ?>" />
  </div>
  
  <div class="element">
    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>
    <input type="file" name="image" />
  </div>
  <div class="element">
    <label for="image">Detail Page Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>
    <input type="file" name="image2" />
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
    <div class="element">
    <label for="archieve">Archieve
      <?php if(form_error('archieve')){ $err=' err'; echo form_error('archieve'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input type="radio" name="archive" value="Y" <?php echo set_radio('archive', 'Y', TRUE); ?> />
    Enabled
    <input type="radio" name="archive" value="N" <?php echo set_radio('archive', 'N'); ?> />
    Disabled </div>
  <div class="entry">
    <button type="submit" class="add">Save</button>
    <a class="button cancel" href="<?php echo site_url('admin/events/lists'); ?>">Cancel</a> </div>
  <?php echo form_close(); ?> 
</div>