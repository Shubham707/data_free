<?php
include'../config.php';
if(isset($_REQUEST['submit']))
{
	$id=$_REQUEST['cat_id'];
	$R = $_REQUEST;
	$url = str_replace(' ','-',strtolower($R['cat_name']));
	$tag = ucfirst($R['cat_name']);
	echo $sql="UPDATE `hotel_category` SET 
	`cat_name`='$tag',
	`cat_slug`='$url',
	`cat_tag`='$tag' 
	WHERE cat_id='$id'";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	 header("location:../hotel-category.php?error=3");
}
if(isset($_REQUEST['del']))
{
	$id=$_REQUEST['del'];
	$sql="DELETE FROM `hotel_category` WHERE `flight_category`.`cat_id` = '$id'";
	$query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../hotel-category.php?error=3");
}
if(@$_REQUEST['insert'])
{ 
  if($_FILES['images']['name']!="")
  {
    $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION));
     move_uploaded_file($_FILES['images']['tmp_name'], '../../uploads_list/' . $newFileName);
  }

  $R=$_REQUEST;
   $data="INSERT INTO `hotel_list` (`hotel_cat_id`, `hotel_name`, `images`, `price`, `city`, `state`, `country`, `address`, `discount`, `days`, `book_description`) VALUES ('$R[hotel_name]', '$R[hotel_cat_id]','$newFileName',  '$R[address]','$R[price]', '$R[city]', '$R[state]', '$R[country]', '$R[book_description]', '$R[discount]', '$R[days]')";
    $query= mysqli_query($db, $data) or die (mysqli_error()); 
   header("location:../hotel-list.php?error=3");
}
if(isset($_REQUEST['inactive']))
{
	 $active=$_REQUEST['inactive'];
	 $sql="UPDATE hotel_list SET status = 0 WHERE hotel_id = '$active'";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	 header("location:".$_SERVER['HTTP_REFERER']);
}
if(isset($_REQUEST['active']))
{
	$active=$_REQUEST['active'];
	 $sql="UPDATE `hotel_list` SET `status` = '1' WHERE `hotel_id` = $active";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	 header("location:".$_SERVER['HTTP_REFERER']);
}
if(isset($_REQUEST['update']))
{

 $id=$_REQUEST['hotel_id'];
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
 $sql="UPDATE `hotel_list` SET `hotel_cat_id`='$R[hotel_cat_id]',`hotel_name`='$R[name]',`images`='$newFileName',`price`='$R[price]',`address`='$R[address]',`city`='$R[city]',`state`='$R[state]',`country`='$R[country]',`discount`='$R[discount]',`days`='$R[days]',`book_description`='$R[book_description]' WHERE `hotel_id` = $id";
	 $query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../hotel-list.php?error=3");
}
if(isset($_REQUEST['delete']))
{
	$id=$_REQUEST['delete'];
	$sql="DELETE FROM `hotel_list` WHERE `hotel_id` = '$id'";
	$query=mysqli_query($db,$sql) or dir(mysqli_error());
	header("location:../hotel-list.php?error=3");
}
?>