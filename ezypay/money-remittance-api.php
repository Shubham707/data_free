<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * MessageCode~ Request id~Mobile No~ BeneficiaryCode~NA~ Status ~IMPS Ref No~ Description ~Beneficiary Name~Transaction ID~Bank name~Na~Na~Na~Na
 * E06015~E1hgYt898557843789~Abc589654135~7699999821~1448~1000~58~526489754125~ CDER546859~NA~NA~NA
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg=E06015~57849b33619d4742a7~1529477559~8770789403~305~10~58~950554083049~AMXPB1992M~NA~NA~NA
 */
//$request_txn_no = time();
$request_txn_no = $recharge_id;
$ezpmsg = "msg=E06015~".$ezypay['key']."~".$request_txn_no."~".$account."~".$ben_code."~".$amount."~".$ben_type."~".$ben_aadhaar."~".$ben_pan."~NA~NA~NA";
$url = 'https://ezymoney.myezypay.in/RemitMoney/mtransfer';
$db->execute("INSERT INTO `dmt_log`(`request_url`, `response`, `request_date`) VALUES ('Request','".$url."?".$ezpmsg."',NOW())");

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
$db->execute("INSERT INTO `dmt_log`(`request_url`, `response`, `request_date`) VALUES ('Response','".$output."',NOW())");
if($output) {
	/*	
	 * MessageCode~ Request id~Mobile No~ BeneficiaryCode~NA~ Status ~IMPS Ref No~ Description ~Beneficiary Name~Transaction ID~Bank name~Na~Na~Na~Na
	 * E06016~Abc589654135~7699999821~1448~NA~SUCCESS~62154565452~Description~Sandy~206541012~ State Bank of India ~NA~NA~NA
	 */
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
			$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[8].'","EZY_BEN_CODE":"'.$ezrsp[3].'","EZY_BANK_NAME":"'.$ezrsp[10].'","EZY_BEN_IMPS_REF_NO":"'.$ezrsp[6].'","EZY_TRANS_ID":"'.$ezrsp[9].'","EZY_MESSAGE":"'.$ezrsp[7].'"}';
			
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