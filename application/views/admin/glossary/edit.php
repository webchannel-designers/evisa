<div class="full_w">
	<div class="h_title">Edit Glossary</div>	
	<?php echo form_open('admin/glossary/edit/'.$glossary->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $glossary->id; ?>" />	
		<div class="element">
			<label for="question">Question (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('question')){ $err=' err'; echo form_error('question'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="question" name="question" type="text" class="text<?php echo $err; ?>" value="<?php echo $glossary->question; ?>" />
		</div>
		<div class="element">
			<label for="answer">Answer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('answer')){ $err=' err'; echo form_error('answer'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("answer",$glossary->answer); ?>
		</div>				
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($glossary->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($glossary->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/glossary/lists'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>