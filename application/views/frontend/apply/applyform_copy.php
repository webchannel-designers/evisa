<h2 class="h1class">Apply Offline</h2>
<p><strong>Please <a href="/downloads/163_ECUC%20Application%20for%20Admission.pdf" title="download this application">download this application</a> form and return the completed form to:</strong><br />
Office of Admissions<br />
Emirates Canadian University College<br />
P.O. Box 536, Umm Al Quwain, UAE
</p>
    <h2 class="h1class" style="padding-top:20px;">Apply Online</h2>
     
        <div id="registerform">
	
            <p><strong>Please complete the form below to apply online.</strong></p><br />
            
    <div id="Summary1" style="color:Red;display:none;">
	</div>
    <?php 
	$attributes = array('class' => 'applyform', 'id' => 'applyform');
	echo form_open_multipart('apply/applyform',$attributes); ?>
       
            <table cellpadding="0" cellspacing="0" border="0" style="width:90%">
            
            
                <tr>
                    <td colspan="2" class="tb_title">
                        <?php echo convert_lang('Academics',$this->alphalocalization); ?>
                    </td>
                </tr>
                
                <tr>
                    <td height="10" colspan="2"></td>
                </tr>
            
                <tr class="trClass">
                    <td class="boldclass1">
                          <?php echo convert_lang('Degree',$this->alphalocalization); ?> :
                    </td>
                    <td>
                        <select name="txtDegree" id="txtDegree"  class="required">
		<option value="">Select</option>
		<option value="Business Administration">Business Administration</option>
		<option value="English Language &amp; Translation">English Language &amp; Translation</option>
		<option value="General Education">General Education</option>
		<option value="Intensive English Program">Intensive English Program</option>
	</select>
                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
            
            <tr>
                    <td height="20" colspan="2"></td>
                </tr>
                <tr>
                    <td colspan="2" class="tb_title">
                        
                         <?php echo convert_lang('Student Details',$this->alphalocalization); ?>
                    </td>
                </tr>
                
                <tr>
                    <td height="10" colspan="2"></td>
                </tr>
                <tr class="trClass">
                    <td class="boldclass1" style="width:180px;">
                        <?php echo convert_lang('Full Name',$this->alphalocalization); ?>:
                    </td>
                    <td>
                    
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
                        <tr>
                            <td>
                                <input name="txtFirstname" type="text" id="txtFirstname" class="required" style="width:98px;" />
                                
                                <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                            </td>
                            <td>
                            
                                <input name="txtFathername" type="text" id="txtFathername" class="required" style="width:98px;" />
                                
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                
                            </td>
                        <td>
                                <input name="txtGrandfathername" type="text" id="txtGrandfathername" class="required" style="width:98px;" />
                             
                                
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                           
                            </td>
                            <td>
                                <input name="txtFamily" type="text" id="txtFamily" class="required" style="width:98px;" />
                                                              
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                            
                            </td>
                        </tr>
                    </table>
                    
                    </td>
                </tr>
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Mothers Full maiden name',$this->alphalocalization); ?> :
                    </td>
                    <td>
                                <input name="txtMothername" type="text" id="txtMothername" class="required" style="width:98px;" />
                                
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Date of Birth',$this->alphalocalization); ?>:
                    </td>
                    <td>
       <!--<input name="txtDOB" type="text" id="txtDOB" />-->
       <input type="text" class="datepicker" class="required" name="txtDob" id="txtDob">
       
        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
         
            
                               
        <br />
      
            
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Place of Birth',$this->alphalocalization); ?>:
                    </td>
                    <td>
                                <input name="txtPlacebirth" type="text" id="txtPlacebirth" class="required" style="width:207px;" />
                                <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                         <?php echo convert_lang('Nationality',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <select name="txtNationality" id="txtNationality" class="required">
		<?php
		foreach($countrylist as $countrylist1)
		{
		?>
        <option value="<?php echo $countrylist1['isocode']?>"><?php echo $countrylist1['name'];?></option>
        <?php
		}
		?>
		<option selected="selected" value=" ">------------Select------------</option>
	</select>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                
                
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Passport Number',$this->alphalocalization); ?>:
                    </td>
                    <td>
                    
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
                        <tr>
                            <td style="width:25%">
                                <input name="txtPassportno" type="text" id="txtPassportno" class="required" style="width:98px;" />
                               
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                            </td>
                            <td style="width:25%">
                                <input name="txtPassportissue" type="text" id="txtPassportissue" class="required" style="width:98px;" />
                                 
                                <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                            </td>
                            <td style="width:50%">
                                         <input type="text" class="datepicker1 required" style="width:98px;" name="txtPassportexpiry" id="txtPassportexpiry">
                                
                           
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                    
       
        
                 
                            </td>
                        </tr>
                    </table>
                    
                    
                    </td>
                </tr>
                
  
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Gender',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <select name="txtGender" id="txtGender" class="required">
		<option value="">Select</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
	</select>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Martial Status',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <select name="txtMartialstatus" id="txtMartialstatus" class="required">
		<option value="">Select</option>
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Other">Other</option>
	</select>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                
                <tr class="trClass">
                    <td class="boldclass1" style="vertical-align:top;padding-top:15px;">
                        <?php echo convert_lang('Mailing Address',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <table cellpadding="0" cellspacing="3" border="0" style="width:100%">
                            <tr>
                                <td style="width:13%;"><?php echo convert_lang('C/O',$this->alphalocalization); ?>:</td>
                                <td>
                                    <input name="txtCO" type="text" id="txtCO" style="width:207px;" class="required" />
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                             <tr>
                                <td><?php echo convert_lang('P. O. Box',$this->alphalocalization); ?>:</td>
                                <td>
                                    <input name="txtPO" type="text" id="txtPO" style="width:207px;"  class="required"/>
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo convert_lang('City',$this->alphalocalization); ?>:</td>
                                <td>
                                    <input name="txtCity" type="text" id="txtCity" style="width:207px;" class="required"/>
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo convert_lang('Country',$this->alphalocalization); ?>:</td>
                                <td>
                                <select name="txtCountry" id="txtCountry" class="required">
		<?php
		foreach($countrylist as $countrylist1)
		{
		?>
        <option value="<?php echo $countrylist1['isocode']?>"><?php echo $countrylist1['name'];?></option>
        <?php
		}
		?>
		<option selected="selected" value="">------------Select------------</option>
	</select>
                                <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                            
                            
                        </table>
                    </td>
                </tr>
                
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Mobile',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtMobile" type="text" id="txtMobile" class="required number" style="width:290px;" />
                        
                         <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Email',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtEmail" type="text" id="txtEmail" class="required email" style="width:290px;" />
                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                        
                    </td>
                </tr>
                
                <tr>
                    <td height="20" colspan="2"></td>
                </tr>
                
                <tr>
                    <td colspan="2" class="tb_title">
                       <?php echo convert_lang('Parents/Guardian Details',$this->alphalocalization); ?>
                    </td>
                </tr>                
                
                <tr>
                    <td height="10" colspan="2"></td>
                </tr>
                
                <tr class="trClass">
                    <td></td>
                    <td><?php echo convert_lang('Please provide us with details about your Father/Mother/Guardian',$this->alphalocalization); ?>:</td>
                </tr>
                <tr>
                    <td colspan="2">
                      
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr class="trClass">
                    <td class="boldclass1" width="180">
                        <?php echo convert_lang('Name',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParentname" type="text" id="txtParentname" class="required" />
                         <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>                
                
               
                    <td class="boldclass1">
                        <?php echo convert_lang('Profession',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParentprofession" type="text" id="txtParentprofession" class="required"  />
                         <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Telephone Home',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParenttelephonehome" type="text" id="txtParentTelephoneHome" class="required"  />
                        
                         <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                
                
               
                    <td class="boldclass1">
                        <?php echo convert_lang('Telephone Work',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParenttelephonework" type="text" id="txtParenttelephonework" class="required" />
                        
                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1">
                        <?php echo convert_lang('Fax',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParentfax" type="text" id="txtParentfax" class="required"  />
                        
                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                
                
                
                    <td class="boldclass1">
                        <?php echo convert_lang('Mobile',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParentmobile" type="text" id="txtParentmobile" class="required" />
                        
                         <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                <tr class="trClass">
                    <td class="boldclass1">
                         <?php echo convert_lang('Email',$this->alphalocalization); ?>:
                    </td>
                    <td>
                        <input name="txtParentemail" type="text" id="txtParentemail" class="required" />
                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                       
                    </td>
                
               
                    <td class="boldclass1">
                        <?php echo convert_lang('Relationship',$this->alphalocalization); ?>:
                    </td>
                    <td>
                    
                        <select name="txtRelationship" id="txtRelationship" class="required">
		<option value="">Select</option>
		<option value="Father">Father</option>
		<option value="Mother">Mother</option>
		<option value="Guardian">Guardian</option>
	</select>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                    </table>
                    
                    </td>
                </tr>
                
                
                <tr>
                    <td height="20" colspan="2"></td>
                </tr>
                
                <tr>
                    <td colspan="2" class="tb_title"> <?php echo convert_lang('General Undergraduate Admission Requirements',$this->alphalocalization); ?></td>
                </tr>
                
                <tr>
                    <td height="10" colspan="2"></td>
                </tr>
                
                
                <tr class="trClass">
                    <td colspan="2">
                        <?php echo convert_lang('List the secondary school from which you graduated and any universities you have attended with dates of attendance',$this->alphalocalization); ?>:<br />
                        <table cellpadding="0" cellspacing="7" border="0" style="width:100%">
                            <tr>
                                <td class="boldclass2"><?php echo convert_lang('Name of School/University',$this->alphalocalization); ?></td>
                                <td class="boldclass2"><?php echo convert_lang('Location (Country)',$this->alphalocalization); ?></td>
                                <td colspan="2">
                                    <table cellpadding="0" cellspacing="3" border="0" style="width:100%">
                                        <tr>
                                            <td colspan="2" class="boldclass2" style="text-align:center;"><?php echo convert_lang('Dates of Attendance',$this->alphalocalization); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="" style="text-align:center;width:50%;"><?php echo convert_lang('From',$this->alphalocalization); ?></td>
                                            <td class="" style="text-align:center;"><?php echo convert_lang('To',$this->alphalocalization); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <input name="txtSchool1" type="text" id="txtSchool1" class="required" style="width:170px;" />
                                    <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                                <td>
                                    <select name="txtSchoolcountry1" id="txtSchoolcountry1" class="required">
		<?php
		foreach($countrylist as $countrylist1)
		{
		?>
        <option value="<?php echo $countrylist1['isocode']?>"><?php echo $countrylist1['name'];?></option>
        <?php
		}
		?>
		<option selected="selected" value="">------------Select------------</option>
	</select>
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                                <td >
                                <select name="fromMonth1" id="fromMonth1" class="required">
		<option value="">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select> <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span><select name="fromYear1" id="fromYear1" class="required">
     <option value="">Year</option>      
                <?php for($i=1950;$i<=2020;$i++) {?>     
                     
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                  <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                       </td>
                                <td >
                                   <select name="toMonth1" id="toMonth1" class="form2 required">
		<option value="">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select><span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>&nbsp; <select name="toYear1" id="toYear1" class="required">
     <option value="">Year</option>          
                <?php for($i=1950;$i<=2020;$i++) {?>     
                 
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                       </td>
                                
                            </tr>
                            
                            
                             <tr>
                                <td>
                                    <input name="txtSchool2" type="text" id="txtSchool2" style="width:170px;" />
                                </td>
                                <td>
                                    <select name="txtSchoolcountry2" id="txtSchoolcountry2">
		<?php
		foreach($countrylist as $countrylist1)
		{
		?>
        <option value="<?php echo $countrylist1['isocode']?>"><?php echo $countrylist1['name'];?></option>
        <?php
		}
		?>
		<option selected="selected" value="0">------------Select------------</option>
	</select>
                                </td>
                                <td>   <select name="fromMonth2" id="fromMonth2" class="form2">
		<option value="Month">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select>&nbsp; <select name="fromYear2" id="fromYear2" class="form2">
        <option value="Year">Year</option>            
                <?php for($i=1950;$i<=2020;$i++) {?>     
            
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                
                                                                   </td>
                                <td><select name="toMonth2" id="toMonth2" class="form2">
		<option value="Month">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select>
                                 <select name="toYear2" id="toYear2" class="form2">
                                    <option value="Year">Year</option>        
                <?php for($i=1950;$i<=2020;$i++) {?>     
                 
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                </td>
                            </tr>
                            
                            
                             <tr>
                                <td>
                                    <input name="txtSchool3" type="text" id="txtSchool3" style="width:170px;" />
                                </td>
                                <td>
                                    <select name="txtSchoolcountry3" id="txtSchoolcountry3">
		<?php
		foreach($countrylist as $countrylist1)
		{
		?>
        <option value="<?php echo $countrylist1['isocode']?>"><?php echo $countrylist1['name'];?></option>
        <?php
		}
		?>
		<option selected="selected" value="0">------------Select------------</option>
	</select>
                                </td>
                                <td>
                                   <select name="fromMonth3" id="fromMonth3" class="form2">
		<option value="Month">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select>&nbsp; <select name="fromYear3" id="fromYear3" class="form2">
       <option value="Year">Year</option>       
                <?php for($i=1950;$i<=2020;$i++) {?>     
                  
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                 </td>
                                <td>
     <select name="toMonth3" id="toMonth3" class="form2">
		<option value="Month">Month</option>
        <?php
		for($i=1;$i<=12;$i++)
		{
		
		echo "<option value=".$i.">".$i."</option>";
		}
		?>
		
	</select>&nbsp; <select name="toYear3" id="toYear3" class="form2">
       <option value="Year">Year</option>        
                <?php for($i=1950;$i<=2020;$i++) {?>     
                 
		<option value="<?php echo $i ?>"><?php echo $i ?></option>
	<?php
	}
	?>
		
	</select>
                                </td>
                            </tr>
                           
                            
                            
                        </table>
                    
                    
                    
                    </td>
                </tr>
                
                
                <tr class="trClass">
                    <td colspan="2">
                        
                        
                        <table cellpadding="0" cellspacing="5" border="0" style="width:100%">
                            <tr>
                                <td class="boldclass1" style="width:55%;"><?php echo convert_lang('Indicate type of secondary certificate you hold or expect to receive and the date received',$this->alphalocalization); ?>:</td>
                                <td>
                        <select name="txtSecondarycertificate" id="txtSecondarycertificate" class="required">
		<option value="">Select</option>
		<option value="General Secondary Certificate">General Secondary Certificate</option>
		<option value="High School Diploma">High School Diploma</option>
		<option value="British Certificate(s)">British Certificate(s)</option>
	</select>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                            
                <tr>
                    <td class="boldclass1">
                       <?php echo convert_lang('Other (Specify)',$this->alphalocalization); ?> :
                    </td>
                    <td>
                        <input name="txtSecondarycertificateother" type="text" id="txtSecondarycertificateother"  />
                        
       <input name="txtOtherdate" type="text" id="txtOtherdate" class="datepicker"/>
       
                  
                        
                    </td>
                </tr>
                           
                        </table>
                        
                        
                    </td>
                </tr>
                
                
                
                <tr class="trClass">
                    <td colspan="2">
                       
                        <?php echo convert_lang(' If the certificate is the British IGCSE, GCSE, GCE, the IB Diploma, or similar, specify subject, level and result.',$this->alphalocalization); ?>
                        <table cellpadding="0" cellspacing="7" border="0" style="width:100%">
                            <tr>
                                <td class="boldclass2">Subject</td>
                                <td class="boldclass2">Level</td>
                                <td class="boldclass2">Result</td>
                                <td class="boldclass2">Subject</td>
                                <td class="boldclass2">Level</td>
                                <td class="boldclass2">Result</td>
                            </tr>
                            <tr>
                                <td><input name="txtSubject1" type="text" id="txtSubject1" class="form1" /></td>
                                <td><input name="txtLevel1" type="text" id="txtLevel1" class="form1" /></td>
                                <td><input name="txtResult1" type="text" id="txtResult1" class="form1"  /></td>
                                <td><input name="txtSubject6" type="text" id="txtSubject6" class="form1" /></td>
                                <td><input name="txtLevel6" type="text" id="txtLevel6" class="form1" /></td>
                                <td><input name="txtResult6" type="text" id="txtResult6" class="form1"  /></td>
                            </tr>
                             <tr>
                                <td><input name="txtSubject2" type="text" id="txtSubject2" class="form1" /></td>
                                <td><input name="txtLevel2" type="text" id="txtLevel2" class="form1" /></td>
                                <td><input name="txtResult2" type="text" id="txtResult2" class="form1"  /></td>
                                <td><input name="txtSubject7" type="text" id="txtSubject7" class="form1" /></td>
                                <td><input name="txtLevel7" type="text" id="txtLevel7" class="form1" /></td>
                                <td><input name="txtResult7" type="text" id="txtResult7" class="form1"  /></td>
                            </tr>
                            <tr>
                                <td><input name="txtSubject3" type="text" id="txtSubject3" class="form1"/></td>
                                <td><input name="txtLevel3" type="text" id="txtLevel3"  class="form1"/></td>
                                <td><input name="txtResult3" type="text" id="txtResult3" class="form1" /></td>
                                <td><input name="txtSubject8" type="text" id="txtSubject8" class="form1" /></td>
                                <td><input name="txtLevel8" type="text" id="txtLevel8" class="form1" /></td>
                                <td><input name="txtResult8" type="text" id="txtResult8" class="form1"  /></td>
                            </tr>
                            <tr>
                                <td><input name="txtSubject4" type="text" id="txtSubject4" class="form1"/></td>
                                <td><input name="txtLevel4" type="text" id="txtLevel4"  class="form1"/></td>
                                <td><input name="txtResult4" type="text" id="txtResult4" class="form1" /></td>
                                <td><input name="txtSubject9" type="text" id="txtSubject9" class="form1" /></td>
                                <td><input name="txtLevel9" type="text" id="txtLevel9" class="form1" /></td>
                                <td><input name="txtResult9" type="text" id="txtResult9" class="form1"  /></td>
                            </tr>
                            <tr>
                                <td><input name="txtSubject5" type="text" id="txtSubject5" class="form1" /></td>
                                <td><input name="txtLevel5" type="text" id="txtLevel5" class="form1" /></td>
                                <td><input name="txtResult5" type="text" id="txtResult5" class="form1"  /></td>
                                <td><input name="txtSubject10" type="text" id="txtSubject10" class="form1" /></td>
                                <td><input name="txtLevel10" type="text" id="txtLevel10" class="form1" /></td>
                                <td><input name="txtResult10" type="text" id="txtResult10" class="form1"  /></td>
                            </tr>
                           
                            
                            
                            
                        </table>
                    
                    </td>
                </tr>
                
                
                <tr class="trClass">
                    <td colspan="2">
                        
                         <?php echo convert_lang(' For students applying to ECUC, International Internet based TOEFL (61), or Academic IELTS (5.0) is required. <br />Please specify the test you intend to take or have already taken in the space below',$this->alphalocalization); ?>:
                        <table cellpadding="0" cellspacing="7" border="0" style="width:100%">
                            <tr>
                                <td style="width:30%">
                                    <input name="txtTestresults" type="text" id="txtTestresults" style="width:250px;" />
                                  
                                </td>
                                <td style="width:26%">
                                   <input name="txtTestdate" type="text" id="txtTestdate"  class="datepicker"/>
                                   
                                
                                    <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                     
                                                                 </td>
                                <td>
                                    <input name="txtScore" type="text" id="txtScore" />
                                  
                                </td>
                            </tr>
                        </table>
                        
                        <p><?php echo convert_lang('Those who do not meet the English proficiency stated above are required to take the institutional TOEFL and the Write Placer at ECUC to determine their placement in the intensive language levels offered',$this->alphalocalization); ?> </p>
                    
                    </td>
                </tr>
                
              
                
                <tr class="trClass">
                    <td colspan="2">
                    <span class="boldclass2"><?php echo convert_lang('Do you have any physical disabilities?</span> (This information is voluntary and confidential; it is requested to help the University provide aid and support, as much as possible.)',$this->alphalocalization); ?>
                    
                    <table>
                        <tr>
                            <td style="width:180px;"></td>
                            <td>
                                <table id="ctl00_ContentPlaceHolder1_ddlDisabilities" border="0" style="width:95%; float:left;">
		<tr>
			<td><input id="Disabilities_0" type="radio" name="Disabilities" value="Vision impairment" /><label for="Disabilities_0">Vision impairment</label></td><td><input id="Disabilities_1" type="radio" name="Disabilities" value="Speech impairment" /><label for="Disabilities_1">Speech impairment</label></td><td><input id="Disabilities_2" type="radio" name="Disabilities" value="Hearing impairment" /><label for="Disabilities_2">Hearing impairment</label></td><td><input id="Disabilities_3" type="radio" name="Disabilities" value="Mobility impairment" /><label for="Disabilities_3">Mobility impairment</label></td><td><input id="Disabilities_4" type="radio" name="Disabilities" value="No" /><label for="Disabilities_4">No</label></td>
		</tr>
	</table>
                                        <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="boldclass1">
                                Other (please explain):
                            </td>
                            <td>
                                <input name="txtOtherdisabilities" type="text" id="txtOtherdisabilities" style="width:98%;" />
                            </td>
                        </tr>
                    </table>
                    
                    </td>
                </tr>
                
                
                <tr class="trClass">
                    <td class="boldclass1"><?php echo convert_lang('Please check preferred <br />academic program',$this->alphalocalization); ?>:</td>
                    <td>
                        <table id="ctl00_ContentPlaceHolder1_dblAcademicProgram" border="0" style="width:95%; float:left;">
		<tr>
			<td><input id="AcademicProgram_0" type="radio" name="AcademicProgram" value="Bachelor of English Language &amp; Translation" /><label for="AcademicProgram_0">Bachelor of English Language & Translation</label></td><td><input id="AcademicProgram_1" type="radio" name="AcademicProgram" value="Bachelor of Business Administration" /><label for="AcademicProgram_1">Bachelor of Business Administration</label></td><td></td>
		</tr>
	</table>
                                 <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                <tr class="trClass">
                    <td class="boldclass1"><?php echo convert_lang('Applying as a',$this->alphalocalization); ?></td>
                    <td>
                        <table id="rblAuthorizing" border="0" style="width:95%; float:left;">
		<tr>
			<td><input id="Authorizing_0" type="radio" name="rblAuthorizing" value="New" /><label for="rblAuthorizing_0">New</label></td><td><input id="rblAuthorizing_1" type="radio" name="rblAuthorizing" value="Transfer" /><label for="rblAuthorizing_1">Transfer</label></td><td><input id="rblAuthorizing_2" type="radio" name="rblAuthorizing" value="Re-Admit" /><label for="rblAuthorizing_2">Re-Admit</label></td><td><input id="rblAuthorizing_3" type="radio" name="rblAuthorizing" value="Visiting Student" /><label for="rblAuthorizing_3">Visiting Student</label></td>
		</tr>
	</table>
                             <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                    </td>
                </tr>
                
                
                  
                          
                
                  
                
               
                
                
                
                
                
                
                
                
                
                <tr class="trClass">
                    <td class="boldclass1">
                        
                    </td>
                    <td>
                    <input id="Terms" type="checkbox" name="Terms" />
                        <?php echo convert_lang('I have read and agreed with',$this->alphalocalization); ?>  <a target="_blank" href="Terms-Conditions.aspx">the Terms &amp; Conditions</a><br />
                        <span id="ctl00_ContentPlaceHolder1_valTandCs" class="fn_sz" style="color:Red;display:none;">Please accept Terms and Conditions before submitting.<br></span>
                    </td>
                </tr>
                <tr class="trClass">
                    <td class="boldclass1">
                        
                        <?php echo convert_lang('Enter verification code',$this->alphalocalization); ?>
                    </td>
                    <td>
                        <table cellpadding="5">
                            <tr>
                                <td>
                                    <div style='background-color:#dee4d6;'><img src="CaptchaImage.axd?guid=f3833690-e9ab-418b-8c46-9d6c58bce569" border='0' width=80 height=31></div>
                                </td>
                                <td>
                                 <img src="<?php echo base_url('public/frontend/images')?>/CaptchaSecurityImages.php?width=86&amp;height=32&amp;characters=5" alt="Click to reload image" title="Click to reload image"  style="float: left; margin-right: 9px; margin-top: 3px;" id="captcha" /> 
                 <input type="text" id="txtCode" name="txtCode" class="required">
                                     <span><img src="<?php echo base_url('public/frontend/images/mandatory.png') ?>" /></span>
                                </td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td height="40px">
                    </td>
                    <td>
                        <input type="image" name="btnSubmit" id="btnSubmit" class="button" src="<?php echo base_url('public/frontend/images/submit.png') ?>" style="border-width:0px;" />
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" style="text-align: center;">
                        
                    </td>
                </tr>
                
                
            </table>
            <?php echo form_close(); ?>
            </div>