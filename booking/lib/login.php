<?php 
include'../config.php';
session_start();
if(isset($_POST['btnlogin']))
{
	$email_id =$_POST['username'];
	$password =$_POST['password'];
	if (empty($email_id))
	{
		header("location:../index.php?error=Please Provide valid email id!");
	}	
	if(empty($password))
	{
		header("location:../index.php?error=Please Provide valid passowrd!");
	}
	if(!empty($email_id) && !empty($password))
	{
		$email_id =addslashes(strip_tags($email_id));
		$password_value = sha1(addslashes(strip_tags($password)));
		$qstring ="SELECT * FROM `admin_log` WHERE email='$email_id' AND  password ='$password_value'";
		$result	=mysqli_query($db,$qstring) or die('not connected!');
		$user = mysqli_fetch_assoc($result) or die(mysqli_error());
		if ($user['email']==$email_id && $user['password']==$password_value)
		{
			 $_SESSION['email'] = $user['email'];
			 $_SESSION['username'] = $user['admin_name'];
			$_SESSION['admin_in']=true;
			header("Location:../dashboard.php");
		} 
	}
	else{
		header("Location:../index.php?error=User Name And Password Is Wrong!");
	}
}

?>