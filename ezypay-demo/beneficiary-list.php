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
$ezpmsg = "msg=E06011~".$ezykey."~".$request_txn_no."~".$account."~NA~NA";
$url = 'http://180.179.20.116:8030/RemitMoney/mtransfer';

if($account=='7566309322') {
	$output = '{"Beneficiary":[{"BeneficiaryCode":"1","BeneficiaryName":"SANDIP KUMAR SHAW","AccountNumber":"1589654266666","AccountType":"Savings Account","IFSC":"UTIB0002674"},{"BeneficiaryCode":"4","BeneficiaryName":"SAMBRI","AccountNumber":"1589400266666","AccountType":"Savings","IFSC":"utib0000436"}]}';
} else {
	//E06012~1528783265~7699999821~NA~NA~FAILED~Requested mobile no not registered with us~NA~NA
	$output = "E06012~".$ezykey."~".$account."~NA~NA~FAILED~Requested mobile no not registered with us~NA~NA";
}

if($output) {	
	// MessageCode~ Request id~Mobile No~ BlankValue ~ BlankValue ~ Status ~Description ~Value1~ Value2
	// E06008~Abc589654124~~7699999821~Sender Name~NA~SUCCESS~Description~NA~ NA
	//
	if(json_decode($output)) {
		$data = json_decode($output,true);
		$jsDataBen = json_encode($data['Beneficiary']);
		$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"Beneficiary fetched successfully","EZY_MOB":"'.$account.'","EZY_BEN":'.$jsDataBen.'}';
	} else {
		$ezrsp = explode("~",$output);
		if($ezrsp[5]=='FAILED') {
			$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
		} else {
			$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[6].')","EZY_MOB":"'.$account.'"}';	
		}
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}




?>