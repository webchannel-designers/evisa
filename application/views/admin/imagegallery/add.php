<div class="full_w">

  <div class="h_title">Gallery</div>
	<?php 
	//$uris=$this->uri->segment(4);
	echo $this->session->flashdata('message'); ?>
  <?php echo form_open_multipart('admin/imagegallery/add'); ?>

  <!--<div class="element">

    <label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />

  </div>-->

  <!--<div class="element">

    <label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("short_desc",html_entity_decode(set_value('short_desc'))); ?> </div>-->

  <!--<div class="element">

    <label for="icon">Icon (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="icon" />

  </div>-->

  <div class="element">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

    <input type="file" name="image" />

  </div>

  <!--<div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> />

    Disabled </div>-->

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <!--<a class="button cancel" href="<?php echo site_url('admin/banners/lists'); ?>">Cancel</a>--> </div>

  <?php echo form_close(); ?> 
  
  <?php echo form_open_multipart('admin/imagegallery/update'); ?>
  <?php
  if(count($records) > 0)
  {
  ?>
  <div class="gal_img">
    <ul>
    <?php
	//print_r($records);
	foreach($records as $record)
	{
	?>
    <li>
    <img src="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>" height="100" width="150" /><br /><br />
    <a class="lightbox" href="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>">View Full Image</a>
    <a href="<?php echo base_url()."admin/imagegallery/delete/".$record['id']; ?>">Delete</a>
    Display Order<input type="text" name="sort_<?php echo $record['id']; ?>" id="sort_<?php echo $record['id']; ?>" value="<?php echo $record['sort_order']; ?>" />
    </li>
    <?php
	}
	?>
    <li><input type="submit" name="butUpdate" id="butUpdate" value="Update Display Order" /></li>
    </ul>
    </div>
    <?php
	}
	else
	{
	echo "No Data Found";
	}
	?>
  <?php echo form_close(); ?> 
</div>