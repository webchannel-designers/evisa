
<?php
//print_r($user);exit;
define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', '75e44c4b7d4749248d7f0382846ae09816d47601269542289e6870c4371883dc9e13f2db46dc440c94ef331859d31d897bbfe3ebc166429fa619f16a3ec5c48f9a4e32706d274d0bb1e508850270683844804b482d2a4001af4bb23373c4b4bdd1cf4dbd996e491eaecee6b77cc3d0576d0570ffb9014893bb2623cd3a833d52');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as &$field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}
    foreach($_POST as $name => $value) {
		if(in_array($name,array('gname','gemail','gphone','access_key','profile_id','transaction_uuid','signed_field_names','unsigned_field_names','signed_date_time','locale','transaction_type','reference_number','amount','currency','ignore_avs','bill_to_address_country','bill_to_email','bill_to_forename','bill_to_surname','consumer_id','customer_ip_address','payment_method')))
		{
        $params[$name] = $value;
		}
    }
//print_r($_POST);exit;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Secure Acceptance - Payment to Network International</title>
</head>
<body>

<fieldset id="confirmation">
    <legend>Redirecting please wait...</legend>
    <div>
<form method="post" id="desiredForm" action="https://testsecureacceptance.cybersource.com/pay">
		<?php
			foreach($params as $name => $value) {
		if(in_array($name,array('gname','gemail','gphone','access_key','profile_id','transaction_uuid','signed_field_names','unsigned_field_names','signed_date_time','locale','transaction_type','reference_number','amount','currency','ignore_avs','bill_to_address_country','bill_to_email','bill_to_forename','bill_to_surname','consumer_id','customer_ip_address','payment_method')))
		{
				echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
		}
			}
		//	echo "<input type=\"hidden\" id=\"override_custom_receipt_page\" name=\"override_custom_receipt_page\" value=\"\" />\n";
        
			echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
		?>
</form>
</div>
</fieldset>
</body>
</html>

<script src="<?php echo base_url('public/frontend/js/vendor/jquery.min.js'); ?>"></script> 
<script language="javascript" type="text/javascript">
$(document).ready(function() {
var forwardUrl = "https://testsecureacceptance.cybersource.com/pay";
    $("#desiredForm").attr("action", forwardUrl).submit();
});
</script>
