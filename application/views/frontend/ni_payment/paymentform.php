<div class="content-wrapper" id="rootwizard" style="margin-top:200px">
 <div id="preloaderQuote" class='form-holder light-grey ' style="text-align: center;"><img src="<?php echo base_url('public/images/ajax-loader.gif')?>" />
 <p style="text-align:center;font-size:20px;font-weight:bold;">Please wait, your order is being processed and you will be redirected to the payment website.</p>
 </div>
<form action="<?php echo $payment_url?>" method="post" id="networkonline_checkout" name="networkonline_checkout">
		<input type="hidden" name="requestParameter" value="<?php echo $merchantId.'|'.$requestParameter?>">
		<input type="submit" value="Click here if you're not automatically redirected..." name="suba" id="sub" />
</form>
</div>