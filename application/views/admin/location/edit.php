<div class="full_w">

  <div class="h_title">Edit Location</div>

  <?php echo form_open_multipart('admin/location/edit/'.$gallery->id.'/'.$return); ?>

  <input id="id" name="id" type="hidden" value="<?php echo $gallery->id; ?>" />

  <!--<div class="element">

    <label for="category">Category

      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="category_id" id="category_id" class="text">

      <option value="">Select</option>

      <?php foreach($categories as $category): ?>

      <option value="<?php echo $category['id']; ?>" <?php if($gallery->category_id==$category['id']){echo ' selected="selected"';} ?>><?php echo $category['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>-->

  <div class="element">

    <label for="title">Location (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else $err='';  ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->title; ?>" />

  </div>
  
	<!--<div class="element">

    <label for="designation">Designation (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" />

  </div>-->  
  <!--<div class="element">

			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->slug; ?>" />

		</div>-->

  <!--<div class="element">

    <label for="image">Photo (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $gallery->image; ?></label>

    <input type="file" name="image" />

  </div>-->

  <div class="element">

    <label for="is_active">Status

      <?php if(form_error('is_active')){ $err=' err'; echo form_error('is_active'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php if($gallery->is_active=='Y'){ echo 'checked="checked"';} ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php if($gallery->is_active=='N'){ echo 'checked="checked"';} ?> />

    Disabled </div>

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/location/lists'.'/'.$return); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>