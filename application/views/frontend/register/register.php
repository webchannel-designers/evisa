<section class="blue-bg padding-tb25">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="section-inner-txt">Visa Application</h3>
      </div>
      <div class="col-md-6"> </div>
    </div>
  </div>
</section>
<section class="section bg-light">
  <div class="container">
    <div class="col-lg-12">
      <div class="row">
        <div class="stepwizard col-lg-12">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step"> <a href="#step-1" type="" class="btn btn-primary1 btn-circle">1</a> </div>
            <div class="stepwizard-step"> <a href="#step-2" id="step2" type="" class="btn btn-default1 btn-circle" disabled="disabled">2</a> </div>
            <div class="stepwizard-step"> <a href="#step-3" id="step3" type="" class="btn btn-default1 btn-circle" disabled="disabled">3</a> </div>
          </div>
        </div>
        <div class="col-lg-12"> 
          <!-- step-1 --> 
          <?php echo form_open_multipart('checkout/insertvisa', array('id'=>'actionform'));   ?>
          <div class="row setup-content" id="step-1" <?php if($this->uri->segment(4)==3) { ?> style="display:none"<?php } ?>>
            <div class="col-md-12">
              <div id="accordion" class="checkout">
                <?php $cs=array();foreach($countries as $c) { $cs[$c['id']]=$c['name'];} $coid=$this->session->userdata('couid');?>
                <div class="panel checkout-step">
                  <div role="tab" id="headingTwo" class="checkout-tab"> <span class="checkout-step-number"> <i class="fa fa-flag-o calvis-icon"></i> </span>
                    <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <?php echo $coid>0?'<div id="coucopy">Selected Nationality ('.$cs[$coid].')<span class="change">Change</span></div>':'<div id="second">Select Nationality</div>'?> </a></h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse <?php echo $coid?'show':'' ?>">
                    <div class="checkout-step-body">
                      <div class="checout-address-step">
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="country">Select Your Nationality</label>
                            <select class="custom-select d-block w-100" id="nationality" name="nationality" required=""  onchange="javascript:location.href='<?php echo site_url('checkout/process'); ?>?nationality='+this.value">
                              <option value=""><?php echo convert_lang('Select your country',$this->alphalocalization); ?></option>
                              <?php foreach($countries as $country) { ?>
                              <option value="<?php echo $country['id'] ?>" <?php  if($country['id'] == $coid) echo 'selected="selected"' ?> name="<?php echo $country['name'] ?>"><?php echo $country['name'] ?></option>
                              <?php } ?>
                            </select>
                            <div class="invalid-feedback"> Please select a valid country. </div>
                          </div>
                        </div>
                      </div>
                      <?php if($this->uri->segment(5)=="msg3") { ?>
                      <p class="text-center">Please call +971 4 2212213 or e-mail us at holidays@al-majid.com and our team will assist you.</p>
                      <?php }else{?>
                      <button class="btn btn-checknext" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Next</button>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <?php if(!in_array($coid,$nacs)){?>
                <div class="panel checkout-step">
                  <div role="tab" id="headingThree" class="checkout-tab"> <span class="checkout-step-number"> <i class="fa fa-id-card-o calvis-icon"></i> </span>
                    <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                      <div id="third">Select Visa Option</div>
                      <div id="visacopy"></div>
                      </a> </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="checkout-step-body">
                      <ul>
                        <?php foreach($services as $item) {  
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
                        <li> <a href="javascript:void(0)">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="custom-control custom-radio">
                                <input title="<?php echo strip_tags($item['title']); ?>" name="visa" type="radio" id="<?php echo $item['id']; ?>" class="custom-control-input visa_val" value="<?php echo $item['id']; ?>" <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> checked="checked"<?php } ?> onclick="populate('<?php echo $item['id']; ?>')" >
                                <label class="custom-control-label visa-box" for="<?php echo $item['id']; ?>">
								
								<div class="row">
                                    <div class="col-md-8">
                                      <?php echo strip_tags($item['title']); ?>
                                    </div>                                  
                                    <div class="step-price col-md-4"> <span>AED <?php echo $item['price']; ?></span></div>
                                  </div>
                                
                                
                                </label>
                              </div>
                            </div>
                            
                          </div>
                          </a> </li>
                        <?php } } else { if($item['id']!=17) { ?>
                        <li> <a href="javascript:void(0)">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="custom-control custom-radio">
                                <input title="<?php echo strip_tags($item['title']); ?>" name="visa" type="radio" id="<?php echo $item['id']; ?>" class="custom-control-input visa_val" value="<?php echo $item['id']; ?>" <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> checked="checked"<?php } ?> onclick="populate('<?php echo $item['id']; ?>')" >
                                <label class="custom-control-label visa-box" for="<?php echo $item['id']; ?>">
								<div class="row">
                                    <div class="col-md-8">
                                      <?php echo strip_tags($item['title']); ?>
                                    </div>
                                    
                                    <div class="step-price col-md-4"> <span>AED <?php echo $item['price']; ?></span></div>
                                  </div>
                                
                                </label>
                              </div>
                            </div>
                            
                          </div>
                          </a> </li>
                        <?php } } } ?>
                      </ul>
                      <button class="btn btn-checknext" type="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Next</button>
                    </div>
                  </div>
                </div>
                <div class="panel checkout-step">
                  <div role="tab" id="headingFour" class="checkout-tab"> <span class="checkout-step-number"> <i class="fa fa-user-o calvis-icon"></i> </span>
                    <h4 class="checkout-step-title"> <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> Select Number of Visas </a> </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <div class="checkout-step-body">
                      <input type="hidden" name="relative" id="relative" value="Yes" />
                      <hr>
                      <?php //echo @$frmdata->no_of_visas; ?>
                      <div class="row process-step" >
                        <div class="col-md-9">
                          <div class="row" id="visatypes"> </div>
                        </div>
                        <div class="col-md-3">
                          <div class="count-input space-bottom"> <a class="incr-btn" data-action="decrease" id="small" href="#">–</a>
                            <input class="quantity" type="text" name="quantity" id="qty" value="<?php if(@$frmdata->no_of_visas!="") { echo @$frmdata->no_of_visas; } else { echo 1;} ?>" />
                            <a class="incr-btn" data-action="increase" id="big" href="#">&plus;</a> </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row process-step">
                        <div class="col-md-12">
                          <h2>Total <span id="gtotal"><?php echo @$frmdata->order_total; ?></span></h2>
                          <input type="hidden" id="gtot" name="gtot"  value="<?php echo @$frmdata->order_total; ?>"/>
                        </div>
                        <div class="col-md-12">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address" name="terms" value="Yes" required <?php if(@$frmdata->terms=="Yes") { ?> checked="checked"<?php } ?>>
                            <label class="custom-control-label custom-control-check" for="same-address">By Clicking Continue to checkout. You agree that you have read and understood our <a href="<?php echo site_url('contents/view/terms-and-conditions') ?>#terms-and-conditions" target="_blank">Terms & Conditions</a></label>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button class="btn btn-checkout" type="submit">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
          </form>
          <!-- step-1 --> 
          <!-- step-2 -->
          <?php if(!in_array($coid,$nacs)){?>
          <?php echo form_open_multipart('checkout/insertvisa2',array('id' => 'frmPay')); ?>
          <div class="row setup-content" id="step-2" <?php if($this->uri->segment(4)==3) { ?> style="display:none"<?php } ?>>
            <div class="col-md-4 order-md-2 mb-4"> 
              <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-visa">Dubai Visa</span>
                  </h4> -->
              <?php if(@$frmdata) { ?>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed side-pay">
                  <div>
                    <h6 class="my-0">Visa Type :</h6>
                  </div>
                  <span id="visatemp"><?php echo @$frmdata->visa_type; ?></span> </li>
                <?php /*?><li class="list-group-item d-flex justify-content-between lh-condensed side-pay">
                      <div>
                        <h6 class="my-0">Travel Date :</h6>
                      </div>
                      <span><?php echo date("d-m-Y", strtotime(@$frmdata->travel_date)); ?></span>
                    </li><?php */?>
                <?php /*?><li class="list-group-item d-flex justify-content-between lh-condensed side-pay">
                      <div>
                        <h6 class="my-0">Processing Type :</h6>
                      </div>
                      <span>Normal</span>
                    </li><?php */?>
                <li class="list-group-item d-flex justify-content-between lh-condensed side-pay">
                  <div>
                    <h6 class="my-0">No. Of Visa :</h6>
                  </div>
                  <span><?php echo @$frmdata->no_of_visas; ?></span> </li>
                <?php /*?><li class="list-group-item d-flex justify-content-between lh-condensed side-pay">
                      <div>
                        <h6 class="my-0">Booking Type :</h6>
                      </div>
                      <span>[Not Refundable]</span>
                    </li><?php */?>
                <li class="list-group-item d-flex justify-content-between list-pay">
                  <div>
                    <h6 class="my-0">Total</h6>
                  </div>
                  <h6 class="my-0">AED <?php echo @$frmdata->order_total ?></h6>
                </li>
              </ul>
              <?php } ?>
            </div>
            <div class="col-md-8 order-md-1"> 
              <!--LEAD PASSENGER DETAILS-->
              <div class="white-bg border1px p-25">
                <h4 class="mb-3">Lead Passenger Details</h4>
                <input type="hidden" name="pass_type[]" value="Yes" />
                <div class="row">
                  <div class="col-md-2 mb-3">
                    <select class="custom-select d-block w-100" name="title[]" required="">
                      <option value="Mr">Mr.</option>
                      <option value="Mrs">Mrs.</option>
                      <option value="Master">Master.</option>
                      <option value="Dr">Dr.</option>
                      <option value="Miss">Miss.</option>
                    </select>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="firstName" name="fname[]" placeholder="First name" value="" required>
                    <div class="invalid-feedback"> Valid first name is required </div>
                  </div>
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="lastName" name="lname[]" placeholder="Last name" value="" required>
                    <div class="invalid-feedback"> Valid last name is required </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input type="email" class="form-control" id="email" name="email[]" placeholder="Email address" required>
                    <div class="invalid-feedback"> Please enter a valid email address </div>
                  </div>
                  <?php /*?><div class="col-md-2 mb-3">
                          <input type="text" class="form-control" id="isd" name="isd[]" maxlength="2" placeholder="ISD" value="" required>
                          <div class="invalid-feedback">
                            Valid ISD is required
                          </div>
                      </div><?php */?>
                  <div class="col-md-6 mb-3">
                    <input type="tel" class="form-control number" id="number" name="phone[]" placeholder="Mobile number" required>
                    <div class="invalid-feedback"> Please enter a valid contact number </div>
                  </div>
                </div>
                <?php /*?><div class="row">
                        <div class="col-md-6 mb-3">
                          <select class="custom-select d-block w-100" id="country" required="">
                            <option value="">Living In</option>
                            <option>United States</option>
                          </select>
                          <div class="invalid-feedback">
                            Please select a valid country.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <select class="custom-select d-block w-100" id="nationality" required="">
                            <option value="">Nationality</option>
                            <option>California</option>
                          </select>
                          <div class="invalid-feedback">
                            Please provide a valid Nationality.
                          </div>
                        </div>                        
                      </div><?php */?>
                <?php /*?><div class="mb-3">
                          <input type="text" class="form-control" id="passportno" name="passportno[]" placeholder="Passport No" value="" required>
                          <div class="invalid-feedback">
                            Valid Passport No is required
                          </div>
                      </div><?php */?>
                <?php /*?><div class="form-group">
                        <textarea class="form-control" id="message" name="message[]" placeholder="Special Request" rows="3"></textarea>
                      </div><?php */?>
                <div class="row">
                  <div class="col-md-6 file"><span>Colour Passport <i class="format">(jpg,png)</i></span> 
                    <div class="input-group upload-visa"> 
                       <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" required name="passportimage[]" >
                        <label class="custom-file-label" for="inputGroupFile02">Colour Passport</label>
                      </div>
                    </div>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                  <div class="col-md-6 file"><span>Colour Photograph <i class="format">(jpg,png)</i></span> 
                    <div class="input-group upload-visa"> 
                       <div class="custom-file">
                        <input type="file" class="custom-file-input" required id="inputGroupFile02" name="photo[]" >
                        <label class="custom-file-label" for="inputGroupFile02">Colour Photograph</label>
                      </div>
                    </div>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                </div>
              </div>
              <!--LEAD PASSENGER DETAILS--> 
              
              <!--EXTRA DETAILS-->
              <?php if(@$frmdata->no_of_visas>1){ ?>
              <?php for($i=1;$i<$frmdata->no_of_visas;$i++) { ?>
              <input type="hidden" name="pass_type[]" value="No" />
              <div class="white-bg border1px p-25 mt-15">
                <h4 class="mb-3">Extra Passengers</h4>
                <div class="row">
                  <div class="col-md-2 mb-3">
                    <select class="custom-select d-block w-100" name="title[]" required="">
                      <option value="Mr">Mr.</option>
                      <option value="Mrs">Mrs.</option>
                      <option value="Master">Master.</option>
                      <option value="Dr">Dr.</option>
                      <option value="Miss">Miss.</option>
                    </select>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="firstName" name="fname[]" placeholder="First name" value="" required>
                    <div class="invalid-feedback"> Valid first name is required </div>
                  </div>
                  <div class="col-md-5 mb-3">
                    <input type="text" class="form-control" id="lastName" name="lname[]" placeholder="Last name" value="" required>
                    <div class="invalid-feedback"> Valid last name is required </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 file"> <span>Colour Passport <i class="format">(jpg,png)</i></span> 
                    <div class="input-group upload-visa">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" required id="inputGroupFile02" name="passportimage[]">
                        <label class="custom-file-label" for="inputGroupFile02">Colour Passport</label>
                      </div>
                    </div>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                  <div class="col-md-6 file"> <span>Colour  Photograph <i class="format">(jpg,png)</i></span>
                    <div class="input-group upload-visa">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" required id="inputGroupFile02" name="photo[]">
                        <label class="custom-file-label" for="inputGroupFile02">Colour  Photograph</label>
                      </div>
                    </div>
                    <div class="invalid-feedback"> Please select </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <?php } ?>
              <?php
			  	$transaction_uid = substr(uniqid(),0,-4);
				$ip = $_SERVER['REMOTE_ADDR']; 
				$ipstr = sprintf("%u",ip2long($ip));
				//$port = "0".$_SERVER['SERVER_PORT'];
				$port ="443";
				$transaction_uid = $transaction_uid.$port.$ipstr; 
			  ?>
              
              <div class="white-bg border1px p-25">
                <h4 class="mb-3">Guarantor Details</h4>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" id="gName" name="gname" placeholder="Guarantor name" value="" required>
                    <div class="invalid-feedback"> Valid Guarantor name is required </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <input type="email" class="form-control" id="gemail" name="gemail" placeholder="Email address" required>
                    <div class="invalid-feedback"> Please enter a valid email address </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <input type="tel" class="form-control number" id="gnumber" name="gphone" placeholder="Mobile number" required>
                    <div class="invalid-feedback"> Please enter a valid contact number </div>
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <button class="btn btn-checkout" type="submit" id="lastbtn">Continue to Checkout</button>
            </div>
          </div>
          
	<input type="hidden" name="access_key" value="529fca9c09303743995094a564f1a020" />
	<input type="hidden" name="profile_id" value="B704474F-F8CF-46EB-BA2B-ED80731F9B4F" />
    <input type="hidden" name="transaction_uuid" value="<?php echo $transaction_uid ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,ignore_avs,bill_to_address_country,bill_to_email,bill_to_forename,bill_to_surname,consumer_id,customer_ip_address,payment_method">
	<input type="hidden" name="unsigned_field_names">
    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <input type="hidden" name="transaction_type" value="sale">
    <input type="hidden" name="reference_number" value="<?php echo uniqid()?>">
    <input type="hidden" name="amount" value="<?php echo @$frmdata->order_total; ?>" />
    <input type="hidden" name="currency" value="AED">
    <input type="hidden" name="ignore_avs" value="true">
    <input type="hidden" name="bill_to_address_country" value="AE">
    <input type="hidden" name="bill_to_email" value="<?php echo @$frmdata->gemail; ?>">
    <input type="hidden" name="bill_to_forename" value="<?php echo @$frmdata->gname; ?>">
    <input type="hidden" name="bill_to_surname" value="<?php echo @$frmdata->gname; ?>">
    <input type="hidden" name="consumer_id" value="<?php echo @$frmdata->order_id; ?>">
    <input type="hidden" name="customer_ip_address" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
    <input type="hidden" name="payment_method" value="card">
          
          </form>
          <?php } ?>
          <!-- step-2 --> 
          <!-- step-3 -->
          <div class="setup-content last-msg" id="step-3">
            <?php if($this->uri->segment(5)=="msg") { ?>
            <h3 class="text-center">Please call +971 4 2212213 or e-mail us at holidays@al-majid.com and our team will assist you. </h3>
            <?php } else if($this->uri->segment(5)=="msg2") { ?>
            <h3 class="text-left">Thank you for your application. Our Visa Consultant will get in touch with you shortly.</h3>
            <br />
            <h4>In the meantime, please arrange to send the following documents upon request:</h4>
            <br />
            <ul class="listing">
              <li>Colour copy of the Guarantor’s passport</li>
              <li>Colour copy of the Guarantor’s valid UAE residency visa</li>
              <li>Front and back copy of Guarantor’s Emirates ID</li>
            </ul>
            <br />
            <br />
            <?php } else if($this->uri->segment(5)=="msg3") { ?>
            <h3 class="text-center">Please call +971 4 2212213 or e-mail us at holidays@al-majid.com and our team will assist you.</h3>
            <?php } else if($this->uri->segment(5)=="msg4") { ?>
            <h3 class="text-center">The transaction has been cancelled. Please try again.</h3>
            <?php } ?>
          </div>
          <!-- step-3 --> 
        </div>
      </div>
    </div>
  </div>
</section>

<script language="javascript" type="text/javascript">
				$(document).ready(function(){
				//$("#frmPay").attr('action','payment_confirmation.php');
				$("#lastbtn").click(function(){
				//document.getElementById('butPay').style.display='block';
				//document.getElementById('butCash').style.display='none';
				//$("#frmPay").attr('action','payment_confirmation.php');
				});	
					
				}); 
</script>
