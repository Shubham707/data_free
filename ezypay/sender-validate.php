<?php
if(!defined('BROWSE')) { 
	exit('No direct access allowed');
}		
/*
 * http://180.179.20.116:8030/RemitMoney/mtransfer?msg="E06003~E1hgYt898557843789~TestSender104~9800021376~Candy~0~0"
 * MessageCode~ Auth Code~ Request id~ Mobile No~Value1~ Value2
 */
$request_txn_no = time();
$ezpmsg = "msg=E06007~".$ezypay['key']."~".$request_txn_no."~".$account."~NA~NA";
$url = 'https://ezymoney.myezypay.in/RemitMoney/mtransfer';
//$url = "http://megafoneindia.in/ezypay-api.php";

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
	// E06008~Abc589654124~~7699999821~Sender Name~NA~SUCCESS~Description~NA~ NA
	//
	$ezrsp = explode("~",$output);
	if(count($ezrsp) > 2) {
		if($ezrsp[5]=='SUCCESS') {
			$jsDmtResponse = '{"EZY_RSP":"0","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_SENDER_NAME":"'.$ezrsp[3].'","EZY_SENDER_MOBILE":"'.$ezrsp[2].'"}';	
		} else if($ezrsp[5]=='FAILED') {
			$jsDmtResponse = '{"EZY_RSP":"1","EZY_MSG":"'.$ezrsp[6].'","EZY_MOB":"'.$account.'","EZY_SENDER_NAME":"NA","EZY_SENDER_MOBILE":"'.$account.'"}';	
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