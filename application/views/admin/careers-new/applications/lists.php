<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/rating.css'); ?>" />
<?php
$activearr=array(
    'Y'=>'Shortlisted',
    'N'=>'Applied',
    'R'=>'Rated',
    'RS'=>'Shortlisted'
);
if($this->uri->segment(5)==""){

	$i=0;

	$return=0;

}else{

	$i=$this->uri->segment(5); 

	$return=$this->uri->segment(5); 

}
//echo $this->session->userdata('content_key');

?>
<script>
	$(document).ready(function () {
		$(".stars").click(function () {
		
		var fieldid=$(this).parent().attr('id');;
		
	
		dataString="star="+$(this).val()+"&id="+$(this).parent().attr("id");
				//alert($(this).val());
		var divtemp = $(this).closest("fieldset");
		$.ajax({

		type: "post", 

		url: "<?php echo site_url('admin/careers/rateapplication/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$("#").html(msg);

		}, error: function(){ console.log('Error while request..'); }

		});

			$(this).attr("checked");
		});
		
							  
	 $("#shortlist-frm .shortlist-btn").click(function(e) {
		
		e.preventDefault();
		
		var jobid=$('#shortlist-frm #job-id').val();
		
		var s = document.getElementById('short-list-cat');
		
		var shortlistjob = s.options[e.selectedIndex].value;    
		
		alert(shortlistjob);
	   
		$.ajax({
		
		type: "post", 
		
		url: "<?php echo site_url('admin/careers/rateapplication');?>", 	 	
		
		data: dataString, 
		
		success: function(msg) {
		
			$("#").html(msg);
		
		}, error: function(){ console.log('Error while request..'); }
		
		});
		
	 
	  });  
		
		
	});
</script>

<div class="full_w">
  <div class="h_title">Manage Applications - List</div>
  <?php echo $this->session->flashdata('message'); ?> <?php echo form_open('admin/careers/applicationactions/'.$this->uri->segment(4)); ?>
  <div class="search-wrap" style="float:left;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr style="background-color:#f7f7f7;">
        <td>Title</td>
        <td><select name="title" style="width:100%">
            <option value="">Select</option>
            <option value="Mr" <?php if($this->session->userdata('content_title')=='Mr') { ?> selected="selected"<?php } ?>>Mr</option>
            <option value="Mrs" <?php if($this->session->userdata('content_title')=='Mrs') { ?> selected="selected"<?php } ?>>Mrs</option>
            <option value="Miss" <?php if($this->session->userdata('content_title')=='Miss') { ?> selected="selected"<?php } ?>>Miss</option>
            <!--<option value="Dr" <?php if($this->session->userdata('content_title')=='Dr') { ?> selected="selected"<?php } ?>>Dr</option>-->
          </select></td>
        <td>Candidate name</td>
        <td><input type="text" name="keyword" id="keyword" value="<?php echo $this->session->userdata('content_key') ?>" style="width:100%" /></td>
        <td>Visa Status</td>
        <td><select id="visa" name="visa" style="width:100%">
            <option value="">Select</option>
            <option value="Visit Visa" <?php if($this->session->userdata('content_visa')=='Visit Visa') { ?> selected="selected"<?php } ?>>Visit Visa</option>
            <option value="Employment Visa" <?php if($this->session->userdata('content_visa')=='Employment Visa') { ?> selected="selected"<?php } ?>>Employment Visa</option>
            <option value="Spousal Visa" <?php if($this->session->userdata('content_visa')=='Spousal Visa') { ?> selected="selected"<?php } ?>>Spousal Visa</option>
            <option value="Residents National Visa" <?php if($this->session->userdata('content_visa')=='Residents National Visa') { ?> selected="selected"<?php } ?>>Residents National Visa</option>
          </select></td>
        <td>Notice Period</td>
        <td><select id="noticeperiod" name="noticeperiod" style="width:100%">
            <option value="">Select Notice Period</option>
            <option value="Available Immediately" <?php if($this->session->userdata('content_notice')=='Available Immediately') { ?> selected="selected"<?php } ?>>Available Immediately</option>
            <option value="1 Month" <?php if($this->session->userdata('content_notice')=='1 Month') { ?> selected="selected"<?php } ?>>1 Month</option>
            <option value="2 Months" <?php if($this->session->userdata('content_notice')=='2 Months') { ?> selected="selected"<?php } ?>>2 Months</option>
            <option value="3 Months" <?php if($this->session->userdata('content_notice')=='3 Months') { ?> selected="selected"<?php } ?>>3 Months</option>
          </select></td>
      </tr>
      <tr style="background-color:#f7f7f7;">
        <td>Nationality</td>
        <td><select name="country" id="country" style="width:100%">
            <option value="">Select</option>
            <?php
	foreach($countries as $country)
	{
	?>
            <option value="<?php echo $country['name']; ?>" <?php if($this->session->userdata('content_country')==$country['name']) { ?> selected="selected"<?php } ?>><?php echo $country['name']; ?></option>
            <?php
	}
	?>
          </select></td>
        <td>Job Post</td>
        <td><select name="job" id="job" style="width:100%">
            <option value="">Select</option>
            <?php
	foreach($jobs as $job)
	{
	?>
            <option value="<?php echo $job['id']; ?>" <?php if($this->session->userdata('content_job')==$job['id']) { ?> selected="selected"<?php } ?>><?php echo $job['title']; ?></option>
            <?php
	}
	?>
          </select></td>
        <td>Skills</td>
        <td><input type="text" name="skill" id="skill" value="<?php echo $this->session->userdata('content_skill') ?>" style="width:100%" /></td>
        <td>Experience</td>
        <td><select name="experience" id="experience" style="width:100%">
            <option value="">Select your Experience</option>
            <option value="0-2 Years" <?php if($this->session->userdata('content_experience')=='0-2 Years') { ?> selected="selected"<?php } ?>>0-2 Years</option>
            <option value="2-5 Years" <?php if($this->session->userdata('content_experience')=='2-5 Years') { ?> selected="selected"<?php } ?>>2-5 Years</option>
            <option value="5-7 Years" <?php if($this->session->userdata('content_experience')=='5-7 Years') { ?> selected="selected"<?php } ?>>5-7 Years</option>
            <option value="Above 7 Years" <?php if($this->session->userdata('content_experience')=='Above 7 Years') { ?> selected="selected"<?php } ?>>Above 7 Years</option>
          </select></td>
      </tr>
      <tr style="background-color:#f7f7f7;">
        <td>Department</td>
        <td><select name="department" id="department" style="width:100%">
            <option value="">Select your Department</option>
            <option value="Admin" <?php if($this->session->userdata('content_department')=='Admin') { ?> selected="selected"<?php } ?>>Admin</option>
            <option value="Marketing" <?php if($this->session->userdata('content_department')=='Marketing') { ?> selected="selected"<?php } ?>>Marketing</option>
            <option value="Finance-Accounts" <?php if($this->session->userdata('content_department')=='Finance-Accounts') { ?> selected="selected"<?php } ?>>Finance/ Accounts</option>
            <option value="Sales" <?php if($this->session->userdata('content_department')=='Sales') { ?> selected="selected"<?php } ?>>Sales</option>
            <option value="Logistics" <?php if($this->session->userdata('content_department')=='Logistics') { ?> selected="selected"<?php } ?>>Logistics</option>
            <option value="Parts" <?php if($this->session->userdata('content_department')=='Parts') { ?> selected="selected"<?php } ?>>Parts</option>
            <option value="Service" <?php if($this->session->userdata('content_department')=='Service') { ?> selected="selected"<?php } ?>>Service</option>
          </select></td>
        <td>Driving License</td>
        <td><select id="license" name="license" style="width:100%">
            <option value="">Select License</option>
            <option value="None" <?php if($this->session->userdata('content_license')=='None') { ?> selected="selected"<?php } ?>>None</option>
            <option value="Motorcycle" <?php if($this->session->userdata('content_license')=='Motorcycle') { ?> selected="selected"<?php } ?>>Motorcycle</option>
            <option value="Light Vehicle" <?php if($this->session->userdata('content_license')=='Light Vehicle') { ?> selected="selected"<?php } ?>>Light Vehicle</option>
            <option value="Heavy Vehicle" <?php if($this->session->userdata('content_license')=='Heavy Vehicle') { ?> selected="selected"<?php } ?>>Heavy Vehicle</option>
          </select></td>
        <td>Rating</td>
        <td> FROM
          <select name="rating" id="rating" style="width:100%">
            <option value="" selected="selected">Select</option>
            <option value="6" <?php if($this->session->userdata('content_rating')=='6') { ?> selected="selected"<?php } ?>>Not Rated</option>
            <option value="1" <?php if($this->session->userdata('content_rating')=='1') { ?> selected="selected"<?php } ?>>1</option>
            <option value="2" <?php if($this->session->userdata('content_rating')=='2') { ?> selected="selected"<?php } ?>>2</option>
            <option value="3" <?php if($this->session->userdata('content_rating')=='3') { ?> selected="selected"<?php } ?>>3</option>
            <option value="4" <?php if($this->session->userdata('content_rating')=='4') { ?> selected="selected"<?php } ?>>4</option>
            <option value="5" <?php if($this->session->userdata('content_rating')=='5') { ?> selected="selected"<?php } ?>>5</option>
          </select>
          TO
          <select name="rating_to" id="rating" style="width:100%">
            <option value="" selected="selected">Select</option>
            <option value="1" <?php if($this->session->userdata('content_rating_to')=='1') { ?> selected="selected"<?php } ?>>1</option>
            <option value="2" <?php if($this->session->userdata('content_rating_to')=='2') { ?> selected="selected"<?php } ?>>2</option>
            <option value="3" <?php if($this->session->userdata('content_rating_to')=='3') { ?> selected="selected"<?php } ?>>3</option>
            <option value="4" <?php if($this->session->userdata('content_rating_to')=='4') { ?> selected="selected"<?php } ?>>4</option>
            <option value="5" <?php if($this->session->userdata('content_rating_to')=='5') { ?> selected="selected"<?php } ?>>5</option>
          </select></td>
        <td>Education</td>
        <td><select id="education" name="education" style="width:100%;">
            <option value="">Education</option>
            <option value="High School" <?php if($this->session->userdata('content_education')=='High School') { ?> selected="selected"<?php } ?>>High School</option>
            <option value="Diploma" <?php if($this->session->userdata('content_education')=='Diploma') { ?> selected="selected"<?php } ?>>Diploma</option>
            <option value="Bachelors Degree" <?php if($this->session->userdata('content_education')=='Bachelors Degree') { ?> selected="selected"<?php } ?>>Bachelors Degree</option>
            <option value="Masters" <?php if($this->session->userdata('content_education')=='Masters') { ?> selected="selected"<?php } ?>>Masters</option>
            <option value="Doctorate" <?php if($this->session->userdata('content_education')=='Doctorate') { ?> selected="selected"<?php } ?>>Doctorate</option>
          </select></td>
      </tr>
      <tr style="background-color:#f7f7f7;">
        <td> Email </td>
        <td><input type="text" name="email" id="email" value="<?php echo $this->session->userdata('content_email') ?>" style="width:100%" /></td>
        <td>Phone</td>
        <td><input type="text" name="phone" id="phone" value="<?php echo $this->session->userdata('content_phone') ?>" style="width:100%" /></td>
        <td>Category</td>
        <td><select name="category" style="width:100%;">
            <option value="">Select</option>
            <?php
  foreach($categories as $category)
  {
	  ?>
            <option value="<?php echo $category['id']; ?>" <?php if($category['id']==$this->session->userdata('content_category')) { ?> selected="selected"<?php } ?>><?php echo $category['type']; ?></option>
            <?php
  }
  ?>
          </select></td>
        <td>From</td>
        <td><input type="text" name="fromdate" id="fromdate" class="datepicker" style="width:100%" value="<?php echo $this->session->userdata('content_from'); ?>" /></td>
      </tr>
      <tr style="background-color:#f7f7f7;">
        <td>To</td>
        <td><input type="text" name="todate" id="todate" class="datepicker" style="width:100%" value="<?php echo $this->session->userdata('content_to'); ?>" /></td>
        <?php if(isset($list_type)&& $list_type != 'pending') { ?>
        <td>Shortlisted Job Post</td>
        <td><select name="shortlist_job" id="shortlist_job" style="width:100%">
            <option value="">Select</option>
            <?php
	foreach($jobs as $job)
	{
	?>
            <option value="<?php echo $job['id']; ?>" <?php if($this->session->userdata('shortlist_job')==$job['id']) { ?> selected="selected"<?php } ?>><?php echo $job['title']; ?></option>
            <?php
	}
    
	?>
          </select></td>
        <?php } ?>
        <td><input class="button" type="submit" name="search" value="Search" /></td>
        <td><input class="button" type="submit" name="reset" value="Reset" /></td>
      </tr>
    </table>
  </div>
  <div class="entry">
    <?php if(isset($list_type)&& $list_type != 'pending') { ?>
    <input class="button" type="submit" name="download" value="Download Resumes" />
    <input class="button" type="submit" name="disable" value="Remove from shortlist" />
    <?php } ?>
    <?php /* <input class="button" type="submit" name="enable2" value="Suspend" /> */?>
    <input class="button" type="submit" name="delete" value="Delete" onclick="return confirmDelete();" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    
    <!--<div class="search-wrap">
    Candidate name<input type="text" name="keyword" id="keyword" value="<?php echo $this->session->userdata('content_key') ?>" />
    <select id="visa" name="visa">
              <option value="">Visa</option>
              <option value="Visit Visa" <?php if($this->session->userdata('content_visa')=='Visit Visa') { ?> selected="selected"<?php } ?>>Visit Visa</option>
              <option value="Family Visa" <?php if($this->session->userdata('content_visa')=='Family Visa') { ?> selected="selected"<?php } ?>>Family Visa</option>
              <option value="Employment Visa" <?php if($this->session->userdata('content_visa')=='Employment Visa') { ?> selected="selected"<?php } ?>>Employment Visa</option>
              <option value="Spousal Visa" <?php if($this->session->userdata('content_visa')=='Spousal Visa') { ?> selected="selected"<?php } ?>>Spousal Visa</option>
              <option value="UAE National" <?php if($this->session->userdata('content_visa')=='Spousal Visa') { ?> selected="selected"<?php } ?>>UAE National</option>
              
    </select>
    <select name="country" id="country">
    <option value="">Nationality</option>
    <?php
	foreach($countries as $country)
	{
	?>
    <option value="<?php echo $country['name']; ?>" <?php if($this->session->userdata('content_country')==$country['name']) { ?> selected="selected"<?php } ?>><?php echo $country['name']; ?></option>
    <?php
	}
	?>
    </select>
    <select name="job" id="job">
    <option value="">Job Title</option>
    <?php
	foreach($jobs as $job)
	{
	?>
    <option value="<?php echo $job['id']; ?>" <?php if($this->session->userdata('content_job')==$job['id']) { ?> selected="selected"<?php } ?>><?php echo $job['title']; ?></option>
    <?php
	}
	?>
    </select>
    Skills<input type="text" name="skill" id="skill" value="<?php echo $this->session->userdata('content_skill') ?>" />
    <input class="button" type="submit" name="search" value="Search" />
    <input class="button" type="submit" name="reset" value="Reset"  />
    </div>--> 
  </div>
  <table>
    <thead>
      <tr style="background:#000;">
        <th scope="col" style="width: 20px;"><input type="checkbox" class="select_all" name="ids" id="ids" /></th>
        <th scope="col" style="width: 20px;">ID</th>
        <th scope="col">Ref/No</th>
        <th scope="col">Applicant Name</th>
        <th scope="col">Job Post(Applied)</th>
        <?php if(isset($list_type)&& $list_type != 'pending') { ?>
        <th scope="col">Shortlisted Job(HR)</th>
        <?php } ?>
        <th scope="col">Nationality</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Application Date</th>
        <th scope="col">Year of Exp.</th>
        <th scope="col">Rating.</th>
        <th scope="col" style="width: 80px;">Status</th>
        <th scope="col" style="width: 125px;">View/Download Resume</th>
        <th scope="col" style="width: 160px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php 				
		foreach($careers as $career): ?>
      <?php
            $jobtitle=$this->jobs_model->load($career['jobs_id']);
            $apllication= $this->applications_model->load($career['id']);
            $shortlisted_jobtitle='NA';
            if($apllication->jobs_shortlist_id !=0 ) 
            {
             $shortlisted_jobdetails=$this->jobs_model->load($apllication->jobs_shortlist_id);
             $shortlisted_jobtitle=$shortlisted_jobdetails->title;
            }
            
        ?>
      <tr <?php if(isset($apllication->read) && $apllication->read !=0) { ?> style="background: #fff8cf;"<?php } ?>>
        <td class="align-center"><input type="checkbox" class="chkbx" name="id[]" value="<?php echo $career['id']; ?>" />
          <input type="hidden" name="mail[]" value="<?php echo $career['email']; ?>" /></td>
        <td class="align-center"><?php echo ++$i; ?></td>
        <td><?php //echo "#".@$jobtitle->refno;
		if(@$jobtitle->refno!="")
		{ 
		echo "#".@$jobtitle->refno;
		}
		else
		{
		echo "#CPA";
		}
		 ?></td>
        <td><?php echo $career['title'].'.'; ?> <?php echo $career['firstname'].' '.$career['lastname']; ?></td>
        <td><?php if(@$jobtitle->title!="") { echo @$jobtitle->title; } else { echo "Candidate pool application"; } ?></td>
        <?php if(isset($list_type)&& $list_type != 'pending') { ?>
        <td><?php echo $shortlisted_jobtitle; ?></td>
        <?php } ?>
        <td><?php if($career['nationality']!="") { echo $career['nationality']; } else { echo "N/A"; } ?></td>
        <td><?php echo $career['email']; ?></td>
        <td><?php echo $career['phone']; ?></td>
        <td><?php echo $career['application_date']; ?></td>
        <td><?php if($career['experience']!="") { echo $career['experience']; } else { echo "N/A"; } ?></td>
        <td><?php 
                   $color='';
                   if($apllication->rating==6 || $apllication->rating==0){ 
                     echo 'Not Rated';
                   } else {
                    echo $apllication->rating.'/5';
                        $color='green';
                        if($career['status'] =='Y'){
                         $career['status']='RS';
                         
                        }else {
                         $career['status']='R';
                        }
                   }
                ?></td>
        <td align="center"><span style="color:<?php echo $color;?>;"><?php echo $activearr[$career['status']]; ?></span></td>
        <?php
        if($this->uri->segment(4)!="")
        {
            $var=$this->uri->segment(4).'/';
        }
        ?>
        <td><a class="button" href="<?php echo site_url('admin/careers/downloadresume/'.$career['id']); ?>"><?php echo $career['title'].'.'; ?> <?php echo $career['firstname']; ?>'s Resume</a></td>
        <td><a href="<?php echo site_url('admin/careers/viewapplication/'.$career['id'].'/'.@$var.$return); ?>" class="table-icon view" title="View Details"></a> |
          <?php 
        //echo $activearr[$career['status']];
        //if(trim($activearr[$career['status']]) !='Shortlisted' && trim($activearr[$career['status']]) !='Rated&Shortlisted') { ?>
          <a href="<?php echo site_url('admin/careers/shortlistview/'.$career['id'].'/'.@$var.$return); ?>" class="shortlisting" style="color:#F90">Shortlist</a> |
          <?php //} ?>
          <a href="<?php echo site_url('admin/careers/rateview/'.$career['id'].'/'.@$var.$return); ?>" class="rating" style="color:#F90">Rate</a> <a style="display: none;" href="<?php echo site_url('admin/careers/deleteapplication/'.$career['id'].'/'.@$var.$return); ?>" class="table-icon delete" title="Delete" onclick="return confirmBox();"></a></td>
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
