<div class="full_w">
	<div class="h_title">Edit Student</div>	
	<?php echo form_open('admin/students/edit/'.$student->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $student->id; ?>" />		
		<div class="element">
			<label for="fname">First Name <?php if(form_error('fname')){ $err=' err'; echo form_error('fname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="fname" name="fname" type="text" class="text<?php echo $err; ?>" value="<?php echo $student->first_name; ?>" />
		</div>
        <div class="element">
			<label for="lname">Last Name <?php if(form_error('lname')){ $err=' err'; echo form_error('lname'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="lname" name="lname" type="text" class="text<?php echo $err; ?>" value="<?php echo $student->last_name; ?>" />
		</div>
		<div class="element">
			<label for="email">Email <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $student->email; ?>" />
		</div>
		<div class="element">
			<label for="username">Username <?php if(form_error('username')){ $err=' err'; echo form_error('username'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="username" name="username" type="text" class="text<?php echo $err; ?>" value="<?php echo $student->username; ?>" />
		</div>
        
        <div class="element" >
			<label for="utype">User Type <?php if(form_error('utype')){ $err=' err'; echo form_error('utype'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <select name="utype" style="width:100%">
            <option value="S" <?php if($student->user_type=="S") { echo "selected=selected"; } ?>>Student</option>
            <option value="F" <?php if($student->user_type=="F") { echo "selected=selected"; } ?>>Faculty</option>
            </select>
			<!--<input id="username" name="username" type="text" class="text<?php //echo $err; ?>" value="<?php //echo set_value('status'); ?>" />-->
		</div>
		
         <div class="element">
			<label for="courses">Courses<?php if(form_error('courses')){ $err=' err'; echo form_error('courses'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
            <select name="courses" style="width:100%">
            <option value="">Select</option>
            <?php
			foreach($courses as $course)
			{
			?>
		<option  value="<?php echo $course['id']; ?>" <?php if(@$student->course==$course['id']) {  echo "selected=selected"; } else {  echo ""; } ?>><?php echo $course['name']; ?></option>
			
			<?php
			}
			?>
            </select>
		</div>
        <div class="element">
			<label for="demo1">Year Admitted <?php if(form_error('year')){ $err=' err'; echo form_error('year'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="demo1" name="demo1" type="text" class="text<?php echo $err; ?>" value="<?php echo $student->year_admitted; ?>"  style="margin-right: 4px; width: 843px !important;"/><img src="<?php echo base_url('public/admin/images/cal.gif') ?>" onClick="javascript:NewCssCal('demo1','yyyyMMdd','','','','','past')"  style="cursor:pointer"/>
		</div>
         <div class="element">
			<label for="semester">Semester <?php if(form_error('semester')){ $err=' err'; echo form_error('semester'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			 <select name="semester" class="text<?php echo $err; ?>">
            <option value="">Select</option>
<option value="1" <?php if($student->semester==1) { echo "selected=selected"; }?>>Semester 1</option>
<option value="2" <?php if($student->semester==2) { echo "selected=selected"; }?>>Semester 2</option>
<option value="3" <?php if($student->semester==3) { echo "selected=selected"; }?>>Semester 3</option>
<option value="4" <?php if($student->semester==4) { echo "selected=selected"; }?>>Semester 4</option>
<option value="5" <?php if($student->semester==5) { echo "selected=selected"; }?>>Semester 5</option>
<option value="6" <?php if($student->semester==6) { echo "selected=selected"; }?>>Semester 6</option>
<option value="7" <?php if($student->semester==7) { echo "selected=selected"; }?>>Semester 7</option>
<option value="8" <?php if($student->semester==8) { echo "selected=selected"; }?>>Semester 8</option>
			
</select>
		</div>
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($student->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($student->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/users/lists/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>