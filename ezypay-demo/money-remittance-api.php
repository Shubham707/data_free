<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * MessageCode~ Request id~Mobile No~ BeneficiaryCode~NA~ Status ~IMPS Ref No~ Description ~Beneficiary Name~Transaction ID~Bank name~Na~Na~Na~Na
 */
$ezykey = "57849b33619d4742a7";
$request_txn_no = time();
$ezpmsg = "msg=E06015~".$ezykey."~".$request_txn_no."~".$account."~".$ben_code."~".$amount."~".$ben_type."~".$ben_aadhaar."~".$ben_pan."~NA~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';

if($account=='7566309322') {
	$output = "E06016~".$ezykey."~".$account."~".$ben_code."~NA~SUCCESS~IMPS Ref No~Beneficiary deleted successfully~Beneficiary Name~Transaction ID~Bank name~NA~NA~NA~NA";
} else {
	$output = "E06016~".$ezykey."~".$account."~NA~NA~FAILED~NA~Request Failed, Try again later~NA~NA~NA~NA~NA~NA~NA";
}

if($output) {	
	$ezrsp = explode("~",$output);
	if($ezrsp[5]=='SUCCESS') {
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[8].'","EZY_BEN_CODE":"'.$ezrsp[3].'","EZY_BANK_NAME":"'.$ezrsp[10].'","EZY_BEN_IMPS_REF_NO":"'.$ezrsp[6].'","EZY_TRANS_ID":"'.$ezrsp[9].'","EZY_MESSAGE":"'.$ezrsp[7].'"}';
	} else if($ezrsp[5]=='FAILED') {
		$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'"}';	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[7].')","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>