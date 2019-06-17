<div class="full_w">

  <div class="h_title">Manage Companies - List</div>

  <?php echo $this->session->flashdata('message'); ?>

  <table>

    <thead>

      <tr>

        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Ref.No</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Country</th>
        <th scope="col">Packages</th>
        <th scope="col">Addons</th>

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

		foreach($companies as $company): ?>

      <tr>

        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo 'C'.$company['ref_id']; ?></td>
        <td><?php echo $company['name']; ?></td>
        <td><?php echo $company['email']; ?></td>
        <td><?php echo $company['phone']; ?></td>  
         <td><?php echo $company['country']; ?></td>   
         <td><a href="<?php echo site_url('admin/packages/lists/'.$company['id'].'/'); ?>" class="table-icon 
          view" title="View"></a></td> 
           <td><a href="<?php echo site_url('admin/addons/lists/'.$company['id'].'/'); ?>" class="table-icon 
          view" title="View"></a></td> 
        <!-- <td><?php echo $activearr[$company['status']]; ?></td> -->

        <td><a href="<?php echo site_url('admin/companies/edit/'.$company['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>

          <?php if(count($companies)>0){ ?>

          <a href="<?php echo site_url('admin/companies/delete/'.$company['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>

          <?php } ?>

         <!--  <?php if($company['id']!=$this->session->userdata('admin_id')){ ?>

          <a href="<?php echo site_url('admin/companies/changepwd/'.$company['id'].'/'.$return); ?>" class="table-icon edit" title="Change Password"></a>

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

    <a class="button add" href="<?php echo site_url('admin/companies/add'); ?>">Add New Company</a> </div>

</div>

