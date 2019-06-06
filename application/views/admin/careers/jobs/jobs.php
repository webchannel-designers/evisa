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
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Enable"  />
    <input class="button" type="submit" name="disable" value="Disable" />
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <div style="float:right;"> Sort :
      <select name="sortby" style="width:75px;margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($careerfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('sort_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="orderby" style="width:75px; margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($sortorders as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('order_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      Search :
      <input style="margin-right:5px;width:75px;" type="text" name="keyword" value="<?php echo $this->session->userdata('career_key'); ?>" />
      <select name="field" style="width:75px;margin-right:5px;">
        <?php foreach($careerfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('career_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <input class="button" type="submit" name="search" value="Search" />
      <input class="button" type="submit" name="reset" value="Reset"  />
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Ref No.</th>
        <th scope="col">Title</th>
        <th scope="col">Location</th>
        <th scope="col">Description</th>
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col" style="width:100px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		foreach($careers as $career): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $career['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo $career['refno']; ?></td>
        <td><?php echo $career['title']; ?></td>
        <td><?php echo $career['location']; ?></td>
        <td><?php echo substr(strip_tags($career['desc']),0,100); ?></td>
        <td><?php echo $activearr[$career['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/careers/edit/'.$career['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/careers/jobwidgets/'.$career['id'].'/'.$return); ?>" class="table-icon widgets" title="Sort Widgets"></a> <a href="<?php echo site_url('admin/careers/delete/'.$career['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <a class="button add" href="<?php echo site_url('admin/careers/add'); ?>">Add New Job</a> </div>
</div>
