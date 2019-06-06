<?php 
echo form_open_multipart('endorsement/endorsement2/',array("id"=>"registerendform","class"=>"ajaxform")); 
?>
<?php
$events=explode(",",@$data->event_type);
?>
<!--<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.datetimepicker.css'); ?>"/>

<script src="<?php echo base_url('public/frontend/js/jquery.datetimepicker.js'); ?>"></script>
-->
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
<h2>Event Information</h2>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<div class="row">
<div class="input-holder">
<label><?php echo convert_lang('Title of Event',$this->alphalocalization); ?> <?php $err=''; if(form_error('title')){ $err=' err'; echo form_error('title'); } ?></label> 
<input class="required" name="title" type="text" id="title" value="<?php echo @$data->title; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Event Date',$this->alphalocalization); ?> <?php $err=''; if(form_error('event_date')){ $err=' err'; echo form_error('event_date'); } ?></label> 
<input class="" name="event_date" type="text" id="datetimepicker2" value="<?php echo @$data->event_date; ?>" readonly="readonly" />

</div>
<div class="input-holder">
<label><?php echo convert_lang('Event Location',$this->alphalocalization); ?> <?php $err=''; if(form_error('location')){ $err=' err'; echo form_error('location'); } ?></label> 
<input class="required" name="location" type="text" id="location" value="<?php echo @$data->location; ?>" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Brief Description of Event',$this->alphalocalization); ?> <?php $err=''; if(form_error('description')){ $err=' err'; echo form_error('description'); } ?></label> 
<!--<input class="required" name="description" placeholder="Brief Description of Event" type="text" id="description" value="<?php echo set_value('description'); ?>" />
-->
<textarea class="" name="description" id="description"><?php echo @$data->description; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Is this a recurring event',$this->alphalocalization); ?><?php $err=''; if(form_error('recurring_event')){ $err=' err'; echo form_error('recurring_event'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="recurring_event" value="Y" <?php if(@$data->recurring_event=='Y') { ?> checked="checked"<?php } ?> />Yes
<input type="radio" name="recurring_event" value="N" <?php if(@$data->recurring_event=='N') { ?> checked="checked"<?php } ?> />No
</p>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Type of Event',$this->alphalocalization); ?><?php $err=''; if(form_error('event_type')){ $err=' err'; echo form_error('event_type'); } ?></label> 
<p>
<input type="checkbox" name="event_type[]" value="Abstract submissions with peer-review" <?php if(in_array('Abstract submissions with peer-review',$events)) { ?> checked="checked"<?php } ?>/>Abstract submissions with peer-review
</p>
<p>
<input type="checkbox" name="event_type[]" value="Invited peer-reviewed educational presentations" <?php if(in_array('Invited peer-reviewed educational presentations',$events)) { ?> checked="checked"<?php } ?>/>Invited peer-reviewed educational presentations
</p>
<p>
<input type="checkbox" name="event_type[]" value="Regional educational meeting with invited speakers" <?php if(in_array('Regional educational meeting with invited speakers',$events)) { ?> checked="checked"<?php } ?>/>Regional educational meeting with invited speakers
</p>
<p>
<input type="checkbox" name="event_type[]" value="Thematic symposium with invited speakers" <?php if(in_array('Thematic symposium with invited speakers',$events)) { ?> checked="checked"<?php } ?>/>Thematic symposium with invited speakers 
</p>
<p>
<input type="checkbox" name="event_type[]" value="Product-driven educational meeting" <?php if(in_array('Product-driven educational meeting',$events)) { ?> checked="checked"<?php } ?>/>Product-driven educational meeting 
</p>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Educational Objective',$this->alphalocalization); ?><?php $err=''; if(form_error('educational_objective')){ $err=' err'; echo form_error('educational_objective'); } ?> </label> 
<textarea class="" name="educational_objective" id="educational_objective"><?php echo @$data->educational_objective; ?></textarea>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Evaluation',$this->alphalocalization); ?><?php $err=''; if(form_error('evaluation')){ $err=' err'; echo form_error('evaluation'); } ?> </label>
<textarea class="" name="evaluation" id="evaluation"><?php echo @$data->evaluation; ?></textarea>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Target Audience',$this->alphalocalization); ?><?php $err=''; if(form_error('target_audience')){ $err=' err'; echo form_error('target_audience'); } ?> </label> 
<textarea class="" name="target_audience" id="target_audience"><?php echo @$data->target_audience; ?></textarea>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Estimated number of attendees',$this->alphalocalization); ?><?php $err=''; if(form_error('no_attendees')){ $err=' err'; echo form_error('no_attendees'); } ?> </label> 
<input class="" name="no_attendees" type="text" id="no_attendees" value="<?php echo @$data->no_attendees; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('A Draft Event Agenda',$this->alphalocalization); ?><?php $err=''; if(form_error('draft')){ $err=' err'; echo form_error('draft'); } ?> </label> 
<input type="file" name="draft" id="draft" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Who is funding the event',$this->alphalocalization); ?><?php $err=''; if(form_error('funding')){ $err=' err'; echo form_error('funding'); } ?> </label> 
<textarea class="" name="funding" id="funding"><?php echo @$data->funding; ?></textarea>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Please list the countries where attendees will come from and the estimated number.',$this->alphalocalization); ?><?php $err=''; if(form_error('countries')){ $err=' err'; echo form_error('countries'); } ?> </label> 
<textarea class="" name="countries" id="countries"><?php echo @$data->countries; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Does your organization intend to provide CME for this event?',$this->alphalocalization); ?><?php $err=''; if(form_error('cme')){ $err=' err'; echo form_error('cme'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="cme" value="Y" <?php if(@$data->cme=='Y') { ?> checked="checked"<?php } ?>/>Yes
<input type="radio" name="cme" value="N" <?php if(@$data->cme=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Official language of the Event',$this->alphalocalization); ?> <?php $err=''; if(form_error('language')){ $err=' err'; echo form_error('language'); } ?></label> 
<input class="" name="language" type="text" id="language" value="<?php echo @$data->language; ?>" />
</div>
<div class="input-holder">

<label><?php echo convert_lang('Event Agenda',$this->alphalocalization); ?><?php $err=''; if(form_error('agenda')){ $err=' err'; echo form_error('agenda'); } ?> </label> 
<input type="file" name="agenda" />
</div>
<div class="input-holder">
<label><?php echo convert_lang('Will simultaneous interpretation (translation) be offered? ',$this->alphalocalization); ?><?php $err=''; if(form_error('translation')){ $err=' err'; echo form_error('translation'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="translation" value="Y" <?php if(@$data->translation=='Y') { ?> checked="checked"<?php } ?>/>Yes
<input type="radio" name="translation" value="N" <?php if(@$data->translation=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Names and affiliations of International Faculty who will participate in organizing the Event',$this->alphalocalization); ?><?php $err=''; if(form_error('names_faculty')){ $err=' err'; echo form_error('names_faculty'); } ?> </label> 
<textarea class="" name="names_faculty" id="names_faculty"><?php echo @$data->names_faculty; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Does your organization plan to publish course proceedings or post them on a website',$this->alphalocalization); ?><?php $err=''; if(form_error('course')){ $err=' err'; echo form_error('course'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="course" value="Y" <?php if(@$data->course=='Y') { ?> checked="checked"<?php } ?>/>Yes
<input type="radio" name="course" value="N" <?php if(@$data->course=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="input-holder">
<label><?php echo convert_lang('Does this course require approval from a governing body to take place in the proposed country (i.e., Ministry of Health)?',$this->alphalocalization); ?><?php $err=''; if(form_error('course_approval')){ $err=' err'; echo form_error('course_approval'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="course_approval" value="Y" <?php if(@$data->course_approval=='Y') { ?> checked="checked"<?php } ?>/>Yes
<input type="radio" name="course_approval" value="N" <?php if(@$data->course_approval=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="input-holder">

<label><?php echo convert_lang('Names of other entities being approached for sponsorship, endorsement or funding of the Event',$this->alphalocalization); ?><?php $err=''; if(form_error('sponsorship')){ $err=' err'; echo form_error('sponsorship'); } ?> </label> 
<textarea class="" name="sponsorship" id="sponsorship"><?php echo @$data->sponsorship; ?></textarea>
</div>
<div class="input-holder">
<label><?php echo convert_lang('is the event endorsed by another party?',$this->alphalocalization); ?><?php $err=''; if(form_error('another_party')){ $err=' err'; echo form_error('another_party'); } ?></label> 
<!--<input class="required" placeholder="Email" name="email" type="text" id="email" value="<?php echo set_value('email'); ?>"  />-->
<p>
<input type="radio" name="another_party" value="Y" <?php if(@$data->another_party=='Y') { ?> checked="checked"<?php } ?>//>Yes
<input type="radio" name="another_party" value="N" <?php if(@$data->another_party=='N') { ?> checked="checked"<?php } ?>/>No
</p>
</div>
<div class="cell-wrapper">			
<!-- <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
 
<div class="input-holder cell"> 
<?php echo $cap['image']; ?>
</div>
<div class="input-holder cell">
<input placeholder="Security Code" name="captcha" type="text" class="required" id="captcha" >

</div>
-->
<div class="input-holder cell">  
<a onclick="getendform('<?php echo $_SESSION['uid']; ?>');" class="btn red">Back</a>                     
<button class="btn red" name="butSub" type="submit" value="Submit" id="butSub2">Next</button>
<!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
</div>

</div>

</div>					
<?php echo form_close(); ?>

<script type="text/javascript">

$(function() { 

  $("#registerendform").submit(function(e){

    e.preventDefault();
	
        $.ajax({
            url: "<?php echo site_url('endorsement/endorsement2/');?>",
            type: "POST",
            data:  new FormData(this),
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
			getendform3();
            //$("#targetLayer").html(data);
            },
            error: function() 
            {
            }           
       });

  });

}); 
$('#datetimepicker2').datetimepicker({
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d'
});
</script>
