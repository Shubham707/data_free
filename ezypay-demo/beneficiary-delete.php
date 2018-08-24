<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * MessageCode~Auth Code~ Request id~ Mobile No~ Account Number~Bankcode~~Na~Na~Na~Na
 */
$ezykey = "57849b33619d4742a7";
$request_txn_no = time();
$ezpmsg = "msg=E06013~".$ezykey."~".$request_txn_no."~".$account."~".$ben_code."~NA~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';

if($account=='7566309322') {
	$output = "E06014~".$ezykey."~".$account."~Samdy~NA~SUCCESS~Beneficiary deleted successfully~NA~NA";
} else {
	$output = "E06014~".$ezykey."~".$account."~NA~NA~FAILED~Request Failed, Try again later~NA~NA";
}

if($output) {	
	$ezrsp = explode("~",$output);
	if($ezrsp[5]=='SUCCESS') {
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[3].'"}';
	} else if($ezrsp[5]=='FAILED') {
		$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[7].')","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>