<div id="emailme">

<?php echo $form; ?>

</div>

<!--<script type="text/javascript">

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

		  url: "<?php //echo site_url('home/emailurl');?>", 	 	

		  data: dataString, 

		  success: function(msg) {			

			$("#emailme").html(msg);			

			}, error: function(){	alert('Error while request..'); 

		}

	  });

  });

  });

  </script>-->