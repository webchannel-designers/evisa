<div class="full_w">
	<div class="h_title">Edit Questionnaire</div>	
	<?php echo form_open('admin/contents/editquestionnaire/'.$faq->qid.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $faq->qid; ?>" />	
		<div class="element">
			<label for="category_id">Case Study </label>
            <?php echo $casestudy?>
		<input type="hidden" name="content_id" value="<?php echo $faq->content_id?>" />
		</div>
		<div class="element">
			<label for="title">Question (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('question')){ $err=' err'; echo form_error('question'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $faq->title; ?>" />
		</div>
		<div class="element">
			<label for="description">Answer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('answer')){ $err=' err'; echo form_error('answer'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("description",$faq->description); ?>
		</div>				
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($faq->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($faq->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/contents/listquestionnaire'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>