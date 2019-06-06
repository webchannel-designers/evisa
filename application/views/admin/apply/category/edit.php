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
	<div class="h_title">Edit Content Category</div>	
	<?php echo form_open('admin/contents/editcategory/'.$content->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />		
		<div class="element">
			<label for="name">Name (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->name; ?>" />
		</div>
		<div class="element">
			<label for="slug">URL Slug <?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />
		</div>
		<div class="element">
			<label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<textarea id="short_desc" name="short_desc" type="text" class="text<?php echo $err; ?>" ><?php echo $content->short_desc; ?></textarea>
		</div>
		<div class="element">
			<label for="keywords">Keywords (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="keywords" name="keywords" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->keywords; ?>" />
		</div>
         <div class="element">
			<label for="widgets">Widget Type <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="widgets[]" id="widgets" class="text" multiple="multiple">
			<?php		
			   foreach($widgets as $widget): 			     
				 
			   ?>
				<option value="<?php echo $widget['id']; ?>" <?php $selectedwidgets=explode(',',$selectedwidget); if(in_array($widget['id'],$selectedwidgets)){ echo 'selected="selected"'; } ?>><?php echo $widget['title'];?></option>
			<?php endforeach; ?>
			</select>
		</div>		
		<div class="element">
			<label for="breadcrumb_status">Breadcrumb Status <?php if(form_error('breadcrumb_status')){ $err=' err'; echo form_error('breadcrumb_status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="breadcrumb_status" value="Y" <?php if($content->breadcrumb_status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="breadcrumb_status" value="N" <?php if($content->breadcrumb_status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/contents/categories/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>