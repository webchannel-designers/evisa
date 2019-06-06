       
          <!-- About-->
           <section id="About" class="collapsfix scrolling mainWidth relative">
           <!--	btn-cover-->
           		<div class="btn-cover">
                    <div class="side-nav">          
                     <div class="prev"><a href="#"></a></div>  
                     <div class="next"><a href="#Services"></a></div>
                   </div>
          		</div>  
            <!--	btn-cover--> 
        
               <h1 class="variableblack apear"><?php echo $about->title; ?></h1>
               <span class="apear"><?php echo stripslashes($about->short_desc); ?></span>
               <p class="apear"><?php echo stripslashes($about->desc); ?></p>			<!--tab-wrapper2-->	
               <div class="tab-wrapper2">
               	<ul class="tab-nav2">
                
                
                 <?php
			   $i=0;
			   foreach($subabout as $subaboutres):
			 
			   if($about->id!=$subaboutres['id'])
			   {
			   if($i==1)
			   {
			   $aboutclass="we-are";
			   $active="apear";
			   }
			   if($i==2)
			   {
			    $aboutclass="get-to";
				 $active="apear";
			   }
			   if($i==3)
			   {
			    $aboutclass="target";
				 $active="apear";
			   }
			   ?>
               
                    
                    <!--<li class="apear"><a class=" variablebold" href="#tab2-2"><span class="get-to"></span>Get to Know Us<span class="arrow-active" ></a></li>
                    <li class="apear"><a class=" variablebold" href="#tab3-2"><span class="target"></span>Target Market<span class="arrow-active" ></a></li>-->
                  <?php
				   }
			   $i++;
				  endforeach;
				  ?>  
              </ul>
              
              
             <div class="tab-container2">
                    <div  id="tab1-2" class="tab-content2">
                    	<div class="cover-tab-content">
                        	<h2><?php echo $why->title ?></h2>
                            <h3><?php echo stripslashes($why->short_desc); ?></h3>
            <?php echo stripslashes($why->desc); ?>
                        </div>
               		</div>
                    
                    
                    <div  id="tab2-2" class="tab-content2">
                    <div class="cover-tab-content">
    				<h2><?php echo $profile->short_desc; ?></h2>
                    	<dl class="photo">
                        
                        <?php
						
						foreach($subprofile as $subprofileval):
						
						?>
                        	<dt>
                            	<div class="frame"></div>                                
                            	<img src="<?php echo base_url('public/uploads/contents/'.$subprofileval['image']) ?>" width="311" height="291" alt=""> 
                            	<h4><?php echo $subprofileval['title'];?></h4>
                            	<p><?php echo stripslashes(word_limiter($subprofileval['desc'],70)); ?></p>
                                <a class="lightbox more" href="<?php echo site_url('home/content/'.$subprofileval['slug'])?>?jid=1&lightbox[iframe]=true&lightbox[width]=550&lightbox[height]=505">Read full story</a>                       
                            </dt>
                            
                            <?php
							endforeach;
							?>
                            
                         
                        </dl>
                        </div>
               		</div>
                    
                    <div  id="tab3-2" class="tab-content2">
                   	  <div class="cover-tab-content">
    					 <h2><?php echo $mission->title ?></h2>
                         <?php echo $mission->desc ?>
                        
                        </div>
			  		</div>
              </div> 
               </div>
     
            
           </section>
           <!-- About-->
           <!--Service-->
           <section id="Services" class="collapsfix scrolling max-width ">     
            <!--	btn-cover-->
           		<div class="btn-cover">
                    <div class="side-nav">          
                     <div class="prev"><a href="#About"></a></div>  
                     <div class="next"><a href="#Careers"></a></div>
                   </div>
          		</div>  
            <!--	btn-cover--> 
           		 <h1 class="variableblack apear"><?php echo $services->title; ?></h1>
               <span class="apear"><?php echo $services->short_desc; ?></span>
              <!-- <p class="apear"><?php //echo $services->desc; ?></p>-->
           <div class="tab-wrapper apear">
            <ul class="tab-nav">
            <?php
			 $j=0;
			foreach($subservices as $subservicesrow):
			if($services->id !=$subservicesrow['id'])
			{
			if($j==1)
			{
			$mclass="business";
			$sclass="class='active'";
			}
			elseif($j==2)
			{
			$mclass="project";
			$sclass='';
			}
			elseif($j==3)
			{
			$mclass="stratgic";
			$sclass='';
			}
			 ?>
            
                    <li <?php echo $sclass ?>><a class="variablebold" href="#tab<?php echo $j?>"><div class="srvc-icon <?php echo $mclass ?>"></div>
					<div class="srvc-txt"><?php echo $subservicesrow['title']; ?></div></a></li>
                                        <?php
					}
					$j++;
					endforeach;
					?>
            
                  </ul>
             <div class="tab-container">
             
              <?php
			 $i=0;
			 foreach($subservices as $subservicesrow):
			 if($services->id !=$subservicesrow['id'])
			{
			 ?>
                    <div  id="tab<?php echo $i ?>" class="tab-content">  
                    <div class="tab-inn">
                   <h2><?php echo $subservicesrow['title']; ?></h2>
                  <!-- <span><?php //echo $subservicesrow['short_desc'];  ?></span>-->
                   <?php echo stripslashes($subservicesrow['desc']) ?>
				   
				          <!--<div class="panelcollapsed">
				 <div class="click-collapse"><h2>Click here</h2></div>  
				   <div class="panelcontent">
				     <p>Content goes here Content goes here Content goes hereContent goes hereContent goes hereContent goes hereContent goes hereContent goes hereContent goes here
					 Content goes hereContent goes hereContent goes hereContent goes hereContent goes here Content goes hereContent goes here
					 Content goes hereContent goes hereContent goes here</p>
				   </div>
				 </div>-->
				 
				 
				 
				 
                    </div>
                    </div>
                    <?php
					}
					$i++;
					endforeach;
					?>
                    
                    
                    
                    
              </div>            
           
           </div>
           
                   
           
           </section>
           <!--Service-->
            
            <!--Work-->
           <?php /*?><section id="Work" class="collapsfix scrolling max-width ">     
           <!--	btn-cover-->
           		<div class="btn-cover">
                    <div class="side-nav">          
                     <div class="prev"><a href="#Services"></a></div>  
                     <div class="next"><a href="#Careers"></a></div>
                   </div>
          		</div>  
            <!--	btn-cover--> 
            <h1 class="variableblack apear"><?php echo $working->title; ?></h1>
            <p class="apear"><?php echo stripslashes($working->short_desc) ; ?></p>
            <div class="clearfix">
                   <div class="cul apear ">
                       <figure class="img01"></figure>
                                   
                   </div>
            </div>
            <p class="apear green"><?php echo strip_tags(stripslashes($working->desc)); ?></p>
           
           </section><?php */?>
            <!--Work-->
       
            <!--Careers-->
            <section id="Careers" class="collapsfix scrolling max-width ">  
             <!--	btn-cover-->
           		<div class="btn-cover">
                    <div class="side-nav">          
                     <div class="prev"><a href="#Services"></a></div>  
                     <div class="next"><a href="#Contact"></a></div>
                   </div>
          		</div>  
            <!--	btn-cover-->    
           
            <h1 class="variableblack apear"><?php echo $careers->title ?></h1>
            <!--<p class="apear"><?php //echo strip_tags(stripslashes($careers->desc)); ?></p>-->
            <div class="clearfix">
            
           
                   <div class="cul grey apear floatL">                  
				   
				     <div class="career-wrap">     
                       <h2 class="variablebold"><?php echo convert_lang('current openings',$this->alphalocalization); ?></h2>
                       
                       <?php
					   foreach($jobs as $jobval):
					   ?>
                       <h3><?php echo $jobval['title']?></h3>
                         <p><?php echo stripslashes(word_limiter($jobval['desc'],20)) ?></p>
                       <a class="lightbox floatL" href="<?php echo site_url('careers/apply/'.$jobval['slug'])?>?jid=1&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405">Apply Now</a>
                      <!-- <p>Svamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consecteSvamus sagittis lacus vel augue </p>      
					   <a class="lightbox floatL" href="jid=1&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405">Apply Now</a>  -->   
					 </div> 
					 <hr> 
                       <?php
					   endforeach;
					   ?>      
                     
					 <!--<div class="career-wrap">					   
					   <h3>Agile business analyst consultant</h3>
                       <p>Svamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consecteSvamus sagittis lacus vel augue </p>      
					   <a class="lightbox floatL" href="jid=1&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405">Apply Now</a>                
                   </div>-->
				  
				   </div>
                  
                <div class="cul dark apear floatL">                      
                       <h2 class="variablebold"><?php echo $resume->title ?></h2>                         
                       <p> <?php echo $resume->short_desc ?></p>
                       <a class="lightbox floatL" href="<?php echo site_url('careers/apply')?>?jid=1&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405">Post your CV</a>
                                      
                         
                   </div>
                   
                  
               </div>
               
            <!--<p class="apear green"><?php //echo //strip_tags(stripslashes($resume->desc)) ?></p>-->
           
           </section>
           <!--Careers-->
           
            <!--Contact-->
            <section id="Contact" class="collapsfix scrolling max-width ">  
          <!--	btn-cover-->
           		<div class="btn-cover btn-cover-contact">
                    <div class="side-nav">          
                     <div class="prev"><a href="#Careers"></a></div>  
                     
                   </div>
          		</div>  
            <!--	btn-cover-->    
            	<div class="left-contact apear relative">
               	  <div class="cont-cover floatR">
                     <h1 class="variableblack"><?php echo convert_lang('CONTACT US',$this->alphalocalization); ?></h1>
               		<?php echo stripslashes($contact->address); ?>
                    <ul class="social-icons">
                    	<li class="twitter"><a href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank">twitter</a></li>
                        <li class="facebook"><a href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank">facebook</a></li>
                        <li class="Linked"><a href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank">Linked</a></li>                    
                    </ul>
                    <a class="write-us"><?php echo convert_lang('write to us',$this->alphalocalization); ?></a>
                    <div class="footer-copy">
                    <p>&copy; <?php echo convert_lang('Copyright Isher Technologies',$this->alphalocalization); ?> <?php echo date('Y') ?> . <?php echo convert_lang('All rights reserved',$this->alphalocalization); ?>.  |  <a class="lightbox" href="<?php echo site_url('home/content')?>?cid=1&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405" ><?php echo convert_lang('Privacy Policy',$this->alphalocalization); ?></a>  |  <a class="lightbox" href="<?php echo site_url('home/content')?>?cid=2&lightbox[iframe]=true&lightbox[width]=507&lightbox[height]=405" ><?php echo convert_lang('Terms and Conditions',$this->alphalocalization); ?></a><br>

                    <?php echo convert_lang('Designed & Developed by',$this->alphalocalization); ?> :<a href="#"><img src="<?php echo base_url('public/frontend/images/webchannel.png') ?>" width="83" height="15" alt="Webchannel"></a> </p></div>
                    </div>
                    

                </div>
                <div class="right-contact apear">
                	<div class="form-wrapp">
                    	<a class="close-btn"></a>
                    	<div class="form-cover">
                        	<h2> <?php echo convert_lang('write to us',$this->alphalocalization); ?></h2>
                            <div id="formcontainer"></div>
                            <form action="" name="frmapply" id="frmapply" method="post">
                            <ul>
                            	<li class="half">
                                	 <input id="Fullname" name="Fullname" type="text" value="fullname" class="required"  value="<?php echo (isset($fullname))? $fullname:'fullname' ?>" />
                                </li>
                                <li class="half">
                                	 <input name="Email" id="Email" type="text" value="<?php echo (isset($email))? $email:'Email Address' ?>" class="required email" />
                                </li>
                                <li class="half">
                                	 <input name="Telephone" id="Telephone" type="text"  class="required number" value="<?php echo (isset($telephone))? $telephone:'Contact Number' ?>"/>
                                </li>
                                <li class="half">
                                	 <input name="Subject" id="Subject"   type="text" value="<?php echo (isset($subjects))? $subjects:'Subject' ?>" />
                                </li>
                                <li>
								<textarea  name="txtMsg" id="txtMsg" cols="" rows="" class="required"><?php echo (isset($txtMsg))? $txtMsg:'Message' ?></textarea>
                                </li>
                                <li>
                                <input type="image"  src="<?php echo base_url('public/frontend/images/submit.gif') ?>" class="submit" id="submit" name="butSub">
                                </li>
                            
                            </ul>
                        </form>
                        </div>
                    
                    </div>
                	<div class="map-view" style="width:100%; height:438px;" id="map_canvas">
               	  <!--  <img src="images/map.jpg" width="698" height="441" alt=""> -->
                 
                    </div>
                
                </div>
            
            </section> 
            <!--Contact-->
            
            <?php 
			$condesc='Isher Technologies';
			$latitude=$contact->latitude;
			$longitude=$contact->longitude;
			$scriptstr='';
$scriptstr.="googlemapfun('map_canvas','".$latitude."','".$longitude."','".stripslashes($condesc)."');";

 ?>

<script type="text/javascript">

function intialize(){

 <?php echo $scriptstr; ?>

 }

</script>

</div>

<script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=AIzaSyAIDTZgRG-hYjVq86JYbsuhPAzHYZXmgOg" type="text/javascript">

</script>

<script type="text/javascript">

function googlemapfun(divid,lat,lng,address) {

 if (GBrowserIsCompatible()) {

  var map = new GMap2(document.getElementById(divid));

  var point = new GLatLng(lat,lng);

        map.setCenter(point, 15);

        map.setUIToDefault();

  map.setMapType(G_NORMAL_MAP);

  var marker = new GMarker(point);

   map.addOverlay(marker);

  GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(address);});

 }

} 

window.onload = intialize;

window.onunload = GUnload;

</script>                
           
  <script language="javascript">
		$(document).ready(function() {
			$('#submit').click(function() {
			//alert("haii");
			var Fullname = $("#Fullname").val();
			var email = $("#Email").val();
			var txtMsg = $("#txtMsg").val();
			var captcha = $("#txtCaptcha").val();
			//alert(Fullname);
			if(Fullname =='fullname')
			{
			document.getElementById('Fullname').value = "";	
			}
			if(email =='Email Address')
			{
			document.getElementById('Email').value = "";	
			}
			if(txtMsg =='Message')
			{
			document.getElementById('txtMsg').value = "";	
			}
		
			//$("#frmapply").validate();
			if($("#frmapply").valid()==true)
  			{
			var dataString = new Object();

	dataString = $('#frmapply').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('home/enquiry/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#formcontainer').html(msg);
			$('#Fullname').val('');
			 $('#Email').val('');
			$('#Subject').val('');
			$('#Telephone').val('');
			$('#txtMsg').val('');
			$('#frmapply').hide();
		}, error: function(){ alert('Error while request..'); }

	});
	
	return false;

			
			}
			});
			$('#Fullname').focus(function() {
			  if($(this).val()=='fullname')
			  {
			  $('#Fullname').val('');
			  }
			});	
			$('#Fullname').blur(function() {
			  if($(this).val()=='')
			  {
			  $('#Fullname').val('fullname');
			  }
			});	
			
		
			
			$('#Email').focus(function() {
			  if($(this).val()=='Email Address')
			  {
			  $(this).val('');
			  }
			});	
			$('#Email').blur(function() {
			  if($(this).val()=='')
			  {
			  $(this).val('Email Address');
			  }
			});	
			
			$('#Telephone').focus(function() {
			  if($(this).val()=='Contact Number')
			  {
			  $(this).val('');
			  }
			});	
			$('#Telephone').blur(function() {
			  if($(this).val()=='')
			  {
			  $(this).val('Contact Number');
			  }
			});		
			
			$('#Subject').focus(function() {
			  if($(this).val()=='Subject')
			  {
			  $(this).val('');
			  }
			});	
			$('#Subject').blur(function() {
			  if($(this).val()=='')
			  {
			  $(this).val('Subject');
			  }
			});	
			
			$('#txtMsg').focus(function() {
			  if($(this).val()=='Message')
			  {
			  $(this).val('');
			  }
			});	
			$('#txtMsg').blur(function() {
			  if($(this).val()=='')
			  {
			  $(this).val('Message');
			  }
			});		
			
			
		});
	</script> 	         
           
         
    </body>

</html>
