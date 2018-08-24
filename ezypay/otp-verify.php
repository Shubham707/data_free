<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * E06021~E1hgYt898557843789~Abc589654129~16011~459382~NA~NA
 */
$request_txn_no = time();
$ezpmsg = "msg=E06021~".$ezypay['key']."~".$request_txn_no."~".$otp_ref_code."~".$otp."~NA~NA";
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
	// MessageCode~ Request id~Mobile No~ BlankValue ~ BlankValue ~ Status ~Description ~Value1~ Value2
	// E06022~ Abc589654129~7699999821~161101~Na~SUCCESS~Description~NA~NA
	//
	$ezrsp = explode("~",$output);
	if(count($ezrsp) > 2) {
		if($ezrsp[5]=='SUCCESS') {
			$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
		} else if($ezrsp[5]=='FAILED') {
			$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
		} else {
			$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[6].')","EZY_MOB":"'.$account.'"}';	
		}
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"'.$ezrsp[1].'","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>