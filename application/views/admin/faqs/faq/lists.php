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
  <div class="h_title">Manage Faqs - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/faqs/actions'); ?>
  <div class="entry">
    <input class="button" type="submit" name="enable" value="Enable"  style="width:50px;" />
    <input class="button" type="submit" name="disable" value="Disable" style="width:50px;"  />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <input class="button" type="submit" name="delete" value="Delete" style="width:50px;" onclick="return confirmDelete();" />
    <div style="float:right;"> Sort :
      <select name="sortby" style="width:75px;margin-right:5px;">
        <option value="">Select</option>
        <?php foreach($faqfields as $id => $key): ?>
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
        <?php foreach($faqcats as $faqcat): print_r($faqcat); ?>
        <option value="<?php echo $faqcat['id']; ?>" <?php if($this->session->userdata('faq_category_id')==$faqcat['id']){ echo 'selected="selected"'; }?>><?php echo $faqcat['name']; ?></option>
        <?php endforeach; ?>
      </select>
      Search :
      <input style="margin-right:5px;width:75px;" type="text" name="keyword" value="<?php echo $this->session->userdata('faq_key'); ?>" />
      <select name="field" style="width:75px;margin-right:5px;">
        <?php foreach($faqfields as $id => $key): ?>
        <option value="<?php echo $id; ?>" <?php if($this->session->userdata('faq_field')==$id){ echo 'selected="selected"'; }?>><?php echo $key; ?></option>
        <?php endforeach; ?>
      </select>
      <input class="button" type="submit" name="search" value="Search"  style="width:50px;"/>
      <input class="button" type="submit" name="reset" value="Reset"  style="width:50px;" />
    </div>
  </div>
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
        <th scope="col" style="width: 100px;">Sort Order
          <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col" style="width: 20px;">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
		foreach($faqs as $faq): ?>
      <tr>
        <td class="align-center"><input type="checkbox" name="id[]" class="chkbx" value="<?php echo $faq['id']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo substr(strip_tags($faq['question']),0,100); ?></td>
        <td><?php echo substr(strip_tags($faq['answer']),0,100); ?></td>
        <td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $faq['id']; ?>]" value="<?php echo $faq['sort_order']; ?>" /></td>
        <td><?php echo $activearr[$faq['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/faqs/edit/'.$faq['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/faqs/delete/'.$faq['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    <div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
    <div class="sep"></div>
    <a class="button add" href="<?php echo site_url('admin/faqs/add'); ?>">Add New Faq</a> </div>
</div>
