<?php 
$attributes = array('class' => 'applyform', 'id' => 'applyform');
echo form_open_multipart('apply',$attributes); 
?>
<div class="apply_form">
  <h2><?php echo convert_lang('1. Academics',$this->alphalocalization); ?> </h2>
  <ul>
    <li style="width:100%;">
      <label>
        <?php $academic_degree=array('Business Administration'=>'Business Administration','English Language & Translation'=>'English Language & Translation','General Education'=>'General Education','Intensive English Program'=>'Intensive English Program'); ?>
        <span class="required"><?php echo convert_lang('Degree',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('academic_degree')){ $err=' err'; echo form_error('academic_degree'); } ?>
      </label>
      <select name="academic_degree" id="academic_degree">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($academic_degree as $key => $value): ?>
        <option value="<?php echo $value; ?>" <?php echo set_select('academic_degree', $value); ?>><?php echo convert_lang($value,$this->alphalocalization); ?></option>
        <?php endforeach; ?>
      </select>
    </li>
  </ul>
</div>
<div class="apply_form">
  <h2><?php echo convert_lang('2. Student Details',$this->alphalocalization); ?> </h2>
  <ul>
    <li>
      <label><span class="required"><?php echo convert_lang('First Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('first_name')){ $err=' err'; echo form_error('first_name'); } ?>
      </label>
      <input name="first_name" type="text" id="first_name" value="<?php echo set_value('first_name'); ?>">
    </li>
    <li>
      <label><span class="required"><?php echo convert_lang('Father or Middle Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('father_name')){ $err=' err'; echo form_error('father_name'); } ?>
      </label>
      <input name="father_name" type="text" id="father_name" value="<?php echo set_value('father_name'); ?>">
    </li>
	<li class="nomar">
      <label><span class="required"><?php echo convert_lang('Grandfather Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('grandfather_name')){ $err=' err'; echo form_error('grandfather_name'); } ?>
      </label>
      <input name="grandfather_name" type="text" id="grandfather_name" value="<?php echo set_value('grandfather_name'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('Family Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('family_name')){ $err=' err'; echo form_error('family_name'); } ?>
      </label>
      <input name="family_name" type="text" id="family_name" value="<?php echo set_value('family_name'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang("Mother's Full maiden name",$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('mother_name')){ $err=' err'; echo form_error('mother_name'); } ?>
      </label>
      <input name="mother_name" type="text" id="mother_name" value="<?php echo set_value('mother_name'); ?>">
    </li>
	<li class="nomar">
      <label for="nationality"><span class="required"><?php echo convert_lang('Nationality',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('nationality')){ $err=' err'; echo form_error('nationality'); }?>
      </label>
      <select name="nationality" id="nationality" class="text">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($countries as $nationality): ?>
        <option value="<?php echo $nationality['name']; ?>" <?php echo set_select('nationality', $nationality['name']); ?>><?php echo $nationality['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </li>
    <li>
      <label><span class="required"><?php echo convert_lang('Date Of Birth',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('dob')){ $err=' err'; echo form_error('dob'); } ?>
      </label>
      <input class="dob" name="dob" type="text" id="dob" readonly="readonly" value="<?php echo set_value('dob'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('Place of Birth',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('pob')){ $err=' err'; echo form_error('pob'); } ?>
      </label>
      <input name="pob" type="text" id="pob" value="<?php echo set_value('pob'); ?>">
    </li>		
	<li class="nomar">
      <label>
        <?php $genders=array('Male'=>'Male','Female'=>'Female'); ?>
        <span class="required"><?php echo convert_lang('Gender',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('gender')){ $err=' err'; echo form_error('gender'); } ?>
      </label>
      <select name="gender" id="gender">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($genders as $key => $value): ?>
        <option value="<?php echo $key; ?>" <?php echo set_select('gender', $key); ?>><?php echo convert_lang($value,$this->alphalocalization); ?></option>
        <?php endforeach; ?>
      </select>
    </li>
	<li>
      <label>
        <?php $martials=array('Single'=>'Single','Married'=>'Married','Other'=>'Other'); ?>
        <span class="required"><?php echo convert_lang('Martial Status',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('martial')){ $err=' err'; echo form_error('martial'); } ?>
      </label>
      <select name="martial" id="martial">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($martials as $key => $value): ?>
        <option value="<?php echo $key; ?>" <?php echo set_select('martial', $key); ?>><?php echo convert_lang($value,$this->alphalocalization); ?></option>
        <?php endforeach; ?>
      </select>
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('Mobile',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('mobile')){ $err=' err'; echo form_error('mobile'); } ?>
      </label>
      <input name="mobile" type="text" id="mobile" value="<?php echo set_value('mobile'); ?>">
    </li>
    <li class="nomar">
      <label><span class="required"><?php echo convert_lang('Email',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('email')){ $err=' err'; echo form_error('email'); } ?>
      </label>
      <input name="email" type="text" id="email" value="<?php echo set_value('email'); ?>">
    </li>
	<li style="width:100%;"><h3><?php echo convert_lang('Passport Details',$this->alphalocalization); ?> </h3></li>
	<li>
      <label><span class="required"><?php echo convert_lang('Passport Number',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('passport_number')){ $err=' err'; echo form_error('passport_number'); } ?>
      </label>
      <input name="passport_number" type="text" id="passport_number" value="<?php echo set_value('passport_number'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang("Place of Issue",$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('place_of_issue')){ $err=' err'; echo form_error('place_of_issue'); } ?>
      </label>
      <input name="place_of_issue" type="text" id="place_of_issue" value="<?php echo set_value('place_of_issue'); ?>">
    </li>
    <li class="nomar">
      <label><span class="required"><?php echo convert_lang('Date Of Issue',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('date_of_issue')){ $err=' err'; echo form_error('date_of_issue'); } ?>
      </label>
      <input class="date_of_issue" name="date_of_issue" type="text" id="date_of_issue" readonly="readonly" value="<?php echo set_value('date_of_issue'); ?>">
    </li>	
	<li style="width:100%;"><h3><?php echo convert_lang('Mailing Address',$this->alphalocalization); ?> </h3></li>
	<li>
      <label><span class="required"><?php echo convert_lang('C/0',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('careof')){ $err=' err'; echo form_error('careof'); } ?>
      </label>
      <input name="careof" type="text" id="careof" value="<?php echo set_value('careof'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('P.O. Box',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('zipcode')){ $err=' err'; echo form_error('zipcode'); } ?>
      </label>
      <input name="zipcode" type="text" id="zipcode" value="<?php echo set_value('zipcode'); ?>">
    </li>
    <li class="nomar">
      <label><span class="required"><?php echo convert_lang('City',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('city')){ $err=' err'; echo form_error('city'); } ?>
      </label>
      <input name="city" type="text" id="city" value="<?php echo set_value('city'); ?>">
    </li>
    <li style="width:100%;">
      <label for="country"><span class="required"><?php echo convert_lang('Country',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('country')){ $err=' err'; echo form_error('country'); }?>
      </label>
      <select name="country" id="country" class="text">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($countries as $country): ?>
        <option value="<?php echo $country['name']; ?>" <?php echo set_select('country', $country['name']); ?>><?php echo $country['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </li>       
  </ul>
</div>
<div class="apply_form">
  <h2><?php echo convert_lang('3. Parents/Guardian Details',$this->alphalocalization); ?> </h2>
  <p><?php echo convert_lang('Please provide us with details about your Father/Mother/Guardian',$this->alphalocalization); ?><p>
  <br/>
  <ul>
    <li>
      <label><span class="required"><?php echo convert_lang('Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_name')){ $err=' err'; echo form_error('parent_name'); } ?>
      </label>
      <input name="parent_name" type="text" id="parent_name" value="<?php echo set_value('parent_name'); ?>">
    </li>
    <li>
      <label><span class="required"><?php echo convert_lang('Profession',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_profession')){ $err=' err'; echo form_error('parent_profession'); } ?>
      </label>
      <input name="parent_profession" type="text" id="parent_profession" value="<?php echo set_value('parent_profession'); ?>">
    </li>
	<li class="nomar">
      <label><span class="required"><?php echo convert_lang('Telephone Home',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_homephone')){ $err=' err'; echo form_error('parent_homephone'); } ?>
      </label>
      <input name="parent_homephone" type="text" id="parent_homephone" value="<?php echo set_value('parent_homephone'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('Telephone Work',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_workphone')){ $err=' err'; echo form_error('parent_workphone'); } ?>
      </label>
      <input name="parent_workphone" type="text" id="parent_workphone" value="<?php echo set_value('parent_workphone'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang('Fax',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_fax')){ $err=' err'; echo form_error('parent_fax'); } ?>
      </label>
      <input name="parent_fax" type="text" id="parent_fax" value="<?php echo set_value('parent_fax'); ?>">
    </li>
	<li class="nomar">
      <label><span class="required"><?php echo convert_lang('Mobile',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_mobile')){ $err=' err'; echo form_error('parent_mobile'); } ?>
      </label>
      <input name="parent_mobile" type="text" id="parent_mobile" value="<?php echo set_value('parent_mobile'); ?>">
    </li>
    <li>
      <label><span class="required"><?php echo convert_lang('Email',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('parent_email')){ $err=' err'; echo form_error('parent_email'); } ?>
      </label>
      <input name="parent_email" type="text" id="parent_email" value="<?php echo set_value('parent_email'); ?>">
    </li>
	<li>
      <label>
        <?php $relations=array('Father'=>'Father','Mother'=>'Mother','Guardian'=>'Guardian'); ?>
        <span class="required"><?php echo convert_lang('Relationship',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('relation')){ $err=' err'; echo form_error('relation'); } ?>
      </label>
      <select name="relation" id="relation">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($relations as $key => $value): ?>
        <option value="<?php echo $key; ?>" <?php echo set_select('relation', $key); ?>><?php echo convert_lang($value,$this->alphalocalization); ?></option>
        <?php endforeach; ?>
      </select>
    </li>
  </ul>
</div>
<div class="apply_form">
  <h2><?php echo convert_lang('4. General Undergraduate Admission Requirements',$this->alphalocalization); ?> </h2>
  <p><?php echo convert_lang('List the secondary school from which you graduated and any universities you have attended with dates of attendance',$this->alphalocalization); ?><p>
  <br/>
  <ul>
  	<li class="lisubhead"><label><span class="required"><?php echo convert_lang('Name of School/University',$this->alphalocalization); ?></span><?php $err=''; if(form_error('school[1][name]')){ $err=' err'; echo form_error('school[1][name]'); } ?></label></li>
	<li class="lisubhead"><label><span class="required"><?php echo convert_lang('Location (Country)',$this->alphalocalization); ?></span><?php $err=''; if(form_error('school[1][location]')){ $err=' err'; echo form_error('school[1][location]'); } ?></label></li>
	<li class="nomar lisubhead">
	<label><span><?php echo convert_lang('Dates of Attendance',$this->alphalocalization); ?></span></label>
	<label style="width:50%;" class="from"><span class="required"><?php echo convert_lang('From',$this->alphalocalization); ?></span><?php $err=''; if(form_error('school[1][doa_from]')){ $err=' err'; echo form_error('school[1][doa_from]'); } ?></label>
	<label style="width:50%;" class="to"><span class="required"><?php echo convert_lang('To',$this->alphalocalization); ?></span><?php $err=''; if(form_error('school[1][doa_to]')){ $err=' err'; echo form_error('school[1][doa_to]'); } ?></label>
	</li>
	<?php for($i=1; $i<=3; $i++){ ?>
    <li>
      <input name="school[<?php echo $i; ?>][name]" type="text" value="<?php echo set_value('school['.$i.'][name]'); ?>">
    </li>
    <li>
      <select name="school[<?php echo $i; ?>][location]" class="text">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($countries as $country): ?>
        <option value="<?php echo $country['name']; ?>" <?php echo set_select('school['.$i.'][location]', $country['name']); ?>><?php echo $country['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </li>
	<li style="width:104px;">
      <input style="width:90px;" class="doa_from" name="school[<?php echo $i; ?>][doa_from]" type="text" readonly="readonly" value="<?php echo set_value('school['.$i.'][doa_from]'); ?>">
    </li>
	<li style="width:104px;">
      <input style="width:90px;" class="doa_to" name="school[<?php echo $i; ?>][doa_to]" type="text" readonly="readonly" value="<?php echo set_value('school['.$i.'][doa_to]'); ?>">
    </li>
	<?php } ?>	
  	<li style="width:100%;"><h3><?php echo convert_lang('Indicate type of secondary certificate you hold or expect to receive and the date received',$this->alphalocalization); ?> </h3></li>
    <li style="width:50%;">
      <label>
        <?php $degrees=array('General Secondary Certificate'=>'General Secondary Certificate','High School Diploma'=>'High School Diploma','British Certificate(s)'=>'British Certificate(s)','Others'=>'Others'); ?>
        <span class="required"><?php echo convert_lang('Certificate you hold or expect to received',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('certificate')){ $err=' err'; echo form_error('certificate'); } ?>
      </label>
      <select name="certificate" id="certificate">
        <option value=""><?php echo convert_lang('Select',$this->alphalocalization); ?></option>
        <?php foreach($degrees as $key => $value): ?>
        <option value="<?php echo $key; ?>" <?php echo set_select('certificate', $key); ?>><?php echo convert_lang($value,$this->alphalocalization); ?></option>
        <?php endforeach; ?>
      </select>
    </li>
	<li class="nomar">
      <label><span class="required"><?php echo convert_lang('Date Recieved',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('date_recieved')){ $err=' err'; echo form_error('date_recieved'); } ?>
      </label>
      <input class="date_recieved" name="date_recieved" type="text" id="date_recieved" readonly="readonly" value="<?php echo set_value('date_recieved'); ?>">
    </li>
	<li style="width:100%;">
      <label><span><?php echo convert_lang("Other (Specify)",$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('other_certificate')){ $err=' err'; echo form_error('other_certificate'); } ?>
      </label>
      <input name="other_certificate" type="text" id="other_certificate" value="<?php echo set_value('other_certificate'); ?>">
    </li>    
	<li style="width:100%;"><h3><?php echo convert_lang('If the certificate is the British IGCSE, GCSE, GCE, the IB Diploma, or similar, specify subject, level and result.',$this->alphalocalization); ?> </h3></li>
	<li class="lisubsubhead"><label><span><?php echo convert_lang('Subject',$this->alphalocalization); ?></span></label></li>
	<li class="lisubsubhead"><label><span><?php echo convert_lang('Level',$this->alphalocalization); ?></span></label></li>
	<li class="nomar lisubsubhead"><label><span><?php echo convert_lang('Result',$this->alphalocalization); ?></span></label></li>
	<?php for($i=1; $i<=10; $i++){ ?>
	<li>
      <input name="subject[<?php echo $i; ?>][name]" type="text" value="<?php echo set_value('subject['.$i.'][name]'); ?>">
    </li>
	<li>
      <input name="subject[<?php echo $i; ?>][level]" type="text" value="<?php echo set_value('subject['.$i.'][level]'); ?>">
    </li>
	<li class="nomar">
      <input name="subject[<?php echo $i; ?>][result]" type="text" value="<?php echo set_value('subject['.$i.'][result]'); ?>">
    </li>
	<?php } ?>
	<li style="width:100%;"><h3><?php echo convert_lang('For students applying to ECUC, International Internet based TOEFL (61), or Academic IELTS (5.0) is required. Please specify the test you intend to take or have already taken in the space below',$this->alphalocalization); ?> </h3></li>
	<li>
      <label><span class="required"><?php echo convert_lang('Test Name',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('test_name')){ $err=' err'; echo form_error('test_name'); } ?>
      </label>
      <input name="test_name" type="text" id="test_name" value="<?php echo set_value('test_name'); ?>">
    </li>
	<li>
      <label><span class="required"><?php echo convert_lang("Score",$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('test_score')){ $err=' err'; echo form_error('test_score'); } ?>
      </label>
      <input name="test_score" type="text" id="test_score" value="<?php echo set_value('test_score'); ?>">
    </li>
    <li class="nomar">
      <label><span class="required"><?php echo convert_lang('Date',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('test_date')){ $err=' err'; echo form_error('test_date'); } ?>
      </label>
      <input class="test_date" name="test_date" type="text" id="test_date" readonly="readonly" value="<?php echo set_value('test_date'); ?>">
    </li>
	</ul>
	<p><?php echo convert_lang('Those who do not meet the English proficiency stated above are required to take the institutional TOEFL and the Write Placer at ECUC to determine their placement in the intensive language levels offered ',$this->alphalocalization); ?><p>
</div>
<div class="apply_form">
  <h2><?php echo convert_lang('5. Other Details',$this->alphalocalization); ?> </h2>
  <br/>
  <ul>
  	<li style="width:100%; padding-bottom:0px;" class="disabilty"><label><span class="required"><?php echo convert_lang('Do you have any physical disabilities? (This information is voluntary and confidential; it is requested to help the University provide aid and support, as much as possible.)',$this->alphalocalization); ?></span><?php $err=''; if(form_error('disablities')){ $err=' err'; echo form_error('disablities'); } ?></label></li>
    <li style="width:100%;" class="radios">
	  <?php $disablities=array('Vision impairment'=>'Vision impairment','Speech impairment'=>'Speech impairment','Hearing impairment'=>'Hearing impairment','Mobility impairment'=>'Mobility impairment','No'=>'No','Others'=>'Others'); 
	  foreach($disablities as $key => $value): ?>
      <input name="disablities" type="radio" value="<?php echo $value; ?>" <?php echo set_radio('disablities', $value); ?>><?php echo convert_lang($value,$this->alphalocalization); ?>
	  <?php endforeach; ?>
    </li>
    <li style="width:100%;">
      <label><span class="required"><?php echo convert_lang('Other (please explain):',$this->alphalocalization); ?></span>
        <?php $err=''; if(form_error('other_disablities')){ $err=' err'; echo form_error('other_disablities'); } ?>
      </label>
      <input name="other_disablities" type="text" id="other_disablities" value="<?php echo set_value('other_disablities'); ?>">
    </li>
	<li style="width:100%;padding-bottom:0px;" class="radiolabel"><label><span  class="required"><?php echo convert_lang('Please check preferred academic program',$this->alphalocalization); ?></span><?php $err=''; if(form_error('programs')){ $err=' err'; echo form_error('programs'); } ?></label></li>
    <li style="width:100%;"  class="radios">
	  <?php $programs=array('Bachelor of English Language & Translation'=>'Bachelor of English Language & Translation','Bachelor of Business Administration'=>'Bachelor of Business Administration'); 
	  foreach($programs as $key => $value): ?>
      <input name="programs" type="radio" value="<?php echo $value; ?>" <?php echo set_radio('programs', $value); ?>><?php echo convert_lang($value,$this->alphalocalization); ?>
	  <?php endforeach; ?>
    </li>
	<li style="width:100%;padding-bottom:0px;" class="radiolabel"><label><span  class="required"><?php echo convert_lang('Applying as a',$this->alphalocalization); ?></span><?php $err=''; if(form_error('applyas')){ $err=' err'; echo form_error('applyas'); } ?></label></li>
    <li style="width:100%;" class="radios">
	  <?php $applyas=array('New'=>'New','Transfer'=>'Transfer','Re-Admit'=>'Re-Admit','Visiting Student'=>'Visiting Student'); 
	  foreach($applyas as $key => $value): ?>
      <input name="applyas" type="radio" value="<?php echo $value; ?>" <?php echo set_radio('applyas', $value); ?>><?php echo convert_lang($value,$this->alphalocalization); ?>
	  <?php endforeach; ?>
    </li>	
  </ul>
</div>
<div class="apply_form">
  <h2><?php echo convert_lang('6. Terms & Conditions',$this->alphalocalization); ?> </h2>
  <br/><br/>
  <ul>
  	<li style="width:100%;"><input type="checkbox" name="terms" id="terms" value="Y" <?php echo set_checkbox('terms', 'Y'); ?>/>&nbsp;<span class="required"><?php echo convert_lang('I have read and agreed with
the Terms & Conditions',$this->alphalocalization); ?></span><?php $err=''; if(form_error('terms')){ $err=' err'; echo form_error('terms'); } ?></li>
	<li style="width:100%;" class="captcha">
	<label><span class="required"><?php echo convert_lang('Security code',$this->alphalocalization); ?></span><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
	<?php echo $cap['image']; ?>&nbsp;
	<input name="captcha" type="text">
	</li>
  </ul>
</div>
<div class="clearfix"></div>
<input name="butSub" type="submit" class="submit applynowbutton" value="" id="butSub">
<?php echo form_close(); ?>
<script type="text/javascript">
$(function() { 
  $("#applyform").submit(function(e){
    e.preventDefault();
  });
  $(".dob").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"});	
  $(".date_of_issue").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"}); 
  $(".date_recieved").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"});
  $(".doa_from").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"});
  $(".doa_to").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"});  
  $(".test_date").datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true, yearRange: "-100:+0"}); 
}); 
</script>