<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="650" border="0" cellspacing="1" cellpadding="6" bgcolor="#999999" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF" style="padding-bottom:10px; padding-top:10px;"><a href="<?php echo site_url('/')?>"><img src="<?php echo base_url('public/frontend/images/logo1.png')?>" alt=""></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"><strong>A New Job Application has been submitted from <?php echo $this->alphasettings['SITE_NAME']; ?> website, following are the details: </strong></td>
  </tr>
  <tr>
    <td width="96" bgcolor="#E6E6E6"><strong>First Name</strong></td>
    <td width="527" bgcolor="#FFFFFF"><?php echo $firstname; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><strong>Last Name</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $lastname; ?></td>
  </tr>
  <!--<tr>
    <td nowrap="nowrap" bgcolor="#E6E6E6"><strong>Company Name</strong></td>
    <td bgcolor="#FFFFFF">Web Channel</td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><strong>Country</strong></td>
    <td bgcolor="#FFFFFF">India</td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><strong>City</strong></td>
    <td bgcolor="#FFFFFF">Kerala</td>
  </tr>-->
  <tr>
    <td bgcolor="#E6E6E6"><strong>Email</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $email; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><strong>Phone</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $phone; ?></td>
  </tr>
  <tr>
    <td bgcolor="#E6E6E6"><strong>Resume</strong></td>
    <td bgcolor="#FFFFFF"><a href="<?php echo base_url('public/uploads/resumes/'.$resume); ?>" target="_blank">View</a></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#E6E6E6"><strong>Cover Letter</strong></td>
    <td bgcolor="#FFFFFF"><?php echo $coverletter; ?> </td>
  </tr>
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