<div class="careers_details">

<!-- <h2><?php //echo $jobs->title; ?> </h2>

	<span class="location"><?php //echo convert_lang('Location',$this->alphalocalization); ?> : <?php //echo $jobs->location; ?> </span>

	<span class="date"><?php //echo convert_lang('Date',$this->alphalocalization); ?>: <?php //echo date('d/m/Y',strtotime($jobs->job_date)); ?> </span>

	 <span class="ref"><?php //echo convert_lang('Ref',$this->alphalocalization); ?>. <?php //echo $jobs->refno; ?> </span>-->

     

  </div>

     <div class="account_leverage career_form">
 <?php echo form_open_multipart('careers/apply'); ?>
             <?php //echo form_open_multipart('careers/apply/'.$jobs->slug); ?>

    <input type="hidden" name="jobs_id" value="<?php //echo $jobs->id?>">

    <input type="hidden" name="title" value="<?php //echo $jobs->title?>">          

                      <ul class="row">

                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                             <label><span class="required"><?php echo convert_lang('First Name',$this->alphalocalization); ?></span>    <?php if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?></label> 

                             <input class="required form-control" name="firstname" type="text" id="firstname" value="<?php echo set_value('firstname'); ?>">

                            </li>

                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                             <label><span class="required"><?php echo convert_lang('Last Name',$this->alphalocalization); ?></span> <?php if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?></label> 

                             <input class="required" name="lastname" type="text" id="lastname" value="<?php echo set_value('lastname'); ?>">

                            </li> 

                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <label><span class="required"><?php echo convert_lang('Email',$this->alphalocalization); ?></span> <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } ?></label> 

                             <input class="required" name="email" type="text" value="<?php echo set_value('email'); ?>" id="email">

                            </li>

                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <label><span class="required"><?php echo convert_lang('Phone',$this->alphalocalization); ?></span> <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?></label> 

                             <input class="required" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>">

                            </li>

                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <label><?php echo convert_lang('Resume',$this->alphalocalization); ?><?php if(form_error('resume')){ $err=' err'; echo form_error('resume'); } ?></label>

                            	<input class="required" name="resume" type="file" value="" id="resume">

                            </li>

                             <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <label><span class="required"><?php echo convert_lang('Cover Letter',$this->alphalocalization); ?></span><?php if(form_error('coverletter')){ $err=' err'; echo form_error('coverletter'); } ?></label>

                            	<textarea name="coverletter" cols="" rows=""><?php echo set_value('coverletter'); ?></textarea>

                            </li>
                            
                            <li class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <input type="submit" value="Submit" name="deposit" class="input-btn">
                            </li>
		 					

                      </ul>                        

	<?php echo form_close(); ?>

                      </div>

                      

                      

       