<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['useragent'] = 'CodeIgniter';
$config['protocol'] = 'sendmail';
//$config['mailpath'] = '/usr/sbin/sendmail';
$config['smtp_host'] = 'legacy.al-majid.com';
//$config['smtp_user'] = 'webmail@al-majid.com';
//$config['smtp_pass'] = '@mailsvc';
$config['smtp_port'] = 25; 
$config['smtp_timeout'] = 5;
$config['wordwrap'] = TRUE;
$config['wrapchars'] = 76;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['validate'] = FALSE;
$config['priority'] = 3;
$config['crlf'] = "\r\n";
$config['newline'] = "\r\n";
$config['bcc_batch_mode'] = FALSE;
$config['bcc_batch_size'] = 200;
?>