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
<form action="http://www.webchannel.co/projects/evisa/www/en/checkout/process" method="post" accept-charset="utf-8" enctype="multipart/form-data">                                  

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
                                </form>
                            </div>
                        </div>
                     </div>                  
         </div>      
    </section>
    
                                  
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
                  <h4><span>Step1: </span>Revision and Payment</h4>
                </div>
                <div class="tab-item">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <h4><span>Step1: </span>Upload Additional Documents</h4>
                </div>
              </div>

              <div class="form-header">
                <div class="row">
                   <?php if(!in_array($coid,$nacs)){                
                    ?>
                    <div class="col-md-4">
                      <label for="visa">Visa Type</label>
                     <!--  <select name="" id="<?php echo $item['id']; ?>">                       
                        <option value="<?php echo $item['id']; ?>" <?php if(@$frmdata->visa_type==$item['id'] or @$_POST['visa_type']==$item['id']) { ?> selected="selected"<?php } ?>"><?php echo strip_tags($item['title']); ?></option>
                      </select> -->
                      <input type="text" id="visa_type" value="">
                    </div>
                    <div class="col-md-4">
                      <label for="">No. Of Visa</label>
                      <!-- <select name="" id="">
                        <option value="">1</option>
                      </select> -->
                     <input class="quantity" type="text" name="quantity" id="qty" value="<?php if(@$frmdata->no_of_visas!="") { echo @$frmdata->no_of_visas; } else { echo 1;} ?>" />
                    </div>
                    <div class="col-md-4">
                      <div class="total" id="tot">
                        <h5>Total</h5>
                        <h5><span id="gtotal"><?php echo @$frmdata->order_total; ?></span></h5>
                      </div>
                      <input type="hidden" id="gtot" name="gtot"  value="<?php echo @$frmdata->order_total; ?>"/>
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
                    <input class="form-control" type="text" placeholder="First and Middle Name">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Last Name">
                  </div>
                    <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Email address">
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Mobile Number">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Nationality (As per Passport)</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Country of birth</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of birth">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Gender</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="type_visa" id="type_visa" onchange="populate1(this.value)">
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
                    <input class="form-control" type="text" placeholder="Passport Number">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of issue">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of expiry">
                  </div>


                </div>

              </div>

</div>

              <!-- <div class="applicant-form" id="applicant">
                <div class="title">
                  <i class="fa fa-user-plus" aria-hidden="true"></i>
                  <h3>Applicant #2</h3>
                </div>

                <div class="row">
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="First and Middle Name">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Last Name">
                  </div>               
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Nationality (As per Passport)</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Country of birth</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of birth">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Gender</option>
                    </select>
                  </div>

                  <div class="col-md-6 col-lg-3">
                    <select class="form-control" name="" id="">
                      <option>Visa Type</option>
                    </select>
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Passport Number">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of issue">
                  </div>
                  <div class="col-md-6 col-lg-3">
                    <input class="form-control" type="text" placeholder="Date of expiry">
                  </div>


                </div>

              </div> -->

              <a href="javascript:void(0);" class="btn blue2 btn-submit" id="addobj4"><i class="fa fa-user-plus" aria-hidden="true"></i> Add New Applicant</a>


              <div class="guarantor-details row">
                <div class="col-md-12">
                  <h3>Guarantor Details</h3>
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Guarantor name" class="form-control">
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Email address" class="form-control">
                </div>
                <div class="col-md-4">
                  <input type="text" placeholder="Mobile number" class="form-control">
                </div>
              </div>


              <div class="time-option">
                <div class="left">
                  <h3>Processing Time</h3>
                </div>

                <div class="time">
                  <div class="time-inner">
                    <input type="radio" name="time" id="standard">
                    <div class="time-text">
                      <label for="standard">Standard Processing</label>
                        <strong>7 Business days - UYC 1298.38/visa</strong>
                        <span>service available 24/7, 7 days a week</span>
                    </div>
                  </div>
                </div>

                <div class="time">
                  <div class="time-inner">
                    <input type="radio" name="time" id="rush">
                    <div class="time-text">
                      <label for="rush">Rush Processing</label>
                        <strong>5 Business days - Add UYC 1112.89/visa</strong>
                        <span>service available 24/7, 7 days a week</span>
                    </div>
                  </div>
                </div>
              </div>
              <a href="" class="btn orange btn-submit">Continue to Checkout</a>           
            </div>
          </div>
        </div>      
    </section>
