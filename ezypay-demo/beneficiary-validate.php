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
$ezpmsg = "msg=E06031~".$ezykey."~".$request_txn_no."~".$account."~".$ben_account."~".$ben_ifsc."~NA~NA~NA~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';

if($account=='7566309322') {
	$output = "E06032~".$ezykey."~".$account."~".$ben_ifsc."~".$ben_account."~SUCCESS~80000523522~Transaction Successful~Ram kumar~State Bank of India~NA~NA~NA";
} else {
	$output = "E06032~".$ezykey."~".$account."~".$ben_ifsc."~".$ben_account."~FAILED~NA~Transaction Failed~NA~NA~NA~NA~NA";
}

if($output) {	
	$ezrsp = explode("~",$output);
	if($ezrsp[5]=='SUCCESS') {
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[8].'","EZY_BEN_BANK":"'.$ezrsp[9].'","EZY_BEN_ACC":"'.$ezrsp[4].'","EZY_BEN_IFSC":"'.$ezrsp[5].'","EZY_IMPS_REF_NO":"'.$ezrsp[6].'"}';
	} else if($ezrsp[5]=='FAILED') {
		$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[7].'","EZY_MOB":"'.$account.'"}';	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[7].')","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>