<?php
$activearr=array('Y'=>'Active','N'=>'Inactive');
if($this->uri->segment(4)==""){
	$i=0;
	$return=0;
}else{
	$i=$this->uri->segment(4); 
	$return=$this->uri->segment(4); 
}
?>
<div class="full_w">
  <div class="h_title">Manage Brands- List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/brands/actions'); ?>
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Enable" />
    <input class="button" type="submit" name="disable" value="Disable" />
	<input class="button" type="submit" name="featured" value="Featured" />
     <input class="button" type="submit" name="unfeatured" value="UnFeatured" />
     <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <div style="float:right;"> Sort :
      <select name="sortby" >
        <option value="">Select</option>
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('sort_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="orderby" >
        <option value="">Select</option>
        <?php foreach($sortorders as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('order_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      Category :
      <select name="category" >
        <option value="">Select</option>
        <?php foreach($contentcats as $contentcat): ?>
        <option value="<?php echo $contentcat['id']; ?>" <?php if($this->session->userdata('content_category_id')==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
        <?php endforeach; ?>
      </select>
      Search :
      <input type="text" name="keyword" value="<?php echo $this->session->userdata('content_key'); ?>" />
      <select name="field" >
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('content_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <input class="button" type="submit" name="search" value="Search"  />
      <input class="button" type="submit" name="reset" value="Reset" />
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Title</th>
        <th scope="col" style="width: 100px;">Sort Order
          <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
        <th scope="col">Categories</th>
        <th scope="col">Status</th>
        <th scope="col">Featured</th>
        <th scope="col">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		foreach($contents as $content): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $content['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo substr($content['title'],0,100); ?></td>
        <td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $content['id']; ?>]" value="<?php echo $content['sort_order']; ?>" /></td>
        <td align="center"><a href="<?php echo site_url('admin/brands/viewcategories/'.$content['id'].'/'.$return); ?>" class="button" title="Categories">View</a></td>
        <td><?php echo $activearr[$content['status']]; ?></td>
        <td><?php echo $activearr[$content['featured']]; ?></td>
        <td><a href="<?php echo site_url('admin/brands/edit/'.$content['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/brands/delete/'.$content['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <a class="button add" href="<?php echo site_url('admin/brands/add'); ?>">Add Files</a> </div>
</div>