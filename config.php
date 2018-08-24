<?php
error_reporting(0);
date_default_timezone_set('Asia/Calcutta');
define('VERSION','3.0.1');
define("DIR",__DIR__);
define("HTTPS",'http://localhost/shubham/ajax/');
define("HTTP",'http://localhost/shubham/ajax/');

//exit("Server is down due to maintenance, Please revisit after some time.");
//exit();
// define constant of the projects
/*$db_user = 'SB_N0EdYrf2hY8f1';			//DB USERNAME
$db_password = 'PH0T*g^F.xm3';			//DB PASSWORD (TO,NoKScrhS 
$db_name = 'swipe_rchdb';		//DB NAME
$db_host = 'localhost';*/		//DB SERVER

/*localhost*/
$db_user = 'root';			//DB USERNAME
$db_password = '';			//DB PASSWORD (TO,NoKScrhS 
$db_name = 'swipecell';		//DB NAME
$db_host = 'localhost';

// Include the class:
include(DIR."/system/db.class.php");
$db = new DB($db_name, $db_host, $db_user, $db_password);
include(DIR."/system/class.common.php");
include(DIR."/system/mail.function.php");
include(DIR."/system/sms.function.php");

//OLD CONSTANT
define('UPLOADS',DIR.'/uploads/');
/*
* Application Details
*/
define('SITENAME','SWIPECELL');
define('SITEPHONE','0124-4002005');
define('SITEEMAIL','info@swipecell.in');
define('SITEURL',HTTP);
define('SITELOGO','logo.png');
define('AUTHKEY','dfdc8d423f69fa9eKorDXZ8fgeDVEvpuiVMG2KoicPiKvCy');
define('TXNPREFIX','200000000000');

$eg_pay = array('uid'=>'x', 'pass'=>'x', 'subuid'=>'x', 'subupass'=>'x@x');
$achariya = array('uid'=>'4d4f424943454c4c', 'pin'=>'26cf0cae97aebe45c45ae75e07d7c4bd');
$achariya2 = array('uid'=>'4d4f424943454c4c', 'pin'=>'26cf0cae97aebe45c45ae75e07d7c4bd');
$modem_rp = array('userid'=>'x', 'pass'=>'x');
$roundpay = array('userid'=>'x', 'pass'=>'x');
$rechargea2z = array('userid'=>'9109933336', 'pass'=>'738746');
$exioms = array('uname'=>'x', 'key'=>'x');
$aarav = array('usercode'=>'x', 'key'=>'x');
$ambika = array('userid'=>'x', 'pass'=>'x');
$arroh = array('uid'=>'2064', 'pass'=>'x', 'key'=>'x');
$paymentall = array('username'=>'x', 'password'=>'x@x');
$echarge = array('uid'=>'20030668', 'key'=>'6bfcbcba29b6adad0324');
//$ezypay = array('key'=>'57849b33619d4742a7','storeid'=>'1234567890');
$ezypay = array('key'=>'d8ca5db23629408883','storeid'=>'1234567890');
$ezykey = 'd8ca5db23629408883'; 