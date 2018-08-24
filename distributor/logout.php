<?php
session_start();
include('../config.php');
if(isset($_SESSION['distributor'])) {
	$db->execute("UPDATE activity_login SET is_online = 'n', logout_time = NOW() WHERE login_id = '".$_SESSION['ds_login_id']."' ");
	unset($_SESSION['distributor_name']);
	unset($_SESSION['distributor_uid']);
	unset($_SESSION['distributor']);
	unset($_SESSION['ds_login_id']);
}
header('location:../login.php');
?>
