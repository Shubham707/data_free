<?php
session_start();
if(!isset($_SESSION['admin'])) {
	header("location:login.php");
	exit();
}
include('../../config.php');
$error = isset($_GET['error']) && $_GET['error'] != '' ? mysql_real_escape_string($_GET['error']) : 0;

if($_POST['uid']=='' || $_POST['new_token']=='' || $_POST['action']=='' || $_POST['pin']=='') {
	echo "ERROR,Some Parameters are missing, Try again";
	exit();
} else {
	$pin = htmlentities(addslashes($_POST['pin']),ENT_QUOTES);
	$admin_info = $db->queryUniqueObject("SELECT * FROM apps_admin WHERE admin_id='".$_SESSION['admin']."' ");
	if($admin_info && $admin_info->pin==hashPin($pin)) {	
		
		$uid = htmlentities(addslashes($_POST['uid']),ENT_QUOTES);	
		$action = htmlentities(addslashes($_POST['action']),ENT_QUOTES);		
		$new_token = htmlentities(addslashes($_POST['new_token']),ENT_QUOTES);
		
		$user_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$uid."'");
		if($user_info) {
			
			//Process
			if($action=='1') {
				$ts_type = "cr";
				$closing_token = $user_info->activation_token + $new_token;
			} else if($action=='2') {
				if($user_info->activation_token > $new_token) {
					$ts_type = "dr";
					$closing_token = $user_info->activation_token - $new_token;
				} else {
					echo "ERROR,Insufficiant token to deduct";
					exit();
				}
			}
			$db->execute("INSERT INTO `token_activation`(`token_id`, `added_date`, `from_uid`, `to_uid`, `ts_type`, `token_value`, `closing_token`, `ts_user_type`, `ts_by`) VALUES ('', NOW(), '".$_SESSION['admin']."', '".$uid."', '".$ts_type."', '".$new_token."', '".$closing_token."', '0', '".$_SESSION['admin']."')");
			$db->query("UPDATE apps_user SET activation_token='".$closing_token."' WHERE user_id='".$user_info->user_id."' ");
			echo "SUCCESS,Token updated successfully";
			exit();
			
		} else {
			echo "ERROR,Invalid user details";
			exit();
		}
	} else {
		echo "ERROR,Invalid Pin";
		exit();
	}
}
?>