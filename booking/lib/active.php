<?php
include'../config.php';
if(isset($_REQUEST['inactive']))
{
	 $active=$_REQUEST['inactive'];
	 $sql="UPDATE book_list SET status = 0 WHERE book_id = '$active'";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:".$_SERVER['HTTP_REFERER']);
}
if(isset($_REQUEST['active']))
{
	$active=$_REQUEST['active'];
	 $sql="UPDATE `book_list` SET `status` = '1' WHERE `book_list`.`book_id` = $active";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:".$_SERVER['HTTP_REFERER']);
}
if(isset($_REQUEST['book_id']))
{
 $id=$_REQUEST['book_id'];
 $R=$_REQUEST;
 if($_FILES['imagess']['name']!="")
  {
    $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['imagess']['name'], PATHINFO_EXTENSION));
     move_uploaded_file($_FILES['imagess']['tmp_name'], '../../uploads_list/' . $newFileName);
  }
  else{
  	$newFileName=$R['images'];
  }
//print_r($R); die();
 $sql="UPDATE `book_list` SET `resort_cat_id`='$R[resort_cat_id]',`name`='$R[name]',`images`='$newFileName',`price`='$R[price]',`address`='$R[address]',`city`='$R[city]',`state`='$R[state]',`country`='$R[country]',`discount`='$R[discount]',`days`='$R[days]',`book_description`='$R[book_description]' WHERE `book_id` = $id";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../booking-list.php?error=3");
}
if($_REQUEST['resort_id'])
{
	$id=$_REQUEST['resort_id'];
	$R = $_REQUEST;
	$url = str_replace(' ','-',strtolower($R['resort_cat_name']));
	$tag = ucfirst($R['resort_cat_name']);
	echo $sql="UPDATE `resort_category` SET 
	`resort_cat_name`='$R[resort_cat_name]',
	`resort_cat_url`='$url',
	`resort_cat_tag`='$tag' 
	WHERE resort_cat_id='$id'";
	 echo $query=mysqli_query($db,$sql) or dir(mysqli_error());
	 header("location:../resort-category.php?error=3");
}
if($_REQUEST['del'])
{
	$id=$_REQUEST['del'];
	$sql="DELETE FROM `resort_category` WHERE `resort_cat_id` = '$id'";
	$query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../resort-category.php?error=3");
}
if($_REQUEST['delete'])
{
	$id=$_REQUEST['delete'];
	$sql="DELETE FROM `book_list` WHERE `book_id` = '$id'";
	$query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../booking-list.php?error=3");
}
?>