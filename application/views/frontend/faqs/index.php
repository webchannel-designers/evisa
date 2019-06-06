<div class="faq">
	<div id="accordion">
		<?php foreach($faqs as $faq): ?>
		<h3><?php echo $faq['question']; ?></h3>
		<div><?php echo $faq['answer']; ?></div>
		<?php endforeach; ?>
	</div>
</div>
<script>
$(function() {
$( "#accordion" ).accordion();
});
</script>