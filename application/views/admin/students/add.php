<div class="full_w">
	<div class="h_title">Add New Student</div>	
	<?php echo form_open('admin/students/add'); ?>
<input id="utype" name="utype" type="hidden" value="S"/>
		<div class="element">
			<label for="fname">First Name <?php if(form_error('fname')){ $err=' err'; echo form_error('fname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="fname" name="fname" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('fname'); ?>" />
		</div>
        <div class="element">
			<label for="lname">Last Name <?php if(form_error('lname')){ $err=' err'; echo form_error('lname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="lname" name="lname" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('lname'); ?>" />
		</div>
		<div class="element">
			<label for="email">Email <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('email'); ?>" />
		</div>
		<div class="element">
			<label for="username">Username <?php if(form_error('username')){ $err=' err'; echo form_error('username'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="username" name="username" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('username'); ?>" />
		</div>
        
        
		<div class="element">
			<label for="password">Password <?php if(form_error('password')){ $err=' err'; echo form_error('password'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="password" name="password" type="password" class="text<?php echo $err; ?>" value="<?php echo set_value('password'); ?>" />
		</div>
		<div class="element">
			<label for="passwordconf">Confirm password <?php if(form_error('passwordconf')){ $err=' err'; echo form_error('passwordconf'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="passwordconf" name="passwordconf" type="password" class="text<?php echo $err; ?>" value="<?php echo set_value('passwordconf'); ?>" />
		</div>
         <div class="element">
			<label for="courses">Courses<?php if(form_error('courses')){ $err=' err'; echo form_error('courses'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <select name="courses" style="width:100%">
            <option value="">Select</option>
            <?php
			foreach($courses as $course)
			{
			?>
		<option  value="<?php echo $course['id']; ?>" <?php if(set_value('courses')==$course['id']) {  echo "selected=selected"; } else {  echo ""; } ?>><?php echo $course['name']; ?></option>
			
			<?php
			}
			?>
            </select>
		</div>
        <div class="element">
			<label for="demo1">Year Admitted <?php if(form_error('year')){ $err=' err'; echo form_error('year'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="demo1" name="demo1" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('demo1'); ?>"  style="margin-right: 4px; width: 843px !important;"/><img src="<?php echo base_url('public/admin/images/cal.gif') ?>" onClick="javascript:NewCssCal('demo1','yyyyMMdd','','','','','past')"  style="cursor:pointer"/>
		</div>
         <div class="element">
			<label for="semester">Semester <?php if(form_error('semester')){ $err=' err'; echo form_error('semester'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <select name="semester" class="text<?php echo $err; ?>">
            <option value="">Select</option>
<option value="1" <?php if(set_value('semester')==1) { echo "selected=selected"; }?>>Semester 1</option>
<option value="2" <?php if(set_value('semester')==2) { echo "selected=selected"; }?>>Semester 2</option>
<option value="3" <?php if(set_value('semester')==3) { echo "selected=selected"; }?>>Semester 3</option>
<option value="4" <?php if(set_value('semester')==4) { echo "selected=selected"; }?>>Semester 4</option>
<option value="5" <?php if(set_value('semester')==5) { echo "selected=selected"; }?>>Semester 5</option>
<option value="6" <?php if(set_value('semester')==6) { echo "selected=selected"; }?>>Semester 6</option>
<option value="7" <?php if(set_value('semester')==7) { echo "selected=selected"; }?>>Semester 7</option>
<option value="8" <?php if(set_value('semester')==8) { echo "selected=selected"; }?>>Semester 8</option>
			
</select>
		</div>
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/students/lists'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>