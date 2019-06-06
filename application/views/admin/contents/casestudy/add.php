<div class="full_w">
	<div class="h_title">Add New Questionnaire</div>	
	<?php echo form_open('admin/contents/addquestionnaire/'.$cid.'/'.$return); ?>
		<div class="element">
			<label for="category_id">Case Study <span> (required)</span></label>
			<?php echo $casestudy?>
		</div>
		<div class="element">
			<label for="title">Question (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('question')){ $err=' err'; echo form_error('question'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('question'); ?>" />
		</div>
		<div class="element">
			<label for="description">Answer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('answer')){ $err=' err'; echo form_error('answer'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("description",html_entity_decode(set_value('description'))); ?>
		</div>		
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/contents/listquestionnaire/'.$cid.'/'.$return); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>