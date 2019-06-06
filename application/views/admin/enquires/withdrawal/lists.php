<div class="full_w">
  <div class="h_title">Manage Enquires - Funds Withdrawal</div>
  <?php echo $this->session->flashdata('message'); ?>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Bank Account No</th>        
        <th scope="col" style="width: 20px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
	
		if($this->uri->segment(4)==""){
			$i=0;
			$return=0;
		}else{
		 	$i=$this->uri->segment(4); 
			$return=$this->uri->segment(4); 
		}
				
		foreach($withdrawals as $withdrawal): ?>
      <tr>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $withdrawal['first_name']; ?></td>
        <td><?php echo $withdrawal['last_name']; ?></td>
        <td><?php echo $withdrawal['bank_account']; ?></td>       
        <td><a href="<?php echo site_url('admin/enquires/withdrawal_view/'.$withdrawal['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/enquires/withdrawal_delete/'.$withdrawal['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
  </div>
</div>