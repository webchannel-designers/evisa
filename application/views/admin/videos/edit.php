<div class="full_w">

  <div class="h_title">Edit Video</div>

  <?php echo form_open_multipart('admin/videos/edit/'.$this->uri->segment(4).'/'.$banner->id.'/'.$return); ?>

  <input id="id" name="id" type="hidden" value="<?php echo $banner->id; ?>" />

  <div class="element">

    <label for="title">Video Link(<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $banner->title; ?>" />

  </div>

 <!-- <div class="element">

    <label for="short_desc">Short Description (<?php //echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php //if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php //} ?>

    </label>

    <?php //echo $this->ckeditor->editor("short_desc",$banner->short_desc);  ?> </div>

  <div class="element">

    <label for="icon">Icon (<?php //echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php //echo $banner->icon;?></label>

    <input type="file" name="icon" />

  </div>-->

 <!-- <div class="element">

    <label for="attachment">Image (<?php //echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php //echo $banner->image; ?></label>

    <input type="file" name="image" />

  </div>-->

  <div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php if($banner->status=='Y'){ echo 'checked="checked"';} ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php if($banner->status=='N'){ echo 'checked="checked"';} ?> />

    Disabled </div>

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/videos/lists/'.$this->uri->segment(4)); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>