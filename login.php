<?php
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$useragent = $_SERVER["HTTP_USER_AGENT"];	
$useragent = $_SERVER["HTTP_USER_AGENT"];

include("config.php");
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
	if($_POST['username']=='' || $_POST['password']=='') {
		$error = 1;
	} else {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);		
		$row = $db->queryUniqueObject("SELECT * FROM apps_user WHERE username = '".$username."' ");
		if($row) {
			if($row->status == '1') {			
				$hashPassword = hashPassword($password);
				if($row->password == $hashPassword) {
					
					$useragent = $_SERVER["HTTP_USER_AGENT"];		
					$ip = $_SERVER['REMOTE_ADDR'];		
					$hostaddress = gethostbyaddr($ip);		
					if (preg_match("|MSIE ([0-9].[0-9]{1,2})|",$useragent,$matched)) {		
						$browser_version=$matched[1];		
						$browser = "IE";		
					} elseif (preg_match( "|Opera ([0-9].[0-9]{1,2})|",$useragent,$matched)) {		
						$browser_version=$matched[1];		
						$browser = "Opera";		
					} elseif(preg_match("|Firefox/([0-9\.]+)|",$useragent,$matched)) {		
						$browser_version=$matched[1];		
						$browser = "Firefox";		
					} elseif(preg_match("|Safari/([0-9\.]+)|",$useragent,$matched)) {		
						$browser_version=$matched[1];		
						$browser = "Safari";		
					} else {
						$browser_version = 0;		
						$browser= "other";	
					}		
					if (strstr($useragent,"win")) {		
						$os='Win';		
					} else if (strstr($useragent,"Mac")) {		
						$os='Mac';		
					} else if (strstr($useragent,"Linux")) {		
						$os='Linux';		
					} else if (strstr($useragent,"Unix")) {		
						$os='Unix';		
					} else {		
						$os='Other';		
					}
						
					$db->execute("INSERT INTO `activity_login`(`login_id`, `is_admin`, `user_type`, `username`, `ip`, `host_address`, `browser`, `login_time`, `is_online`) VALUES ('', 'n', '".$row->user_type."', '".$username."', '".$ip."', '".$hostaddress."', '".$useragent."', NOW(), 'y')	");
					$last_login_id = $db->lastInsertedId();			
					$_SESSION['token'] = hashToken($row->user_id.$last_login_id);
					if($row->user_type == '1') {					
						$_SESSION['apiuser'] = $row->user_id;
						$_SESSION['apiuser_uid'] = $row->uid;
						$_SESSION['apiuser_name'] = $row->fullname;
						$_SESSION['api_kyc'] = $row->is_kyc;
						$_SESSION['ap_login_id'] = $last_login_id;
						header("location:apiuser/index.php");
					} else if($row->user_type == '3') {					
						$_SESSION['mdistributor'] = $row->user_id;
						$_SESSION['mdistributor_uid'] = $row->uid;
						$_SESSION['mdistributor_name'] = $row->fullname;
						$_SESSION['mdistributor_kyc'] = $row->is_kyc;
						$_SESSION['md_login_id'] = $last_login_id;
						header("location:master-distributor/index.php");
					} else if($row->user_type == '4') {					
						$_SESSION['distributor'] = $row->user_id;
						$_SESSION['distributor_uid'] = $row->uid;
						$_SESSION['distributor_name'] = $row->fullname;
						$_SESSION['distributor_kyc'] = $row->is_kyc;
						$_SESSION['ds_login_id'] = $last_login_id;
						header("location:distributor/index.php");
					} else if($row->user_type == '5') {					
						$_SESSION['retailer'] = $row->user_id;
						$_SESSION['retailer_uid'] = $row->uid;
						$_SESSION['retailer_name'] = $row->fullname;
						$_SESSION['retailer_kyc'] = $row->is_kyc;
						$_SESSION['rt_login_id'] = $last_login_id;
						header("location:retailer/index.php");
					} else if($row->user_type == '6') {					
						$_SESSION['retailer'] = $row->user_id;
						$_SESSION['retailer_uid'] = $row->uid;
						$_SESSION['retailer_name'] = $row->fullname;
						$_SESSION['retailer_kyc'] = $row->is_kyc;
						$_SESSION['rt_login_id'] = $last_login_id;
						header("location:direct-retailer/index.php");
					}			
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
			<h4 class="view_title">Login</h4>
			<div class="clearfix"> </div>
			<div class="row">
				<?php if($error == 5) { ?>
				<div class="alert alert-warning">
					<a class="close" data-dismiss="alert">&times;</a>
					Invalid credit		</div>
				<?php } else if($error == 4) { ?>
				<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>
					Password is invalid!</div>
				<?php } else if($error == 3) { ?>
				<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>
					Your account is deactive, Please contact to Support! </div>
				<?php } else if($error == 2) { ?>
				<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>
					Invalid user details </div>
				<?php } else if($error == 1) { ?>
				<div class="alert alert-danger">
					<a class="close" data-dismiss="alert">&times;</a>
					Oops! Something went wrong please try again.</div>
				<?php } ?>	
				<div class="col-md-6 col-md-offset-3">
					<h4>Sign in to start your session</h4>
					<div class="box box-bordered padding-30">					
						<form action="" method="post">
							<div class="form-group">
								<label>Username or E-mail Address</label>
								<input type="text" name="username" class="form-control input-lg">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control input-lg">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6">
										<span class="remember-box checkbox">
											<label for="rememberme">
												<input type="checkbox" id="rememberme" name="rememberme">Remember Me
											</label>
										</span>
									</div>
									<div class="col-sm-6">
										<input type="submit" name="submit" value="Login" class="btn btn-lg btn-primary pull-right" data-loading-text="Loading...">
									</div>
								</div>
							</div>
						</form>
						<a href="forgot.php">I forgot my password</a><br>
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php');?>	