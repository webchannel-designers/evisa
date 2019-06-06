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
  <div class="h_title">Manage Endorsement - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/endorsement/actions'); ?>
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Enable" />
    <input class="button" type="submit" name="disable" value="Disable" />
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
  </div>
  <table>
    <thead>
      <tr>
        <th width="20" style="width: 20px;" scope="col"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th width="20" style="width: 20px;" scope="col">ID</th>
        <th width="130" scope="col">Organisation Name</th>
        <th width="65" scope="col">Email - Id</th>
        <th width="76" scope="col">Contact Name</th>
        <th width="100" style="width: 80px;" scope="col">Phone Number</th>
        <th width="49" scope="col">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 

		foreach($enquiries as $enquiry): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $enquiry['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td align="left"><?php echo $enquiry['name']; ?></td>
        <td align="left"><?php echo $enquiry['email']; ?></td>
        <td align="left"><?php echo $enquiry['contact_name']? ''.$enquiry['contact_name']:''; ?></td>
        <td align="center"><?php echo $enquiry['phone']; ?></td>
        <td nowrap="nowrap"><a href="<?php echo site_url('admin/endorsement/edit/'.$enquiry['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/endorsement/delete/'.$enquiry['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    
    <!--<a class="button add" href="<?php echo site_url('admin/banners/add'); ?>">Add New Banner</a>--> </div>
</div>
