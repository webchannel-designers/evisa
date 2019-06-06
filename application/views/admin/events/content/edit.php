<?php	
$slctwidget=array();
$contentwidgets=explode(',',$content->widgets);
foreach($contentwidgets as $contentwidget):
	   $currentwidgets = explode(":",$contentwidget);
	   $slctwidget[] = $currentwidgets[0];
endforeach;
$selectedwidget = implode(",",$slctwidget); 			
?>
<div class="full_w">
	<div class="h_title">Edit Events</div>	
	<?php echo form_open_multipart('admin/events/edit/'.$content->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	
		<div class="element">
			<label for="category_id">Category <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="category_id" id="category_id" class="text">
			<?php foreach($contentcats as $contentcat): ?>
				<option value="<?php echo $contentcat['id']; ?>" <?php if($content->category_id==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
        
		<!--<div class="element">
			<label for="format_id">Format <?php if(form_error('format_id')){ $err=' err'; echo form_error('format_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="format_id" id="format_id" class="text">
			<?php foreach($formats as $format): ?>
				<option value="<?php echo $format['id']; ?>" <?php if($content->format_id==$format['id']){ echo 'selected="selected"'; }?>><?php echo $format['title']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>-->        
		<div class="element">
			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->title; ?>" />
		</div>
        <div class="element">
			<label for="driving">Driving Locations (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('driving')){ $err=' err'; echo form_error('driving'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="driving" name="driving" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->maplocation; ?>" />
		</div>
		<div class="element">
			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />
		</div>	
        <div class="element">
			<label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('keywords')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo $content->short_desc; ?></textarea>
		</div>	
          <div class="element">
			<label for="keywords">Venue (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

<input id="keywords" name="keywords" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->keywords; ?>" />
		</div>
		<div class="element">
			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("desc",$content->desc); ?>
		</div>	
        <div class="element">
			<label for="org">Organiser and Registrations (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('org')){ $err=' err'; echo form_error('org'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("org",$content->organisers); ?>
		</div>
         <div class="element">
    <label for="image">Start Date </label>
    <input type="text" name="date_timen" id="date_timen" class="text datepicker" value="<?php if($content->date_time) echo date("d-m-Y h:i:a", strtotime($content->date_time)); ?>" />
  </div>
  <div class="element">
    <label for="image">End Date </label>
    <input type="text" name="date_timens" id="date_timens" class="text datepicker" value="<?php if($content->date_time) echo date("d-m-Y h:i:a", strtotime($content->end_time)); ?>" />
  </div>
  <div class="element">
    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->image; ?></label>
    <input type="file" name="image" />
  </div>
  <div class="element">
    <label for="image">Details Page Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->detail_image; ?></label>
    <input type="file" name="image2" />
  </div>
       <div class="element">
			<label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)  - <?php echo $content->banner_image; ?></label>
			<input type="file" name="banner_image" />
		</div>	  
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
        <div class="element">
			<label for="archieve">Archieve <?php if(form_error('archieve')){ $err=' err'; echo form_error('archieve'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="archive" value="Y" <?php if($content->archive=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="archive" value="N" <?php if($content->archive=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/events/lists'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>