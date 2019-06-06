<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="900" border="0" cellspacing="1" cellpadding="6" bgcolor="#999999" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td colspan="2" align="center" bgcolor="#231F20" style="padding-bottom:10px; padding-top:10px;"><a href="<?php echo site_url('/')?>"><img src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt=""></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"> Dear <?php echo $firstname.' '.$lastname; ?>, <br />
      <br />
      Thank you for contacting us.<br/>
      <br />
      One of our representative will be in touch with you soon. <br/>
      <br/>
      <br/></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>First Name</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $firstname; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>Last Name</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $lastname; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>Mobile</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $mobile; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>Email</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $email; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>Country</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $country; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>City</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $city; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td width="305"><strong>I want to</strong></td>
          <td width="568" bgcolor="#FFFFFF"><?php echo $iwantto; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Type of piano</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $type; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Piano Brand</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $brand; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Model number</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $model; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Color</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $color; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Condition of Piano</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $condition; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><strong>Serial number</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $condition; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td valign="top"><strong>Reason for selling</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $reason; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td valign="top"><strong>I wish to sell it for:</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $sellprice; ?></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td valign="top"><strong>When do you wish to sell?</strong></td>
          <td bgcolor="#FFFFFF"><?php echo $selltime; ?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"> Regards <br/>
      <?php echo $this->alphasettings['SITE_NAME']; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#666666" style="color:#fff;"><strong>&copy; <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?></strong></td>
  </tr>
</table>
</body>
</html>
