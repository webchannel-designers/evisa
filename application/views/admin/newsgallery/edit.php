<div class="full_w">

  <div class="h_title">Edit Promotion</div>

  <?php echo form_open_multipart('admin/newsgallery/edit/'.$gallery->id.'/'.$return); ?>

  <input id="id" name="id" type="hidden" value="<?php echo $gallery->id; ?>" />

  <div class="element">

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

  </div>
  
        <!--<div class="element">
			<label for="title">Member or Public View (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else  $err='';  ?></label>
			<select name="viewstat" class="text">
            <option value="public" <?php if($gallery->viewstat=='public') { ?> selected="selected"<?php } ?>>Public View</option>
            <option value="member" <?php if($gallery->viewstat=='member') { ?> selected="selected"<?php } ?>>Member View</option>
            </select>
		</div>-->

  <div class="element">

    <label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else $err='';  ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->title; ?>" />

  </div>
  
  <div class="element">

    <label for="link">Hyper Link (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('link')){ $err=' err'; echo form_error('link'); } else $err='';  ?>

    </label>

    <input id="link" name="link" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->link; ?>" />

  </div>
   <div class="element">

    <label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else $err='';  ?>

    </label>
     <?php echo $this->ckeditor->editor("short_desc",$gallery->short_desc); ?>
<?php
	/**
 * <textarea name="short_desc" id="short_desc" class="text"><?php echo $gallery->short_desc; ?></textarea>
 */
?>

  </div> 
  <div class="element">

			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->slug; ?>" />

  </div>

  <div class="element">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $gallery->image; ?></label>

    <input type="file" name="image" />

  </div>

  <div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php if($gallery->status=='Y'){ echo 'checked="checked"';} ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php if($gallery->status=='N'){ echo 'checked="checked"';} ?> />

    Disabled </div>

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/newsgallery/lists'.'/'.$return); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>

