<?php /*?><footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-7 hidden-sm-down">
        <div class="row footer-nav">
          <div class="col-lg-3 col-md-3"> <?php echo $about; ?> </div>
          <div class="col-lg-4 col-md-4">
            <ul id="accordion-foot" role="tablist">
             <li class="title"><a href="javascript:void(0)">Product Categories</li>
              <?php $i=1;foreach($categories as $key => $item) { $childs=$this->productcategory_model->get_array_cond(array('parent_id'=>$item['id'],'status'=>'Y'));?>
              <li><a <?php if(count($childs)>0) { ?>data-toggle="collapse" class="collapse" href="#accord-foot<?php echo $i;?>" aria-expanded="true" <?php } else { ?>href="<?php echo site_url('products/lists/'.$item['slug']); ?>"<?php } ?>><?php echo $item['name']; ?></a>
              <div class="collapse <?php echo @$clas; ?>" id="accord-foot<?php echo $i; ?>" role="tabpanel" data-parent="#accordion-foot">
                  <div class="card-body foot">
                    <ul>
                      <?php foreach($childs as $item) {  
                      ?>
                      <li <?php if($item['slug']==$this->uri->segment(4)) { ?> class="active"<?php } ?>> &nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="<?php echo site_url('products/lists/'.$item['slug']); ?>"><?php echo $item['name']; ?></a></li>
                      <?php } ?>
                    </ul>
                  </div>
                </div>
              </li>
              
            <?php $i++;} ?>
            </ul>
          </div>
          
          <div class="col-lg-3 col-md-3"> <?php echo $other; ?> </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-6 col-md-6">
            <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></p>
          </div>
          <div class="col-lg-6 col-md-6 text-md-right">
            <p>Designed & Developed by<a href="http://webchannel.ae" target="_blank" title="webchannel"><img class="img-fluid" src="<?php echo base_url('public/frontend/images/logo-webchannel.png')?>" alt="webchannel"/></a></p>
          </div>
        </div>
      </div>
      <div class="col-lg-5 hidden-sm-down">
        <div class="enquiry">
          <p>Interested in our Products?</p>
          <h4>Tell us what we can do for you.</h4>
        </div>
        <div class="form style-1 pt-3" id="enquirycontainer"> </div>
      </div>
    </div>
    <div class="row hidden-md-up">
      <div class="col-lg-6 col-md-6 text-sm-center">
        <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></p>
      </div>
      <div class="col-lg-6 col-md-6 text-md-right text-sm-center">
        <p>Designed & Developed by<a href="http://webchannel.ae/" target="_blank" title="webchannel"><img class="img-fluid" src="<?php echo base_url('public/frontend/images/logo-webchannel.png')?>" alt="webchannel"/></a></p>
      </div>
    </div>
  </div>
</footer><?php */?>

<?php /*?><footer class="section">
      <div class="container-fluid pad-lr">
        <div class="row">
          <div class="col-lg-8">
            <div class="social-wrapper mb-5">
              <div class="row align-items-center">
                <div class="col-lg-3">
                  <div class="title">GET IN <br>TOUCH</div>
                </div>
                <div class="col-lg-9 text-left text-lg-right">
                  <div class="social">
                    <ul>
                  <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-facebook" href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-twitter" href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-linkedin" href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-instagram" href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['YOUTUBE_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-youtube" href="<?php echo $this->alphasettings['YOUTUBE_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-gplus" href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="address-wrapper">
              <div class="row">
                <div class="col-lg-6">
                  <h4>leisure <br>
                  travel</h4>
                  
                  <?php echo $contacts[1]['address2']; ?>
                </div>
                <div class="col-lg-6">
                  <h4>head office & <br>
                  business travel</h4>
                  
                  <?php echo $contacts[0]['address2']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></p>
                </div>
                <div class="col-lg-6">
                  <p>Website Designed and developed by<a href="http://webchannel.ae/" target="_blank"><img class="img-fluid" src="public/frontend/images/logo-webchannel.png" alt=""/></a></p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="social-tab">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" aria-selected="true" data-toggle="tab" href="#socialtab-1" role="tab">Facebook<i class="icon-facebook"></i></a>
                <a class="nav-item nav-link" aria-selected="false" data-toggle="tab" href="#socialtab-2" role="tab">Instagram<i class="icon-instagram"></i></a>
              </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="socialtab-1" role="tabpanel">
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Falmajidtravelandtourism%2F&tabs=timeline&width=370&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=878002805742949" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
                <div class="tab-pane fade" id="socialtab-2" role="tabpanel">
                  <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/a6e85816807f5a99b805032f2fd14fee.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer><?php */?>
    
    <footer class="section">
      <div class="container-fluid container-fluid-wrap">
          <?php if($this->uri->segment(2)!='contactus') { ?>
        <div class="row">
          <div class="col-lg-9">
            <div class="social-wrapper mb-4">
              <div class="row align-items-center">
                <div class="col-lg-12">
                  <div class="title">GET IN TOUCH</div>
                </div>
                <?php /*?><div class="col-lg-9 text-left text-lg-right">
                  <div class="social">
                    <ul>
                  <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-facebook" href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-twitter" href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-linkedin" href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-instagram" href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['YOUTUBE_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-youtube" href="<?php echo $this->alphasettings['YOUTUBE_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){ ?>
				  <li ><a class="nav-link icon-gplus" href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                    </ul>
                  </div>
                </div><?php */?>
              </div>
            </div>
            <?php if($this->uri->segment(2)!='contactus') { ?>
            <div class="address-wrapper">
            <div class="row">
                <div class="col-lg-6">
                  <h4>leisure <br>
                  travel</h4>
                  
                  <?php echo $contacts[1]['address2']; ?>
                </div>
                <div class="col-lg-6">
                  <h4>head office &amp; <br>
                  business travel</h4>
                  
                  <?php echo $contacts[0]['address2']; ?>
                </div>
              </div>
              <?php } ?>
              <!-- <div class="row">
                <div class="col-lg-6">
                  <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></p>
                </div>
                <div class="col-lg-6">
                  <p>Website Designed and developed by<a href="http://webchannel.ae/" target="_blank"><img class="img-fluid" src="public/frontend/images/logo-webchannel.png" alt="webchannel"/></a></p>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="social-tab">
              <div class="nav nav-tabs" id="nav-tab" role="tablist"><a class="nav-item nav-link active" aria-selected="true" data-toggle="tab" href="#socialtab-1" role="tab">Facebook<i class="icon-facebook"></i></a><a class="nav-item nav-link" aria-selected="false" data-toggle="tab" href="#socialtab-2" role="tab">Instagram<i class="icon-instagram"></i></a></div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="socialtab-1" role="tabpanel">
                
                <!--<div class="fb-page" data-href="https://www.facebook.com/Escape-2000796073470188/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Escape-2000796073470188/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Escape-2000796073470188/">Escape with Al Majid Travel</a></blockquote></div>-->
                <div class="fb-page" data-href="https://www.facebook.com/almajidtravelandtourism/" data-width="500" data-height="350" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/almajidtravelandtourism/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/almajidtravelandtourism/">Escape with Al Majid Travel</a></blockquote></div>
                </div>
                <div class="tab-pane fade" id="socialtab-2" role="tabpanel"><!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/a6e85816807f5a99b805032f2fd14fee.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe></div>
              </div>
            </div>
          </div>
          
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-lg-7 text-center text-lg-left">
            <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?>.<a href='http://www.webchannel.co/projects/almajid-travel/www/en/contents/view/terms-and-conditions' target="_blank" class="terms">Terms and Conditions</a></p>
          </div>
          <div class="col-lg-5 text-center text-lg-right">
            <p>Website Designed and developed by<a href="http://webchannel.ae/" target="_blank"><img class="img-fluid" src="public/frontend/images/logo-webchannel.png" alt="webchannel"/></a></p>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="need-help alert alert-dismissible fade show" role="alert">
        <button type="button" id="leave">Send a message</button>
        <div id="enquirycontainer">
        </div>
      <?php /*?><div class="title blue1">
        <h4 class='col-white text-center'>Need Help with your<br> Booking</h4>
      </div><?php */?>
      <?php /*?><div class="form">
        <form action="#">
          <div class="form-row">
            <div class="form-group col-lg-12">
              <input class="form-control" id="name-need" type="text" placeholder="Name">
            </div>
            <div class="form-group col-lg-12">
              <input class="form-control" id="email-need" type="text" placeholder="email">
            </div>
            <div class="form-group col-lg-4">
              <input class="form-control" id="isd-need" type="text" placeholder="isd">
            </div>
            <div class="form-group col-lg-8">
              <input class="form-control" id="phone-need" type="text" placeholder="Phone">
            </div>
            <div class="btn-holder col-lg-12">
              <button class="btn blue1 btn-submit">Send</button>
            </div>
          </div>
        </form>
      </div><?php */?>
      <?php /*?><button class="close" aria-label="Close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><?php */?>
    </div>

<script src="<?php echo base_url('public/frontend/js/vendor/jquery.min.js'); ?>"></script> 
<script async src="//static.addtoany.com/menu/page.js"></script><script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery-ui.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/bootstrap.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/owl.carousel.min.js'); ?>"></script> 
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/gridtab.js'); ?>"></script> 

<script src="<?php echo base_url('public/frontend/js/jquery.validate.js'); ?>"></script> 
<!--<script src="<?php echo base_url('public/frontend/js/vendor/jquery.mobile.custom.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/tether.min.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/jquery.easing.1.3.js'); ?>"></script>--> 
<!--<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/css3-animate-it.js'); ?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/jquery.selectBoxIt.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/jquery.datetimepicker.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/jquery.fancybox.min.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/jquery.cookie.js'); ?>"></script> 

<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script> 
<script>
<?php if(@$_POST['visa_type']) { ?>
populate('<?php echo (@$_POST['visa_type'])?@$_POST['visa_type']:@$frmdata->visa_type; ?>')
<?php } ?>
function populate(val)
{
	
			$.post("<?php echo base_url(); ?><?php echo $this->session->userdata('front_language'); ?>/services/load", {serid: ""+val+""}, function(data){
							if(data.length >0) {
								$('#visatypes').html(data);
								$('#small').trigger('click');
							}
						});
			return false;
			
}
$( document ).ready(function() {
	<?php if(@$_REQUEST['nationality']!="") { ?>
	$("#second").hide();
		$("#coucopy").html("Selected Nationality ("+$("#nationality option:selected").attr('name')+")<span class='change'>Change</span>");
	<?php } ?>
    $( "#big" ).click(function() {
		tot=parseInt($('#qty').val())*parseInt($('#amt').val());
  document.getElementById('gtotal').innerHTML='AED '+tot;
  document.getElementById('gtot').value=tot;
});
    $( "#small" ).click(function() {
		tot=parseInt($('#qty').val())*parseInt($('#amt').val());
  document.getElementById('gtotal').innerHTML='AED '+tot;
  document.getElementById('gtot').value=tot;
});
    $( "select" ).change(function() {
		$("#second").hide();
		$("#coucopy").html("Selected Nationality ("+$("#nationality option:selected").attr('name')+")<span class='change'>Change</span>");
});

    $( ".visa_val" ).click(function() {
		$("#third").hide();
		$("#visacopy").html(this.title+"<span class='change'>Change</span>");
});

$("#nationality").change(function(){
	//alert(1);
	 var arr = [1,5,22,32,33,35,38,39,55,61,62,70,71,74,81,82,96,109,123,132,137,141,142,162,166,168,173,178,188,192];
	 
  var status = 'Not exist';
 
  for(var i=0; i<arr.length; i++){
   var name = arr[i];
   if(name == $("#nationality").val()){
    	window.location="<?php echo site_url('checkout/process/3/msg3'); ?>";
    	break;
   }
   else
   {
	   <?php if(@$frmdata->applicant_nationality=="") { ?>
	   $('#nationality').trigger('change');
	   <?php } else { ?>
	   	   window.location="<?php echo site_url('checkout/process'); ?>?nation="+$("#nationality").val();
	   <?php } ?>
   }
  }
    
}); 


});
</script>
<script>
      $( function() {        

          date = $( "#date" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,              
            numberOfMonths: 3,
			dateFormat:"dd-mm-yy"
          })
          .on( "change", function() {
			  $("#first").hide();
			  $("#datecopy").html($("#date").val()+"<span class='change'>Change</span>");
            date.datepicker( "option", "maxDate", getDate( this ) );   

          });
       
          function getDate( element ) {
            var date;
            try {
              date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
              date = null;
            }
       
            return date;
          }
      } );
    </script>
    
    
    
<script type="text/javascript">

//	function redirect(country)
//	{
//		for(var i=0; i<countries.length; i++){
//   var name = countries[i];
//   if(name == country){
//    window.location="<?php echo site_url('checkout/process/3/msg3'); ?>";
//   }
//   else
//   {
//	   return false;
//   }
//  }
//	}

	<?php
	if($this->router->fetch_class() == 'contactus'){
?>
$(function() { 

  getform();  
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
 
function gototop(){
	$('body,html').animate({
	  scrollTop: 0
   }, 1000);
	
   return false;
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
<?php } ?>
</script> 
<script>
			
			$(document).ready(function(){
				
				$("#nationality").change(function(){
					
		var countries =[1,5,22,32,33,35,38,39,55,61,62,70,71,74,81,82,96,109,123,132,137,141,142,148,166,168,173,178,188];
    
}); 
				
		  var ref_this = $("#page-nav ul li").find(".active");
		  var ref_this2 = ref_this.parents("li:first");
		  var ref_this3 = ref_this2.parents("li:first");
		   ref_this.parents("li:first").addClass('active');
		   ref_this2.parents("li:first").addClass('active');
		   ref_this3.parents("li:first").addClass('active');
				
				$(".pagination a").addClass("page-link");
				
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
<!--<script src="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.pack.js?v=2.1.5'); ?>"></script>--> 
<script>
$(document).ready(function() {
	

	$(".fancybox").fancybox({
	});
	$(".fancyboxgallery").fancybox({
	   width: "100%",
        height: "auto",
        autoSize: false,
        scrolling: false
	});
});	



            $(function() {
			$('.enquiry').fancybox({
			'autoScale' : false,
			'transitionIn' : 'none',
      'width':960,
      'height':750,
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
//            $(function() {
//              $('.map').fancybox({
//                'width':625,
//                'height':425,
//                'type':'iframe',
//                 fitToView : false,
//                 autoSize : false
//            });
//            });
            $(function() {
              $('.vacancy').fancybox({
                'width':625,
                'height':425,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });
            
              $('.available').fancybox({
                'width':400,
                'height':100,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
            });});
           
          </script> 
<script type="text/javascript">

$(function() { 

$("#enquirycontainer").hide();
$("#leave").show();
$("#enquirycontainer").delay(30000).slideUp("slow",function()
    {
$("#leave").hide();
$("#enquirycontainer").show();
    });
	$("#enquirycontainer").delay(30000).slideDown("slow",function()
    {
$("#leave").show();
$("#enquirycontainer").hide();
    });


if($.cookie('popup')!=0)
{
//$("#leave").hide();
  	getform6();
}
$("#leave").click(function() {
	$("#leave").hide();
  	getform6();
	$("#enquirycontainer").show();
});
	
$("#popup-close").click(function() {
	$.cookie("popup", 0);
	$("#leave").show();
  	$("#enquirycontainer").hide();
});

  $("#enquirycontainer").on('click','#butSub',function(e){
  e.preventDefault();
	submitform6();

  }); 

});

function submitform6()

{

	var dataString = new Object();

	dataString = $('#enquiryform2').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('home/enquiry/');?>?key=<?php echo stripslashes(@$content->title); ?>&type=<?php echo @$content->type; ?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#enquirycontainer').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform6()

{
	//console.log('<?php echo site_url('login/comment/'); ?>');
	var dataString = new Object();
	dataString.method = '<?php  echo $this->router->fetch_class().'|'.$this->router->fetch_method();?>';
    dataString.key = '<?php echo @$content->title; ?>';
    dataString.type = '<?php echo @$content->type; ?>';
    dataString.slug = '<?php echo @$content->slug; ?>';
	$.ajax({

		type: "get", 
        data:dataString,
		url: "<?php echo site_url('home/enquiry/'); ?>", 	 	
		success: function(msg) {
			
		$('#enquirycontainer').html(msg);
		
		var maxHeight1 = 0;
		$('.section-request .pattern').each(function() {
			maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		});
		$('.section-request .pattern').css("height", maxHeight1);
		$(window).on('resize', function(){

			$('.section-request .pattern').css("height", 'auto');
			siteScript.eqHeight();
		});


		}, error: function(){ console.log('Error while request..'); }

	});

}

 $(function() {
            var matchmedia = window.matchMedia('(max-width: 767px)').matches;console.log(matchmedia);
           $(".teamfancy").fancybox({  
        autoSize: false, 
        fitToView: false,
        autoResize:true,
        autoCenter:true,   
        autoHeight:true, 
        openSpeed :'slow',
        height:(matchmedia) ?'auto':'75%',
        maxWidth: '100%',
        width:'900', 
        scrolling: 'no' ,
        openEffect : 'fade', 
        onComplete: function () {
            $.fancybox.update();
            $.fancybox.resize();
            $.fancybox.center();
        }
	});	 
    
            });
</script> 
<script type="text/javascript">

$(function() { 

  getform7();

  $("#enquirycontainer2").on('click','#butSub',function(e){
  e.preventDefault();
	submitform7();

  }); 

});

function submitform7()

{

	var dataString = new Object();

	dataString = $('#enquiryform3').serialize();	 	 

	$.ajax({

		type: "post", 

		url: "<?php echo site_url('home/enquiry2/');?>?key=<?php echo stripslashes(@$content->title); ?>&type=<?php echo @$content->type; ?>", 	 	

		data: dataString, 

		success: function(msg) {

			$('#enquirycontainer2').html(msg);

		}, error: function(){ console.log('Error while request..'); }

	});

}

function getform7()

{
	//console.log('<?php echo site_url('login/comment/'); ?>');
	var dataString = new Object();
	dataString.method = '<?php  echo $this->router->fetch_class().'|'.$this->router->fetch_method();?>';
    dataString.key = '<?php echo @$content->title; ?>';
    dataString.type = '<?php echo @$content->type; ?>';
    dataString.slug = '<?php echo @$content->slug; ?>';
	$.ajax({

		type: "get", 
        data:dataString,
		url: "<?php echo site_url('home/enquiry2/'); ?>", 	 	
		success: function(msg) {
			
		$('#enquirycontainer2').html(msg);
		
		var maxHeight1 = 0;
		$('.section-request .pattern').each(function() {
			maxHeight1 = ($(this).outerHeight() > maxHeight1) ? $(this).outerHeight() : maxHeight1;
		});
		$('.section-request .pattern').css("height", maxHeight1);
		$(window).on('resize', function(){

			$('.section-request .pattern').css("height", 'auto');
			siteScript.eqHeight();
		});


		}, error: function(){ console.log('Error while request..'); }

	});

}

 $(function() {
            var matchmedia = window.matchMedia('(max-width: 767px)').matches;console.log(matchmedia);
           $(".teamfancy").fancybox({  
        autoSize: false, 
        fitToView: false,
        autoResize:true,
        autoCenter:true,   
        autoHeight:true, 
        openSpeed :'slow',
        height:(matchmedia) ?'auto':'75%',
        maxWidth: '100%',
        width:'900', 
        scrolling: 'no' ,
        openEffect : 'fade', 
        onComplete: function () {
            $.fancybox.update();
            $.fancybox.resize();
            $.fancybox.center();
        }
	});	 
    
            });
</script> 
<?php if($this->uri->segment(4)==2) { ?>
<script>
	$(document).ready(function() {
		$('#step2').trigger('click');
	});
</script> 
<?php } ?>
<?php if($this->uri->segment(4)==3) { ?>
<script>
	$(document).ready(function() {
		$('#step3').trigger('click');
	});
</script> 
<?php } ?>
<?php if(@$frmdata->travel_date!="") { ?>
<script>
	$(document).ready(function() {
		$('#date').trigger('change');
	});
</script> 
<?php } ?>
<?php if(@$frmdata->applicant_nationality=="" ) { } else { ?>
<!--<script>
	$(document).ready(function() {
		$('select').trigger('change');
	});
</script> 
--><?php } ?>
<?php if(@$frmdata->visa_type!="") { ?>
<script>
	$(document).ready(function() {
		$('#<?php echo @$frmdata->visa_type; ?>').trigger('click');
		$("#visatemp").html($('#<?php echo @$frmdata->visa_type; ?>').attr('title'));
	});
</script> 
<?php } ?>