<div class="full_w">

	<div class="h_title">Add New Job</div>	

	<?php echo form_open('admin/careers/add'); ?>

		<div class="element">

			<label for="refno">Ref No. <?php if(form_error('refno')){ $err=' err'; echo form_error('refno'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="refno" name="refno" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('refno'); ?>" />

		</div>

		<div class="element">

			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('title'); ?>" />

		</div>
        
        <div class="element">

			<label for="category">Category (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('category')){ $err=' err'; echo form_error('category'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<!--<input id="category" name="category" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('category'); ?>" />-->
            <select name="category" style="width: 200px;">
            <option value="">Job Category</option>
            <?php
			foreach($category as $item)
			{
			?>
            <option value="<?php echo $item['id']; ?>"><?php echo $item['type'] ?></option>
            <?php
			}
			?>
            </select>

		</div>

		<div class="element">

			<label for="location">Location (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('location')){ $err=' err'; echo form_error('location'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<!--<input id="location" name="location" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('location'); ?>" />-->
            
            <select name="location" style="width: 200px;">
            <option value="">Job Location</option>
            <?php
			foreach($locations as $item)
			{
			?>
            <option value="<?php echo $item['id']; ?>"><?php echo $item['title'] ?></option>
            <?php
			}
			?>
            </select>

		</div>

		<div class="element">

    		<label for="image">Expiry Date </label>

    		<input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php echo @set_value('date_time'); ?>" />

  		</div>
        <div class="element">

			<label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('short_desc')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('short_desc'); ?></textarea>

		</div>

        

		<div class="element">

			<label for="desc">Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<?php echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?>

		</div>

        <div class="element" >

			<label for="widgets">Widget Type <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="widgets[]" id="widgets" class="text" multiple="multiple">

			<?php foreach($widgets as $widget): ?>

				<option value="<?php echo $widget['id']; ?>" <?php echo set_select('widgets', $widget['id']); ?>><?php echo $widget['title']; ?></option>

			<?php endforeach; ?>

			</select>

		</div>    		

		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled

		</div>

		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/careers/jobs'); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>

</div>