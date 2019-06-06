<?php
$activearr=array('Y'=>'Active','N'=>'Inactive');
$featurearr=array('Y'=>'Featured','N'=>'Regular');
if($this->uri->segment(4)==""){
	$i=0;
	$return=0;
}else{
	$i=$this->uri->segment(4); 
	$return=$this->uri->segment(4); 
}
?>
<div class="full_w">
	<div class="h_title">Manage Category Widget - List</div>
	<?php echo $this->session->flashdata('message'); ?>
	<?php echo form_open('admin/contents/categorywidgetactions/'.$category->id); ?>	
	<table>
		<thead>
        <?php
		if($category->widgets!=''){ 
		?>
			<tr>
				<th scope="col" style="width: 20px;">ID</th>
				<th scope="col">Name</th>				
				<th scope="col" style="width: 100px;">Sort Order <input style="padding:1px;" type="submit" name="sortsave" value="Save" /></th>
				
			</tr>
		</thead>
			
		<tbody>
		 <?php
		$categorywidgets = explode(",",$category->widgets);
		$i=0;
		foreach($categorywidgets as $categorywidget):		
			$widget = explode(":",$categorywidget);
		 ?>
               
			<tr>
				<td class="align-center"><?php echo ++$i; ?></td>
				<td><?php echo $widgets[$widget[0]]; ?></td>				
				<td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order[<?php echo $widget[0]; ?>]" value="<?php echo $widget[1]; ?>" /></td>				
			</tr>
		<?php endforeach; 
		}else{
			echo '<tr>
				<td colspan="4">No Widget Selected</td>';
			}
		?>			
		</tbody>
	</table>
	<?php form_close(); ?>