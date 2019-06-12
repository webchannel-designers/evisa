<?php  $coid=$this->session->userdata('couid');
print_r($frmdata);
?>
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
                <div class="tab-item">
                  <i class="fa fa-user-o" aria-hidden="true"></i>
                  <h4><span>Step1: </span>General Information</h4>
                </div>
                <div class="tab-item current">
                  <i class="fa fa-credit-card" aria-hidden="true"></i>
                  <h4><span>Step2: </span>Revision and Payment</h4>
                </div>
                <div class="tab-item">
                  <i class="fa fa-file-text-o" aria-hidden="true"></i>
                  <h4><span>Step3: </span>Upload Additional Documents</h4>
                </div>
              </div>

              <div class="payment-wrap">

              
                <div class="content-grey">
                  <div class="row general-info align-items-center">
                    <div class="col-md-4">
                      <h3><i class="fa fa-address-card" aria-hidden="true"></i> General Information</h3>
                      <a href="" class="btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i> Modify</a>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li>
                          <strong>Email address</strong>
                          <span><?php echo @$frmdata->email; ?></span>
                        </li>
                        <li>
                          <strong>Departure Date from Country</strong>
                          <span>Jun-22-2019</span>
                        </li>
                        <li>
                          <strong>Purchased airline tickets yet?</strong>
                          <span>Yes</span>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-4">
                      <ul>
                        <li>
                          <strong>Arrival Date in Country</strong>
                          <span>Jun-12-2019</span>
                        </li>
                        <li>
                          <strong>Phone</strong>
                          <span><?php echo @$frmdata->mobile; ?></span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                  <div class="row">
                    <div class="col-md-12">
                      <h3><i class="fa fa-users" aria-hidden="true"></i> Applicants</h3>
                      <a href="" class="btn-edit"><i class="fa fa-pencil" aria-hidden="true"></i> Modify</a>
                    </div>
                    <div class="col-md-12">
                      

                      <div class="table-responsive">
                        <table>
                          <tr class="thead">
                            <td>First and Middle Name</td>
                            <td>Last Name</td>
                            <td>Nationality (as in Passport)</td>
                            <td>Birthday</td>
                            <td>Country of Birth</td>
                            <td>Gender</td>
                            <td>Passport Number</td>
                            <td>Passprt Issued</td>
                            <td>Passport Expiration</td>
                            <td>VIsa Type</td>
                          </tr>
                          <tr>
                            <td>asdasd</td>
                            <td>hfghfhg</td>
                            <td>Indian</td>
                            <td>Apr-3-2019</td>
                            <td>India</td>
                            <td>Male</td>
                            <td>34534554</td>
                            <td>May-6-2008</td>
                            <td>Jun-9-2024</td>
                            <td>Tourist Visa - 60 days, Single Entry</td>
                          </tr>
                          <tr>
                            <td>bvnvbn</td>
                            <td>tytyt</td>
                            <td>Indian</td>
                            <td>Jan-3-2019</td>
                            <td>India</td>
                            <td>Male</td>
                            <td>7656</td>
                            <td>Sep-6-2008</td>
                            <td>Jun-9-2024</td>
                            <td>Tourist Visa - 60 days, Single Entry</td>
                          </tr>
                        </table>
                      </div>



                    </div>
                  </div>


                <div class="content-grey">
                  <div class="row order-details align-items-center">
                    
                    <div class="col-md-6">
                      <h3><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Order Details</h3>
                    </div>
                    <div class="col-md-6">
                      <table>
                        <tr class="thead">
                          <td>Product</td>
                          <td>Total</td>
                        </tr>
                        <tr>
                          <td>Visa Cost</td>
                          <td>UYU 7345.10</td>
                        </tr>
                        <tr>
                          <td>Service Fee</td>
                          <td>UYU 2596.76</td>
                        </tr>
                        <tr>
                          <td>Rush Fee</td>
                          <td>UYU 2225.78</td>
                        </tr>
                      </table>
                    </div>


                  </div>                  
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <h3><i class="fa fa-money" aria-hidden="true"></i> Total</h3>
                  </div>
                  <div class="col-md-6">
                    <div class="payment-total">
                      UYU 12,167.64
                    </div>
                  </div>
                </div>


                <div class="content-grey">
                  <div class="row">
                    <div class="col-md-4">
                      <h3><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Payment</h3>
                    </div>
                    <div class="col-md-6">
                      <div class="cards">
                        <img src="http://www.webchannel.co/projects/evisa/html/images/card1.jpg" alt="">
                        <img src="http://www.webchannel.co/projects/evisa/html/images/card2.jpg" alt="">
                        <img src="http://www.webchannel.co/projects/evisa/html/images/card3.jpg" alt="">
                        <img src="http://www.webchannel.co/projects/evisa/html/images/card4.jpg" alt="">
                      </div>
                      <ul class="payment">
                        <li>
                          <label for="">Name on Card</label>
                          <input type="text" class="form-control">
                        </li>
                        <li>
                          <label for="">Credit Card</label>
                          <input type="text" class="form-control">
                        </li>
                        <li class="card-details">
                          <div>
                            <label for="">Expiration Month</label>
                            <select name="" id="" class="form-control">
                              <option value="">01-January</option>
                            </select>
                          </div>
                          <div>
                            <label for="">Expiration Year</label>
                            <select name="" id="" class="form-control">
                              <option value="">2020</option>
                            </select>
                          </div>
                          <div>
                            <label for="">Security Code</label>
                            <input type="text" class="form-control" placeholder="CVV/CSC">
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="button-wrap">
                  <a href="" class="btn blue2 btn-left"><i class="fa fa-angle-left" aria-hidden="true"></i> Previous</a>
                  <a href="" class="btn blue2 btn-right">Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>        
    </section>  