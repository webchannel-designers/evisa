<div class="full_w">

	<div class="h_title">Edit Addon</div>	

	<?php echo form_open_multipart('admin/addons/edit/'.$content->id.'/'.$return,array('id'=>'productfrm')); ?>

	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	
   <div class="element">

    <label for="category_id">Company

      <?php if(form_error('company_id')){ $err=' err'; echo form_error('company_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="company_id" id="company_id" class="text" >
    
    <option value="">Company</option>

      <?php foreach($companies as $comp): ?>

      <option value="<?php echo $comp['id']; ?>" <?php if($comp['id']==$content->company_id) echo "selected";?>><?php echo $comp['name']; ?></option>

      <?php endforeach; ?>

    </select>

  </div> 

		<div class="element">

			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->name; ?>" />

		</div>    
  
  <div class="element">

    <label for="price">Price (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('price')){ $err=' err'; echo form_error('price'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="price" name="price" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->price; ?>" />

  </div>
	

		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled

		</div>
  
		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/companies/lists'); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>
</div>
