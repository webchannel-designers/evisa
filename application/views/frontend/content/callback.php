<div id="callback">
<?php echo $form; ?>
</div>
<script type="text/javascript">
$(function() {  
  $("#callback").on('click','#callback-btn',function(e) {  
 	 e.preventDefault(); 
	 var dataString = new Object();	
	 dataString.yourname = $("#yourname").val();	 	 
	 dataString.youremail = $("#youremail").val();	 	 
	 dataString.yourphone = $("#yourphone").val();		
	 $.ajax({
		  type: "post", 
		  url: "<?php echo site_url('home/callback');?>", 	 	
		  data: dataString, 
		  success: function(msg) {			
			$("#callback").html(msg);
			}, error: function(){	alert('Error while request..'); 
		}
	  });
  });
 });
 </script> 