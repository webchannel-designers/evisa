<?php  $coid=$this->session->userdata('couid');?>
<section class="section-spotlight">
      <div class="home-slider owl-carousel">     
        
        <div class="item"><img class="img-fluid big-banner" src="http://www.webchannel.co/projects/evisa/www/public/uploads/banners/Visas22.jpg" alt="Banner1"/>
        <img class="img-fluid mobile-banner" src="http://www.webchannel.co/projects/evisa/www/public/uploads/banners/Visas13.jpg" alt="Banner1"/>
          <div class="caption text-left">
            <p><p>
  &nbsp; &nbsp;</p>
</p>
          </div>
        </div>
              </div>
    </section>
 

<section class="orange-bg">
         <div class="section-booking">
            <div class="booking-vertical">
               <div class="container">
                  <div class="row m1">

           <div class="offset-xl-2 offset-md-1 offset-sm-0 col-xl-8 col-md-10 col-sm-12">
                                         

                                  <div class="row align-items-center">

                                    <div class="cell col-xl-2 col-sm-2">
                                        <div class="icon"><img class="img-fluid" src="public/frontend/images/online-book.png" alt=""/></div>
                                    </div>

                                    <div class="cell col-xl-8 col-sm-10 content">

                                            <div class="row align-items-center">

                                                <div class="col-xl-4 col-sm-3 ">
                                                    <h2>
                                                       Apply  <br>HERE
                                                       <!--<p>GET UAE VISA <br> EASIER & FASTER</p>-->
                                                    </h2>
                                                 </div>

                                                <div class="col-xl-8 col-sm-9 visa-form">
                                                    <div class="row">
                                                                                                                
                                                </div>
                                           </div>
                                        </div>



                                </div>
                               
                            </div>
                        </div>
                     </div>                  
         </div>      
    </section>
 <?php echo form_open_multipart('checkout/insertvisa', array('id'=>'actionform'));?>                                 
    <section class="section">        
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="tab-form">
                <div class="tab-item current">
                  <i class="fa fa-user-o" aria-hidden="true"></i>
                  <h4><span>Step1: </span>General Information</h4>
                </div>
                <div class="tab-item">
                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                  <h4><span>Step2: </span>Revision and Payment</h4>
                </div>
                <div class="tab-item">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <h4><span>Step3: </span>Upload Additional Documents</h4>
                </div>
              </div>

              <div class="form-header">
                <div class="row">
                   <?php if(!in_array($coid,$nacs)){                
                    ?>
                    <div class="col-md-4">
                      <label for="visa">Visa Type</label>                     
                      <input type="text" name="visa" id="visa_type" value="">
                    </div>
                    <div class="col-md-4">
                      <label for="">No. Of Visa</label>                     
                     <input class="quantity" type="text" id="qty" value="<?php if(@$frmdata->no_of_visas!="") { echo @$frmdata->no_of_visas; } else { echo 1;} ?>"/>
                    </div>
                    <div class="col-md-4">
                      <div class="total" id="tot">
                        <h5>Total</h5>
                        <h5><span id="gtotal"><?php echo @$frmdata->order_total; ?></span></h5>
                      </div>
                      <input type="hidden" id="gtot" name="gtot"  value="<?php echo @$frmdata->order_total; ?>"/>
                        <input type="hidden" id="visa_fee" name="visa_fee"  value="<?php echo @$frmdata->order_total; ?>"/>
                      <input type="hidden" name="visa_type" id="vtype" value="">
                      <input type="hidden" name="quantity" id="vqty" value="">
                    </div>
                </div>
              </div>
              <div id="hi">
              <div class="applicant-form">
                <div class="title">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  <h3>Applicant #1 <span>Lead Passenger Details</span></h3>
                </div>

                <div class="row">
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control required <?php $err=''; if(form_error('fname')){ $err=' err'; echo 'error'; } ?>" type="text" name="fname[]" placeholder="First and Middle Name">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control  <?php $err=''; if(form_error('lname')){ $err=' err'; echo 'error'; } ?>" type="text" name="lname[]" placeholder="Last Name">
                  </div>
                    <div class="col-md-6 col-lg-3">
                    <input class="form-control required <?php $err=''; if(form_error('email')){ $err=' err'; echo 'error'; } ?>" type="text" name="email" placeholder="Email address">
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <input class="form-control required <?php $err=''; if(form_error('mobile')){ $err=' err'; echo 'error'; } ?>" name="mobile" type="text" placeholder="Mobile Number">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control required <?php $err=''; if(form_error('nationality')){ $err=' err'; echo 'error'; } ?>" name="nationality[]">
                      <option value="">Nationality (As per Passport)</option>
                       <?php foreach($countries as $country) { ?>
                              <option value="<?php echo $country['id'] ?>" <?php  if($country['id'] == $coid) echo 'selected="selected"' ?> name="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                              <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control required <?php $err=''; if(form_error('birth_country')){ $err=' err'; echo 'error'; } ?>" name="birth_country[]" id="">
                      <option value="">Country of birth</option>
                       <?php foreach($countries as $country) { ?>
                              <option value="<?php echo $country['id'] ?>" <?php  if($country['id'] == $coid) echo 'selected="selected"' ?> name="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                              <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <input class="form-control date datepicker required <?php $err=''; if(form_error('dob')){ $err=' err'; echo 'error'; } ?>" name="dob[]" type="text" placeholder="Date of birth">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control required" name="gender[]" id="">
                      <option value="">Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control required <?php $err=''; if(form_error('type_visa')){ $err=' err'; echo 'error'; } ?>" name="type_visa[]" id="type_visa" onchange="populate1(this.value)">
                     <!--  <option value="">Select Visa</option> -->
                       <?php
                foreach($services as $item) {  
                $countries3n=array(12,30,215,86,94,98,118,124,129,139,41,161,164,169,197,199,200,202);
                $countries2n=array(4);
                $countries1n=array(148,154);
                if(in_array($coid,$countries3n)) {
                $serarray=array(15,18,19);
                }
                if(in_array($coid,$countries2n)) {
                $serarray=array(15,17,18,19);
                }
                if(in_array($coid,$countries1n)) {
                $serarray=array(13,14,15,17,18,19);
                }
                if(count(@$serarray)>0)
                {
                if(in_array($item['id'],@$serarray))
                {
                         ?>
                        <option value="<?php echo $item['id']; ?>" <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> selected="selected"<?php } ?>"><?php echo strip_tags($item['title']); ?></option>

                         <?php } } else { if($item['id']!=17) { ?>

                          <option value="<?php echo $item['id']; ?>" <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> selected="selected"<?php } ?>"><?php echo strip_tags($item['title']); ?></option>
                           <?php } } } } ?>
                    </select>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control required <?php $err=''; if(form_error('passport_number')){ $err=' err'; echo 'error'; } ?>" name="passport_number[]" type="text" placeholder="Passport Number">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control date datepicker required <?php $err=''; if(form_error('issue_date')){ $err=' err'; echo 'error'; } ?>" name="issue_date[]" type="text" placeholder="Date of issue">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control date datepicker required <?php $err=''; if(form_error('exp_date')){ $err=' err'; echo 'error'; } ?>" name="exp_date[]" type="text" placeholder="Date of expiry">
                  </div>
                </div>
              </div>
             </div>
              <a href="javascript:void(0);" class="btn blue2 btn-submit" id="addobj4"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New Applicant</a>
              <div class="guarantor-details row">
                <div class="col-md-12">
                  <h3>Guarantor Details</h3>
                </div>
                <div class="col-md-4">
                  <input type="text" name="guarantor_name" placeholder="Guarantor name" class="form-control required <?php $err=''; if(form_error('guarantor-name')){ $err=' err'; echo 'error'; } ?>">
                </div>
                <div class="col-md-4">
                  <input type="text" name="guarantor_email" placeholder="Email address" class="form-control required <?php $err=''; if(form_error('guarantor-email')){ $err=' err'; echo 'error'; } ?>">
                </div>
                <div class="col-md-4">
                  <input type="text" name="guarantor_mobile" placeholder="Mobile number" class="form-control required <?php $err=''; if(form_error('guarantor-mobile')){ $err=' err'; echo 'error'; } ?>">
                </div>
              </div>
              <div class="time-option">
                <div class="left">
                  <h3>Processing Time</h3>
                </div>
                <div class="time">
                  <div class="time-inner">
                    <input type="radio" name="pros_time" value="1298.38" id="standard" class=" required<?php $err=''; if(form_error('pros_time')){ $err=' err'; echo 'error'; } ?>" checked>
                    <div class="time-text">
                      <label for="standard">Standard Processing</label>
                        <strong>7 Business days - UYC 1298.38/visa</strong>
                        <span>service available 24/7, 7 days a week</span>
                    </div>
                  </div>
                </div>
                <div class="time">
                  <div class="time-inner">
                    <input type="radio" name="pros_time" id="rush" value="1112.89" class=" required<?php $err=''; if(form_error('pros_time')){ $err=' err'; echo 'error'; } ?>">
                    <div class="time-text">
                      <label for="rush">Rush Processing</label>
                        <strong>5 Business days - Add UYC 1112.89/visa</strong>
                        <span>service available 24/7, 7 days a week</span>
                    </div>
                  </div>
                </div>
              </div>
            <!--   <a href="" class="btn orange btn-submit">Continue to Checkout</a>  --> 
               <button class="btn orange btn-submit" type="submit" id="butSub3">Continue to Checkout</button>         
            </div>
          </div>
        </div>      
    </section>
  </form>
  <script src="<?php echo base_url('public/frontend/js/vendor/jquery.min.js'); ?>"></script>
  <script type="text/javascript">
  $("#addobj4").click(function(){  
var num4=$('.applicant-form').length+1;
  $("#qty").val(num4);
  $("#vqty").val(num4);
  var process_time = $("input[name='pros_time']:checked"). val();
 tot=parseInt(process_time)+parseInt($('#qty').val())*parseInt($('#amt').val());
  document.getElementById('gtotal').innerHTML='AED '+tot;
  document.getElementById('gtot').value=tot;
  visa_fee=parseInt($('#qty').val())*parseInt($('#amt').val());
  document.getElementById('visa_fee').value=visa_fee;
$("#hi").append("<div class='applicant-form'> <div class='title'> <i class='fa fa-user-plus' aria-hidden='true'></i> <h3>Applicant #"+num4+"</h3> </div> <div class='row'> <div class='col-md-6 col-lg-3'> <input class='form-control required' type='text' name='fname[]' placeholder='First and Middle Name'> </div> <div class='col-md-6 col-lg-3'> <input class='form-control' type='text' name='lname[]' placeholder='Last Name'> </div> <div class='col-md-6 col-lg-3'></div> <div class='col-md-6 col-lg-3'>  </div> <div class='col-md-6 col-lg-3'> <select class='form-control required' name='nationality[]'> <option value=''>Nationality (As per Passport)</option> <?php foreach($countries as $country) { ?> <option value='<?php echo $country['id'] ?>' <?php if($country['id'] == $coid) echo 'selected=selected' ?> name='<?php echo $country['name'] ?>'><?php echo $country['name'] ?></option> <?php } ?> </select> </div><div class='col-md-6 col-lg-3'> <select class='form-control required' name='birth_country[]' id=''> <option value=''>Country of birth</option> <?php foreach($countries as $country) { ?> <option value='<?php echo $country['id'] ?>' <?php if($country['id'] == $coid) echo 'selected=selected' ?> name='<?php echo $country['name'] ?>'><?php echo $country['name'] ?></option> <?php } ?> </select> </div> <div class='col-md-6 col-lg-3'> <input class='form-control date datepicker required' name='dob[]' type='text' placeholder='Date of birth'> </div> <div class='col-md-6 col-lg-3'> <select class='form-control required' name='gender[]' id=''> <option value=''>Gender</option> <option value='male'>Male</option> <option value='female'>Female</option> </select> </div> <div class='col-md-6 col-lg-3'> <select class='form-control required' name='type_visa[]' id='type_visa' onchange='populate1(this.value)'><?php foreach($services as $item) {$countries3n=array(12,30,215,86,94,98,118,124,129,139,41,161,164,169,197,199,200,202); $countries2n=array(4); $countries1n=array(148,154); if(in_array($coid,$countries3n)) {$serarray=array(15,18,19); } if(in_array($coid,$countries2n)) {$serarray=array(15,17,18,19); } if(in_array($coid,$countries1n)) {$serarray=array(13,14,15,17,18,19); } if(count(@$serarray)>0) {if(in_array($item['id'],@$serarray)) {?> <option value='<?php echo $item['id']; ?>' <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> selected='selected'<?php } ?>><?php echo strip_tags($item['title']); ?></option> <?php } } else { if($item['id']!=17) { ?> <option value='<?php echo $item['id']; ?>' <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> selected='selected'<?php } ?>><?php echo strip_tags($item['title']); ?></option> <?php } } }  ?> </select> </div> <div class='col-md-6 col-lg-3'> <input class='form-control required' name='passport_number[]' type='text' placeholder='Passport Number'> </div> <div class='col-md-6 col-lg-3'> <input class='form-control date datepicker required' name='issue_date[]' type='text' placeholder='Date of issue'> </div> <div class='col-md-6 col-lg-3'> <input class='form-control date datepicker required' name='exp_date[]' type='text' placeholder='Date of expiry'> </div> </div> </div>");
});

  </script>
  