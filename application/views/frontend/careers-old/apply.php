<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
<section class="content-main inside">
  <div class="container">
    <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200">Careers</h2>
    <div class="career_form-wrap">
      <div class="careers_details careers">
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
        <h3>Apply Now</h3>
        <?php
}
if(@$jobs->location!='')
{
?>
        <span class="location"><?php echo convert_lang('Location',$this->alphalocalization); ?> : <?php echo @$jobs->location; ?> </span> <span class="date"><?php echo convert_lang('Date',$this->alphalocalization); ?>: <?php echo date('d/m/Y',strtotime(@$jobs->job_date)); ?> </span> <span class="ref"><?php echo convert_lang('Ref',$this->alphalocalization); ?>. <?php echo @$jobs->refno; ?> </span>
        <?php
   }
   ?>
      </div>
      <div class="contact-form form"> <?php echo form_open_multipart('careers/apply/'.@$jobs->slug); ?>
        <input type="hidden" name="jobs_id" value="<?php echo @$jobs->id?>">
        <input type="hidden" name="title" value="<?php echo @$jobs->title?>">
        <ul class="row">
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Title',$this->alphalocalization); ?></span>
              <?php if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?>
            </label>
            <select name="title">
              <option value="Mr" <?php if(set_value('title')=="Mr") { ?> selected="selected"<?php } ?>>Mr</option>
              <option value="Mrs" <?php if(set_value('title')=="Mrs") { ?> selected="selected"<?php } ?>>Mrs</option>
              <option value="Miss" <?php if(set_value('title')=="Miss") { ?> selected="selected"<?php } ?>>Miss</option>
              <option value="Dr" <?php if(set_value('title')=="Dr") { ?> selected="selected"<?php } ?>>Dr</option>
            </select>
            
            <!--<input class="required form-control" name="firstname" type="text" id="firstname" value="<?php echo set_value('firstname'); ?>">--> 
            
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('First Name',$this->alphalocalization); ?></span>
              <?php if(form_error('firstname')){ $err=' err'; echo form_error('firstname'); } ?>
            </label>
            <input class="required" name="firstname" type="text" id="firstname" value="<?php echo set_value('firstname'); ?>">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Last Name',$this->alphalocalization); ?></span>
              <?php if(form_error('lastname')){ $err=' err'; echo form_error('lastname'); } ?>
            </label>
            <input class="required" name="lastname" type="text" id="lastname" value="<?php echo set_value('lastname'); ?>">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Email',$this->alphalocalization); ?></span>
              <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } ?>
            </label>
            <input class="required" name="email" type="text" value="<?php echo set_value('email'); ?>" id="email">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Phone',$this->alphalocalization); ?></span>
              <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?>
            </label>
            <input class="required" name="phone" type="text" id="phone" value="<?php echo set_value('phone'); ?>">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Nationality',$this->alphalocalization); ?></span>
              <?php if(form_error('phone')){ $err=' err'; echo form_error('phone'); } ?>
            </label>
            <select class="required" id="nationality" name="nationality">
              <option value=""><?php echo convert_lang('Select your Nationality',$this->alphalocalization); ?></option>
              <?php
					foreach($countries as $country)
					{
					?>
              <option value="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
              <?php
					}
					?>
            </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Languages',$this->alphalocalization); ?></span>
              <?php if(form_error('language')){ $err=' err'; echo form_error('language'); } ?>
            </label>
            <select name="language" id="language">
              <option value="">Native Language</option>
              <option value="english">English</option>
                <option value="arabic">Arabic</option>
                <option value="chinese">Chinese</option>
                <option value="french">French</option>
                <option value="german">German</option>
                <option value="russian">Russian</option>
                <option value="spanish">Spanish</option>
                <option value="afrikaans">Afrikaans</option>
                <option value="armenian">Armenian</option>
                <option value="asturian">Asturian</option>
                <option value="basque">Basque</option>
                <option value="belarusian">Belarusian</option>
                <option value="bengali">Bengali</option>
                <option value="brazilian portuguese">Brazilian Portuguese</option>
                <option value="breton">Breton</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="catalan">Catalan</option>
                <option value="chinese traditional">Chinese traditional</option>
                <option value="croatian">Croatian</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="dutch">Dutch</option>
                <option value="esperanto">Esperanto</option>
                <option value="estonian">Estonian</option>
                <option value="faroese">Faroese</option>
                <option value="finnish">Finnish</option>
                <option value="flemish">Flemish</option>
                <option value="frisian">Frisian</option>
                <option value="galician">Galician</option>
                <option value="georgian">Georgian</option>
                <option value="greek">Greek</option>
                <option value="gujarati">Gujarati</option>
                <option value="hebrew">Hebrew</option>
                <option value="hindi">Hindi</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelandic">Icelandic</option>
                <option value="ido">Ido</option>
                <option value="indonesian">Indonesian</option>
                <option value="interlingua">Interlingua</option>
                <option value="irish">Irish</option>
                <option value="italian">Italian</option>
                <option value="japanese">Japanese</option>
                <option value="khmer">Khmer</option>
                <option value="kolsch">Kolsch</option>
                <option value="korean">Korean</option>
                <option value="latin">Latin</option>
                <option value="latvian">Latvian</option>
                <option value="lithuanian">Lithuanian</option>
                <option value="macedonian">Macedonian</option>
                <option value="malay">Malay</option>
                <option value="maltese">Maltese</option>
                <option value="marathi">Marathi</option>
                <option value="neapolitan">Neapolitan</option>
                <option value="nepali">Nepali</option>
                <option value="norwegian bokmal">Norwegian Bokmal</option>
                <option value="nynorsk">Nynorsk</option>
                <option value="persian">Persian</option>
                <option value="piedmontese">Piedmontese</option>
                <option value="polish">Polish</option>
                <option value="portuguese">Portuguese</option>
                <option value="romanian">Romanian</option>
                <option value="sanskrit">Sanskrit</option>
                <option value="serbian">Serbian</option>
                <option value="serbian cyrillic">Serbian cyrillic</option>
                <option value="sicilian">Sicilian</option>

                <option value="slovak">Slovak</option>
                <option value="slovenian">Slovenian</option>
                <option value="swahili">Swahili</option>
                <option value="swedish">Swedish</option>
                <option value="tagalog">Tagalog</option>
                <option value="tamil">Tamil</option>
                <option value="telugu">Telugu</option>
                <option value="thai">Thai</option>
                <option value="turkish">Turkish</option>
                <option value="ukrainian">Ukrainian</option>
                <option value="urdu">Urdu</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="volapuk">Volapuk</option>
                <option value="walloon">Walloon</option>
                <option value="welsh">Welsh</option>
                <option value="xhosa">Xhosa</option>
                <option value="yiddish">Yiddish</option>
                <option value="zulu">Zulu</option>
            </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Languages',$this->alphalocalization); ?></span>
              <?php if(form_error('language')){ $err=' err'; echo form_error('language'); } ?>
            </label>
            <select name="language2" id="language2">
              <option value="">Fluent</option>
              <option value="english">English</option>
                <option value="arabic">Arabic</option>
                <option value="chinese">Chinese</option>
                <option value="french">French</option>
                <option value="german">German</option>
                <option value="russian">Russian</option>
                <option value="spanish">Spanish</option>
                <option value="afrikaans">Afrikaans</option>
                <option value="armenian">Armenian</option>
                <option value="asturian">Asturian</option>
                <option value="basque">Basque</option>
                <option value="belarusian">Belarusian</option>
                <option value="bengali">Bengali</option>
                <option value="brazilian portuguese">Brazilian Portuguese</option>
                <option value="breton">Breton</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="catalan">Catalan</option>
                <option value="chinese traditional">Chinese traditional</option>
                <option value="croatian">Croatian</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="dutch">Dutch</option>
                <option value="esperanto">Esperanto</option>
                <option value="estonian">Estonian</option>
                <option value="faroese">Faroese</option>
                <option value="finnish">Finnish</option>
                <option value="flemish">Flemish</option>
                <option value="frisian">Frisian</option>
                <option value="galician">Galician</option>
                <option value="georgian">Georgian</option>
                <option value="greek">Greek</option>
                <option value="gujarati">Gujarati</option>
                <option value="hebrew">Hebrew</option>
                <option value="hindi">Hindi</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelandic">Icelandic</option>
                <option value="ido">Ido</option>
                <option value="indonesian">Indonesian</option>
                <option value="interlingua">Interlingua</option>
                <option value="irish">Irish</option>
                <option value="italian">Italian</option>
                <option value="japanese">Japanese</option>
                <option value="khmer">Khmer</option>
                <option value="kolsch">Kolsch</option>
                <option value="korean">Korean</option>
                <option value="latin">Latin</option>
                <option value="latvian">Latvian</option>
                <option value="lithuanian">Lithuanian</option>
                <option value="macedonian">Macedonian</option>
                <option value="malay">Malay</option>
                <option value="maltese">Maltese</option>
                <option value="marathi">Marathi</option>
                <option value="neapolitan">Neapolitan</option>
                <option value="nepali">Nepali</option>
                <option value="norwegian bokmal">Norwegian Bokmal</option>
                <option value="nynorsk">Nynorsk</option>
                <option value="persian">Persian</option>
                <option value="piedmontese">Piedmontese</option>
                <option value="polish">Polish</option>
                <option value="portuguese">Portuguese</option>
                <option value="romanian">Romanian</option>
                <option value="sanskrit">Sanskrit</option>
                <option value="serbian">Serbian</option>
                <option value="serbian cyrillic">Serbian cyrillic</option>
                <option value="sicilian">Sicilian</option>

                <option value="slovak">Slovak</option>
                <option value="slovenian">Slovenian</option>
                <option value="swahili">Swahili</option>
                <option value="swedish">Swedish</option>
                <option value="tagalog">Tagalog</option>
                <option value="tamil">Tamil</option>
                <option value="telugu">Telugu</option>
                <option value="thai">Thai</option>
                <option value="turkish">Turkish</option>
                <option value="ukrainian">Ukrainian</option>
                <option value="urdu">Urdu</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="volapuk">Volapuk</option>
                <option value="walloon">Walloon</option>
                <option value="welsh">Welsh</option>
                <option value="xhosa">Xhosa</option>
                <option value="yiddish">Yiddish</option>
                <option value="zulu">Zulu</option>
            </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Languages',$this->alphalocalization); ?></span>
              <?php if(form_error('language')){ $err=' err'; echo form_error('language'); } ?>
            </label>
            <select name="language3" id="language3">
              <option value="">Conversational In</option>
              <option value="english">English</option>
                <option value="arabic">Arabic</option>
                <option value="chinese">Chinese</option>
                <option value="french">French</option>
                <option value="german">German</option>
                <option value="russian">Russian</option>
                <option value="spanish">Spanish</option>
                <option value="afrikaans">Afrikaans</option>
                <option value="armenian">Armenian</option>
                <option value="asturian">Asturian</option>
                <option value="basque">Basque</option>
                <option value="belarusian">Belarusian</option>
                <option value="bengali">Bengali</option>
                <option value="brazilian portuguese">Brazilian Portuguese</option>
                <option value="breton">Breton</option>
                <option value="bulgarian">Bulgarian</option>
                <option value="catalan">Catalan</option>
                <option value="chinese traditional">Chinese traditional</option>
                <option value="croatian">Croatian</option>
                <option value="czech">Czech</option>
                <option value="danish">Danish</option>
                <option value="dutch">Dutch</option>
                <option value="esperanto">Esperanto</option>
                <option value="estonian">Estonian</option>
                <option value="faroese">Faroese</option>
                <option value="finnish">Finnish</option>
                <option value="flemish">Flemish</option>
                <option value="frisian">Frisian</option>
                <option value="galician">Galician</option>
                <option value="georgian">Georgian</option>
                <option value="greek">Greek</option>
                <option value="gujarati">Gujarati</option>
                <option value="hebrew">Hebrew</option>
                <option value="hindi">Hindi</option>
                <option value="hungarian">Hungarian</option>
                <option value="icelandic">Icelandic</option>
                <option value="ido">Ido</option>
                <option value="indonesian">Indonesian</option>
                <option value="interlingua">Interlingua</option>
                <option value="irish">Irish</option>
                <option value="italian">Italian</option>
                <option value="japanese">Japanese</option>
                <option value="khmer">Khmer</option>
                <option value="kolsch">Kolsch</option>
                <option value="korean">Korean</option>
                <option value="latin">Latin</option>
                <option value="latvian">Latvian</option>
                <option value="lithuanian">Lithuanian</option>
                <option value="macedonian">Macedonian</option>
                <option value="malay">Malay</option>
                <option value="maltese">Maltese</option>
                <option value="marathi">Marathi</option>
                <option value="neapolitan">Neapolitan</option>
                <option value="nepali">Nepali</option>
                <option value="norwegian bokmal">Norwegian Bokmal</option>
                <option value="nynorsk">Nynorsk</option>
                <option value="persian">Persian</option>
                <option value="piedmontese">Piedmontese</option>
                <option value="polish">Polish</option>
                <option value="portuguese">Portuguese</option>
                <option value="romanian">Romanian</option>
                <option value="sanskrit">Sanskrit</option>
                <option value="serbian">Serbian</option>
                <option value="serbian cyrillic">Serbian cyrillic</option>
                <option value="sicilian">Sicilian</option>

                <option value="slovak">Slovak</option>
                <option value="slovenian">Slovenian</option>
                <option value="swahili">Swahili</option>
                <option value="swedish">Swedish</option>
                <option value="tagalog">Tagalog</option>
                <option value="tamil">Tamil</option>
                <option value="telugu">Telugu</option>
                <option value="thai">Thai</option>
                <option value="turkish">Turkish</option>
                <option value="ukrainian">Ukrainian</option>
                <option value="urdu">Urdu</option>
                <option value="vietnamese">Vietnamese</option>
                <option value="volapuk">Volapuk</option>
                <option value="walloon">Walloon</option>
                <option value="welsh">Welsh</option>
                <option value="xhosa">Xhosa</option>
                <option value="yiddish">Yiddish</option>
                <option value="zulu">Zulu</option>
            </select>
          </li>
         
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Visa Status',$this->alphalocalization); ?></span>
              <?php if(form_error('visa')){ $err=' err'; echo form_error('visa'); } ?>
            </label>
            <select name="visa" id="visa">
              <option value="">Visa</option>
              <option value="Visit Visa">Visit Visa</option>
              <option value="Employment Visa">Employment Visa</option>
              <option value="Spousal Visa">Spousal Visa</option>
              <option value="Residents National Visa">Residents National Visa</option>
              </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Highest Level of Education',$this->alphalocalization); ?></span>
              <?php if(form_error('education')){ $err=' err'; echo form_error('education'); } ?>
            </label>
            <select name="education" id="education">
              <option value="">Education</option>
              <option value="High School">High School</option>
              <option value="Diploma">Diploma</option>
              <option value="Bachelors Degree">Bachelors Degree</option>
              <option value="Masters">Masters</option>
              <option value="Doctorate">Doctorate</option>
            </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Field of Study',$this->alphalocalization); ?></span>
              <?php if(form_error('field')){ $err=' err'; echo form_error('field'); } ?>
            </label>
            <input name="field" type="text" value="<?php echo set_value('field'); ?>" id="field">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Current Employer',$this->alphalocalization); ?></span>
              <?php if(form_error('employer')){ $err=' err'; echo form_error('employer'); } ?>
            </label>
            <input name="employer" type="text" id="employer" value="<?php echo set_value('employer'); ?>">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Total Work Experience',$this->alphalocalization); ?></span>
              <?php if(form_error('experience')){ $err=' err'; echo form_error('experience'); } ?>
            </label>
            <select id="experience" name="experience">
              <option value=""><?php echo convert_lang('Select your Experience',$this->alphalocalization); ?></option>
              <option value="0-2 Years">0-2 Years</option>
              <option value="2-5 Years">2-5 Years</option>
              <option value="5-7 Years">5-7 Years</option>
              <option value="Above 7 Years">Above 7 Years</option>
            </select>
          </li>
          
           <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Preferred Department',$this->alphalocalization); ?></span>
              <?php if(form_error('preferred_department')){ $err=' err'; echo form_error('preferred_department'); } ?>
            </label>
            <select id="department" name="department">
              <option value=""><?php echo convert_lang('Select your Department',$this->alphalocalization); ?></option>
              <option value="Admin">Admin</option>
              <option value="Marketing">Marketing</option>
              <option value="Finance-Accounts">Finance/ Accounts</option>
              <option value="Sales">Sales</option>
              <option value="Logistics">Logistics</option>
              <option value="Parts">Parts</option>
              <option value="Service">Service</option>
            </select>
          </li>
                  
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('How didi you hear about us?',$this->alphalocalization); ?></span>
              <?php if(form_error('hear')){ $err=' err'; echo form_error('hear'); } ?>
            </label>
            <select name="hear" id="hear" >
              <option value="">Select</option>
              <option value="Homepage">Homepage</option>
              <option value="Print Media/Newspaper">Print Media/Newspaper</option>
              <option value="Online Job Site">Online Job Site</option>
              <option value="Linked In">Linked In</option>
              <option value="Word of Mouth">Word of Mouth</option>
            </select>
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('UAE Driving License',$this->alphalocalization); ?></span>
              <?php if(form_error('license')){ $err=' err'; echo form_error('license'); } ?>
            </label>
            <select name="license" id="license" >
              <option value="" >License</option>
              <option value="None">None</option>
              <option value="Motorcycle">Motorcycle</option>
              <option value="Light Vehicle">Light Vehicle</option>
              <option value="Heavy Vehicle">Heavy Vehicle</option>
            </select>
          </li>
            <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Driving License Expiry',$this->alphalocalization); ?></span>
              <?php if(form_error('license_expiry')){ $err=' err'; echo form_error('license Expiry'); } ?>
            </label>
           <input class="datepicker" name="expiry" type="text" value="" id="license_expiry">
          </li>
          <li class="col-sm-4">
            <label><span class="required"><?php echo convert_lang('Notice Period',$this->alphalocalization); ?></span>
              <?php if(form_error('noticeperiod')){ $err=' err'; echo form_error('noticeperiod'); } ?>
            </label>
            <select name="noticeperiod" id="noticeperiod" >
              <option value="">Notice Period</option>
              <option value="Available Immediately">Available Immediately</option>
              <option value="1 Month">1 Month</option>
              <option value="2 Months">2 Months</option>
              <option value="3 Months">3 Months</option>
            </select>
          </li>
          
          <!--<div class="col-sm-4">

                             <div class="form-group">

                            <label><span class="required"><?php echo convert_lang('Cover Letter',$this->alphalocalization); ?></span><?php if(form_error('coverletter')){ $err=' err'; echo form_error('coverletter'); } ?></label>

                            	<textarea name="coverletter"  class="form-control" cols="" rows="5"><?php echo set_value('coverletter'); ?></textarea>

                            </div>
</div>-->
          
          <li class="col-sm-4">
            <label><?php echo convert_lang('Resume',$this->alphalocalization); ?>
              <?php if(form_error('resume')){ $err=' err'; echo form_error('resume'); } ?>
            </label>
            <input class="required" name="resume" type="file" value="" id="resume">
          </li>
          <li class="col-sm-4">
            <input type="submit" value="Submit" name="deposit" class="submit btn" style="max-width:117px; text-align:center">
          </li>
        </ul>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</section>
<script src="<?php echo base_url('public/frontend/js/jquery.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery-ui.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.selectBoxIt.js'); ?>"></script> 
<script type="text/javascript">
      $(document).ready(function(){
    
   	   $("select").selectBoxIt();
	   $('.datepicker').datepicker();
    
      });
      
    </script> 
