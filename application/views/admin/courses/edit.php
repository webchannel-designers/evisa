<div class="full_w">
	<div class="h_title">Edit Courses</div>	
	<?php echo form_open('admin/courses/edit/'.$courses->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $courses->id; ?>" />
		<div class="element">
			<label for="name">Name <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $courses->name; ?>" />
		</div>
				<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($courses->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($courses->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/courses/lists/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>