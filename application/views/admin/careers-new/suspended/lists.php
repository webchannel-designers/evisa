<?php

$activearr=array('Y'=>'Shortlisted','N'=>'Waiting');
if($this->uri->segment(5)==""){

	$i=0;

	$return=0;

}else{

	$i=$this->uri->segment(5); 

	$return=$this->uri->segment(5); 

}
//echo $this->session->userdata('content_key');

?>

<div class="full_w">

  <div class="h_title">Manage Applications - List</div>

  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/careers/suspendactions/'.$this->uri->segment(4)); ?>
<div class="search-wrap" style="float:left;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="background-color:#FFF;">
  <td>Title</td>
    <td>
    		<select name="title" style="width:100%">
            <option value="">Select</option>
              <option value="Mr" <?php if($this->session->userdata('content_title')=='Mr') { ?> selected="selected"<?php } ?>>Mr</option>
              <option value="Mrs" <?php if($this->session->userdata('content_title')=='Mrs') { ?> selected="selected"<?php } ?>>Mrs</option>
              <option value="Miss" <?php if($this->session->userdata('content_title')=='Miss') { ?> selected="selected"<?php } ?>>Miss</option>
              <option value="Dr" <?php if($this->session->userdata('content_title')=='Dr') { ?> selected="selected"<?php } ?>>Dr</option>
            </select>
    </td>
    <td>Candidate name</td>
    <td><input type="text" name="keyword" id="keyword" value="<?php echo $this->session->userdata('content_key') ?>" style="width:100%" /></td>
    <td>Visa Status</td>
    <td>
    <select id="visa" name="visa" style="width:100%">
              <option value="">Select</option>
              <option value="Visit Visa" <?php if($this->session->userdata('content_visa')=='Visit Visa') { ?> selected="selected"<?php } ?>>Visit Visa</option>
              <option value="Employment Visa" <?php if($this->session->userdata('content_visa')=='Employment Visa') { ?> selected="selected"<?php } ?>>Employment Visa</option>
              <option value="Spousal Visa" <?php if($this->session->userdata('content_visa')=='Spousal Visa') { ?> selected="selected"<?php } ?>>Spousal Visa</option>
              <option value="Residents National Visa" <?php if($this->session->userdata('content_visa')=='Residents National Visa') { ?> selected="selected"<?php } ?>>Residents National Visa</option>
    </select>
    </td>
  <td>Notice Period</td>
  <td>
  			<select id="noticeperiod" name="noticeperiod" style="width:100%">
              <option value="">Select Notice Period</option>
              <option value="Available Immediately" <?php if($this->session->userdata('content_notice')=='Available Immediately') { ?> selected="selected"<?php } ?>>Available Immediately</option>
              <option value="1 Month" <?php if($this->session->userdata('content_notice')=='1 Month') { ?> selected="selected"<?php } ?>>1 Month</option>
              <option value="2 Months" <?php if($this->session->userdata('content_notice')=='2 Months') { ?> selected="selected"<?php } ?>>2 Months</option>
              <option value="3 Months" <?php if($this->session->userdata('content_notice')=='3 Months') { ?> selected="selected"<?php } ?>>3 Months</option>
            </select>
  </td>
  </tr>
  <tr>
    <td>Nationality</td>
    <td>
    <select name="country" id="country" style="width:100%">
    <option value="">Select</option>
    <?php
	foreach($countries as $country)
	{
	?>
    <option value="<?php echo $country['name']; ?>" <?php if($this->session->userdata('content_country')==$country['name']) { ?> selected="selected"<?php } ?>><?php echo $country['name']; ?></option>
    <?php
	}
	?>
    </select>
    </td>
    <td>Job Post</td>
    <td>
    <select name="job" id="job" style="width:100%">
    <option value="">Select</option>
    <?php
	foreach($jobs as $job)
	{
	?>
    <option value="<?php echo $job['id']; ?>" <?php if($this->session->userdata('content_job')==$job['id']) { ?> selected="selected"<?php } ?>><?php echo $job['title']; ?></option>
    <?php
	}
	?>
    </select>
    </td>
  <td>Skills</td>
  <td><input type="text" name="skill" id="skill" value="<?php echo $this->session->userdata('content_skill') ?>" style="width:100%" /></td>
  <td>Experience</td>
  <td>
  			<select name="experience" id="experience" style="width:100%">
              <option value="">Select your Experience</option>
              <option value="0-2 Years" <?php if($this->session->userdata('content_experience')=='0-2 Years') { ?> selected="selected"<?php } ?>>0-2 Years</option>
              <option value="2-5 Years" <?php if($this->session->userdata('content_experience')=='2-5 Years') { ?> selected="selected"<?php } ?>>2-5 Years</option>
              <option value="5-7 Years" <?php if($this->session->userdata('content_experience')=='5-7 Years') { ?> selected="selected"<?php } ?>>5-7 Years</option>
              <option value="Above 7 Years" <?php if($this->session->userdata('content_experience')=='Above 7 Years') { ?> selected="selected"<?php } ?>>Above 7 Years</option>
            </select>
  </td>
  </tr>
   <tr style="background-color:#FFF;">
  <td>Department</td>
  <td>
			<select name="department" id="department" style="width:100%">
              <option value="">Select your Department</option>
              <option value="Admin" <?php if($this->session->userdata('content_department')=='Admin') { ?> selected="selected"<?php } ?>>Admin</option>
              <option value="Marketing" <?php if($this->session->userdata('content_department')=='Marketing') { ?> selected="selected"<?php } ?>>Marketing</option>
              <option value="Finance-Accounts" <?php if($this->session->userdata('content_department')=='Finance-Accounts') { ?> selected="selected"<?php } ?>>Finance/ Accounts</option>
              <option value="Sales" <?php if($this->session->userdata('content_department')=='Sales') { ?> selected="selected"<?php } ?>>Sales</option>
              <option value="Logistics" <?php if($this->session->userdata('content_department')=='Logistics') { ?> selected="selected"<?php } ?>>Logistics</option>
              <option value="Parts" <?php if($this->session->userdata('content_department')=='Parts') { ?> selected="selected"<?php } ?>>Parts</option>
              <option value="Service" <?php if($this->session->userdata('content_department')=='Service') { ?> selected="selected"<?php } ?>>Service</option>
            </select>  
  </td>
  
  <td>Driving License</td>
  <td>
  			<select id="license" name="license" style="width:100%">
              <option value="">Select License</option>
              <option value="None" <?php if($this->session->userdata('content_license')=='None') { ?> selected="selected"<?php } ?>>None</option>
              <option value="Motorcycle" <?php if($this->session->userdata('content_license')=='Motorcycle') { ?> selected="selected"<?php } ?>>Motorcycle</option>
              <option value="Light Vehicle" <?php if($this->session->userdata('content_license')=='Light Vehicle') { ?> selected="selected"<?php } ?>>Light Vehicle</option>
              <option value="Heavy Vehicle" <?php if($this->session->userdata('content_license')=='Heavy Vehicle') { ?> selected="selected"<?php } ?>>Heavy Vehicle</option>
            </select>
  </td>
  <td>Rating</td>
  <td>
  <select name="rating" id="rating" style="width:100%">
  <option value="" selected="selected">Select</option>
  <option value="0" <?php if($this->session->userdata('content_rating')=='0') { ?> selected="selected"<?php } ?>>Not Rated</option>
  <option value="1" <?php if($this->session->userdata('content_rating')=='1') { ?> selected="selected"<?php } ?>>1</option>
  <option value="2" <?php if($this->session->userdata('content_rating')=='2') { ?> selected="selected"<?php } ?>>2</option>
  <option value="3" <?php if($this->session->userdata('content_rating')=='3') { ?> selected="selected"<?php } ?>>3</option>
  <option value="4" <?php if($this->session->userdata('content_rating')=='4') { ?> selected="selected"<?php } ?>>4</option>
  <option value="5" <?php if($this->session->userdata('content_rating')=='5') { ?> selected="selected"<?php } ?>>5</option>
  </select>
  </td>
<td><input class="button" type="submit" name="search" value="Search" /></td>
  <td><input class="button" type="submit" name="reset" value="Reset"  /></td>  
  </tr>
</table>

    </div>
  <div class="entry">
   <input class="button" type="submit" name="disable2" value="Unsuspend" />

    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />

    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    
  </div>

  <table>

    <thead>

      <tr style="background:#000;">

        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>

        <th scope="col" style="width: 20px;">ID</th>
        
        <th scope="col">Ref/No</th>

        <th scope="col">Job Post</th>

        <th scope="col">Applicant Name</th>
        
        <th scope="col">Nationality</th>

        <th scope="col">Email</th>

        <th scope="col">Phone</th>
        
        <th scope="col">Applied Date</th>
        
        <th scope="col">Year of Exp.</th>

        <th scope="col" style="width: 70px;">Actions</th>
        
        <th scope="col" style="width: 125px;">View Resume</th>

      </tr>

    </thead>

    <tbody>

      <?php 				

		foreach($careers as $career): ?>
        <?php
$jobtitle=$this->jobs_model->load($career['jobs_id']);
?>
      <tr>

        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $career['id']; ?>" /><input type="hidden" name="mail[]" value="<?php echo $career['email']; ?>" /></td>

        <td class="align-center"><?php echo ++$i; ?></td>
        
        <td><?php echo "#".@$jobtitle->refno; ?></td>

        <td><?php if(@$jobtitle->title!="") { echo @$jobtitle->title; } else { echo "Candidate pool application"; } ?></td>

        <td><?php echo $career['title']; ?> <?php echo $career['firstname'].' '.$career['lastname']; ?></td>
        
        <td><?php if($career['nationality']!="") { echo $career['nationality']; } else { echo "N/A"; } ?></td>

        <td><?php echo $career['email']; ?></td>

        <td><?php echo $career['phone']; ?></td>
        
        <td><?php echo $career['application_date']; ?></td>
        
        <td><?php if($career['experience']!="") { echo $career['experience']; } else { echo "N/A"; } ?></td>
       
        <?php
        if($this->uri->segment(4)!="")
        {
        	$var=$this->uri->segment(4).'/';
        }
        ?>
        <td><a href="<?php echo site_url('admin/careers/viewapplication/'.$career['id'].'/'.@$var.$return); ?>" class="table-icon edit" title="View"></a> 
        <a href="<?php echo site_url('admin/careers/deleteapplication/'.$career['id'].'/'.@$var.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
        <td><a class="button" href="<?php echo site_url('admin/careers/downloadresume/'.$career['id']); ?>">View Resume</a></td>
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

