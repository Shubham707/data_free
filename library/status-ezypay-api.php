<?php
	/*
	* EzyPay RECHARGE STATUS
	*/
	$url = "https://api.myezypay.in/Ezypaywebservice/TransactionEnquiry.aspx?AuthorisationCode=".$ezypay['key']."&RequestID=".$request_txn_no;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	
	if($output !== false) {				
		$xmlsss = json_decode(json_encode((array) simplexml_load_string($output)), 1);	
		$xml = $xmlsss['sOperator'];
		$api_txn_no = isset($xml['ResponseID']) && $xml['ResponseID']!='' ? $xml['ResponseID'] : '';
		$api_status = isset($xml['Status']) ? $xml['Status'] : '';
		$api_status_details = isset($xml['Description']) ? $xml['Description'] : '';
		$operator_ref_no = isset($xml['OpRefno']) && $xml['OpRefno']!='' ? $xml['OpRefno'] : '';
	}