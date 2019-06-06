<?php	
$slctwidget=array();
@$contentwidgets=explode(',',@$content->widgets);
foreach(@$contentwidgets as $contentwidget):
	   $currentwidgets = explode(":",$contentwidget);
	   $slctwidget[] = $currentwidgets[0];
endforeach;
$selectedwidget = implode(",",$slctwidget); 			
?>
<div class="full_w">
	<div class="h_title">Edit User</div>	
	<?php echo form_open_multipart('admin/comments/edit/'.$content->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	
		<!--<div class="element">
			<label for="category_id">Category <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="category_id" id="category_id" class="text">
			<?php foreach($contentcats as $contentcat): ?>
				<option value="<?php echo $contentcat['id']; ?>" <?php if($content->category_id==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>-->
		<div class="element">
			<label for="title">Name (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->name; ?>" />
		</div>
        <div class="element">
			<label for="author">Email (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('author')){ $err=' err'; echo form_error('author'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="author" name="author" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->email; ?>" />
		</div>
		<div class="element">
			<label for="author">Comments (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('comments')){ $err=' err'; echo form_error('comments'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <textarea name="comments" id="comments" class="text<?php echo $err; ?>"><?php echo $content->comments; ?></textarea>
		</div>		
        <!--<div class="element">
			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />
		</div>-->		
		<!--<div class="element">
			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("desc",$content->desc); ?>
		</div>-->	
         <!--<div class="element">
    <label for="image">Posted Date </label>
    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php if($content->added_on) echo date("d-m-Y h:i:a", strtotime($content->added_on)); ?>" />
  </div>-->
  <!--<div class="element">
    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->image; ?></label>
    <input type="file" name="image" />
  </div>-->
       <!--<div class="element">
			<label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)  - <?php echo $content->banner_image; ?></label>
			<input type="file" name="banner_image" />
		</div>-->	  
        
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($content->is_active=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->is_active=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/comments/lists/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>