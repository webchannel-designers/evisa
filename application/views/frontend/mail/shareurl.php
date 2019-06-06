<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!--<title>Job Application</title>-->

</head>

<body>

<table style="margin:0 auto; padding:0px; font-family: SegoeUINormal ,Arial ,Helvetica ,sans-serif; font-size:13px; color:#000; line-height:25px; border:solid 1px #ccc;" width="594">
				  <tr>
					<td width="592" style="border-bottom:1px solid #ccc; background:#cccccc;padding:3px;" align="center">
					<img src="<?php echo base_url('public/frontend/images/page-logo.png') ?>" /></td>
				  </tr>
				  <tr>
					<td>
					<span style="color:#000;"> <b>Hi &nbsp;<?php echo $toname ?>&nbsp;,</b></span>
					</td>
				  </tr>
                  <tr>
					<td>
					<span style="color:#000;">Your friend <?php echo $fromname ?> has suggested you to visit the following link</span>
					</td>
				  </tr>
				  <tr>
					<td>
					<span style="color:#000;"><a href="<?php echo $shareurl; ?>">Click</a></span>
					</td>
				  </tr>
				  
				  
				  <tr style=" background-color:#00568C">
					<td style="width:594px; height:29px;  color:#fff;" align="center">
					&copy; <?php echo convert_lang($this->config->item('copy_right'),$this->alphalocalization); ?>
					</td>
				  </tr>
				</table>


</body>
</html>


