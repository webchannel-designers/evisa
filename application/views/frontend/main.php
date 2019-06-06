<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php echo $meta; ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/png" href="<?php echo base_url('public/frontend/images/favicon.png'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.datetimepicker.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/font-awesome.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/owl.carousel-dist.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/gridtab.css'); ?>"/>
<!--<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap-reboot.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/owl.carousel.css'); ?>"/>-->
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.fancybox.min.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/animations.css'); ?>"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>?<?php echo date("his") ?>"/>
<!--<link rel="stylesheet" href="<?php echo base_url('public/frontend/fancybox/jquery.fancybox.css'); ?>"/>
--><script src="<?php echo base_url('public/frontend/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js'); ?>"></script>
<!--Start of Zendesk Chat Script-->
<!--<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5rT8DmER8OjBL16In9X1HRoK7wv8yu5F";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>-->
<!--End of Zendesk Chat Script-->
<base href="<?php echo base_url(); ?>" />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=563985476955873&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php echo $header ?> <?php echo $contents; ?> <?php echo $footer; ?> 
</body>
</html>