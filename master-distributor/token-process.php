<?php
session_start();
if(!isset($_SESSION['mdistributor'])) {
	header("location:login.php");
	exit();
}
include('../config.php');
$error = isset($_GET['error']) && $_GET['error'] != '' ? mysql_real_escape_string($_GET['error']) : 0;

if($_POST['uid']=='' || $_POST['new_token']=='' || $_POST['action']=='' || $_POST['pin']=='') {
	echo "ERROR,Some Parameters are missing, Try again";
	exit();
} else {
	$pin = htmlentities(addslashes($_POST['pin']),ENT_QUOTES);
	$uid = htmlentities(addslashes($_POST['uid']),ENT_QUOTES);	
	$action = htmlentities(addslashes($_POST['action']),ENT_QUOTES);		
	$new_token = htmlentities(addslashes($_POST['new_token']),ENT_QUOTES);
	$mds_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE user_id='".$_SESSION['mdistributor']."' ");
	if($mds_info && $mds_info->pin==hashPin($pin)) {	
		if($mds_info->activation_token >= $new_token) {			
			$user_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$uid."'");
			if($user_info) {				
				//Process
				if($action=='1') {
					$ts_type = "cr";
					$closing_token = $user_info->activation_token + $new_token;
					$mds_closing_token = $mds_info->activation_token - $new_token;
				} else if($action=='2') {
					if($user_info->activation_token > $new_token) {
						$ts_type = "dr";
						$closing_token = $user_info->activation_token - $new_token;
						$mds_closing_token = $mds_info->activation_token + $new_token;
					} else {
						echo "ERROR,Insufficiant token to deduct";
						exit();
					}
				}
				
				//Insert for Users
			$db->execute("INSERT INTO `token_activation`(`token_id`, `added_date`, `from_uid`, `to_uid`, `ts_type`, `token_value`, `closing_token`, `ts_user_type`, `ts_by`) VALUES ('', NOW(), '".$_SESSION['mdistributor_uid']."', '".$uid."', '".$ts_type."', '".$new_token."', '".$closing_token."', '0', '".$_SESSION['mdistributor_uid']."')");
				
				$db->query("UPDATE apps_user SET activation_token='".$mds_closing_token."' WHERE user_id='".$mds_info->user_id."' ");
				
				$db->query("UPDATE apps_user SET activation_token='".$closing_token."' WHERE user_id='".$user_info->user_id."' ");
				echo "SUCCESS,Token updated successfully";
				exit();
				
			} else {
				echo "ERROR,Invalid user details";
				exit();
			}
		} else {
			echo "ERROR,Insufficiant token in you account";
			exit();
		}
	} else {
		echo "ERROR,Invalid Pin";
		exit();
	}
}
?>