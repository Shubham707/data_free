<?php
session_start();
include('../config.php');
if(isset($_SESSION['mdistributor'])) {
	$db->execute("UPDATE activity_login SET is_online = 'n', logout_time = NOW() WHERE login_id = '".$_SESSION['lastloginid']."' ");
	unset($_SESSION['mdistributor_name']);
	unset($_SESSION['mdistributor_uid']);
	unset($_SESSION['mdistributor']);
}
header('location:../login.php');
?>
