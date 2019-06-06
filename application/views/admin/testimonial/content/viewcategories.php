<div class="full_w">
  <div class="h_title">Manage Brands- Categoris</div>
  <div class="entry"> 
    <a class="button" href="<?php echo site_url('admin/brands/lists'); ?>">Back</a>
  </div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/brands/catactions/'); ?> 
	<input name="brandid" type="hidden" value="<?php echo $brandid; ?>" />	
  <table  width="100%">
    <thead>
      <tr>
         <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Title</th>   
        <th scope="col" align="center"> Slug</th>  
        <th scope="col" align="center">  Title</th>
        <th scope="col" align="center">Sort Order</th>
      </tr>
    </thead>
    <tbody>
      <?php  if($contents)	foreach($contents as $i => $content): ?>
      <tr>
         <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo  $content['name']  ?></td> 
        <td><?php echo  $content['catslug']  ?></td> 
        <td><input  name="category_title[<?php echo $content['category_id']?>]" type="text" class="text" value="<?php echo  $content['category_title'] ? $content['category_title'] : set_value('category_title')  ?>" /></td> 
        <td><input  name="sort_order[<?php echo $content['category_id']?>]" type="text" class="text" value="<?php echo  $content['category_order'] ? $content['category_order'] : set_value('sort_order')  ?>" /></td> 
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  	<div class="entry" align="center"> 
		<?php
	if($contents){
?>	<button type="submit" class="Save">Save</button> <?php
	}
?> <a class="button" href="<?php echo site_url('admin/brands/lists'); ?>">Cancel</a>
		</div> 
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div> </div>
</div>