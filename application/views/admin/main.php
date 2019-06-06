<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo base_url('/'); ?>" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/style.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/navi.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/pqselect.dev.css'); ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/ui-lightness/jquery-ui-1.10.3.custom.min.css'); ?>" media="screen" />
<script type="text/javascript" src="<?php echo base_url('public/admin/js/jquery-1.7.2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/js/jquery-ui-1.10.3.custom.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/js/jquery-ui-timepicker-addon.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/ckeditor/ckeditor.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/admin/ckfinder/ckfinder.js'); ?>"></script>
<script src="<?php echo base_url('public/admin/js/datetimepicker.js'); ?>"></script>
<script src="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.pack.js?v=2.1.5'); ?>"></script>
<script src="<?php echo base_url('public/admin/js/pqselect.dev.js'); ?>"></script>
<script type="text/javascript">

$(function(){
     $(".multiple").pqSelect({
        multiplePlaceholder: 'Select',    
        checkbox: true //adds checkbox to options    
    })
	$(".box .h_title").not(this).next("ul").hide("normal");

	$(".box .h_title").not(this).next("#home").show("normal");

	$(".box").children(".h_title").click( function() { $(".box .h_title").not(this).next("ul").hide("normal"); $(this).next("ul").slideToggle(); });

});

</script>
<script type="text/javascript">

$(document).ready(function() { 

	$(".flash_messages").show().delay(2000).fadeOut(); 

	$('.select_all').click(function () {

			$(this).closest('form').find(':checkbox').prop('checked', this.checked);

	});

	$(".datepicker").datetimepicker({dateFormat:"dd-mm-yy",timeFormat: "hh:mm tt"});

});

function confirmBox()

{

 var where_to= confirm("Are you sure?");

 if (where_to== true)

     return true;

 else{

     return false;

 }

}

function confirmDelete()

{

	if($('.chkbx').is(':checked') == true)

	{

		if(confirm("Are you sure?")== true)

		return true;

		else

		return false;

	}

	if($('.chkbx').is(':checked') == false)

	{

		alert('Choose a record to delete');

		return false;

	}

}

function semcheck(val)

{

var semval=val;

if(semval=="F")

{

document.getElementById("sem").style.display="none";

document.getElementById("yadd").style.display="none";

document.getElementById("ycou").style.display="none";

}

else

{

document.getElementById("sem").style.display="block";

document.getElementById("yadd").style.display="block";

document.getElementById("ycou").style.display="block";

}

}

</script>
<?php /*
	<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.lightbox.min.js'); ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".fancybox").fancybox({
	});
	  $('.lightbox').lightbox();  
	  $('.sexylightbox').lightbox({modal:'1',background:'black'});       
	});
</script>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.lightbox.css'); ?>" type="text/css" media="all" />
*/
?><link rel="stylesheet" href="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.css'); ?>"/>
<script>
            $(function() {
			$('.rating').fancybox({
                'width':200,
                'height':110,
                'type':'iframe',
                 fitToView : false,
                 autoSize : false
			 });		            
			 
	$('.shortlisting').fancybox({
        'width':400,
        'height':300,
        'type':'iframe',
         fitToView : false,
         autoSize : false,
         'onClosed': function() {
     parent.location.reload(true); 
    ;}
   });
			 
			 });

</script>
</head>

<body>
<div class="wrap"> <?php echo $header; ?>
  <div id="content"> <?php echo $left; ?>
    <div id="main"> <?php echo $content; ?> </div>
    <div class="clear"></div>
  </div>
  <?php echo $footer; ?> </div>
</body>
</html>
