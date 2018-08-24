<?php
session_start();
include("../config.php");
if(isset($_SESSION['log_in'])) {
	session_destroy();
	header("location:../index.php");
} else {
	header("location:../index.php");
}
?>