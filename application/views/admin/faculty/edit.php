<div class="full_w">
	<div class="h_title">Edit Faculty</div>	
	<?php echo form_open('admin/faculty/edit/'.$facu->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $facu->id; ?>" />		
<input id="utype" name="utype" type="hidden" value="F"/>
		<div class="element">
			<label for="fname">First Name <?php if(form_error('fname')){ $err=' err'; echo form_error('fname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="fname" name="fname" type="text" class="text<?php echo $err; ?>" value="<?php echo $facu->first_name; ?>" />
		</div>
        <div class="element">
			<label for="lname">Last Name <?php if(form_error('lname')){ $err=' err'; echo form_error('lname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="lname" name="lname" type="text" class="text<?php echo $err; ?>" value="<?php echo $facu->last_name; ?>" />
		</div>
		<div class="element">
			<label for="email">Email <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $facu->email; ?>" />
		</div>
		<div class="element">
			<label for="username">Username <?php if(form_error('username')){ $err=' err'; echo form_error('username'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="username" name="username" type="text" class="text<?php echo $err; ?>" value="<?php echo $facu->username; ?>" />
		</div>
        
       
        
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($facu->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($facu->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/users/lists/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>