<?php
if(!defined('BROWSE')) { exit('No direct access allowed'); }

$operator_code = "DMTV";
$amount = "5.00";
if($agent_info) {
	$operator_info = $db->queryUniqueObject("SELECT opr.*, api.api_id, api.status AS api_status, ser.service_name, ser.status AS ser_status FROM operators opr LEFT JOIN api_list api ON opr.api_id=api.api_id LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id WHERE opr.operator_code='".$operator_code."' ");
	if($operator_info) {
		$api_id = '13';					
		$isfund = $db->queryUniqueObject("SELECT wallet_id, balance, cuttoff FROM apps_wallet WHERE user_id='".$agent_info->user_id."' ");
		if($isfund && ($isfund->balance - $isfund->cuttoff) >= $amount) {
			
			//Send to check api						
			$status = '1';
			
			//Insert into recharge table
			$db->execute("INSERT INTO `apps_recharge`(`uid`, `recharge_mode`, `api_id`, `service_type`, `operator_id`, `account_no`, `amount`, `surcharge`, `status`, `status_details`, `request_date`, `reference_txn_no`, `recharge_ip`) VALUES ('".$agent_info->uid."', '".$mode."', '".$api_id."', '".$operator_info->service_name."', '".$operator_info->operator_id."', '".$account."', '".$amount."', '0', '".$status."', '', NOW(), '".$reference_txn_no."', '".$ip."')");
			$recharge_id = $db->lastInsertedId();
			
			$db->query("START TRANSACTION");
			$wallet = $db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->uid."' ");
			$debit_amount = $amount;
			$close_balance = $wallet->balance - $debit_amount;
			$db->query("UPDATE apps_wallet SET balance='".$close_balance."' WHERE wallet_id='".$wallet->wallet_id."' ");
			$ts1 = mysql_affected_rows();
			if($wallet && $ts1) {
				$commit = $db->query("COMMIT");
				if($commit) {
					$remark = "DMT Validate: $recharge_id, $account, $amount, $debit_amount";
					$db->execute("INSERT INTO `transactions`(`transaction_id`, `transaction_date`, `account_id`, `to_account_id`, `type`, `amount`, `closing_balance`, `transaction_term`, `transaction_ref_no`, `remark`, `transaction_user_type`, `transaction_by`) VALUES ('', NOW(), '".$agent_info->uid."', '".$agent_info->uid."', 'dr', '".$debit_amount."', '".$close_balance."',  'RECHARGE', '".$recharge_id."', '".$remark."', '5', '".$agent_info->uid."')");
					$transaction_id = $db->lastInsertedId();
					//Send to payment api	
					include(DIR."/ezypay/beneficiary-validate-api.php");
					
					if($status=='0') {
						
						$db->execute("UPDATE apps_recharge SET status='".$status."', status_details='".$status_details."', response_date=NOW(), request_txn_no='".$request_txn_no."', api_txn_no='".mysql_real_escape_string($api_txn_no)."', api_status='".mysql_real_escape_string($api_status)."', api_status_details='".mysql_real_escape_string($api_status_details)."', operator_ref_no='".mysql_real_escape_string($operator_ref_no)."' WHERE recharge_id='".$recharge_id."' ");
						
					}
					elseif($status=='2') {
						
						$db->execute("UPDATE apps_recharge SET status='".$status."', status_details='".$status_details."', response_date=NOW(), request_txn_no='".$request_txn_no."', api_txn_no='".mysql_real_escape_string($api_txn_no)."', api_status='".mysql_real_escape_string($api_status)."', api_status_details='".mysql_real_escape_string($api_status_details)."', operator_ref_no='".mysql_real_escape_string($operator_ref_no)."' WHERE recharge_id='".$recharge_id."' ");
												
					} else {
					
						$db->execute("UPDATE apps_recharge SET status='1', status_details='na', response_date=NOW(), request_txn_no='".$request_txn_no."', api_txn_no='".mysql_real_escape_string($api_txn_no)."', api_status='".mysql_real_escape_string($api_status)."', api_status_details='".mysql_real_escape_string($api_status_details)."', operator_ref_no='".mysql_real_escape_string($operator_ref_no)."' WHERE recharge_id='".$recharge_id."' ");
					}						
					
					//Update Output
					if(isset($output)) {
						$db->execute("INSERT INTO `apps_response_log`(`log_id`, `txn_no`, `api_id`, `http_response_code`, `http_response_content`, `update_date`) VALUES ('', '".$recharge_id."', '".$api_id."', '".$http_code."', '".mysql_real_escape_string($output)."', NOW())");
					}
					
				} else {
					$jsDmtResponse = '{"EZY_RSP":"27","EZY_MSG":"Request processed"}';
				}
				
			} else {
			
				$db->query("ROLLBACK");
				$db->execute("UPDATE apps_recharge SET status='6', status_details='Transaction cancelled', response_date=NOW() WHERE recharge_id='".$recharge_id."' ");				
				
				$jsDmtResponse = '{"EZY_RSP":"26","EZY_MSG":"Request validation cancelled"}';
			}
			
		} else {						
			$jsDmtResponse = '{"EZY_RSP":"25","EZY_MSG":"Insufficient Balance in agent account"}';									
		}	
	} else {
		$jsDmtResponse = '{"EZY_RSP":"23","EZY_MSG":"Invalid DMT operation"}';	
	}	
} else {
	$jsDmtResponse = '{"EZY_RSP":"24","EZY_MSG":"Agent not found"}';
}
?>