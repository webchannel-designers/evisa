<?php //print_r($maindata2); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="650" border="0" cellspacing="1" cellpadding="6" bgcolor="#999999" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding-bottom:10px; padding-top:10px;"><a href="<?php echo site_url('/')?>"><img src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt=""></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><strong>A new enquiry has been submitted from <?php echo $this->alphasettings['SITE_NAME']; ?> website:</strong></td>
  </tr>
  <!--<tr>
    <td width="96" bgcolor="#E6E6E6"><strong>Travel Date</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo date("d-m-Y", strtotime($travel_date)); ?></td>
  </tr>-->
<!--  <tr>
    <td bgcolor="#E6E6E6"><strong>Email</strong></td>
    <td bgcolor="#FFFFFF">azim@webchanel.ae</td>
  </tr>
-->  <!--<tr>
    <td nowrap="nowrap" bgcolor="#E6E6E6"><strong>Company Name</strong></td>
    <td bgcolor="#FFFFFF">Web Channel</td>
  </tr>-->
  <tr>
    <td bgcolor="#E6E6E6"><strong>Nationality</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['applicant_nationality']; ?></td>
  </tr>
  <!--<tr>
    <td bgcolor="#E6E6E6"><strong>Country</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['residing_country']; ?></td>
  </tr>-->
  <!--<tr>
    <td bgcolor="#E6E6E6"><strong>Order Total</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['order_total']; ?></td>
  </tr>-->
  <tr>
    <td bgcolor="#E6E6E6"><strong>Number of visa</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['no_of_visas']; ?></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Visa Type</strong></td>
    <td bgcolor="#FFFFFF"><?php echo strip_tags($maindata2['visa_type']); ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Vat Percentage</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['vat_percentage']; ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Vat Amount</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['vat_amount']; ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Order Total</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['order_total']; ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Guarantor Name</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['gname']; ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Guarantor Email</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['gemail']; ?> </td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Guarantor Phone</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $maindata2['gphone']; ?> </td>
  </tr>
  
  <?php if(count($data2)>0) { ?>
  
  <tr>
  <td colspan="2">
  <table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td>Name</td>
    <td>Email</td>
    <td>Phone</td>
    <td>Passport</td>
    <td>Photo</td>
  </tr>
  <?php foreach($data2 as $item) { ?>
  <tr>
    <td><?php echo $item['salutation'].' '.$item['applicant_firstname'].' '.$item['applicant_lastname'] ?></td>
    <td><?php echo $item['email']; ?></td>
    <td><?php echo $item['contact_number']; ?></td>
    <td><img src="<?php echo site_url('public/uploads/visa/'.$item['passport_copy']); ?>" class="img-responsive" width="100" height="150" /></td>
    <td><img src="<?php echo site_url('public/uploads/visa/'.$item['photo_copy']); ?>" class="img-responsive" width="100" height="150" /></td>
  </tr>
  <?php } ?>
</table>

  </td>
  </tr>
  
  <?php } ?>
  
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>IP</strong></td>
    <td bgcolor="#FFFFFF"><a href="http://www.ip-tracker.org/locator/ip-lookup.php?ip=<?php echo $this->input->ip_address(); ?>" target="_new"><?php echo $this->input->ip_address(); ?></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#666666" style="color:#fff;"><strong> <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></strong></td>
  </tr>
</table>
</body>
</html>