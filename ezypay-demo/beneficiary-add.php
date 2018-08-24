<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * MessageCode~ Auth Code~ Request id~ Mobile No~Value1~ Value2
 */
$ezykey = "57849b33619d4742a7";
$request_txn_no = time();
$ezpmsg = "msg=E06009~".$ezykey."~".$request_txn_no."~".$account."~".$ben_name."~".$bank_account."~".$ifsc."~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';

if($account=='7566309322') {
	$output = "E06010~".$ezykey."~".$account."~".$ben_name."~NA~SUCCESS~Beneiciary registered successully~Beneficiary ID~NA";
} else {
	$output = "E06010~".$ezykey."~".$account."~NA~NA~FAILED~Requested mobile no not registered with us~NA~NA";
}

if($output) {	
	$ezrsp = explode("~",$output);
	if($ezrsp[5]=='SUCCESS') {
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[3].'","EZY_BEN_ID":"'.$ezrsp[7].'"}';
	} else if($ezrsp[5]=='FAILED') {
		$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[6].')","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>