<?php	
$slctwidget=array();
$jobwidgets=explode(',',$job->widgets);
foreach($jobwidgets as $jobwidget):
	   $currentwidgets = explode(":",$jobwidget);
	   $slctwidget[] = $currentwidgets[0];
endforeach;
$selectedwidget = implode(",",$slctwidget); 			
?>
<div class="full_w">
	<div class="h_title">Edit Job</div>	
	<?php echo form_open('admin/careers/edit/'.$job->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $job->id; ?>" />
		<div class="element">
			<label for="refno">Ref No. <?php if(form_error('refno')){ $err=' err'; echo form_error('refno'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="refno" name="refno" type="text" class="text<?php echo $err; ?>" value="<?php echo $job->refno; ?>" />
		</div>
		<div class="element">
			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $job->title; ?>" />
		</div>
		<div class="element">
			<label for="location">Location</label>
			<input id="location" name="location" type="text" class="text<?php echo $err; ?>" value="<?php echo $job->location; ?>" />
		</div>
        
        <div class="element">
			<label for="short_desc">Short Description</label>
			<textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo $job->short_desc; ?></textarea>
		</div>
        
		<div class="element">
			<label for="desc">Description</label>
			<?php echo $this->ckeditor->editor("desc",$job->desc); ?>
		</div>	
        
        <div class="element">
			<label for="slug">Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $job->slug; ?>" />
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
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($job->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($job->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/careers/jobs'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>