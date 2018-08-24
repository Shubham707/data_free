<?php
session_start();
if(!isset($_SESSION['admin'])) {
	header("location:index.php");
	exit();
}
include("../config.php");
$meta['title'] = "Live API Balance";
include("header.php");
?>
<div class="content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="page-title">API Balance</div>
		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"> <i class="fa fa-list"></i> List API Balance</h3>
			</div>
			<div class="box-body no-padding">
				<table class="table">
					<thead>
						<tr>
							<th width="6%">S. No.</th>
							<th>API Name</th>
							<th width="30%">Balance</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$scnt = 1;
						$query = $db->query("SELECT * FROM api_list where status=1 ORDER BY api_id ASC ");
						if($db->numRows($query) < 1) echo "<tr><td colspan='100%'>No Result Found</td></tr>";
						while($result = $db->fetchNextObject($query)) {
						?>
						<tr>
							<td align="center"><?php echo $scnt++;?></td>
							<td><?php echo $result->api_name;?></td>
							<td><b>
								<?php
								if($result->api_id == '1') {
									$url = "http://api.egpay.in/GetAPIBalance.aspx?UID=".$eg_pay['uid']."&UPASS=".$eg_pay['pass']."&SUBUID=".$eg_pay['subuid']."&SUBUPASS=".$eg_pay['subupass'];
									$output = file_get_contents($url);
									$xml = json_decode(json_encode((array) simplexml_load_string($output)), 1);
									$balance = isset($xml['API_Balance']) ? $xml['API_Balance'] : '';
									echo $balance;
								} else if($result->api_id == '2') {
								 	$url ="http://arrohservice.in/apis/apireqnew.aspx?uid=2064&pass=66vvv1&mno=918600250250&msg=CB";
							        $output = file_get_contents($url);
									$balance_split = explode(":", $output);
									$balance = explode(" ", $balance_split[1]);
									echo $balance[0];
								} else if($result->api_id == '3') {
									$url = "http://smsalertbox.com/api/balance.php?uid=".$achariya['uid']."&pin=".$achariya['pin']."&route=recharge&format=json&version=4";
									$output = file_get_contents($url);
									$json = json_decode($output, true);
									$balance = isset($json['balance']) && $json['balance'] != '' ? $json['balance'] : '';
									echo $balance;
								} else if($result->api_id == '5') {
									$url = "http://99-604-99-605.com/api/balance.php?userid=".$echarge['uid']."&key=".$echarge['key'];
									$output = file_get_contents($url);
									$balance = $output;
									echo $balance;
								} else if($result->api_id == '6') {
									$url = "http://roundpayapi.in/API/APIService.aspx?userid=".$roundpay['userid']."&pass=".$roundpay['pass']."&Get=CB";
									$output = file_get_contents($url);
									$xml = json_decode(json_encode((array) simplexml_load_string($output)), 1);
									$balance = isset($xml['STATUS']) && $xml['STATUS'] != '' ? $xml['STATUS'] : '';
									echo $balance;
								} else if($result->api_id == '7') {
									//$url = "http://appone.exioms.com/api/v3_1/getWalletAmountv3.php/getWalletAmount?strUsername=".$exioms['uname']."&strAuthKey=".$exioms['key']."&format=1";									
									//$json = json_decode($output, 1);
									//$balance = isset($json['message']) && $json['message'] != '' ? $json['message'] : '';									
									$url = "http://rechargea2z.com/API/APIService.aspx?userid=".$rechargea2z['userid']."&pass=".$rechargea2z['pass']."&Get=CB&fmt=Json";
									$output = file_get_contents($url);
									$xml = json_decode(($output), true);
									$balance = isset($xml['STATUS']) && $xml['STATUS'] != '' ? $xml['STATUS'] : '';
									echo $balance;
								} else if($result->api_id == '9') {
									$url = "http://ambikamultiservices.com/API/NewAPIService.aspx?userid=".$ambika['userid']."&pass=".$ambika['pass']."&Get=CB&fmt=Json";
									$output = file_get_contents($url);
									$xml = json_decode(($output), true);
									$balance = isset($xml['STATUS']) && $xml['STATUS'] != '' ? $xml['STATUS'] : '';
									echo $balance;
								} else if($result->api_id == '10') {
									include(DIR."/library/cyberplat-balance.php");
								} else if($result->api_id == '13') {
								  $url = "https://api.myezypay.in/Ezypaywebservice/GetBalance.aspx?AuthorisationCode=".$ezykey;
									$output = file_get_contents($url);
									$balance = explode("~", $output);
									echo $balance[0];
								} else if($result->api_id == '14') {
								    
								}
								?>
								</b>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php");?>