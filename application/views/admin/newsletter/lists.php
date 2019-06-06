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

  <div class="h_title">Manage Newsletter - List</div>

  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/newsletter/actions'); ?>

  <div class="entry">

    <input class="button" type="submit" name="enable" value="Enable" />

    <input class="button" type="submit" name="disable" value="Disable" />

    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />

    <input type="hidden" name="return" value="<?php echo $return; ?>" />

  </div>

  <table>

    <thead>

      <tr>

        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>

        <th scope="col" style="width: 20px;">ID</th>

        <th scope="col">Name</th>

        <th scope="col">Email - Id</th>

        <!--<th scope="col" style="width: 100px;">Sort Order  <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>-->

        <th scope="col" style="width: 80px;">Status</th>

        <th scope="col" style="width: 20px;">Modify</th>

      </tr>

    </thead>

    <tbody>

      <?php 

		foreach($enquiries as $enquiry): 
		
	  ?>

      <tr>

        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $enquiry['id']; ?>" /></td>

        <td class="align-center"><?php echo ++$i; ?></td>

        <td align="left"><?php echo $enquiry['news_name']; ?></td>

        <td align="left"><a href="mailto:<?php echo $enquiry['news_email']; ?>"><?php echo $enquiry['news_email']; ?></a></td>

        <!--<td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $enquiry['id']; ?>]" value="<?php echo $banner['sort_order']; ?>" /></td>-->

        <td align="center"><?php echo $activearr[$enquiry['is_active']]; ?></td>

        <td>
        <!--<a href="<?php echo site_url('admin/newsletter/edit/'.$enquiry['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>--> 
        
        <a href="<?php echo site_url('admin/newsletter/delete/'.$enquiry['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>
        </td>
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