<?php
if(!defined('BROWSE')) { exit('No direct access allowed'); }

if($amount >= '1' && $amount <= '2500') {
	$operator_code = 'DMT1';
} else if($amount >= '2501' && $amount <= '5000') {
	$operator_code = 'DMT2';
} else {
	$operator_code = 'INVALIDOPERAOTRREQUEST';
}

if($agent_info) {
	$operator_info = $db->queryUniqueObject("SELECT opr.*, api.api_id, api.status AS api_status, ser.service_name, ser.status AS ser_status FROM operator_info opr LEFT JOIN api_info api ON opr.api_id=api.api_id LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id WHERE opr.operator_longcode='".$operator_code."' ");
	if($operator_info) {
		
		$api_id = $operator_info->api_id;
		$sCommission = getUserCommission(trim($agent_info->mdist_id), $operator_info->operator_id, $amount);		
		if($operator_info->is_surcharge=='y') {
			$surcharge_amount = $operator_info->surcharge_amount;
			$debit_amount = $amount + $surcharge_amount;
		} else {
			$surcharge_amount = '0';
			$debit_amount = $amount - $sCommission['rtCom'];
		}
		//
		$wallet = $db->queryUniqueObject("SELECT * FROM user_info WHERE uid='".$agent_info->uid."' ");
		if($wallet && (($wallet->balance - $wallet->cuttoff) >= $debit_amount)) {
			$status = '1';
			$db->execute("INSERT INTO `recharge_info`(`recharge_id`, `api_id`, `recharge_mode`, `agent_uid`, `account_no`, `operator_id`, `service_type`, `amount`, `surcharge`, `status`, `status_details`, `request_date`, `request_ip`, `is_refunded`, `is_complaint`) VALUES ('', '".$api_id."', '".$mode."', '".$agent_info->uid."', '".$account."', '".$operator_info->operator_id."', '".$operator_info->service_name."', '".$amount."', '".$surcharge_amount."', '".$status."', '', NOW(), '".$ip."', 'n', 'n')");
			$recharge_id = $db->lastInsertedId();
			if($operator_info->service_type=='4' || $operator_info->service_type=='5' || $operator_info->service_type=='6' || $operator_info->service_type=='7' || $operator_info->service_type=='8') {
				$db->execute("INSERT INTO `recharge_info_details`(`recharge_info_id`, `recharge_id`, `customer_account`, `billing_cycle`, `sub_division`, `district`, `ero`, `due_date`, `customer_name`, `customer_mobile`) VALUES ('', '".$recharge_id."','".$customer_account."', '".$billing_cycle."', '".$sub_division."', '".$district."', '".$ero."', '".$due_date."', '".$customer_name."', '".$customer_mobile."')");
			}
			
			/*
			 * Start Transaction
			 */
			$close_balance = $wallet->balance - $debit_amount;
			$db->query("UPDATE user_info SET balance='".$close_balance."' WHERE user_id='".$wallet->user_id."' ");
			$remark = "DMT REMITTANCE: $recharge_id, $account, $amount, $debit_amount";					
			$db->execute("INSERT INTO `transactions`(`transaction_id`, `transaction_date`, `account_id`, `to_account_id`, `ts_term`, `type`, `amount`, `closing_balance`, `ts_reference_no`, `remark`, `ts_user_type`, `ts_by`) VALUES ('', NOW(), '".$agent_info->uid."', '".$agent_info->uid."', 'RECHARGE', 'dr', '".$debit_amount."', '".$close_balance."', '".$recharge_id."', '".$remark."', '5', '".$agent_info->uid."')");
			
			/*
			 * Send to money remittance api
			 */
			include(DIR."/yesbank/money-remittance-check.php");
			
			if($status=='0') {
				/*
				* Update recharge response and params rsp_code, rsp_status, rsp_date, operator_id, server_txn_no
				*/
				$db->execute("UPDATE recharge_info SET status='".$status."', status_details='".$status_details."', response_date=NOW(), request_txn_no='".$request_txn_no."', api_txn_no='".$api_txn_no."', api_status='".$api_status."', api_status_details='".$api_status_details."', operator_ref_no='".$operator_ref_no."' WHERE recharge_id='".$recharge_id."' ");
				
				/*
				* Update commission for all parent users
				*/
				if($sCommission['rtCom'] > '0') {
					$db->execute("INSERT INTO `user_commission_info`(`recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('".$recharge_id."', '".$agent_info->uid."', '".$sCommission['rtCom']."', '".$close_balance."', NOW())");
				}
											
				//Commission Distributor
				if($sCommission['dsCom'] > '0') {
					$rDs = $db->queryUniqueObject("SELECT user_id,balance FROM user_info WHERE uid = '".$agent_info->dist_id."' ");
					if($rDs) {										
						$ds_close_balance = $rDs->balance + $sCommission['dsCom'];
						$db->execute("UPDATE user_info SET balance='".$ds_close_balance."' WHERE user_id='".$rDs->user_id."'");
						$db->execute("INSERT INTO `user_commission_info`(`recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('".$recharge_id."', '".$agent_info->dist_id."', '".$sCommission['dsCom']."', '".$ds_close_balance."', NOW())");
					}
				}
				
				//Commission Master Distributor
				if($sCommission['mdCom'] > '0') {
					$rMd = $db->queryUniqueObject("SELECT user_id,balance FROM user_info WHERE uid='".$agent_info->mdist_id."' ");
					if($rMd) {										
						$md_close_balance = $rMd->balance + $sCommission['mdCom'];
						$db->execute("UPDATE user_info SET balance='".$md_close_balance."' WHERE user_id='".$rMd->user_id."'");
						$db->execute("INSERT INTO `user_commission_info`(`recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('".$recharge_id."', '".$agent_info->mdist_id."', '".$sCommission['mdCom']."', '".$md_close_balance."', NOW())");				
					}
				}
				//Error Code: Recharge Success
			
			} else if ($status == '2') {								
				/*
				* revert recharge amount to agent
				*/												
				$wallet1 = $db->queryUniqueObject("SELECT user_id,balance FROM user_info WHERE uid = '".$agent_info->uid."' ");													
				$new_close_balance = $wallet1->balance + $debit_amount;
				$db->execute("UPDATE user_info SET balance = '".$new_close_balance."' WHERE user_id = '".$wallet1->user_id."' ");
				$remark_new = "DMT REMITTANCE: $recharge_id, $account, $amount, $debit_amount, Failed revert";		
				$db->execute("INSERT INTO `transactions`(`transaction_id`, `transaction_date`, `account_id`, `to_account_id`, `ts_term`, `type`, `amount`, `closing_balance`, `ts_reference_no`, `remark`, `ts_user_type`, `ts_by`) VALUES ('', NOW(), '".$agent_info->uid."', '".$agent_info->uid."', 'FAILURE', 'cr', '".$debit_amount."', '".$new_close_balance."', '".$recharge_id."', '".$remark_new."', '5', '".$agent_info->uid."')");
				
				/*
				* Update response status for failed recharge
				*/
				$db->execute("UPDATE recharge_info SET status = '".$status."', status_details = '".$status_details."', response_date = NOW(), request_txn_no = '".$request_txn_no."', api_txn_no = '".$api_txn_no."', api_status = '".$api_status."', api_status_details = '".$api_status_details."', is_refunded = 'y' WHERE recharge_id = '".$recharge_id."' ");
				//Error Code: Recharge Failed	
						
			} else if ($status == '1') {						
				$db->execute("UPDATE recharge_info SET status = '".$status."', status_details = '".$status_details."', request_txn_no = '".$request_txn_no."', api_txn_no = '".$api_txn_no."', api_status = '".$api_status."', api_status_details = '".$api_status_details."' WHERE recharge_id = '".$recharge_id."' ");
				//Error Code: Recharge Pending
						
			} else {
				/*
				 * Update response status for other status or having no status
				 */
				//Error Code: Recharge Pending
			}
					
			/*
			 * Insert recharge response log
			 */
			if(isset($output)) {
				$db->execute("INSERT INTO `recharge_log`(`txn_no`, `api_id`, `http_response_code`, `http_response_content`, `update_date`) VALUES ('".$recharge_id."', '".$api_id."', '".$http_code."', '".$output."', NOW())");
			}
			
		} else {
			//Error Code: Insufficiant Amount
			$jsDmtResponse = '{"ResponseCode":"25","Message":"Insufficient Balance in agent account"}';
		}
		
	} else {
		//Error Code: Invalid Amount
		$jsDmtResponse = '{"ResponseCode":"23","Message":"Invalid DMT operation"}';
	}
} else {
	//Error Code: Operator Downtime. Try Later
	$jsDmtResponse = '{"ResponseCode":"24","Message":"Agent not found"}';
}
?>