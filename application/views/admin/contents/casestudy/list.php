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
  <div class="h_title">Manage Questionnaires - List (<?php echo $casestudy?>)</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/contents/caseactions'); ?>
  
  <table>
    <thead>
      <tr>
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
       <!-- <th scope="col" style="width: 100px;">Sort Order
          <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th> -->
        <th scope="col" style="width: 50px;">Status</th>
        <th scope="col" style="">Modify</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      
		foreach($faqs as $faq): ?>
      <tr>
        <td class="align-center"><input type="checkbox" name="id[]" class="chkbx" value="<?php echo $faq['qid']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php echo substr(strip_tags($faq['title']),0,100); ?></td>
        <td><?php echo substr(strip_tags($faq['description']),0,100); ?></td>
      <!--  <td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $faq['qid']; ?>]" value="" /></td>-->
        <td><?php echo $activearr[$faq['status']]; ?></td>
        <td><a href="<?php echo site_url('admin/contents/editquestionnaire/'.$faq['qid'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a> <a href="<?php echo site_url('admin/faqs/delete/'.$faq['qid'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php form_close(); ?>
  <div class="entry">
    
    <a class="button add" href="<?php echo site_url('admin/contents/addquestionnaire/'.$cid.'/'.$return); ?>">Add New </a> </div>
</div>
