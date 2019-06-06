<div class="full_w">
  <div class="h_title">Manage Enquires - Individual Account</div>
  <?php echo $this->session->flashdata('message'); ?>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Account Type</th>
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
				
		foreach($individuals as $individual): ?>
      <tr>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $individual['first_name']; ?></td>
        <td><?php echo $individual['last_name']; ?></td>
        <td><?php echo $individual['account_type']; ?></td>
        <td><?php echo $activearr[$individual['status']]; ?></td>       
        <td><a href="<?php echo site_url('admin/enquires/individual_view/'.$individual['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/enquires/individual_delete/'.$individual['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
  </div>
</div>