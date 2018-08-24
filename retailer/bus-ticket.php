<?php
session_start();
if(!isset($_SESSION['retailer'])) {
	header("location:index.php");
	exit();
}
include("../config.php");
include("common.php");

$meta['title'] = "Bus Ticket";
include("header.php");
?>
<div class="content">
	<div class="container">
		<div class="page-header">
			<div class="page-title">Bus Ticket</div>
		</div>
		<div class="row">
			<div class="col-sm-12 min-height-300">
				<div class="alert alert-danger">
					<b><i class="fa fa-minus-circle"></i> This service is inactive in your account. To activate bus ticket service in your account contact your distributor now.</b>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>