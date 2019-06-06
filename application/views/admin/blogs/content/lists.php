<?php
$activearr=array('Y'=>'Active','N'=>'Inactive');
if($this->uri->segment(5)==""){
	$i=0;
	$return=0;
}else{
	$i=$this->uri->segment(5); 
	$return=$this->uri->segment(5); 
}
?>
<div class="full_w">
  <div class="h_title">Manage Blogs - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/blogs/actions/'.$this->uri->segment(4)); ?>
  <div class="entry">
  <div style="width:100%; margin-bottom:10px;">
  <?php
  if($_SESSION['admin_role']!=3)
  {
  ?>
    <input class="button" type="submit" name="enable" value="Enable"  />
    <input class="button" type="submit" name="disable" value="Disable" />
    <!--<input class="button" type="submit" name="archieve" value="Make Archieve"  />
    <input class="button" type="submit" name="dearchieve" value="Remove Archieve" />-->
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <?php
  }
	?>
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    </div>
    <div style="float:left; margin-bottom:10px;"> Sort :
      <select name="sortby" style="width:75px;margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('sort_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="orderby" style="width:75px; margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($sortorders as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('order_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      Category :
      <select name="category" style="width:75px; margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($contentcats as $contentcat): ?>
        <option value="<?php echo $contentcat['id']; ?>" <?php if($this->session->userdata('content_category_id')==$contentcat['id']){ echo 'selected="selected"'; }?>><?php echo $contentcat['name']; ?></option>
        <?php endforeach; ?>
      </select>
      Search :
      <input style="margin-right:5px;width:75px;" type="text" name="keyword" value="<?php echo $this->session->userdata('content_key'); ?>" />
      <select name="field" style="width:75px;margin-right:5px;">
        <?php foreach($contentfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('content_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <input class="button" type="submit" name="search" value="Search" />
      <input class="button" type="submit" name="reset" value="Reset" />
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Short Description</th>
        <!--<th scope="col" style="width: 80px;">Archieve Status</th>-->
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col" style="width: 70px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		foreach($contents as $content): ?>
      <tr>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $content['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo substr($content['title'],0,100); ?></td>
        <td><?php echo substr( strip_tags($content['desc']),0,50); ?>...</td>
        <!--<td><?php echo $activearr[$content['archieve']]; ?></td>-->
        <td><?php echo $activearr[$content['status']]; ?></td>
        <td>
        <a href="<?php echo site_url('admin/blogs/edit/'.$content['id'].'/'.$this->uri->segment(4).'/'.$return); ?>" class="table-icon edit" title="Edit"></a> 
          <?php
		  if($_SESSION['admin_role']!=3)
		  {
		  ?>

        <a href="<?php echo site_url('admin/blogs/delete/'.$content['id'].'/'.$this->uri->segment(4).'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a
        <?php
 		 }
		?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <?php
	if($this->uri->segment(4)=='N')
	{
	?>
    <a class="button add" href="<?php echo site_url('admin/blogs/add/'.$this->uri->segment(4)); ?>">Add Blogs</a><?php } ?> </div>
</div>