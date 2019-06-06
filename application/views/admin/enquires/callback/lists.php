<div class="full_w">
  <div class="h_title">Manage Enquires - Callback</div>
  <?php echo $this->session->flashdata('message'); ?>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Status</th>
        <th scope="col" style="width: 20px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		$activearr=array('Y'=>'Active','N'=>'Inactive');
		if($this->uri->segment(4)==""){
			$i=0;
			$return=0;
		}else{
		 	$i=$this->uri->segment(4); 
			$return=$this->uri->segment(4); 
		}		
		foreach($callbacks as $callback): ?>
      <tr>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $callback['name']; ?></td>
        <td><?php echo $callback['email']; ?></td>
        <td><?php echo $callback['phone']; ?></td>
        <td><?php echo $activearr[$callback['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/enquires/callback_view/'.$callback['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/enquires/callback_delete/'.$callback['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
  </div>
</div>
