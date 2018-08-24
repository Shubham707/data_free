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
$ezpmsg = "msg=E06007~".$ezykey."~".$request_txn_no."~".$account."~NA~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';
if($account=='9826386456') {
	$output = "E06008~".$ezykey."~".$account."~NA~NA~FAILED~Sender Not Exists.Please Register Sender first~NA~NA";
} else {
	$output = "E06008~".$ezykey."~".$account."~Sandy~NA~SUCCESS~Sender Exisist~NA~NA";
}
if($output) {	
	// MessageCode~ Request id~Mobile No~ BlankValue ~ BlankValue ~ Status ~Description ~Value1~ Value2
	// E06008~Abc589654124~~7699999821~Sender Name~NA~SUCCESS~Description~NA~ NA
	//
	$ezrsp = explode("~",$output);
	if($ezrsp[5]=='SUCCESS') {
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_SENDER_NAME":"'.$ezrsp[3].'","EZY_SENDER_MOBILE":"'.$ezrsp[2].'"}';	
	} else if($ezrsp[5]=='FAILED') {
		$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[6].')","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>