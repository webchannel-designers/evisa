<?php

#####################################

#  Session Setting					#

#####################################

//session_start(); 



define('DB_SERVER',"localhost");
	define('DB_DATABASE', "webchaco_ecuc");
	define('DB_USERNAME',"webchaco_ecuc");
	define('DB_PASSWORD',"ecuc3@!");




#####################################

#  Database Configration			#

#####################################



/*define('DB_SERVER','localhost');

define('DB_USERNAME','webchann_gulfbiz');

define('DB_PASSWORD','gulfbiz123');

define('DB_DATABASE','webchann_el');*/



$support_Admin = "localhost@webchannel.ae";

$db		= mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die("Could not connect to the database, please inform at $support_Admin  and try lator.");

mysql_select_db(DB_DATABASE, $db);

if($db != true)

	die("Could not select the database, please inform at $support_Admin  and try lator.");



#####################################

#  Site Configration				#

#####################################

/*$siteURL ='http://www.webchannel.ae/projects/el/www/';



define('SERVER_URL','http://www.webchannel.ae/projects/el/www/');



define('SERVER_PATH','/home/webchann/public_html/projects/el/www/');



define('HTTP_URL','http://www.webchannel.ae/projects/el/www/');*/





$siteURL ='http://webchannel.co/projects/ECUC/www/';



define('SERVER_URL','http://webchannel.co/projects/ECUC/www/');



define('SERVER_PATH','http://webchannel.co/projects/ECUC/www/');



define('HTTP_URL','http://webchannel.co/projects/ECUC/www/');



$fldpagename = basename($_SERVER['PHP_SELF']);

$ADMIN_GAL_IMGPATH 		= "../upload/gallery/";
    $FRONT_GAL_IMGPATH 		= "upload/gallery/";
	$ADMIN_GAL_IMG_IMGPATH 	= "../upload/gallery/images/";
    $FRONT_GAL_IMG_IMGPATH 	= "upload/gallery/images/";
	$ADMIN_BROCHURE_IMGPATH = "../upload/profile/";
    $FRONT_BROCHURE_IMGPATH = "upload/profile/";
	$ADMIN_MENU_IMGPATH = "../upload/menu/";
    $FRONT_MENU_IMGPATH = "upload/menu/";
	$ADMIN_CONTENT_IMGPATH 	= "../upload/content/";
    $FRONT_CONTENT_IMGPATH 	= "upload/content/";
	$ADMIN_LINK_IMGPATH 	= "../upload/links/";
    $ADMIN_LINK_IMGPATH 	= "upload/links/";
	$FRONT_ENCV_PATH 		= "upload/cv/";
	$FRONT_ARCV_PATH 		= "upload/cv/";
	$ADMIN_CV_PATH 		= "../upload/cv/";
    $FRONT_CV_PATH 		= "upload/cv/";







#####################################

#  Configure Paging Variables		#

#####################################

/*$record_limit=20; // for paging

$pg_limit=5;  // for paging  

define('PAGE_COMBO',$record_limit);*/



#####################################

#  Image Parameters					#

#####################################

define('IMAGE_HEIGHT','100');

define('IMAGE_WIDTH','100');



#####################################

#  File Settings					#

#####################################

define('INDEX_FILE','index.php?file=');



#####################################

#  General Setting					#

#####################################

//error_reporting(E_ALL ^ E_NOTICE & ~E_WARNING); // display all errors except notices

///error_reporting(E_ERROR);

@ini_set('register_globals', 'Off'); // make globals off runtime

define('EMAIL_SEPARATOR', '------------------------------------------------------');

define('CHARSET', 'iso-8859-1');

define('ITEM_PER_PAGE', '2');

$FRONT_ITEM_PER_PAGE =  '10';

$CURR_SYMBOL = 'AED';

$CURR_VAL = '1';

$AREA_SYMBOL = 'Sq.Ft';

$AREA_VAL = '1';

#####################################

#  Webchannel CMS Setting		    #

#####################################



$recordsPerPage =9;



$admintitle	= "Welcome to admin : Emirates Canadian University College";

$SITE_TITLE	= "Emirates Canadian University College";



$bgColor	= "#C7C7C7";

$copyright	= "&copy; Copyright ".date('Y')." ECUC . All Rights Reserved";



/********************************************************************

Set SMTP

********************************************************************/

//error_reporting(0);

ini_set("memory_limit","64M");





ini_set("SMTP","mail.webchannel.ae");

ini_set("sendmail_from","info@webchannel.ae");

ini_set("upload_max_filesize","5M");



?>