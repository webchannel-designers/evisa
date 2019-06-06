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
	<div class="h_title"><?php echo $subhead; ?></div>
	<?php echo $this->session->flashdata('message'); ?>
	<?php echo form_open('admin/seminars/actions/'.$seminartype); ?>
	<div class="entry">
			<input class="button" type="submit" name="enable" value="Enable" /><input class="button" type="submit" name="disable" value="Disable" /><input class="button" type="submit" name="archive" value="Archive" /><input class="button" type="submit" name="unarchive" value="Unarchive" />
			<input type="hidden" name="return" value="<?php echo $return; ?>" />
	</div>
	<table>
		<thead>
			<tr>
				<th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
				<th scope="col" style="width: 20px;">ID</th>
				<th scope="col">Topic</th>
				<th scope="col">Description</th>
				<th scope="col"style="width: 120px;">Date</th>
				<th scope="col" style="width: 90px;">Archive Status</th>
				<th scope="col" style="width: 80px;">Status</th>
				<th scope="col" style="width: 20px;">Modify</th>
			</tr>
		</thead>
			
		<tbody>
		<?php 
		foreach($seminars as $seminar): ?>
			<tr>
				<td class="align-center"><input type="checkbox" name="id[]" value="<?php echo $seminar['id']; ?>" /></td>
				<td class="align-center"><?php echo ++$i; ?></td>
				<td><?php echo $seminar['name']; ?></td>
				<td><?php echo substr(strip_tags($seminar['desc']),0,70); ?></td>
				<td><?php echo date('d-m-Y h:i a',strtotime($seminar['seminar_date'])); ?></td>
				<td><?php echo $activearr[$seminar['archive']]; ?></td>
				<td><?php echo $activearr[$seminar['status']]; ?></td>
				<td>
					<a href="<?php echo site_url('admin/seminars/edit/'.$seminar['seminar_type'].'/'.$seminar['id'].'/'.$return); ?>" class="table-icon edit" title="Edit"></a>
					<a href="<?php echo site_url('admin/seminars/delete/'.$seminar['seminar_type'].'/'.$seminar['id'].'/'.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a>
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
		<a class="button add" href="<?php echo site_url('admin/seminars/add/'.$seminartype); ?>"><?php echo $newtext; ?></a>
	</div>
</div>
