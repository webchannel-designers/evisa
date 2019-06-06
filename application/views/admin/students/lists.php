<div class="full_w">
  <div class="h_title">Manage Students - List</div>
  <?php echo $this->session->flashdata('message'); ?>
	<?php echo form_open('admin/students/actions'); ?>
	<div class="entry">
			<input class="button" type="submit" name="enable" value="Enable" /><input class="button" type="submit" name="disable" value="Disable" />
			<input type="hidden" name="return" value="<?php echo @$return; ?>" />
	</div>
  <table>
    <thead>
      <tr>
		<th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">First Name</th>
        
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Username</th>
   <!--     <th scope="col">Role</th>-->
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
		foreach($students as $student): ?>
      <tr>
<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $student['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $student['first_name']; ?></td>
		 <td><?php echo $student['last_name']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['username']; ?></td>
      <!--  <td><?php //echo @$student['role']; ?></td> -->       
        <td><?php echo $activearr[$student['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/students/edit/'.$student['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>
          <?php if(count($students)>1){ ?>
          <a href="<?php echo site_url('admin/students/delete/'.$student['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>
          <?php } ?>
          <?php if($student['id']!=$this->session->userdata('admin_id')){ ?>
          <!--<a href="<?php //echo site_url('admin/students/changepwd/'.$student['stu_id'].'/'.$return); ?>" class="table-icon edit" title="Change Password"></a>-->
          <?php } else { ?>
         <!-- <a href="<?php //echo site_url('admin/home/changepwd/'); ?>" class="table-icon edit" title="Change Password"></a>-->
          <?php } ?></td>
      </tr>
      <?php endforeach; ?>
<?php form_close(); ?>
    </tbody>
  </table>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <a class="button add" href="<?php echo site_url('admin/students/add'); ?>">Add New Student</a> </div>
</div>
