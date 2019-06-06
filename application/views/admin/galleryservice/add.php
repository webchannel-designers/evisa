<div class="full_w">
  <div class="h_title">Gallery</div>
  <?php 
	$uris=$this->uri->segment(4);
	echo $this->session->flashdata('message'); ?>
  <?php echo form_open_multipart('admin/galleryservice/add/'.$uris); ?>
  <div class="element">
    <label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />
  </div>
  <div class="element">
    <label for="url">URL (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('url')){ $err=' err'; echo form_error('url'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input id="url" name="url" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('url'); ?>" />
  </div>
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
    <input type="file" name="image[]" multiple="multiple" />
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
    <a class="button cancel" href="<?php echo site_url('admin/services/lists'); ?>">Cancel</a> </div>
  <?php echo form_close(); ?> <?php echo form_open_multipart('admin/galleryservice/update/'.$uris); ?>
  <?php if(count($records) > 0)  {  ?>
  <div class="gal_img">
    <ul class="updateform">
      <?php foreach($records as $record){?>
      <li>
        <div class="container"> <img src="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>" height="100" width="150" /> <a class="lightbox view" href="<?php echo base_url()."public/uploads/gallery/".$record['image']; ?>"   style="float:right"><img src="<?php echo base_url()."public/admin/images/zoom.png"?>" title="View Image" /></a>
          <label> Title</label>
          <input id="title" name="title_<?php echo $record['id']; ?>" type="text" class="text"  style="width:95%" value="<?php echo $record['title']; ?>" />
		  <label> URL</label>
          <input id="url" name="url_<?php echo $record['id']; ?>" type="text" class="text"  style="width:95%" value="<?php echo $record['url']; ?>" />          
          <label>Display Order</label>
          <input type="text" name="sort_<?php echo $record['id']; ?>"  style="width:25%"  class="text"   id="sort_<?php echo $record['id']; ?>" value="<?php echo $record['sort_order']; ?>" />
          <?php if($record['is_default'] == 'Y') {?>
          <a href="<?php echo base_url()."admin/galleryservice/setdefault/N/".$record['id']."/".$uris; ?>" style="float:right"> <img src="<?php echo base_url()."public/admin/images/default.gif"?>" title="Set as Default" /> </a>
          <?php } else {?>
          <a href="<?php echo base_url()."admin/galleryservice/setdefault/Y/".$record['id']."/".$uris; ?>" style="float:right"><img src="<?php echo base_url()."public/admin/images/empty.png"?>" title="Remove Default" /> </a> <a href="<?php echo base_url()."admin/galleryservice/delete/".$record['id']."/".$uris; ?>" style="float:right" onclick="return confirmBox();"><img src="<?php echo base_url()."public/admin/img/i_delete.png"?>" title="Delete Image" /></a>
          <?php } ?>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
  <div class="clear"></div>
  <div class="entry" style="margin-top:40px;">
    <button type="submit" name="butUpdate" id="butUpdate" class="add">Update</button>
    <a class="button cancel" href="<?php echo site_url('admin/services/lists'); ?>">Cancel</a> 
    <!--<input type="submit" name="butUpdate" id="butUpdate" value="Update" class="add" />--> 
  </div>
  <?php
	}
	else
	{
	echo "No Data Found";
	}
	?>
  <?php echo form_close(); ?> </div>
