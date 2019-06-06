<?php	
$slctwidget=array();
$contentwidgets=explode(',',$content->widgets);
foreach($contentwidgets as $contentwidget):
	   $currentwidgets = explode(":",$contentwidget);
	   $slctwidget[] = $currentwidgets[0];
endforeach;
$selectedwidget = implode(",",$slctwidget); 
$cross=explode(",",$content->crosslinks);	
//print_r($this->session->all_userdata());
$cat=explode(",",$content->category);	

?>
<div class="full_w">
	<div class="h_title">Edit Blogs</div>	
	<?php echo form_open_multipart('admin/blogs/edit/'.$content->id.'/'.$this->uri->segment(5).'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	
		<div class="element">
			<label for="category_id">Category <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="category_id[]" id="category_id" class="text" >
			<?php foreach($contentcats as $contentcat): ?>
				<option value="<?php echo $contentcat['id']; ?>" <?php if(in_array($contentcat['id'],$cat)){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
        <!--<div class="element">
			<label for="cross">Related Articles <?php if(form_error('cross')){ $err=' err'; echo form_error('cross'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="cross[]" id="cross" class="text" multiple="multiple">
            <option>Select</option>
			<?php foreach($contents as $item): ?>
				<option value="<?php echo $item['id']; ?>" <?php if(in_array($item['id'],@$cross)){ echo 'selected="selected"'; }?>><?php echo $item['title']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>-->
        <!--<div class="element">
			<label for="cross">Cross Links <?php if(form_error('cross')){ $err=' err'; echo form_error('cross'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="cross[]" id="cross" class="text" multiple="multiple">
            <option>Select</option>
			<?php foreach($contents as $item): ?>
				<option value="<?php echo $item['id']; ?>" <?php if(in_array($item['id'],@$cat)){ echo 'selected="selected"'; }?>><?php echo $item['title']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>-->
		<div class="element">
			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->title; ?>" />
		</div>
        <div class="element">
			<label for="keywords">Keywords (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <textarea id="keywords" name="keywords" class="text"><?php echo $content->keywords; ?></textarea>
			<!--<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->title; ?>" />-->
		</div>
        <div class="element">
			<label for="meta_desc">Meta Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('meta_desc')){ $err=' err'; echo form_error('meta_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <textarea id="meta_desc" name="meta_desc" class="text"><?php echo $content->meta_desc; ?></textarea>
			<!--<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->title; ?>" />-->
		</div>
        <!--<div class="element">
			<label for="author">Author (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('author')){ $err=' err'; echo form_error('author'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="author" name="author" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->author; ?>" />
		</div>-->
          <?php
		  if($this->session->userdata('admin_role')==1)
		  {
		  ?>

      <div class="element">

    <label for="author">Author(s) (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('author')){ $err=' err'; echo form_error('author'); } else { $err=''; ?>

      <span> (required)</span>

      <?php }  ?>

    </label>
    
    <select name="author[]" id="author" class="text pq-select" >
    <!--<option value="">Select</option>-->
    <?php
      
	foreach($users as $user)
	{
	?>
    <!--<option value="<?php echo $user['id']; ?>" <?php if(in_array($user['id'],explode(',',$content->author))) { ?> selected="selected"<?php } ?>><?php echo $user['name']; ?></option>-->
    <?php
	}
	?>
    <option value="1" <?php if($content->author==1) {  ?> selected="selected"<?php } ?>>Super Admin</option>
    <?php
	foreach($members as $user)
	{
	?>
    <option value="<?php echo $user['id']; ?>" <?php if($content->author==$user['id']) { ?> selected="selected"<?php } ?>><?php echo $user['fname']; ?></option>
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
		<div class="element">
			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />
		</div>		
		
       
		<div class="element">
			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("desc",$content->desc); ?>
		</div>	
         <div class="element">
    <label for="image">Posted Date </label>
    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php if($content->date_time) echo date("d-m-Y h:i:a", strtotime($content->date_time)); ?>" />
  </div>
  <div class="element">
			<label for="alt">Alt Tag For Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('alt')){ $err=' err'; echo form_error('alt'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="alt" name="alt" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->alt; ?>" />
  </div>
  <div class="element">
    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->image; ?></label>
    <input type="file" name="image" />
  </div>
       <div class="element">
			<label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)  - <?php echo $content->banner_image; ?></label>
			<input type="file" name="banner_image" />
		</div>	  
        
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/blogs/lists/'.$this->uri->segment(5)); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>