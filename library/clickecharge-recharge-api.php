<?php
	/*
	* CLICK ECHARGE RECHARGE API
	*/
	$request_txn_no = $recharge_id;
	$url = "http://99-604-99-605.com/api/recharge.php?userid=".$echarge['uid']."&key=".$echarge['key']."&type=".$operator_info->service_type_echarge."&operator=".$operator_info->code_echarge."&number=".$account."&amount=".$amount."&usertxn=".$request_txn_no;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$output = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	
	if($output) {
		$json = explode(",", $output);
		$api_txn_no = isset($json[1]) && $json[1]!='' ? $json[1] : '';//
		$api_status = $json[0];//
		$api_status_details = isset($json[8]) ? $json[8] : '';//
		$operator_ref_no = isset($json[5]) && $json[5]!=''  ? $json[5] : '';	//	
		if($api_status=='SUCCESS') {		
			$status = '0';
			$status_details = 'Transaction Successful';	
		} else if ($api_status=='FAILURE') {			
			$status = '2';
			$status_details = 'Transaction Failed';		
		} else if($api_status=='PENDING') {		
			$status = '1';
			$status_details = 'Transaction Pending';
		} else if($api_status=='ERROR') {		
			$status = '2';
			$status_details = 'Transaction Failed,'.$json[1];	
		} else {		
			$status = '1';
			$status_details = 'Transaction Pending';	
		}	
	}