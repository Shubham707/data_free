<?php
session_start();
if(!isset($_SESSION['retailer'])) {
	header("location:../login.php");
	exit();
}
include("../config.php");
include("common.php");
$error = 0 ;
$aParent = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid = '".$aRetailer->dist_id."' ");
if($aParent) {
	$parent_user_mobile = $aParent->mobile;
	if($aParent->email != '') { $parent_user_email = $aParent->email; } else { $parent_user_email = '';}
}
$wallet = $db->queryUniqueObject("SELECT * FROM apps_wallet WHERE uid = '".$_SESSION['retailer_uid']."'");
if($wallet) {
	$current_balance = $wallet->balance;
	$cutoff_balance = $wallet->cuttoff;
} else {
	$current_balance = "0";
	$cutoff_balance = "0";
}
$meta['title'] = "Dashboard";
include("header.php");
?>
<style>
/* Extra */
.small-box {
  border-radius: 3px;
  position: relative;
  display: block;
  margin-bottom: 15px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  height:120px;
  overflow:hidden;
	background:#fff;
	text-align:center;
}
.small-box .small-block {
	display:block;
	padding:10px 0px;
}
.small-box a {
	text-decoration:none;
	color:#000;
}
.small-box a:hover {
	text-decoration:none;
}
.small-box p {
	font-size: 13px;
}
.small-box .fa-x {
  z-index: 0;
  font-size: 60px;
	line-height:72px;
  color: #8f80b4;
}
.small-box .fa-x:hover {	
  text-decoration: none;
  animation-name: tansformAnimation;
  animation-duration: .5s;
  animation-iteration-count: 1;
  animation-timing-function: ease;
  animation-fill-mode: forwards;
  -webkit-animation-name: tansformAnimation;
  -webkit-animation-duration: .5s;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-timing-function: ease;
  -webkit-animation-fill-mode: forwards;
  -moz-animation-name: tansformAnimation;
  -moz-animation-duration: .5s;
  -moz-animation-iteration-count: 1;
  -moz-animation-timing-function: ease;
  -moz-animation-fill-mode: forwards;
}
@keyframes tansformAnimation {
	from {
		font-size: 60px;
		line-height:72px;
	}
	to {
		font-size: 48px;
		line-height:72px;
	}
}
@-webkit-keyframes tansformAnimation {
	from {
		font-size: 60px;
		line-height:72px;
	}
	to {
		font-size: 48px;
		line-height:72px;
	}
}
.small-box .sb-header {
	line-height:24px;
	text-align:left;
	height:24px;
	overflow:hidden;
	padding:0px 10px;
}
.small-box .sb-footer {
	line-height:24px;
	text-align:left;
	height:24px;
	overflow:hidden;	
	color:#fff;
	text-align:center;
}
.small-box .ft-blue {
	background:#4a88dd;
}
.small-box .ft-green {
	background:#48cfae;
}
.small-box .sb-body {
	display:block;
	overflow:hidden;
	padding:10px;
	height:96px;
	text-align:center;
}
.small-box .sb-body .sb-ico-block {
	display:block;
	height:96px;
	text-align:center;
}
.balance-box {
  position: relative;
  display: block;
  overflow:hidden;
	margin-bottom:15px;
}
li.balance .fa {
	min-width:30px;
	display:inline-block;
	color:#999;
}
li.balance .huge {
	font-size:3em;
	color:#2cd15b;
}
.badgex {
	min-width:30px;
	display:inline-block;
	text-align:center;
}
.smb-blue {
	background:#428bca;
	color:#FFFFFF;
}
.smb-blue .text-ruppee {
	color:#FFFFFF;
}
.smb-blue .sb-footer {
	color:#fff;
	background:#367cb8;
}
.smb-blue .fa-x {
  color:#fff;
}
.smb-green {
	background:#1caf9a;
	color:#FFFFFF;
}
.smb-green .sb-body {
	color:#FFFFFF;
}
.smb-green .text-default {
	color:#FFFFFF;
}
.smb-green .text-ruppee {
	color:#FFFFFF;
}
.smb-green .text-support {
	color:#FFFFFF;
}
.smb-green .text-email {
	color:#FFFFFF;
}
.smb-green .text-email a {
	color:#FFFFFF;
}
.smb-green .sb-footer {
	color:#fff;
	background:#149583;
}
.smb-green .fa-x {
  color:#fff;
}

.text-ruppee {
	font-family:Arial, Helvetica, sans-serif!important;
	font-weight:800;
	font-size:48px;
	line-height:72px;
	color:#eb5765;
}
.text-support {
	font-family:Arial, Helvetica, sans-serif!important;
	font-weight:800;
	font-size:24px!important;
	line-height:24px;
	color:#666;
}

.dash-box {
  border-radius: 3px;
  position: relative;
  display: block;
  margin-bottom: 15px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  height:120px;
  overflow:hidden;
	background:#fff;
}
.dash-box-1 {
	border-radius: 3px 0px 0px 3px;
	width:40%;
	height:100%;
	float:left;
	color: #ffffff;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
	background: #f3aa84;
}
.dash-box-1 .fa {
	padding:15px;
	text-align:center;
	font-size:72px;
	line-height:90px;
	vertical-align:middle;
	display:block;
}
.dash-box-2 {
	width:60%;
	float:left;
	padding:5px 8px;
}
.dash-box-2 p.huge {
	font-size: 18px;
  line-height: 30px;
	margin-bottom:0px;
	color:#d24801;
}
.dash-box-2 p {
  line-height: 18px;
}
.btn-violet {
	color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	border-color:#5d459e;
  background-color: #a394cd;
	background: linear-gradient(#a394cd, #634da2);
}
.btn-violet:focus,
.btn-violet.focus,
.btn-violet:hover,
.btn-violet:active,
.btn-violet.active {
	color: #fff;
  border-color: #5d459e;
  background-color: #6c52b3;
	background: linear-gradient(#6c52b3, #634da2);
}
</style>
<div class="content">
	<div class="container">
		<?php
		$qry = $db->query("SELECT * FROM notifications WHERE ( user_type = '5' OR user_type = '0' ) AND status = '1' ORDER BY notification_date DESC");
		if($db->numRows($qry) > 0) { ?>
		<div class="alert alert-notification">
			<div class="row">
				<div class="col-sm-1 pull-left">		
					<i class="fa fa-lg fa-bullhorn"></i>
				</div>	
				<div class="col-sm-1 pull-right">	
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="col-sm-10 pull-right">				
					<marquee scrollamount="3" direction="scroll" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 3, 0);">
						<?php
						while($result = $db->fetchNextObject($qry)) { ?>
							<span class="text-alert" style="margin-right:40px;"><i class="fa fa-clock-o"></i> <?php echo $result->notification_content;?></span>
						<?php } ?>
					</marquee>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-default font-14">
					<i class="fa fa-dashboard"></i> Welcome To Your Retailer's Dashboard
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div class="row">	
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-mobile"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Recharge</p>
								<p>Service available for your mobile, DTH, Datacard</p>
								<a href="recharge.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-newspaper-o"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Bill Payment</p>
								<p>Pay your mobile, landline, electicity &amp; utility bills</p>
								<a href="recharge.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-money"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Money Transfer</p>
								<p>Get Money transfer services 24x7 IMPS, NEFT.</p>
								<a href="money-transfer3.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-bus"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Bus Ticket</p>
								<p>More than 50,000 national bus routes.</p>
								<a href="bus-ticket.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-plane"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Flight Booking</p>
								<p>More than 1,00,000 national flights.</p>
								<a href="flight-booking.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>	
					<div class="col-sm-6">
						<div class="dash-box">
							<div class="dash-box-1">
								<i class="fa fa-hotel"></i>
							</div>
							<div class="dash-box-2">
								<p class="huge">Holiday Package</p>
								<p>National &amp; International holiday package.</p>
								<a href="holiday-booking.php" class="btn btn-sm btn-violet pull-right">Launch Now</a>
							</div>
						</div>
					</div>	
					<div class="col-sm-4">
						<div class="small-box">
							<a href="complaints.php" class="small-block">
								<i class="fa fa-x fa-send-o"></i>
								<p>Complaints</p>
							</a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="small-box">
							<a href="tickets.php" class="small-block">
								<i class="fa fa-x fa-envelope-o"></i>
								<p>Support Ticket</p>
							</a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="small-box">
							<a href="fund-request.php?token=<?php echo $token;?>" class="small-block">
								<i class="fa fa-x fa-money"></i>
								<p>Payment Request</p>
							</a>
						</div>
					</div>	
					<div class="col-sm-4">
						<div class="small-box">
							<a href="rpt-recharge.php" class="small-block">
								<i class="fa fa-x fa-file-text-o"></i>
								<p>Recharge Histroy</p>
							</a>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="small-box">
							<a href="rpt-transactions.php" class="small-block">
								<i class="fa fa-x fa-file-text-o"></i>
								<p>Transaction Histroy</p>
							</a>
						</div>
					</div>						
					<div class="col-sm-4">
						<div class="small-box">
							<a href="rpt-commission.php" class="small-block">
								<i class="fa fa-x fa-gift"></i>
								<p>Commission Histroy</p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<ul class="list-group">
					<li class="list-group-item">
						<b>Current Balance</b>
					</li>
					<li class="list-group-item balance">
						<i class="fa fa-3x fa-inr"></i>
						<b class="huge"><?php echo round($current_balance,2);?></b>
					</li>
					<li class="list-group-item">
						Cut-off <i class="fa fa-inr"></i> <?php echo round($cutoff_balance);?>
						<a href="fund-request.php?token=<?php echo $token;?>" class="badge">Request Fund</a>
					</li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<b>Your Distributor</b>
					</li>
					<li class="list-group-item">
						<?php echo $aParent->company_name;?><br />
						<?php echo $aParent->address;?>, <?php echo $aParent->city;?>,<br />
						<?php echo $aParent->states;?>
					</li>
					<li class="list-group-item">
						<span class="badgex"><i class="fa fa-phone"></i></span> 
						<?php echo $aParent->mobile;?>
					</li>
					<li class="list-group-item">
						<span class="badgex"><i class="fa fa-envelope-o"></i></span>
						<a href="mailto:<?php echo $aParent->email;?>"><?php echo $aParent->email;?></a>
					</li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item">
						<b>For Support Contact</b>
					</li>
					<li class="list-group-item">
						<span class="badgex"><i class="fa fa-envelope-o"></i></span>
						<a href="mailto:<?php echo $website['email'];?>"><?php echo $website['email'];?></a>
					</li>
					<li class="list-group-item">
						<span class="badgex"><i class="fa fa-phone"></i></span> 
						<?php echo $website['phone'];?>
					</li>
				</ul>	
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>