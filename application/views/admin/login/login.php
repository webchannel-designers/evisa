<?php echo form_open('admin/login'); ?>
	<span class="validation_error"><?php echo form_error('login'); ?></span><label for="login">Username:</label>
	<input id="login" name="login" class="text" />
	<span class="validation_error"><?php echo form_error('pass'); ?></span><label for="pass">Password:</label>
	<input id="pass" name="pass" type="password" class="text" />
	<label for="language">Language:</label>
	<select name="language" class="text">
	<?php foreach($langs as $lang): ?>
		<option value="<?php echo $lang['code']; ?>"><?php echo $lang['name']; ?></option>
	<?php endforeach; ?>
	</select>
	<div class="sep"></div>
	<button type="submit" class="ok">Login</button> <a class="button" href="<?php echo site_url('admin/login/forgot'); ?>">Forgotten password?</a>
<?php echo form_close(); ?>
