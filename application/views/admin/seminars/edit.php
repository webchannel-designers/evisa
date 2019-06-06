<div class="full_w">
	<div class="h_title"><?php echo $subhead; ?></div>	
	<?php echo form_open('admin/seminars/edit/'.$seminartype.'/'.$seminar->id.'/'.$return); ?>
		<input id="id" name="id" type="hidden" value="<?php echo $seminar->id; ?>" />	
		<input type="hidden" id="seminar_type" name="seminar_type" value="<?php echo $seminartype; ?>" />
		<div class="element">
			<label for="name">Topic (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $seminar->name; ?>" />
		</div>
		<div class="element">
			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("desc",html_entity_decode($seminar->desc)); ?>
		</div>
		<div class="element">
			<label for="url">Register URL (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('url')){ $err=' err'; echo form_error('url'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="url" name="url" type="text" class="text<?php echo $err; ?>" value="<?php echo $seminar->url; ?>" />
		</div>
		<div class="element">
			<label for="seminar_date">Date <?php if(form_error('seminar_date')){ $err=' err'; echo form_error('seminar_date'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="seminar_date" name="seminar_date" readonly="readonly" type="text" class="datepicker text<?php echo $err; ?>" value="<?php echo date('d-m-Y h:i a',strtotime($seminar->seminar_date)); ?>" />
		</div>
		<div class="element">
			<label for="archive">Archive Status <?php if(form_error('archive')){ $err=' err'; echo form_error('archive'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="archive" value="Y" <?php if($seminar->archive=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="archive" value="N" <?php if($seminar->archive=='N'){ echo 'checked="checked"';} ?>/> Disabled
		</div>
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($seminar->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N"<?php if($seminar->status=='N'){ echo 'checked="checked"';} ?>/> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/seminars/lists/'.$seminartype.'/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>