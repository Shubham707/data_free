<?php
include'../config.php';
if(@$_POST['pack_id'])
{
	$id=$_POST['pack_id'];
	$R=$_REQUEST;
	$sql="UPDATE `package` SET `package_name`='$R[package_name]',`package_category`='$R[package_category]',`package_type`='$R[package_type]',`package_plan`='$R[package_plan]' WHERE pack_id='$id'";
	$query=mysqli_query($db,$sql) or die('Query is not execute');
	header("Location:../package.php");
}
if(@$_REQUEST['del'])
{
	$id=$_REQUEST['del'];
	$sql="DELETE FROM `package` WHERE pack_id='$id'";
	$query=mysqli_query($db,$sql) or die('Query is not execute');
	header("Location:../package.php");
}
if(@$_REQUEST['insert'])
{
	
	$R=$_REQUEST;
	  if($_FILES['images']['name']!="")
	  {
	    $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION));
	     move_uploaded_file($_FILES['images']['tmp_name'], '../../uploads_list/' . $newFileName);
	  }
	echo $sql="INSERT INTO `tour_list`(`tour_name`, `tour_plan`, `tour_package`, `category`, `images`, `discount`, `country`, `state`, `city`, `create_date`,`book_description`,`days`,`night`) VALUES ('$R[tour_name]','$R[tour_plan]','$R[tour_package]','$R[category]','$newFileName','$R[discount]','$R[country]','$R[state]','$R[city]','$R[create_date]','$R[book_description]','$R[days]','$R[night]')";
	$query=mysqli_query($db,$sql) or die('Query Not execute!');
	header("Location:../tour-list.php");
}

if(@$_REQUEST['delete'])
{
	$id=$_REQUEST['delete'];
	$sql="DELETE FROM `tour_list` WHERE tour_id='$id'";
	$query=mysqli_query($db,$sql) or die('Query is not execute');
	header("Location:../tour-list.php");
}
if(@$_REQUEST['update'])
{
	
	$R=$_REQUEST;
	  if($_FILES['images']['name']!="")
	  {
	    $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION));
	     move_uploaded_file($_FILES['images']['tmp_name'], '../../uploads_list/' . $newFileName);
	  }
	  else{
	  	$newFileName=$R['imagess'];
	  }
	  $sql="UPDATE `tour_list` SET `tour_name`='$R[tour_name]',`days`='$R[night]',`days`='$R[night]',`tour_plan`='$R[tour_plan]',`tour_package`='$R[tour_package]',`category`='$R[category]',`images`='$newFileName',`discount`='$R[discount]',`country`='$R[country]',`state`='$R[state]',`city`='$R[city]',`address`='$R[address]',`create_date`='$R[create_date]',`book_description`='$R[book_description]' WHERE tour_id='$R[tours_id]'"; 
	$query=mysqli_query($db,$sql) or die('Query Not execute!');
	header("Location:../tour-list.php");
}
if(@$_REQUEST['popular'])
{
	 $active=$_REQUEST['popular'];
	 $sql="UPDATE `tour_list` SET `popular` = '1' WHERE `tour_id`='$active'";
	 $query=mysqli_query($db,$sql) or die(mysqli_error());
	 header("location:".$_SERVER['HTTP_REFERER']);
}
if(@$_REQUEST['populars'])
{
	 $active=$_REQUEST['populars'];
	 $sql="UPDATE `tour_list` SET `popular` = '0' WHERE `tour_id`='$active'";
	 $query=mysqli_query($db,$sql) or die(mysqli_error());
	 header("location:".$_SERVER['HTTP_REFERER']);
}
