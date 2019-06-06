<?php echo $content->desc; ?>
<h2 class="h1class" style="padding-top:20px;"><?php echo convert_lang('Apply Online',$this->alphalocalization); ?></h2>
<div id="registerform">
<p><strong><?php echo convert_lang('Please complete the form below to apply online.',$this->alphalocalization); ?></strong></p>
	<div id="formcontainer">
	
	</div>
</div>
<script type="text/javascript">
$(function() { 
  getform();
  $("#formcontainer").on('click','#butSub',function(){
	submitform();
  }); 
});
function submitform()
{
	var dataString = new Object();
	dataString = $('#applyform').serialize();	 	 
	$.ajax({
		type: "post", 
		url: "<?php echo site_url('apply/applyform/');?>", 	 	
		data: dataString, 
		success: function(msg) {			
			$('#formcontainer').html(msg);
			$('html, body').animate({
					scrollTop: $(".red").parent('label').offset().top
			}, 2000);
		}, error: function(){ alert('Error while request..'); }
	});
}
function getform()
{
	var dataString = new Object();
	$.ajax({
		type: "get", 
		url: "<?php echo site_url('apply/applyform/');?>", 	 	
		success: function(msg) {
		$('#formcontainer').html(msg);
		}, error: function(){ alert('Error while request..'); }
	});
}
</script> 