<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * E06031~E1hgYt898557843789~Abc589654135~7699999821~4361256325156~SBIN~526489754125~ CDER546859~NA~NA
 */
$request_txn_no = $recharge_id;
$ezpmsg = "msg=E06031~".$ezypay['key']."~".$request_txn_no."~".$account."~".$ben_account."~".$ben_ifsc."~".$ben_aadhaar."~".$ben_pan."~NA~NA";
$url = 'https://ezymoney.myezypay.in/RemitMoney/mtransfer';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $ezpmsg);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if($output) {
	//E06032~Abc589654135~7699999821~SBIN~4361256325156~SUCCESS~80000523522~Transaction Successful~Ram kumar~Transaction ID~State Bank of India~NA~NA~NA	
	$ezrsp = explode("~",$output);
	if(count($ezrsp) > 2) {
		if($ezrsp[5]=='SUCCESS') {
			$status = "0";
			$status_details = 'Transaction Successful';			
			$api_status = $ezrsp[5];
			$api_status_details = $ezrsp[7];		
			$api_txn_no = $ezrsp[9];
			$operator_ref_no = $ezrsp[6];			
			$http_code = "200";			
			$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[8].'","EZY_BEN_BANK":"'.$ezrsp[10].'","EZY_BEN_ACC":"'.$ezrsp[4].'","EZY_BEN_IFSC":"'.$ezrsp[3].'","EZY_IMPS_REF_NO":"'.$ezrsp[6].'"}';
		} else if($ezrsp[5]=='FAILED') {
			$status = "2";
			$status_details = 'Transaction Failed';
			$api_txn_no = '';
			$api_status = '';
			$api_status_details = '';
			$operator_ref_no = '';					
			$http_code = "200";			
			$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'"}';	
		} else {
			$status = "1";
			$status_details = 'Transaction Pending';
			$api_txn_no = '';
			$api_status = '';
			$api_status_details = '';
			$operator_ref_no = '';									
			$http_code = "200";			
			$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[7].')","EZY_MOB":"'.$account.'"}';	
		}
	} else {
		$status = "2";
		$status_details = 'Transaction Failed';
		$api_txn_no = '';
		$api_status = '';
		$api_status_details = '';
		$operator_ref_no = '';					
		$http_code = "200";				
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"'.$ezrsp[1].'","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$status = "1";
	$status_details = 'Transaction Pending';
	$api_txn_no = '';
	$api_status = '';
	$api_status_details = '';
	$operator_ref_no = '';						
	$http_code = "200";
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>