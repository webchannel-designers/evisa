<div class="full_w">

	<div class="h_title">Configuration</div>	

	<?php echo form_open_multipart('admin/companies/add_configuration'); ?>
       <div class="element">

			<label for="role">Company <?php if(form_error('roles_id')){ $err=' err'; echo form_error('roles_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="company_id" id="company_id" class="text<?php echo $err; ?>">

            <option value="">Select</option>

			<?php foreach($companies as $comp): ?>

				<option value="<?php echo $comp['id']; ?>"><?php echo $comp['name']; ?></option>

			<?php endforeach; ?>

			</select>

		<div class="element">

			<label for="name">Header Color <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="head_color" name="head_color" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('head_color'); ?>" />

		</div>

		<div class="element">

			<label for="name">Footer  Color <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="footer_color" name="footer_color" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('footer_color'); ?>" />

		</div>
		<div class="element">

          <label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

         <input type="file" name="banner_image" />

        </div>

	<div class="element">

    <label for="desc">Banner Message (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('banner_message')){ $err=' err'; echo form_error('banner_message'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("banner_message",html_entity_decode(set_value('banner_message'))); ?> </div>

     <div class="element">

    <label for="desc">Terms And Conditions (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('terms')){ $err=' err'; echo form_error('terms'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <?php echo $this->ckeditor->editor("terms",html_entity_decode(set_value('terms'))); ?> </div>

       
		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled

		</div>

		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/users/lists'); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>

</div>