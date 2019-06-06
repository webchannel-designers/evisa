<div class="scrollbar-tabs">
<div class="scrollbar">
<div class="track">
<div class="thumb">
<div class="end"></div>
</div>
</div>
</div>
<div class="viewport">
<div class="overview">
<?php echo $content->desc; ?>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	var tabheight = $("#service_tab").height();
	$(".viewport").height(tabheight);	
	$('.scrollbar-tabs').tinyscrollbar();
});
</script>


