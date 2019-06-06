<?php	

$slctwidget=array();

$contentwidgets=explode(',',$content->widgets);

foreach($contentwidgets as $contentwidget):

	   $currentwidgets = explode(":",$contentwidget);

	   $slctwidget[] = $currentwidgets[0];

endforeach;

$selectedwidget = implode(",",$slctwidget); 			

?>

<div class="full_w">

	<div class="h_title">Edit Content</div>	

	<?php echo form_open_multipart('admin/products/edit/'.$content->id.'/'.$return); ?>

	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	

		<div class="element">

			<label for="category_id">Category <?php if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="category_id" id="category_id" class="text">

			<?php foreach($contentcats as $contentcat): ?>

				<option value="<?php echo $contentcat['id']; ?>" <?php if($content->category_id==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>

			<?php endforeach; ?>

			</select>

		</div>
        
        <div class="element">

    <label for="category_id">Type

      <?php if(form_error('type_id')){ $err=' err'; echo form_error('type_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="type_id" id="type_id" class="text">
    
    <option value="used" <?php if($content->type=="used") { ?> selected="selected"<?php } ?>>Used</option>
    
    <option value="new" <?php if($content->type=="new") { ?> selected="selected"<?php } ?>>New</option>

    </select>

  </div>

		<div class="element">

			<label for="title">Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('title')){ $err=' err'; echo form_error('title'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="title" name="title" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->title; ?>" />

		</div>
        
          <div class="element">

    <label for="make_id">Makes

      <?php if(form_error('make_id')){ $err=' err'; echo form_error('make_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="make_id" id="make_id" class="text" onchange="load_model(this.value,'');">
    <option value="">Make</option>

      <?php foreach($makes as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>" <?php if($content->make_id == $contentcat['id']) { ?> selected="selected"<?php } ?>><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>
  
  <div class="element">

    <label for="model_id">Model

      <?php if(form_error('model_id')){ $err=' err'; echo form_error('model_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="model_id" id="model_id" class="text">
      <option value="">Model</option>

    </select>

  </div>
  
  <div class="element">

    <label for="location_id">City

      <?php if(form_error('location_id')){ $err=' err'; echo form_error('location_id'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <select name="location_id" id="location_id" class="text">
      <option value="">City</option>
      <?php foreach($locations as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>"  <?php if($content->location_id == $contentcat['id']) { ?> selected="selected"<?php } ?>><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>

    </select>

  </div>
  
  <div class="element">

    <label for="kilometer">Kilometer (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('kilometer')){ $err=' err'; echo form_error('kilometer'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="kilometer" name="kilometer" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->kilometer; ?>" />

  </div>
  
  <div class="element">

    <label for="engine">Engine (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('engine')){ $err=' err'; echo form_error('engine'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="engine" name="engine" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->engine; ?>" />

  </div>
  
  <div class="element">

    <label for="fuel">Fuel (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('fuel')){ $err=' err'; echo form_error('fuel'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="fuel" name="fuel" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->fuel_type; ?>" />

  </div>
  
  <div class="element">

    <label for="color">Color (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('color')){ $err=' err'; echo form_error('color'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="color" name="color" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->color; ?>" />

  </div>
  
  <div class="element">

    <label for="transmission">Transmission (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('transmission')){ $err=' err'; echo form_error('transmission'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="transmission" name="transmission" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->transmission; ?>" />

  </div>
  
  <div class="element">

    <label for="steering">Steering (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('steering')){ $err=' err'; echo form_error('steering'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="steering" name="steering" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->steering_wheel; ?>" />

  </div>
  
  <div class="element">

    <label for="drive">Drive (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('drive')){ $err=' err'; echo form_error('drive'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="drive" name="drive" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->drive_type; ?>" />

  </div>
  
  <div class="element">

    <label for="condition">Condition (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)

      <?php if(form_error('condition')){ $err=' err'; echo form_error('condition'); } else { $err=''; ?>

      <span> (required)</span>

      <?php } ?>

    </label>

    <input id="condition" name="condition" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->condition; ?>" />

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

			<label for="slug">URL Slug (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input id="slug" name="slug" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />

		</div>		

		<div class="element">

			<label for="short_desc">Short Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('keywords')){ $err=' err'; echo form_error('short_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<textarea id="short_desc" name="short_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo $content->short_desc; ?></textarea>

		</div>

        <div class="element">

			<label for="meta_desc">Meta Description (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('meta_desc')){ $err=' err'; echo form_error('meta_desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<textarea id="meta_desc" name="meta_desc" type="text" class="textarea<?php echo $err; ?>"><?php echo $content->meta_desc; ?></textarea>

		</div>

         <div class="element">

			<label for="keywords">Keywords (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)<?php if(form_error('keywords')){ $err=' err'; echo form_error('keywords'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<textarea id="keywords" name="keywords" type="text" class="textarea<?php echo $err; ?>"><?php echo $content->keywords; ?></textarea>

		</div>

		<div class="element">

			<label for="desc">Description (Specification) (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('desc')){ $err=' err'; echo form_error('desc'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<?php echo $this->ckeditor->editor("desc",$content->desc); ?>

		</div>	
        
        <div class="element">

			<label for="feat">Description (Features) (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) <?php if(form_error('feat')){ $err=' err'; echo form_error('feat'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<?php echo $this->ckeditor->editor("feat",$content->feat); ?>

		</div>
         <div class="element">

    <label for="image">Posted Date </label>

    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php if($content->date_time) echo date("d-m-Y h:i:a", strtotime($content->date_time)); ?>" />

  </div>

  <div class="element">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->image; ?></label>

    <input type="file" name="image" />

  </div>

         <div class="element">

			<label for="attach_title">Banner Text (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>

			<input id="attach_title" name="banner_text" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->banner_text; ?>" />

		</div>

		<div class="element">

			<label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)  - <?php echo $content->banner_image; ?></label>

			<input type="file" name="banner_image" />

		</div>	

         <div class="element">

			<label for="widgets">Widget Type <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<select name="widgets[]" id="widgets" class="text" multiple="multiple">

			<?php		

			   foreach($widgets as $widget): 			     

				 

			   ?>

				<option value="<?php echo $widget['id']; ?>" <?php $selectedwidgets=explode(',',$selectedwidget); if(in_array($widget['id'],$selectedwidgets)){ echo 'selected="selected"'; } ?>><?php echo $widget['title'];?></option>

			<?php endforeach; ?>

			</select>

		</div>		

        

		<div class="element">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled

		</div>
        
		<div class="element">

			<label for="featured">Featured <?php if(form_error('featured')){ $err=' err'; echo form_error('featured'); } else { $err=''; ?><span> (required)</span><?php } ?></label>

			<input type="radio" name="featured" value="Y" <?php if($content->featured=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="featured" value="N" <?php if($content->featured=='N'){ echo 'checked="checked"';} ?> /> Disabled

		</div>
		<div class="entry">

			<button type="submit" class="add">Save</button><a class="button cancel" href="<?php echo site_url('admin/products/lists'); ?>">Cancel</a>

		</div>

	<?php echo form_close(); ?>

</div>

<script language="javascript" type="text/javascript">
load_model('<?php echo $content->make_id; ?>','<?php echo $content->model_id; ?>');
function load_model(va,va2)

{

	var dataString = new Object();

	dataString = "make="+va+"&model="+va2;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('admin/products/load_model/'); ?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#model_id').html(msg);

		}, error: function(){ alert('Error while request..'); }

	});

}

</script>
