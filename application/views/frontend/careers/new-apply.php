<script src="<?php echo base_url('public/frontend/js/vendor/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery-ui.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery.selectBoxIt.js'); ?>"></script>
<div class="book-party-wrap">
  <div class="careers_details careers" >
    <h2>Apply</h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="careers_details careers" >
        <?php
if(@$jobs->title!='')
{
?>
        <h3><?php echo @$jobs->title; ?> </h3>
        <?php
}
else
{
?>
        <!--<h3>Apply Now</h3>-->
        <?php
}
if(@$jobs->location!='')
{
?>
        <span class="location"><strong><?php echo convert_lang('Location',$this->alphalocalization); ?> :</strong> <?php echo @$jobs->location; ?> </span> <span class="date"><strong><?php echo convert_lang('Date',$this->alphalocalization); ?>: </strong><?php echo date('d/m/Y',strtotime(@$jobs->job_date)); ?> </span> <span class="ref"><strong><?php echo convert_lang('Ref',$this->alphalocalization); ?>: </strong><?php echo @$jobs->refno; ?> </span>
        <?php
   }
   ?>
      </div>
      <div class="wrap-contact-form careers"> <?php echo form_open_multipart('careers/apply/'.@$jobs->slug); ?>
        <input type="hidden" name="jobs_id" value="<?php echo @$jobs->id?>">
        <input type="hidden" name="title" value="<?php echo @$jobs->title?>">
        <ul class="row">
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label><span class="required"><?php echo convert_lang('First Name',$this->alphalocalization); ?></span>
              <?php if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?>
            </label>
            <input class="required" name="firstname" type="text" id="firstname" value="<?php echo set_value('firstname'); ?>">
          </li>
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label><span class="required"><?php echo convert_lang('Last Name',$this->alphalocalization); ?></span>
              <?php if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?>
            </label>
            <input class="required" name="lastname" type="text" id="lastname" value="<?php echo set_value('lastname'); ?>">
          </li>
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label><span class="required"><?php echo convert_lang('Email',$this->alphalocalization); ?></span>
              <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } ?>
            </label>
            <input class="required" name="email" type="text" value="<?php echo set_value('email'); ?>" id="email">
          </li>
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label><span class="required"><?php echo convert_lang('Phone',$this->alphalocalization); ?></span>
              <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?>
            </label>
            <input class="required" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>">
          </li>
          <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label><span class="required"><?php echo convert_lang('Cover Letter',$this->alphalocalization); ?></span>
              <?php if(form_error('coverletter')){ $err=' err'; echo form_error('coverletter'); } ?>
            </label>
            <textarea name="coverletter"  class="" cols="" rows="5"><?php echo set_value('coverletter'); ?></textarea>
          </li>
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label><?php echo convert_lang('Resume',$this->alphalocalization); ?>
              <?php if(form_error('resume')){ $err=' err'; echo form_error('resume'); } ?>
            </label>
            <input class="required" name="resume" type="file" value="" id="resume">
          </li>
          <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <button class="btn-submit" type="submit" name="deposit">Submit</button>
          </li>
        </ul>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
