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

  <div class="h_title">Manage Jobs - List</div>

  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/careers/actions'); ?>
  
<div class="search-wrap" style="float:left; height: 99px;display: none;"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    <tr style=" background-color: #f7f7f7;">
    <td>
        <span><h4 style="margin: 5px;">Advanced Job Search &nbsp;(Fill all Fields)</h4></span>
        
     <select name="orderby" style=" margin-right:5px;">

        <option value="">Select Order</option>

        <?php foreach($sortorders as $id => $key): ?>

        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('order_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>

        <?php endforeach; ?>

      </select> 
        <select name="sortby" style="margin-right:5px;">

        <option selected="" value="">Select a Field</option>

        <?php foreach($careerfields as $id => $key): ?>

        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('sort_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>

        <?php endforeach; ?>

      </select> 
    
      <span>Keyword</span> 
      <input style="margin-right:5px;width:150px;" type="text" name="keyword" value="<?php echo $this->session->userdata('career_key'); ?>" />
      <input class="button" type="submit" name="search" value="Search"  />
      <input class="button" type="submit" name="reset" value="Reset"  />
  </td>
 
  </tr>
  
  </table>  

    </div>

  <div class="entry">

    <input class="button" type="submit" name="enable" value="Enable"  />

    <input class="button" type="submit" name="disable" value="Disable" />

    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />

    <input type="hidden" name="return" value="<?php echo $return; ?>" />
   
    <a class="button add" href="<?php echo site_url('admin/careers/add'); ?>">Add New Job</a>
    

  </div>

  <table>

    <thead>

      <tr>

        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>

        <th scope="col" style="width: 20px;">ID</th>

        <th scope="col">Ref No.</th>

        <th scope="col">Job Post</th>

        <th scope="col">Location</th>

        <th scope="col">Short Description</th>
        <th scope="col">Expiry Date</th>
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col"></th>
        <th scope="col" style="width: 70px;">Modify</th>

      </tr>

    </thead>

    <tbody>

      <?php 

		foreach($careers as $career): ?>
<?php
$location=$this->location_model->load($career['location']);
?>
      <tr>

        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $career['id']; ?>" /></td>

        <td class="align-center"><?php echo ++$i; ?></td>

        <td><?php echo $career['refno']; ?></td>

        <td><?php echo $career['title']; ?></td>

        <td><?php echo $location->title; ?></td>

        <td><?php echo substr(strip_tags($career['short_desc']),0,100); ?></td>
        
        <td><?php echo $career['date_time']; ?></td>
        
         <td><?php echo $activearr[$career['status']]; ?></td>
        
        <td><a style="color:#F90; text-decoration: underline;" href="<?php echo site_url('admin/careers/applications/'.$career['id']) ?>">Applied Candidates</a></td>
        <td>
        <a href="<?php echo site_url('admin/careers/edit/'.$career['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> 
        <a href="<?php echo site_url('admin/careers/delete/'.$career['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>
        </td>

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

