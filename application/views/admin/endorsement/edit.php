<div class="full_w" style="float:left;">
  <div class="h_title">Endorsement Registration Details</div>
  <?php echo form_open_multipart('admin/enquiry/edit/'.$enquiry->id.'/'.$return); ?>
  <input id="id" name="id" type="hidden" value="<?php echo $enquiry->id; ?>" />
  <div style="width:48%; float:left;">
  <div class="h_title">Applicant Information</div>
  <div class="element">
    <label for="title">Organization Name (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->name; ?> 
    <!--<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_name; ?>" />--> 
    
  </div>
  
  <?php
  if($enquiry->brief!="")
  {
  ?>
  
  <div class="element">
    <label for="title">Brief about the organization (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->brief; ?> 
    <!--<input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_email; ?>" />--> </div>
    
    <?php } ?>
  <?php
  if($enquiry->contact_name!="")
  {
  ?>
  <div class="element">
    <label for="title">Primary Contact Name (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->contact_name; ?> 
    <!--<input id="phone" name="phone" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_phone; ?>" />--> </div>
    <?php } ?>
  <?php
  if($enquiry->contact_title!="")
  {
  ?>
  <div class="element">
    <label for="title">Primary Contact Title (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('subject')){ $err=' err'; echo form_error('subject'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->contact_title; ?> 
    <!--<input id="subject" name="subject" type="text" class="text<?php echo $err; ?>" value="<?php echo $enquiry->enq_subject; ?>" />--> </div>
    <?php } ?>
  <?php
  if($enquiry->email!="")
  {
  ?>
  <div class="element">
    <label for="title">Preferred Mailing Address (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->email; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->city!="")
  {
  ?>
    
	<div class="element">
    <label for="title">City (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->city; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->country!="")
  {
  ?>
    <div class="element">
    <label for="title">Country (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->country; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->zip!="")
  {
  ?>
    <div class="element">
    <label for="title">Zip/Postal Code (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->zip; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->phone!="")
  {
  ?>
    <div class="element">
    <label for="title">Telephone (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->phone; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->email2!="")
  {
  ?>
    <div class="element">
    <label for="title">E-Mail (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->email2; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->website!="")
  {
  ?>
    <div class="element">
    <label for="title">Website (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->website; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->year!="")
  {
  ?>
    <div class="element">
    <label for="title">Year organization was incorporated or started (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->year; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->board!="")
  {
  ?>
    <div class="element">
    <label for="title">Does a Board of Directors govern your organization? (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->board; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->membership!="")
  {
  ?>
    <div class="element">
    <label for="title">What countries/bodies are represented within the membership of your organization (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->membership; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->profit!="")
  {
  ?>
    <div class="element">
    <label for="title">Does the organization have not-for-profit status (or the legal equivalent) under applicable law? (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->profit; ?> </div>
    <?php } ?>
    </div>
    <div style="width:48%; float:right;">
    <div class="h_title">Event Information</div>
  <?php
  if($enquiry->title!="")
  {
  ?>
    <div class="element">
    <label for="title">Title of Event (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->title; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->event_date!="")
  {
  ?>
    <div class="element">
    <label for="title">Event Date (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->event_date; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->location!="")
  {
  ?>
    <div class="element">
    <label for="title">Event Location (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->location; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->recurring_event!="")
  {
  ?>
    <div class="element">
    <label for="title">Is this a recurring event (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->recurring_event; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->event_type!="")
  {
  ?>
    <div class="element">
    <label for="title">Type of Event  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->event_type; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->educational_objective!="")
  {
  ?>
    <div class="element">
    <label for="title">Educational Objectives  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->educational_objective; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->evaluation!="")
  {
  ?>
    <div class="element">
    <label for="title">Evaluation (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->evaluation; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->target_audience!="")
  {
  ?>
    <div class="element">
    <label for="title">Target Audience (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->target_audience; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->no_attendees!="")
  {
  ?>
    <div class="element">
    <label for="title">Estimated Number of attendees (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->no_attendees; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->draft!="")
  {
  ?>
    <div class="element">
    <label for="title">A draft Event agenda  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php
	if($enquiry->draft!="")
	{
    ?>
    <a href="<?php echo base_url('public/uploads/endorsement/'.$enquiry->draft); ?>" class="fancybox">View</a>
    <?php
	}
	?>
    </div>  
    <?php } ?>
  <?php
  if($enquiry->funding!="")
  {
  ?>
	<div class="element">
    <label for="title">Who is funding the event?  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->funding; ?> </div> 
    <?php } ?>  
  <?php
  if($enquiry->countries!="")
  {
  ?>
    <div class="element">
    <label for="title">Please list the countries where attendees will come from and the estimated number. (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->countries; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->cme!="")
  {
  ?>
    <div class="element">
    <label for="title">Does your organization intend to provide CME for this event? (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->cme; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->language!="")
  {
  ?>
    <div class="element">
    <label for="title">Official language of the Event (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->language; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->agenda!="")
  {
  ?>
    <div class="element">
    <label for="title">Event Agenda (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php
	if($enquiry->agenda!="")
	{
    ?>
    <a href="<?php echo base_url('public/uploads/endorsement/'.$enquiry->agenda); ?>" class="fancybox">View</a>
    <?php
	}
	?>
    </div>
    <?php } ?>
  <?php
  if($enquiry->translation!="")
  {
  ?>
    <div class="element">
    <label for="title">Will simultaneous interpretation (translation) be offered? (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->translation; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->names_faculty!="")
  {
  ?>
    <div class="element">
    <label for="title">Names and affiliations of International Faculty who will participate in organizing the Event (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->names_faculty; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->course!="")
  {
  ?>
    <div class="element">
    <label for="title">Does your organization plan to publish course proceedings or post them on a website (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->course; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->course_approval!="")
  {
  ?>
    <div class="element">
    <label for="title">Does this course require approval from a governing body to take place in the proposed country (i.e., Ministry of Health)?  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->course_approval; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->sponsorship!="")
  {
  ?>
    <div class="element">
    <label for="title">Names of other entities being approached for sponsorship, endorsement or funding of the Event  (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->sponsorship; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->another_party!="")
  {
  ?>
    <div class="element">
    <label for="title">is the event endorsed by another party? (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->another_party; ?> </div>
    <?php } ?>
    </div>
    <div style="width:48%; float:left;">
    <div class="h_title">Application fees & payment</div>
  <?php
  if($enquiry->fees!="")
  {
  ?>
    <div class="element">
    <label for="title">ALL FEES ARE NON-REFUNDABLE (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->fees; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->pay!="")
  {
  ?>
    <div class="element">
    <label for="title">Payment method (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php echo $enquiry->pay; ?> </div>
    <?php } ?>
  <?php
  if($enquiry->letter_member!="")
  {
  ?>
    <div class="element">
    <label for="title">A letter of support from an ECS member (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php
	if($enquiry->letter_member!="")
	{
    ?>
    <a href="<?php echo base_url('public/uploads/endorsement/'.$enquiry->letter_member); ?>" class="fancybox">View</a>
    <?php
	}
	?>
    </div>
    <?php } ?>
  <?php
  if($enquiry->society!="")
  {
  ?>
    <div class="element">
    <label for="title">A copy of Society’s non-profit certification, where applicable (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)
      <?php if(form_error('msg')){ $err=' err'; echo form_error('msg'); } else { $err=''; ?>
      
      <!--<span> (required)</span>-->
      
      <?php } ?>
    </label>
    <?php
	if($enquiry->society!="")
	{
    ?>
    <a href="<?php echo base_url('public/uploads/endorsement/'.$enquiry->society); ?>" class="fancybox">View</a>
    <?php
	}
	?>
    </div>
     <?php } ?>
    </div>
    
    
    
    
    
    
    
  <!--<div class="element">
    <label for="status">Status
      <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?>
      <span> (required)</span>
      <?php } ?>
    </label>
    <input type="radio" name="status" value="Y" <?php if($enquiry->is_active=='Y'){ echo 'checked="checked"';} ?> />
    Enabled
    <input type="radio" name="status" value="N" <?php if($enquiry->is_active=='N'){ echo 'checked="checked"';} ?> />
    Disabled </div>-->
  <div class="entry" style=" width:100%; float:left;">
    <button type="submit" class="add">Save</button>
    <a class="button cancel" href="<?php echo site_url('admin/enquiry/lists'); ?>">Cancel</a> </div>
  <?php echo form_close(); ?> </div>
<script language="javascript">
$(document).ready(function() {
	$(".fancybox").fancybox({
	});
	});
</script>