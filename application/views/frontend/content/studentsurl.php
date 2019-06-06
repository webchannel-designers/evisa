<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo base_url('/'); ?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/frontend/images/favicon.ico'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/frontend/css/popup.css'); ?>" />
</head>
<body>
<div id="emailme" class="login_form">
<?php echo $form; ?>
</div>
<script type="text/javascript">
$(function() {  
  $("#emailme").on('click','#email-btn',function(e) {  
 	 e.preventDefault(); 
	 var dataString = new Object();	
	 dataString.toname = $("#toname").val();	 	 
	 dataString.toemail = $("#toemail").val();	 	 
	 dataString.fromname = $("#fromname").val();	
	 dataString.fromemail = $("#fromemail").val();
	 dataString.shareurl = document.location.href;		 
	 $.ajax({
		  type: "post", 
		  url: "<?php echo site_url('home/studentsurl');?>", 	 	
		  data: dataString, 
		  success: function(msg) {			
			$("#emailme").html(msg);			
			}, error: function(){	alert('Error while request..'); 
		}
	  });
  });
  });
  </script>
  </body></html>