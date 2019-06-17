<div class="full_w">

	<div class="h_title">Add Company</div>	

	<?php echo form_open('admin/companies/add'); ?>

		<div class="element">

			<label for="name">Name <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('name'); ?>" />

		</div>

		<div class="element">

			<label for="email">Email <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('email'); ?>" />

		</div>
		<div class="element">

    <label for="address">Address

      <?php if(form_error('address')){ $err=' err'; echo form_error('address'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <textarea id="address" name="address" type="text" class="textarea<?php echo $err; ?>"><?php echo set_value('address'); ?></textarea>

  </div>
  <div class="element">

			<label for="location">Choose Country <?php if(form_error('country')){ $err=' err'; echo form_error('country'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="country" id="country" class="text<?php echo $err; ?>">

            <option value="">----------Select-----------</option>

			<?php foreach($countries as $country): ?>

				<option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>

			<?php endforeach; ?>

			</select>			<!--<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('email'); ?>" />-->

		</div>
        
        	<div class="element">

			<label for="username">City <?php if(form_error('city')){ $err=' err'; echo form_error('city'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="city" name="city" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('city'); ?>" />

		</div>
			<div class="element">

			<label for="phone">Phone <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('phone'); ?>" />

		</div>
		<div class="element">

			<label for="phone">TRN <?php if(form_error('trn')){ $err=' err'; echo form_error('trn'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="trn" name="trn" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('trn'); ?>" />

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

 <!--        <div class="element">

			<label for="role">Role <?php if(form_error('roles_id')){ $err=' err'; echo form_error('roles_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="roles_id" id="roles_id" class="text<?php echo $err; ?>">

            <option value="">----------Select-----------</option>

			<?php foreach($roles as $role): ?>

				<option value="<?php echo $role['roles_id']; ?>"><?php echo $role['role']; ?></option>

			<?php endforeach; ?>

			</select>

		</div> -->
       <input type="hidden" name="roles_id" id="roles_id" value="2">
		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php echo set_radio('status', 'Y', TRUE); ?> /> Enabled <input type="radio" name="status" value="N" <?php echo set_radio('status', 'N'); ?> /> Disabled

		</div>

		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/users/lists'); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>

</div>