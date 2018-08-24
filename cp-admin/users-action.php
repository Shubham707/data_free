<?php
session_start();
if(!isset($_SESSION['admin'])) {
	header("location:index.php");
	exit();
}
include("../config.php");
$request_id = isset($_GET['id']) && $_GET['id']!='' ? mysql_real_escape_string($_GET['id']) : 0;
$retrun_url = '';
if(isset($_GET['id']) && $_GET['id'] != '' && isset($_GET['action']) && $_GET['action'] != '') {
	$action = isset($_GET['action']) && $_GET['action']!='' ? mysql_real_escape_string($_GET['action']) : '';	
	if($action == 'nodeduct') {
		$db->execute("UPDATE apps_user SET is_deduct='1' WHERE user_id='".$request_id."' ");
	} else if($action == 'deduct') {
		$db->execute("UPDATE apps_user SET is_deduct='0' WHERE user_id='".$request_id."' ");
	}
	header("location:".$_SERVER['HTTP_REFERER']);
	exit();
	
} else {
	exit ('No direct accces allowed');
}
?>