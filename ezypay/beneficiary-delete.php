<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * E06013~E1hgYt898557843789~Abc589654128~7699999821~1448~NA~NA
 */
$request_txn_no = time();
$ezpmsg = "msg=E06013~".$ezypay['key']."~".$request_txn_no."~".$account."~".$ben_code."~NA~NA";
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
	//E06014~ Abc589654126~7699999821~Sandy~Na~SUCCESS~Beneficiary deleted successfully ~NA~ NA
	$ezrsp = explode("~",$output);
	if(count($ezrsp) > 2) {
		if($ezrsp[5]=='SUCCESS') {
			$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_BEN_NAME":"'.$ezrsp[3].'"}';
		} else if($ezrsp[5]=='FAILED') {
			$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'"}';	
		} else {
			$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response error try again later ('.$ezrsp[7].')","EZY_MOB":"'.$account.'"}';	
		}
	} else {
		$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"'.$ezrsp[1].'","EZY_MOB":"'.$account.'"}';	
	}
} else {
	$jsDmtResponse = '{"EZY_RSP":"9","EZY_MSG":"Response not recevided try again later","EZY_MOB":"'.$account.'"}';	
}
?>