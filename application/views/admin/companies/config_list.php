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

  <div class="h_title">Manage Configuration - List</div>

  <?php echo $this->session->flashdata('message'); ?>

  <table>

    <thead>

      <tr>

        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Company Id</th>
        
        <th scope="col">Company Name</th>
        

     <!--    <th scope="col">Status</th> -->

        <th scope="col" style="width: 50px;">Modify</th>

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

		foreach($configuration as $config): ?>

      <tr>

        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo 'C'.$config['ref_id']; ?></td>
        <td><?php echo $config['name']; ?></td>          
        <!-- <td><?php echo $activearr[$config['status']]; ?></td> -->

        <td><a href="<?php echo site_url('admin/companies/edit_configuration/'.$config['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>

        <!--   <?php if(count($companies)>0){ ?>

          <a href="<?php echo site_url('admin/companies/delete/'.$config['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>

          <?php } ?> -->

         <!--  <?php if($config['id']!=$this->session->userdata('admin_id')){ ?>

          <a href="<?php echo site_url('admin/companies/changepwd/'.$config['id'].'/'.$return); ?>" class="table-icon edit" title="Change Password"></a>

          <?php }
           else { ?>

          <a href="<?php echo site_url('admin/home/changepwd/'); ?>" class="table-icon edit" title="Change Password"></a>

          <?php } ?> -->
        </td>

      </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

  <div class="entry">

    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>

    <div class="sep"></div>

    <a class="button add" href="<?php echo site_url('admin/companies/add_configuration'); ?>">Add Configuration</a> </div>

</div>

