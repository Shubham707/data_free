<?php
	/*
	* Achariya 
	*/
	$request_txn_no = $recharge_id;
	$circle = "";
	$std_code = "";
	if($operator_info->operaotr_id == '5') {
		$url = "https://api.myezypay.in/Ezypaywebservice/postpaidpush.aspx?AuthorisationCode=".$ezypay['key']."&product=".$operator_info->code_ezypay."&MobileNumber=".$account."&Amount=".$amount."&RequestId=".$request_txn_no."&Circle=".$circle."&AcountNo=".$customer_account."&StdCode=".$std_code;
	} else {
		$url = "https://api.myezypay.in/Ezypaywebservice/PushRequest.aspx?AuthorisationCode=".$ezypay['key']."&product=".$operator_info->code_ezypay."&MobileNumber=".$account."&Amount=".$amount."&RequestId=".$request_txn_no."&StoreID=".$ezypay['storeid'];
	}	
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$output = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch); 
	
	if($output) {
		//Txnid~RequestId~MobileNumber~StatusId~description~Amount~balance~Date~oprefno
		$json = explode("~",$output);
		$api_txn_no = isset($json[0]) && $json[0]!='' ? $json[0] : '';
		$api_status = isset($json[3]) && $json[0]!='' ? $json[3] : '';
		$api_status_details = isset($json[4]) && $json[4]!='' ? $json[4] : '';		
		if($api_status=='1') {
			$operator_ref_no = isset($json[8]) && $json[8]!='' ? $json[8] : '';				
			$status = '0';
			$status_details = 'Transaction Successful';
		} else if($api_status=='100') {		
			$status = '1';
			$status_details = 'Transaction Pending';	
		} else {		
			$status = '2';
			$status_details = 'Transaction Failed';	
		}	
	}