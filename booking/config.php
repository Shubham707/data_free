<?php 
error_reporting(E_ALL);
ini_set('display_start_error', 1);
ob_start();
$db= mysqli_connect("localhost","root","","swipecell") or dir(mysqli_error());
/*if($db)
{
	echo "connect";
}*/
?>