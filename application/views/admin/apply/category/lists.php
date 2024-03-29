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
  <div class="h_title">Manage Content Category - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/contents/categoryactions'); ?>
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Enable" />
    <input class="button" type="submit" name="disable" value="Disable" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Status</th>
        <th scope="col" style="width: 20px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 				
		foreach($contents as $content): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $content['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $content['name']; ?></td>
        <td><?php echo $activearr[$content['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/contents/editcategory/'.$content['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/contents/categorywidgets/'.$content['id'].'/'.$return); ?>" class="table-icon widgets" title="Sort Widgets"></a> <a href="<?php echo site_url('admin/contents/deletecategory/'.$content['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <a class="button add" href="<?php echo site_url('admin/contents/addcategory'); ?>">Add New Content Category</a> </div>
</div>
