<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="650" border="0" cellspacing="1" cellpadding="6" bgcolor="#999999" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td colspan="2" align="center" bgcolor="#231F20" style="padding-bottom:10px; padding-top:10px;"><a href="<?php echo site_url('/')?>"><img src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt=""></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><strong>A new enquiry has been submitted from <?php echo $this->alphasettings['SITE_NAME']; ?> website:</strong></td>
  </tr>
  <?php if(@$enq_products!="") { ?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Interested in</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_products; ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Full Name</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_name; ?></td>
  </tr>
  <?php
	if($enq_renttype !=''){
?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Rent Type</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_renttype; ?></td>
  </tr>
  <?php
	} if( $enq_date){
?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Date</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_date; ?></td>
  </tr>
<?php
	}if($enq_piano){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Piano Type</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_piano; ?></td>
  </tr> 
<?php
	}
?>


  <?php
	if($location !=''){
?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Location</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $location; ?></td>
  </tr>
  <?php
	} if($pickup){
?>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Pickup Address</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $pickup; ?></td>
  </tr>
<?php
	}if($delivery){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Delivery Address</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $delivery; ?></td>
  </tr> 
<?php
	}
?>



  <tr>
    <td bgcolor="#E6E6E6"><strong>Email</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $enq_email; ?></td>
  </tr>  <tr>
    <td bgcolor="#E6E6E6"><strong>Phone</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $enq_phone; ?></td>
  </tr> 
  <?php
	if(@$enq_company){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Company</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_company; ?></td>
  </tr> 
<?php
	}
?>

  
<?php
	if(@$enq_model){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Model Number</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_model; ?></td>
  </tr> 
<?php
	}
?>

<?php
	if(@$enq_serial){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Serial Number</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_serial; ?></td>
  </tr> 
<?php
	}
?>
<?php
	if(@$enq_message){
?>  
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Message</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $enq_message; ?></td>
  </tr> 
<?php
	}
?>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>IP</strong></td>
    <td bgcolor="#FFFFFF"><a href="http://www.ip-tracker.org/locator/ip-lookup.php?ip=<?php echo $this->input->ip_address(); ?>" target="_new"><?php echo $this->input->ip_address(); ?></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#666666" style="color:#fff;"><strong>&copy; <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></strong></td>
  </tr>
</table>
</body>
</html>