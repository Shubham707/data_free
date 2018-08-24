<?php
if(!defined('BROWSE')) {
	exit('No direct access allowed');
}
$request_txn_no = time();
$url = "http://99-604-99-605.com/api/money-transfer2.php?userid=".$echarge['uid']."&key=".$echarge['key']."&request=".$_GET['request']."&mobile=".$account."&ben_id=".$ben_id."&ben_name=".urlencode($ben_name)."&ben_mobile=".$ben_mobile."&ben_account=".$ben_account."&ben_bank=".urlencode($ben_bank)."&ben_ifsc=".$ben_ifsc."&kyc_status=".$kyc_status;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if($output!="") {	
	$jsDmtResponse = $output;	
	$jsFetch = json_decode($jsDmtResponse,true);	
	
	if($jsFetch['RESP_CODE']=='300') {
		
		$status = "0";
		$status_details = 'Transaction Successful';
		
		$api_status = $jsFetch['RESPONSE'];
		$api_status_details = $jsFetch['RESP_MSG'];
	
		$api_txn_no = '';
		$operator_ref_no = $jsFetch['DATA']['CUSTOMER_REFERENCE_NO'];
		
		$http_code = "200";
		
	} else {
		$status = "2";
		$status_details = 'Transaction Failed';
		$api_txn_no = '';
		$api_status = '';
		$api_status_details = '';
		$operator_ref_no = '';
	}
	
} else {
	$jsDmtResponse = '{"RESP_CODE":"100","RESP_MSG":"Error, Response not recieved.","RESP_MOB":"'.$account.'"}';	
	$status = "1";
	$status_details = 'Transaction Pending';
	$api_txn_no = '';
	$api_status = '';
	$api_status_details = '';
	$operator_ref_no = '';
}
?>