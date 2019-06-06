 <footer class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9">
            <div class="social-wrapper mb-5">
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
          <?php if($this->uri->segment(2)!='contactus') { ?>
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
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-lg-6 text-center text-lg-left">
            <p><?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></p>
          </div>
          <div class="col-lg-6 text-center text-lg-right">
            <p>Website Designed and developed by<a href="http://webchannel.ae/" target="_blank"><img class="img-fluid" src="public/frontend/images/logo-webchannel.png" alt="webchannel"/></a></p>
          </div>
        </div>
      </div>
    </footer>
<?php //echo $this->router->fetch_class(); ?>
<script async src="//static.addtoany.com/menu/page.js"></script> 
<script src="<?php echo base_url('public/frontend/js/jquery.validate.min.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/popper.min.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/vendor/bootstrap.min.js'); ?>"></script>
<?php /*?><script src="<?php echo base_url('public/frontend/js/vendor/bootstrap.bundle.min.js'); ?>"></script><?php */?>
<script src="<?php echo base_url('public/frontend/js/vendor/jquery.easing.1.3-dist.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/owl.carousel.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/frontend/js/vendor/css3-animate-it-dist.js'); ?>"></script>
<script src="<?php echo base_url('public/frontend/js/jquery.datetimepicker.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/jquery.timepicker.min.js'); ?>"></script> 

<script src="<?php echo base_url('public/frontend/js/vendor/jquery.fancybox.min.js'); ?>"></script> 
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script> 



    <script>
     var RunNo = 1;

      $( function() {
        $(".hide").hide();
        enableNight();

          var dateFormat = "dd-mm-yy",
           checkin = $( "#checkin" )
              .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                minDate: 0,
                dateFormat:"dd-mm-yy"
              })
              .on( "change", function() {
                checkout.datepicker( "option", "minDate", getDate( this ) );
              
                if ($('#checkout').val() == "") {
                    var date2 = $('#checkin').datepicker('getDate');
                    date2.setDate(date2.getDate() + 1);
                    $("#checkout").datepicker("setDate", date2);
                    var endDate = $('#checkout').datepicker('getDate');
                    $("#Night").val(daydiff(startDate, endDate));
                }

                if ($('#checkout').val() != "") {
                    var startDate = $('#checkin').datepicker('getDate');
                    var endDate = $('#checkout').datepicker('getDate');                   
                    $("#Night").val(daydiff(startDate, endDate));
                }
                enableNight();
              }),
            checkout = $( "#checkout" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 3,
              minDate: 0,
              dateFormat:"dd-mm-yy"
            }).on( "change", function() {
                 if ($('#checkin').val() != "") {
                    var startDate = $('#checkin').datepicker('getDate');
                    var endDate = $('#checkout').datepicker('getDate');                    
                    $("#Night").val(daydiff(startDate, endDate));
                }
                enableNight();

            }),
            from = $( "#from" )
              .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                minDate: 0,
                dateFormat:"dd-mm-yy"
              })
              .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
              }),
            to = $( "#to" ).datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 3,
              minDate: 0,
              dateFormat:"dd-mm-yy"
            })
            .on( "change", function() {
              from.datepicker( "option", "maxDate", getDate( this ) );
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
      
          $('#inTime').timepicker({ 'timeFormat': 'H:i:s' });
      	$('#outTime').timepicker({ 'timeFormat': 'h:i A' });
        
        $("input[name='FlightType']").change(function(){
            var radioValue = $("input[name='FlightType']:checked").val();
            if(radioValue=="O"){ $("#to").hide();}
            if(radioValue=="R"){
                $("#to").show();
                $("#to").attr('required', true);
            }else{
                $("#to").attr('required', false);
            }
        });
        $.validator.addMethod("aFunction",
    function(value, element) {
        if (value == "")
            return false;
        else
            return true;
    },
    "Please select a value");
    
        $( "#frmflightSearch" ).validate({
            ignore: "input[type='date']",
            origin_1: {
            field: {
            required: true,
      
            }
            },
            Dest_1: {
            field: {
            required: true,
      
            }
            },
        from:{
            required: true
        }
        });
         $( "#frmHotelSearch" ).validate({
            ignore: "input[type='date']",
            city: {
            field: {
            required: true,
      
            }
            },
            checkin: {
            field: {
            required: true,
      
            }
            },
        checkout:{
            required: true
        }
        ,
        optNationality:{
            aFunction: true
        },
        optResidence:{
            aFunction: true
        }
        });
        
        $(".flsearch").click(function(e){
           e.preventDefault();
         //  alert($("#frmflightSearch").valid())
         //  return false;
          if($("#frmflightSearch").valid()){
            
           var query = $("#frmflightSearch").serialize();
           var withoutEmpties = query.replace(/[^&]+=\.?(?:&|$)/g, '')
           var targetURL= 'https://amt.emtrip.solutions/Flight/Search';
           window.open(targetURL+"?"+withoutEmpties);
           }
        })
        $(".htsearch").click(function(e){
           e.preventDefault();
         //  alert($("#frmflightSearch").valid())
         //  return false;
          if($("#frmHotelSearch").valid()){
            
           var query = $("#frmHotelSearch").serialize();
           var withoutEmpties = query.replace(/[^&]+=\.?(?:&|$)/g, '')
           var targetURL= 'https://amt.emtrip.solutions/Hotel/Search';
           window.open(targetURL+"?"+withoutEmpties);
           }
        })
        } );
    </script>   
    
 
<script>
			
			$(document).ready(function(){
				
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

  getform6();

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
 // Enable night textbox
    function enableNight() {
        if ($("#CheckInDate").val() != "") {
            $('#Night').css('background-color', '#FFF');
            $('#Night').attr('disabled', false);
        } else {
            disableNight();
        }
    }

    // Disable night textbox
    function disableNight() {
        $('#Night').css('background-color', '#F2F2F2');
        $('#Night').attr('disabled', true);
    }

    // it will return date in jquery format
    function parseDate(str) {
        var mdy = str.split('/');
        return new Date(mdy[2], mdy[1], mdy[0] - 1);
    }

    // date difference function
    function daydiff(first, second) {
        return (second - first) / (1000 * 60 * 60 * 24)
    }

 //Dynamicaly add room
    function AddRoom() {
        if (RunNo < 5) {
            $.post("/Hotel/Home/AddRooms", { RunNo: RunNo },
                    function (data) {
                        $("#dvRooms").append(data + '<div class="c"></div>');
                        RunNo = RunNo + 1;
                        if (RunNo >= 5) {
                            $("#btnAddRoom").hide();
                        }
                    });
        }
    }


    //Remove room
    function RemoveRoom() {
        if (RunNo > 1) {
            RunNo = RunNo - 1;
            $("#dvRooms_" + RunNo).remove();
            $("#btnAddRoom").show();

        }
        ChildAgeHeading();
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
	$(document).ready(function() {
		var hash = window.location.hash;
			$('#'+hash).trigger('click');
	});window.addEventListener('load', function(){
	var allimages= document.getElementsByTagName('img');
	for (var i=0; i<allimages.length; i++) {
		if (allimages[i].getAttribute('data-src')) {
			allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
		}
	}
}, false)
</script> 
