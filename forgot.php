<?php
session_start();
include('config.php');
if(isset($_SESSION['apiuser'])) {
	header("location:apiuser/index.php");
} else if(isset($_SESSION['mdistributor'])) {
	header("location:master-distributor/index.php");
} else if(isset($_SESSION['distributor'])) {
	header("location:distributor/index.php");
} else if(isset($_SESSION['retailer'])) {
	header("location:retailer/index.php");
}
$error = isset($_GET['error']) && $_GET['error'] != '' ? mysql_real_escape_string($_GET['error']) : 0;

if(isset($_POST['submit'])) {

	if($_POST['username'] == '' || $_POST['mobile'] == '') {
		$error = 1;		
	} else {
		$username = mysql_real_escape_string($_POST['username']);
		$mobile = mysql_real_escape_string($_POST['mobile']);		
		$row = $db->queryUniqueObject("SELECT * FROM apps_user WHERE username = '".$username."' ");
		if($row) {			
			if($row->status == '1') {
				if($row->mobile == $mobile) {
					$password = generatePassword();	
					$hashpassword = hashPassword($password);			
					$db->execute("UPDATE `apps_user` SET `password`='".$hashpassword."' WHERE user_id = '".$row->user_id."' ");
					
					if($row->user_type == '1') {
						mailForgetPassword($row->email, $row->company_name, $password);
					}
					
					if($row->user_type != '1') {
						$message = smsPasswordChange($row->company_name, $password);
						smsSendSingle($row->mobile, $message, 'password');
					}
									
					$error = 5;
												
				} else {
					$error = 4;
				}
				
			} else {
				$error = 3;
			}			
		} else {
			$error = 2;
		}
	}
}
include('header.php');
?>
<div class="page-head">
	<div class="container">
			<div class="clearfix"> </div>
	</div>	
</div>
<div class="banner-bottom">
	<div class="container">
		<div class="view_plans">
			<h4 class="view_title">Forgot Password</h4>
			<div class="clearfix"> </div>
			<div class="row">
				<?php if($error == 5) { ?>
				<div class="alert alert-success margin-top-15">
					<a class="close" data-dismiss="alert">&times;</a>
					Successfully reset and sent to your registered email address!
				</div>
				<?php } else if($error == 4) { ?>
				<div class="alert alert-danger margin-top-15">
					<a class="close" data-dismiss="alert">&times;</a>
					Mobile number not matched!
				</div>
				<?php } else if($error == 3) { ?>
				<div class="alert alert-danger margin-top-15">
					<a class="close" data-dismiss="alert">&times;</a>
					Your account is inactive, Please contact to Support!
				</div>
				<?php } else if($error == 2) { ?>
				<div class="alert alert-danger margin-top-15">
					<a class="close" data-dismiss="alert">&times;</a>
					Username not found!
				</div>
				<?php } else if($error == 1) { ?>
				<div class="alert alert-danger margin-top-15">
					<a class="close" data-dismiss="alert">&times;</a>
					Oops! Some fields are missing
				</div>
				<?php } ?>
				<div class="col-md-6 col-md-offset-3">
					<div class="box box-bordered padding-30">	
						<p>Enter your username and we will send you new password to your RMN</p>			
						<form action="" method="post">
							<div class="form-group">
								<label>Username or Mobile Number</label>
								<input type="text" name="username" class="form-control input-lg">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
									</div>
									<div class="col-sm-6">
										<input type="submit" name="submit" value="Reset Password" class="btn btn-lg btn-primary pull-right" data-loading-text="Loading...">
									</div>
								</div>
							</div>
						</form>
						<a href="login.php">Having password? Go to login</a><br>
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php');?>	