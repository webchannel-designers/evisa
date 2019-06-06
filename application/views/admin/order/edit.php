<div class="full_w">

  <div class="h_title">View Order</div>

  <?php echo form_open_multipart('admin/orders/edit/'.$gallery->order_id.'/'.$return); ?>

  <input id="id" name="id" type="hidden" value="<?php echo $gallery->order_id; ?>" />
<?php //print_r($gallery);exit; ?>
  <div class="element">

    <label for="category">Order Date

      <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?>

      

      <?php } ?>

    </label>

    <?php /*?><select name="category_id" id="category_id" class="text">

      <option value="">Select</option>

      <?php foreach($categories as $category): ?>

      <option value="<?php echo $category['id']; ?>" <?php if($gallery->category_id==$category['id']){echo ' selected="selected"';} ?>><?php echo $category['title']; ?></option>

      <?php endforeach; ?>

    </select><?php */?>
    
    <?php echo $gallery->order_date; ?>

  </div>

  <div class="element">

    <label for="title">Applicant Nationality (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else $err='';  ?>

    </label>

    <?php $nationality=$this->countries_model->load($gallery->applicant_nationality); /*?><input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->title; ?>" /><?php */?>
<?php echo $nationality->name; ?>
  </div>
  
	<!--<div class="element">

    <label for="designation">Residing Country (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php $country=$this->countries_model->load($gallery->residing_country); /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $country->name; ?>
  </div>-->  
  
  <!--<div class="element">

    <label for="designation">Travel Date (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>

  </div>-->
  
  <div class="element">

    <label for="designation">Visa Type (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php $visa=$this->services_model->load($gallery->visa_type); /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo strip_tags($visa->title); ?>
  </div>
  
  <div class="element">

    <label for="designation">Number of visas (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $gallery->no_of_visas; ?>
  </div>
  
  <div class="element">

    <label for="designation">Order Total (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $gallery->order_total; ?>
  </div>
  
  <div class="element">

    <label for="designation">Vat Amount (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $gallery->vat_amount; ?>
  </div>
  
  <div class="element">

    <label for="designation">Vat Percentage (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $gallery->vat_percentage; ?>
  </div>
  
  <?php /*?><div class="element">

    <label for="designation">Local Guarantee (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>


  </div><?php */?>
  
  <div class="element">

    <label for="designation">Order Status (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>
<?php echo $gallery->order_status; ?>
  </div>
  
  <div class="element">

    <label for="designation">Payment Status (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>

  </div>
  
  <div class="element">

    <label for="designation">Transaction Reference Number (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>

  </div>
  
  <div class="element">

    <label for="designation">Payment Response (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('designation')){ $err=' err'; echo form_error('designation'); } else $err='';  ?>

    </label>

    <?php /*?><input id="designation" name="designation" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->designation; ?>" /><?php */?>

  </div>
  
  
  
  <?php /*?><div class="element">

    <label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else $err='';  ?>

    </label>
	<textarea id="desc" name="desc" style="width:100%; height:100px;"><?php echo $gallery->desc; ?></textarea>
    <!--<input id="desc" name="desc" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->desc; ?>" />-->

  </div><?php */?>
  
  <?php /*?><div class="element">

			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $gallery->slug; ?>" />

		</div><?php */?>

  <?php /*?><div class="element">

    <label for="image">Photo (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $gallery->image; ?></label>

    <input type="file" name="image" />

  </div><?php */?>

  <?php /*?><div class="element">

    <label for="status">Status

      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input type="radio" name="status" value="Y" <?php if($gallery->status=='Y'){ echo 'checked="checked"';} ?> />

    Enabled

    <input type="radio" name="status" value="N" <?php if($gallery->status=='N'){ echo 'checked="checked"';} ?> />

    Disabled </div><?php */?>

  <div class="entry">

    <button type="submit" class="add">Save</button>

    <a class="button cancel" href="<?php echo site_url('admin/orders/lists'.'/'.$return); ?>">Cancel</a> </div>

  <?php echo form_close(); ?> 

</div>
<?php if($gallery->gname!="") { ?>
<div class="section">

<div class="container">
<table class="table table-striped">

    <thead>
    <tr><td colspan="3"><h3>Guarantor Details</h3></td></tr>
      <tr>
        <th>Guarantor Name</th>
        <th>Mobile</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $gallery->gname; ?></td>
        <td><?php echo $gallery->gphone; ?></td>
        <td><?php echo $gallery->gemail; ?></td>
      </tr>
      
    </tbody>
  </table>
</div>

</div>
<?php } ?>

<?php if(count($details)>0) { ?>
<div class="section">

<div class="container">
<table class="table table-striped">

    <thead>
    <tr><td colspan="3"><h3>Order Details</h3></td></tr>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Passport</th>
        <th>Photo</th>
        <th>Lead</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($details as $item) { ?>
      <tr>
        <td><?php echo $item['applicant_firstname']; ?></td>
        <td><?php echo $item['applicant_lastname']; ?></td>
        <td><?php echo $item['email']; ?></td>
        <td><?php echo $item['contact_number']; ?></td>
        <td><img src="<?php echo base_url('public/uploads/visa/'.$item['passport_copy']); ?>" width="150" height="100" /></td>
        <td><img src="<?php echo base_url('public/uploads/visa/'.$item['photo_copy']); ?>" width="150" height="100" /></td>
        <td><?php echo $item['is_lead_applicant']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</div>

<?php } ?>

