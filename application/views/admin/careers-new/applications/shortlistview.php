<?php $rating=$job->rating; ?>
<script type="text/javascript" src="<?php echo base_url('public/admin/js/jquery-1.7.2.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/style.css'); ?>" />
<div id="main">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/rating.css'); ?>" />
<h3>Rate the Applicant Before Shortlist</h3>
<?php echo form_open('admin/careers/rateapplication/'.$job->id.'/'.$this->uri->segment(5),array('id'=>'rateform','name'=>'rateform')); ?>
 <div class="element rating2">
			<input type="radio" id="star1" name="r1" value="5" <?php if($job->rating==5) { ?> checked="checked"<?php } ?> />
            <label class = "full" for="star1" title="Awesome - 1 stars" ></label>
            <input type="radio" id="star2" name="r1" value="4" <?php if($job->rating==4) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star2" title="Awesome - 2 stars"></label>
            <input type="radio" id="star3" name="r1" value="3" <?php if($job->rating==3) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star3" title="Awesome - 3 stars"></label>
            <input type="radio" id="star4" name="r1" value="2" <?php if($job->rating==2) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star4" title="Awesome - 4 stars"></label>
            <input type="radio" id="star5" name="r1" value="1" <?php if($job->rating==1) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
</div>
<div class="entry" style="text-align:center;">
   <input type="submit" name="butSub" value="Rate" class="button rate-btn" />
</div>
<?php echo form_close(); ?>

  <form action="<?php echo site_url('admin/careers/shortlistapplication');?>" method="post" id="shortlist-frm" accept-charset="utf-8">
    <div class="search-wrap" style="float:left;">
      <h3>For Which Job like to ShortList?</h3>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tbody>
          <tr style="">
               <td><select name="short_list_cat" id="short-list-cat" style="width:100%">
                <?php foreach($jobslist as $jobdetails) { ?>
                <option value="<?php echo $jobdetails['id'];?>"><?php echo $jobdetails['title'];?></option>
                <?php } ?>
              </select>
              <input type="hidden" name="job_id" id="job-id" value="<?php echo $id;?>" /></td>
          </tr>
          <tr>
            
            <td><input class="button<?php if($rating==6) { ?> shortlist-btn<?php } ?>" type="submit" id="shortlist-btn" <?php if($rating==6) { ?> class="shortlist-btn" <?php } ?>name="Submit" value="Submit"/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>
<script>
$(".shortlist-btn").click(function(e) {
  e.preventDefault();
  alert('Please rate the Applicant');  
    
});


$(".rate-btn").click(function(e) {
 
  e.preventDefault();
  var ratingval = 	$("input[type='radio']:checked").val();
  if(ratingval) 
  {
    $.post("<?php echo base_url('en/admin/careers/rateapplication')?>", {
		id: "<?php echo $job->id;?>",
        r1:ratingval,
        type:"ajax"
        }, 
		function(data){
		if(data.length >0) {
			$(".shortlist-btn").remove();
		}
	});  
    
   } 
});

</script>

<style>

body { background: none;}

#shortlist-frm h3 { font-size: 16px; }

#shortlist-frm .search-wrap { padding-top: 0px; }

#shortlist-frm table td {

  font-family: arial;

  padding-left: 0  

}

</style>
