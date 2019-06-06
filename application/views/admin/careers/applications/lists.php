<?php
$activearr=array('Y'=>'Shortlisted','N'=>'Waiting');
if($this->uri->segment(4)==""){
	$i=0;
	$return=0;
}else{
	$i=$this->uri->segment(4); 
	$return=$this->uri->segment(4); 
}
?>
<div class="full_w">
  <div class="h_title">Manage Applications - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/careers/applicationactions'); ?>
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Shortlist" />
    <input class="button" type="submit" name="disable" value="Remove from shortlist" />
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Job Title</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col" style="width: 80px;">Shortlist</th>
        <th scope="col" style="width:100px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 				
		foreach($careers as $career): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $career['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $career['title']; ?></td>
        <td><?php echo $career['firstname'].' '.$career['lastname']; ?></td>
        <td><?php echo $career['email']; ?></td>
        <td><?php echo $career['phone']; ?></td>
        <td align="center"><?php echo $activearr[$career['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/careers/viewapplication/'.$career['id'].'/'.$return); ?>" class="table-icon edit" title="View"></a> <a href="<?php echo site_url('admin/careers/deleteapplication/'.$career['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
  </div>
</div>
