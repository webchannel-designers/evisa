<div class="full_w">

	<div class="h_title">Edit Company Details</div>	

	<?php echo form_open('admin/companies/edit/'.$company->comp_id.'/'.$return); ?>

	<input id="id" name="id" type="hidden" value="<?php echo $company->comp_id; ?>" />		

		<div class="element">

			<label for="name">Name <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->name; ?>" />

		</div>

		<div class="element">

			<label for="email">Email <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->email; ?>" />

		</div>
        <div class="element">

    <label for="address">Address

      <?php if(form_error('address')){ $err=' err'; echo form_error('address'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <textarea id="address" name="address" type="text" class="textarea<?php echo $err; ?>"><?php echo $company->addr; ?></textarea>

  </div>

   <div class="element">

			<label for="location">Choose Country <?php if(form_error('country')){ $err=' err'; echo form_error('country'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="country" id="country" class="text<?php echo $err; ?>">

            <option value="">----------Select-----------</option>

			<?php foreach($countries as $country): ?>

				<option value="<?php echo $country['id']; ?>" <?php if($company->country==$country['id']){ echo 'selected="selected"'; }?> ><?php echo $country['name']; ?></option>

			<?php endforeach; ?>

			</select>			<!--<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo set_value('email'); ?>" />-->

		</div>

		<div class="element">

			<label for="username">City <?php if(form_error('city')){ $err=' err'; echo form_error('city'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="city" name="city" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->city; ?>" />

		</div>
		<div class="element">

			<label for="phone">Phone <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->phone; ?>" />

		</div>
		<div class="element">

			<label for="phone">TRN <?php if(form_error('trn')){ $err=' err'; echo form_error('trn'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="trn" name="trn" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->trn; ?>" />

		</div>
		   <input type="hidden" name="roles_id" id="roles_id" value="2">
      <!--   <div class="element">

			<label for="location">Location <?php if(form_error('location')){ $err=' err'; echo form_error('location'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
			<select name="location" id="location" class="text<?php echo $err; ?>">

            <option value="">-----------Select-----------</option>

			<?php foreach($locations as $location): ?>

				<option value="<?php echo $location['id']; ?>" <?php if($company->location==$location['id']){ echo 'selected="selected"'; }?>><?php echo $location['title']; ?></option>

			<?php endforeach; ?>

			</select>			<!--<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->email; ?>" />-->

	<!-- 	</div>  -->

	<!-- 	<div class="element">

			<label for="username">Username <?php if(form_error('username')){ $err=' err'; echo form_error('username'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="username" name="username" type="text" class="text<?php echo $err; ?>" value="<?php echo $company->username; ?>" />

		</div> -->

        <!-- <div class="element">

			<label for="role">Role <?php if(form_error('roles_id')){ $err=' err'; echo form_error('roles_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="roles_id" id="roles_id" class="text<?php echo $err; ?>">

            <option value="">-----------Select-----------</option>

			<?php foreach($roles as $role): ?>

				<option value="<?php echo $role['roles_id']; ?>" <?php if($company->roles_id==$role['roles_id']){ echo 'selected="selected"'; }?>><?php echo $role['role']; ?></option>

			<?php endforeach; ?>

			</select>

		</div> -->

		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php if($company->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($company->status=='N'){ echo 'checked="checked"';} ?> /> Disabled

		</div>

		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/companies/lists/'.$return); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>

</div>