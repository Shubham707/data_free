<?php
	/*
	* CLICk ECHARGE RECHARGE STATUS
	*/
	$api_status = "NA";
	$api_status_details = "NA";
	$operator_ref_no = "NA";
	
	$url = "http://99-604-99-605.com/api/status.php?userid=".$echarge['uid']."&key=".$echarge['key']."&txn=".$api_txn_no;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$output = curl_exec($ch);
	curl_close($ch); 	
	
	//Status,our_txn_no,operatorcode,account,amount,operator_ref_no,user_txn_no,message,time
	if($output !== false) {
		$data = explode(",", $output);
		if(count($data) > 2) {
			$api_status = isset($data[0]) && $data[0] != '' ? $data[0] : '-';
			$api_txn_no = isset($data[1]) && $data[1] != '' ? $data[1] : '-';
			$api_status_details = isset($data[7]) && $data[7] != '' ? $data[7] : '-';
			$operator_ref_no = isset($data[5]) && $data[5] != '' ? $data[5] : '';
		} else {
			$api_status = $data[0];
			$api_status_details = $data[1];
		}
	}
