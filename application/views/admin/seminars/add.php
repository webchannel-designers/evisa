<div class="full_w">
	<div class="h_title"><?php echo $subhead; ?></div>	
	<?php echo form_open('admin/seminars/add/'.$seminartype); ?>
		<input type="hidden" id="seminar_type" name="seminar_type" value="<?php echo $seminartype; ?>" />
		<div class="element">
			<label for="name">Topic (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('name'); ?>" />
		</div>
		<div class="element">
			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?>
		</div>
		<div class="element">
			<label for="url">Register URL (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('url')){ $err=' err'; echo form_error('url'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="url" name="url" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('url'); ?>" />
		</div>
		<div class="element">
			<label for="seminar_date">Date <?php if(form_error('seminar_date')){ $err=' err'; echo form_error('seminar_date'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="seminar_date" name="seminar_date" readonly="readonly" type="text" class="datepicker text<?php echo $err; ?>" value="<?php echo set_value('seminar_date'); ?>" />
		</div>
		<div class="element">
			<label for="archive">Archive Status <?php if(form_error('archive')){ $err=' err'; echo form_error('archive'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="archive" value="Y" <?php echo set_radio('archive', 'Y'); ?> /> Enabled <input type="radio" name="archive" value="N" <?php echo set_radio('archive', 'N',TRUE); ?> /> Disabled
		</div>
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/seminars/lists'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>