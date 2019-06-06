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
	<div class="h_title">Manage Glossary - List</div>
	<?php echo $this->session->flashdata('message'); ?>
	<?php echo form_open('admin/glossary/actions'); ?>
	<div class="entry">
			<input class="button" type="submit" name="enable" value="Enable" /><input class="button" type="submit" name="disable" value="Disable" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
	</div>
	<table>
		<thead>
			<tr>
				<th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
				<th scope="col" style="width: 20px;">ID</th>
				<th scope="col">Question</th>
				<th scope="col">Answer</th>
				<th scope="col" style="width: 80px;">Status</th>
				<th scope="col" style="width: 20px;">Modify</th>
			</tr>
		</thead>
			
		<tbody>
		<?php 
		foreach($glossary as $glossaryitem): ?>
			<tr>
				<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $glossaryitem['id']; ?>" /></td>
				<td class="align-center"><?php echo ++$i; ?></td>
				<td><?php echo substr(strip_tags($glossaryitem['question']),0,100); ?></td>
				<td><?php echo substr(strip_tags($glossaryitem['answer']),0,100); ?></td>
				<td><?php echo $activearr[$glossaryitem['status']]; ?></td>
				<td>
					<a href="<?php echo site_url('admin/glossary/edit/'.$glossaryitem['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>
					<a href="<?php echo site_url('admin/glossary/delete/'.$glossaryitem['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>
				</td>
			</tr>
		<?php endforeach; ?>			
		</tbody>
	</table>
	<?php form_close(); ?>
	<div class="entry">
		<div class="pagination">
			<?php echo $this->pagination->create_links(); ?>
		</div>
		<div class="sep"></div>		
		<a class="button add" href="<?php echo site_url('admin/glossary/add'); ?>">Add New Glossary</a>
	</div>
</div>
