<div class="full_w">
	<div class="h_title">Edit Faq</div>	
	<?php echo form_open('admin/faqs/edit/'.$faq->id.'/'.$return); ?>
	<input id="id" name="id" type="hidden" value="<?php echo $faq->id; ?>" />	
		<div class="element">
			<label for="category_id">Category <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="category_id" id="category_id" class="text">
			<?php foreach($faqcats as $faqcat): ?>
				<option value="<?php echo $faqcat['id']; ?>" <?php if($faq->category_id==$faqcat['id']){ echo 'selected="selected"'; }?>><?php echo $faqcat['name']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<div class="element">
			<label for="question">Question (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('question')){ $err=' err'; echo form_error('question'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input id="question" name="question" type="text" class="text<?php echo $err; ?>" value="<?php echo $faq->question; ?>" />
		</div>
		<div class="element">
			<label for="answer">Answer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('answer')){ $err=' err'; echo form_error('answer'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<?php echo $this->ckeditor->editor("answer",$faq->answer); ?>
		</div>				
		<div class="element">
			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<input type="radio" name="status" value="Y" <?php if($faq->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($faq->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
		</div>
		<div class="entry">
			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/faqs/lists'); ?>">Cancel</a>
		</div>
	<?php echo form_close(); ?>
</div>