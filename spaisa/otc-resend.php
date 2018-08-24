<?php
if(!defined('BROWSE')) { exit('No direct access allowed'); }
		
$request_txn_no = time();
	
$url = "http://99-604-99-605.com/api/money-transfer.php?userid=".$echarge['uid']."&key=".$echarge['key']."&request=".$_GET['request']."&mobile=".$account."&otc_ref_no=".$otc_ref_no;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if($output) {	
	$jsDmtResponse = $output;
} else {
	$jsDmtResponse = '{"ResponseCode":"18","Message":"Error, Response not recieved.","MobileNo":"'.$account.'"}';	
}	
?>