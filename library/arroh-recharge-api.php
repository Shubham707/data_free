<?php
	/*
	* Arroh Recharge API 
	*/
	$request_txn_no = $recharge_id;
	$url = "http://arrohservice.in/APIs/KEyMaster.aspx?Key=".$arroh['key']."&mno=".$account."&op=".$operator_info->code_arroh."&amt=".$amount."&Refid=".$request_txn_no;
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$output = curl_exec($ch);
	$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	
	if($output) {	
		//$json = json_decode(json_encode((array) simplexml_load_string($output)), 1);
		//$json = json_decode($output, true);
		
		if(isJson($output)) {	
			$json = json_decode($output, true);			
		} else {
			libxml_use_internal_errors(true);
			$json = json_decode(json_encode((array) simplexml_load_string($output)), 1);
		}
		
		$api_status = $json['STATUS'];
		$api_txn_no = isset($json['REFID']) && $json['REFID']!='' ? $json['REFID'] : '';
		$api_status_details = isset($json['MSG']) && $json['MSG'] !='' ? $json['MSG'] : '';
		$operator_ref_no = isset($json['OPERATORID']) && $json['OPERATORID']!='' ? $json['OPERATORID'] : '';
		
		if($api_status == 'SUCCESS') {		
			$status = '0';
			$status_details = 'Transaction Successful';			
		} else if ($api_status == 'FAILED') {			
			$status = '2';
			$status_details = 'Transaction Failed';			
		} else if($api_status == 'PENDING') {		
			$status = '1';
			$status_details = 'Transaction Pending';					
		} else {		
			if(preg_match("/FAILED/i", $api_status_details)) {
				$status = '2';
				$status_details = 'Transaction Failed';	
			} else {		
				$status = '1';
				$status_details = 'Transaction Pending';
			}				
		}
	}