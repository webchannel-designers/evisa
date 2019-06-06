<!--<div class="footer">
  <div class="footer-holder">
    <div class="container">
      <div class="row"> 
        
        <div class="col-md-12">
          <ul class="nav nav-tabs">
            <?php 
                        $t=1;
						
                        $scriptstr=''; foreach($contacts as $contact):
                        //print_r($contact);
                        $condesc=$contact['address'];
                        
                        $place = $contact['location'];
                        
                        $latitude=$contact['latitude'];
                        
                        $longitude=$contact['longitude'];
                        
                        //echo stripslashes($condesc); 
                        
                        $condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
                        
                        $lines = explode("\n", $condesc);
                        
                        $new_lines = array();
                        
                        foreach ($lines as $i => $line) {
                        
                            if(!empty($line))
                        
                                $new_lines[] = trim($line);
                        
                        }
                        
                        $condesc =implode($new_lines);
                        //echo stripslashes(strip_tags($condesc,'<br>'));
                        ?>
            <li class="nav <?php if($t==1) { ?>active<?php } ?>"><a data-toggle="tab" href="#<?php echo $t; ?>"><?php echo stripslashes($place); ?><span class="arrow"></span></a></li>
            <?php
                            $t++;
                            endforeach; 
            ?>
          </ul>
          
          <div class="tab-content">
            <?php 
                        $t=1;
						
                        $scriptstr=''; foreach($contacts as $contact):
                        
                        $condesc=$contact['address'];
                        
                        $place = $contact['location'];
                        
                        $latitude=$contact['latitude'];
                        
                        $longitude=$contact['longitude'];
                        
                        //echo stripslashes($condesc); 
                        
                        $condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
                        
                        $lines = explode("\n", $condesc);
                        
                        $new_lines = array();
                        
                        foreach ($lines as $i => $line) {
                        
                            if(!empty($line))
                        
                                $new_lines[] = trim($line);
                        
                        }
                        
                        $condesc =implode($new_lines);
                        //echo stripslashes(strip_tags($condesc,'<br>'));
                        ?>
            <div id="<?php echo $t; ?>" class="tab-pane fade <?php if($t==1) { ?>in active<?php } ?>">
              <?php
                  echo stripslashes($condesc);
				  ?>
            </div>
            <?php
                            $t++;
                            endforeach; 
                        ?>
          </div>
          
          
          <div id="accordion" class="panel-group mob-panel">
            <?php 
                        $t=1;
						
                        $scriptstr=''; foreach($contacts as $contact):
                        
                        $condesc=$contact['address'];
                        
                        $place = $contact['location'];
                        
                        $latitude=$contact['latitude'];
                        
                        $longitude=$contact['longitude'];
                        
                        //echo stripslashes($condesc); 
                        
                        $condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
                        
                        $lines = explode("\n", $condesc);
                        
                        $new_lines = array();
                        
                        foreach ($lines as $i => $line) {
                        
                            if(!empty($line))
                        
                                $new_lines[] = trim($line);
                        
                        }
                        
                        $condesc =implode($new_lines);
                        //echo stripslashes(strip_tags($condesc,'<br>'));
                        ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a href="#<?php echo $t; ?>" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle"> <?php echo $place; ?> </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="<?php echo $t; ?>">
                <div class="panel-body">
                  <?php
                  echo stripslashes($condesc);
				  ?>
                </div>
              </div>
            </div>
            <?php
                            $t++;
                            endforeach; 
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container " >
      <div class="row">
        <div class="col-md-12">
          <div class="newsletter-wrapper">
            <div class="row">
              <div class="col-md-7 nl-fm-wrap">
                <div class="col-md-5">
                  <h2 class="nl-header">NEWSLETTER</h2>
                </div>
                <div class="col-md-5">
                  <p class="nl-text">Register your email Address here to be updated about us</p>
                </div>
                <div class="col-md-12">
                  <form method="post" name="frm" id="frm" class="nl-form ">
                    <div class="form-group">
                      <input type="text" class="form-control required" placeholder="Enter your name" name="name" id="name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control required email" placeholder="Enter your email address" name="newsletter" id="newsletter">
                    </div>
                    <button class="btn btn-success" type="submit" id="butNews" name="butNews">&nbsp;</button>
                  </form>
                  <div id="txtHint"></div>
                </div>
              </div>
              <div class="col-md-5  footer-menu-wrap">
                <div class="col-md-3"> <?php echo $footer;  ?> </div>
                <div class="col-md-3"> <?php echo $footerright;  ?> </div>
                <div class="col-md-6 ft-logo"> <img src="<?php echo base_url('public/frontend/images/footercompanilogo.png')?>"  /> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="footer-bottom">
            <div class="row">
              <div class="col-md-8 ">
                <div class="row">
                  <div class="col-md-4" >
                    <div class="social-wrap">
                      <ul class="footer-social">
                        <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
                        <li ><a href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/footerfb.png')?>" alt="Facebook" /></a></li>
                        <?php } ?>
                        <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
                        <li><a href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/footergp.png')?>" alt="GooglePlus" /></a></li>
                        <?php } ?>
                        <?php if($this->alphasettings['YOUTUBE_LINK']!=''){ ?>
                        <li><a href="<?php echo $this->alphasettings['YOUTUBE_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/footerutube.png')?>" alt="Youtube" /></a></li>
                        <?php } ?>
                        <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
                        <li><a href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/footerin.png')?>" alt="Linkedin" /></a></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-8 ">
                    <div class="copy-txt">
                      <p style="margin-bottom:3px;">© <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?>.</p>
                      <p>Designed and developed by &nbsp; <a href="http://webchannel.ae/" target="_blank"><img title="" src="<?php echo base_url('public/frontend/images/webchanellogo.png')?>"></a></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 "> <a class="employ-login-btn" href="https://mail.cmcuae.net/owa/auth/logon.aspx?replaceCurrent=1&url=https%3a%2f%2fmail.cmcuae.net%2fowa%2f" target="_blank">Employee Login</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>-->


<footer class="black section">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="title">CONTACT US</div>
              <div class="cell">
                <div class="icon icon-location"></div>
                
                            <?php 
                        $t=1;
						
                        $scriptstr=''; foreach($contacts as $contact):
                        
                        $condesc=$contact['address'];
                        
                        $place = $contact['location'];
                        
                        $latitude=$contact['latitude'];
                        
                        $longitude=$contact['longitude'];
                        
                        //echo stripslashes($condesc); 
                        
                        $condesc = str_replace(array("\r\n", "\r"), "\n", $condesc);
                        
                        $lines = explode("\n", $condesc);
                        
                        $new_lines = array();
                        
                        foreach ($lines as $i => $line) {
                        
                            if(!empty($line))
                        
                                $new_lines[] = trim($line);
                        
                        }
                        
                        $condesc =implode($new_lines);
                        //echo stripslashes(strip_tags($condesc,'<br>'));
                        ?>
                  <?php
                  echo stripslashes($condesc);
				  ?>
            <?php
                            $t++;
                            endforeach; 
            ?>
                
                
                
              </div>
              <div class="cell">
                <div class="icon icon-mail"></div>
                <p><a href="mailto:<?php echo $this->alphasettings['FROM_EMAIL']; ?>" ><?php echo $this->alphasettings['FROM_EMAIL']; ?></a></p>
                <p><a href="mailto:<?php echo $this->alphasettings['ADMIN_EMAIL']; ?>" ><?php echo $this->alphasettings['ADMIN_EMAIL']; ?></a></p>
              </div>
              <div class="cell">
                <div class="icon icon-phone"></div>
                <p><a href="tel:<?php echo $this->alphasettings['PHONE_SLUG']; ?>"><?php echo $this->alphasettings['PHONE_SLUG']; ?></a></p>
              </div>
              <div class="social">
              <ul>
                <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a class="icon-facebook" href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
				  <li><a class="icon-gplus" href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
				  <li><a class="icon-twitter" href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['PIN_LINK']!=''){ ?>
				  <li><a class="icon-pinterest-circled" href="<?php echo $this->alphasettings['PIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <!--<li><a href="#" class="icon-dribbble"></a></li>-->
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li><a class="icon-linkedin" href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
				  <li><a class="icon-instagram" href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  </ul>
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="title">LINKS</div>
              <div class="footer-nav">
              <?php echo $footer; ?>
                <!--<ul>
                  <li><a href="#">>> ABOUT US</a></li>
                  <li><a href="#">>> MEMBERSHIP</a></li>
                  <li><a href="#">>> PRIVACY POLICY</a></li>
                  <li><a href="#">>> TERMS & CONDITION</a></li>
                </ul>-->
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="title">NEWSLETTER SIGNUP</div>
              <p>
                Subscribe to Our Newsletter to get important News,<br>
                Latest Conferences & Events:
              </p>
              <div class="newsletter-form">
                <form method="post" name="frm" id="frm" class="nl-form ">
                  <div class="cell-wrapper">
                    <div class="cell input-holder">
                      <input type="text" class="required email" placeholder="Enter Your Email" name="newsletter" id="newsletter">
                    </div>
                    <div class="cell btn-holder">
                      <button class="btn red" id="butNews" name="butNews"></button>
                    </div>
                  </div>
                </form>
                <div id="txtHint"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container text-center">© <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?>.</div>
      </div>
    </footer>
    <div class="page-overlay"></div>


<script src="<?php echo base_url('public/frontend/js/vendor/jquery-1.11.2.min.js'); ?>"></script> 
<script async src="//static.addtoany.com/menu/page.js"></script> 
<script src="<?php echo base_url('public/frontend/js/jquery.validate.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/jquery.mobile.custom.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/bootstrap.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/jquery.easing.1.3.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/owl.carousel.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery-ui.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery.selectBoxIt.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/SmoothScroll.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script> 
  
<script src="<?php echo base_url('public/frontend/js/pqselect.dev.js'); ?>"></script>

		<script type="text/javascript">
            $(function() {
				
				$("#category").pqSelect({
					multiplePlaceholder: '',    
					checkbox: false //adds checkbox to options    
				}).pqSelect( 'close' );
				
                //initialize the pqSelect widget.
                $("#make").pqSelect({
                    multiplePlaceholder: '',
                    checkbox: true //adds checkbox to options    
                }).on("change", function(evt) {
					
                    var val = $(this).val();
                    var dataString = new Object();
					
				//dataString = $('#frmsrt').serialize();	
				dataString = "make="+val; 	 
			
				$.ajax({
			
					type: "post", 
			
					url: "<?php echo site_url('result/load_model');?>", 	 	
					data: dataString, 
			
					success: function(msg) {
			
						$('#model').html(msg);
						$("#model").pqSelect({   
							checkbox: true //adds checkbox to options    
						}).pqSelect( 'close' );

						ajaxsearch();
			
					}, error: function(){ console.log('Error while request..'); }
			
				});

                }).pqSelect('close');
            });
			
			
        </script>  

<script type="text/javascript">
	
$(function() { 

  getform();
  <?php
  if($this->cart->total_items() >0)
  {
  ?>
  cartform();
  <?php
  }
  ?>

  $("#formcontainer").on('click','#butSub',function(){

	submitform();

  }); 

});

function submitform()

{

	var dataString = new Object();

	dataString = $('#contactform').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('contactus/enquiry/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#formcontainer').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function cartform(id)

{

	var dataString = new Object();

	dataString = "id="+id;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('cart/buy/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#basket').html(msg);
			//$('#itemcount').html('<?php echo $this->cart->total_items(); ?>');
			if(id) {
				$('.basket-wrap').show();
				//$('.basket-wrap').hide();
				  //scroll body to 0px on click
				gototop();
			} else {
				$('.basket-wrap').hide();
			}
			

		}, error: function(){ console.log('Error while request..'); }

	});

}

function gototop(){
	$('body,html').animate({
	  scrollTop: 0
   }, 1000);
	
   return false;
}

function removeitem(id)

{

	var dataString = new Object();

	dataString = "id="+id;	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('cart/delete/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#basket').html(msg);
			$('#itemcount').html('<?php echo $this->cart->total_items(); ?>');
			$(this).parent('li').slideUp();

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform()

{
	//console.log('<?php echo site_url('contactus/enquiry/'); ?>');
	var dataString = new Object();
	
	$.ajax({

		type: "get", 

		url: "<?php echo site_url('contactus/enquiry/'); ?>", 	 	

		success: function(msg) {
			
		$('#formcontainer').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

</script> 
<script>
			
			$(document).ready(function(){
				$("#frm").validate();
				$('html').show();

			$("#butNews").click(function() {
			if($("#frm").valid()==true)
			{
			inputString = $("#newsletter").val();
			inputString2 = $("#name").val();
						$.post("<?php echo base_url(); ?><?php echo $this->session->userdata('front_language'); ?>/newsletter/add", {newsletter: ""+inputString+"",name: ""+inputString2+""}, function(data){
							if(data.length >0) {
								$('#txtHint').html(data);
							}
						});
			return false;
			}
			});
						
			});
		</script> 
<script src="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.pack.js?v=2.1.5'); ?>"></script> 
<script>
$(document).ready(function() {
	$(".fancybox").fancybox({
	});
	
});	



            $(function() {
			$('.enquiry').fancybox({
			'autoScale' : false,
			'transitionIn' : 'none',
			'transitionOut' : 'none',
			'fitToView' : true,
			'scrolling': 'auto',
			'iframe' : {
								'scrolling' : 'auto',
								'preload'   : false
							},      
			'type' : 'iframe' 
			 });		            
			 

			 
			 });
			
            $(function() {
              $('.printcontent').fancybox({
                'width':700,
                'height':500,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            });
            $(function() {
              $('.login').fancybox({
                'width':500,
                'height':300,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            });
            $(function() {
              $('.map').fancybox({
                'width':625,
                'height':425,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            });
            $(function() {
              $('.vacancy').fancybox({
                'width':625,
                'height':425,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            });
            $(function() {
              $('.available').fancybox({
                'width':400,
                'height':100,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            });
          </script> 
<script type="text/javascript">

$(function() { 

  getform2();

  $("#formcontainer2").on('click','#butSub',function(){
  if($("#registerform").valid()==true)
  {
		submitform2();
  }
  else
  {
	  	return false;
  }

  }); 

});

function submitform2()

{

	var dataString = new Object();

	dataString = $('#registerform').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/register2/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#formcontainer2').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform2()

{
	//console.log('<?php echo site_url('login/register2/'); ?>');
	var dataString = new Object();
	
	$.ajax({

		type: "get", 

		url: "<?php echo site_url('login/register2/'); ?>", 	 	

		success: function(msg) {
			
		$('#formcontainer2').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}
 <?php if(@$banners>1)
		  {
?>



<?php } ?>

</script> 
<script type="text/javascript">

$(function() { 

  getform3();

  $("#formcontainer3").on('click','#butSub',function(){

	submitform3();

  }); 

});

function submitform3()

{

	var dataString = new Object();

	dataString = $('#myhomeform').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/myhome2/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#formcontainer3').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform3()

{
	//console.log('<?php echo site_url('login/register2/'); ?>');
	var dataString = new Object();
	
	$.ajax({

		type: "get", 

		url: "<?php echo site_url('login/myhome2/'); ?>", 	 	

		success: function(msg) {
			
		$('#formcontainer3').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}





</script> 
<script type="text/javascript">

$(function() { 

  getform4();

  $("#formcontainer4").on('click','#butSub',function(){

	submitform4();

  }); 

});

function submitform4()

{

	var dataString = new Object();

	dataString = $('#changepassform').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('login/changepass2/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#formcontainer4').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform4()

{
	//console.log('<?php echo site_url('login/register2/'); ?>');
	var dataString = new Object();
	
	$.ajax({

		type: "get", 

		url: "<?php echo site_url('login/changepass2/'); ?>", 	 	

		success: function(msg) {
			
		$('#formcontainer4').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

</script> 
<script type="text/javascript">

$(function() { 

  //getform5();

  $("#commentcontainer").on('click','#butSub',function(){
  
  if($("#commentform").valid()==true)
  {

	submitform5();
	}
	else
	{
	return false;
	}

  }); 

});

function submitform5()

{

	var dataString = new Object();

	dataString = $('#commentform').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('contactus/comment/');?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#commentcontainer').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform5()

{
	//console.log('<?php echo site_url('login/comment/'); ?>');
	var dataString = new Object();
	
	$.ajax({

		type: "get", 

		url: "<?php echo site_url('contactus/comment/'); ?>", 	 	

		success: function(msg) {
			
		$('#commentcontainer').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}


</script> 
<script>
	$(document).ready(function() {
		$("#addVeh").validate();
		$("#editVeh").validate();
		$("#changepassform").validate();
		//$("#commentform").validate();
		<?php
		if(@$_GET['category']=="")
		{
			?>
			$('.tabs ul li:first-child a').trigger('click');
			<?php
		}

		if(@$_GET['category']==46)
		{
			?>
			$('.tabs ul li:first-child a').trigger('click');
			//$('#auto').show();
			<?php
		}
		?>
		<?php
		if(@$_GET['category']==47)
		{
			?>
			$('.tabs ul li:nth-child(2) a').trigger('click');
			//$('#moto').show();
			<?php
		}
		?>
		<?php
		if(@$_GET['category']==48)
		{
			?>
			$('.tabs ul li:nth-child(3) a').trigger('click');
			//$('#heavy').show();
			<?php
		}
		?>
		<?php
		if(@$_GET['tab']=='list' or $this->uri->segment(4)=='list')
		{
			?>
			$('.dash-tab ul li:nth-child(3) a').trigger('click');
			//$('#heavy').show();
			<?php
		}
		?>
	});

	</script>