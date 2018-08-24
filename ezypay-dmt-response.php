<?php
/*
 * Last update by Sunil on 04-09-2017
 * callback
 */
include('config.php');
$content="";
foreach ($_GET as $key => $value) {
	$content.= $key."=".urldecode($value)."; ";	
}
$db->query("INSERT INTO apps_reverse_response (api_id, reverse_response_content, response_time) VALUES ('13', '".$content."', NOW())");
//Txnid~RequestId ~MobileNumber~Status Id~description~Amount ~balance~ Date~oprefno
$output = isset($_GET['msg']) && $_GET['msg']!='' ? trim(mysql_real_escape_string($_GET['msg'])) : '';
$ezrsp = explode("~",$output);
if(count($ezrsp) > 2) {	
	$api_status = $ezrsp[3];
	$amount = $ezrsp[5];
	$account = $ezrsp[3];
	$recharge_id = $ezrsp[1];
	$api_txn_no = $ezrsp[0];
	$api_status_details = $ezrsp[4];	
	$recharge_info = $db->queryUniqueObject("SELECT * FROM apps_recharge WHERE api_txn_no='".$api_txn_no."' AND recharge_id='".$recharge_id."' AND is_callback='0' ");
	if($recharge_info) {
		$operator_info = $db->queryUniqueObject("SELECT * FROM operators WHERE operator_id='".$recharge_info->operator_id."'");
		//retailer row
		$agent_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$recharge_info->uid."'");
		if($agent_info) {
			if($api_status=='1') {
				$status = '0';
				$status_details = 'Transaction Successful';	
				$operator_ref_no = $ezrsp[8];
				
				/*
				 * Update recharge response and additional ref params rsp_code, rsp_status, rsp_date, operator_id, server_txn_no
				 */
				$db->execute("UPDATE apps_recharge SET status='".$status."', status_details='".$status_details."', api_status='".$api_status."', api_status_details='".$api_status_details."', response_date=NOW(), operator_ref_no='".$operator_ref_no."', is_callback='1' WHERE recharge_id='".$recharge_info->recharge_id."' ");
				
				/*
				 * Update commission for all parent users
				 */	
				if($agent_info->user_type=='1') {				
					$sCommission=getUsersCommission(trim($agent_info->uid), $operator_info->operator_id, $amount, 'api');
				} else if($agent_info->user_type=='6') {	
					$sCommission=getUsersCommission(trim($agent_info->uid), $operator_info->operator_id, $amount, 'r');
				} else {
					$sCommission=getUsersCommission(trim($agent_info->mdist_id), $operator_info->operator_id, $amount, 'r');
				}
				
				if($sCommission['rtCom']>'0') {
					$rt = $db->queryUniqueObject("SELECT * FROM transactions WHERE transaction_ref_no='".$recharge_id."' AND transaction_term='RECHARGE' AND account_id='".$agent_info->uid."'");
					$db->execute("INSERT INTO `commission_details`(`commission_id`, `recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('', '".$recharge_id."', '".$agent_info->uid."', '".$sCommission['rtCom']."', '".$rt->closing_balance."', NOW())");
				}
				
				//Commission Distributor
				if($sCommission['dsCom']>'0') {
					$db->query("START TRANSACTION");
					$ds=$db->queryUniqueObject("SELECT wallet_id,balance FROM apps_wallet WHERE uid='".$agent_info->dist_id."'");
					if($ds) {										
						$ds_close_balance=$ds->balance+$sCommission['dsCom'];
						$db->execute("UPDATE apps_wallet SET balance='".$ds_close_balance."' WHERE wallet_id='".$ds->wallet_id."'");
						$ts1=mysql_affected_rows();
						$db->execute("INSERT INTO `commission_details`(`commission_id`, `recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('', '".$recharge_id."', '".$agent_info->dist_id."', '".$sCommission['dsCom']."', '".$ds_close_balance."', NOW())");
						if($ts1) {
							$commit=$db->query("COMMIT");
						} else {
							$db->query("ROLLBACK");
						}
					} else {
						$db->query("ROLLBACK");
					}
				}
				
				//Commission Master Distributor Distributor
				if($sCommission['mdCom']>'0') {
					$db->query("START TRANSACTION");
					$md = $db->queryUniqueObject("SELECT wallet_id,balance FROM apps_wallet WHERE uid='".$agent_info->mdist_id."'");
					if($md) {										
						$md_close_balance = $md->balance + $sCommission['mdCom'];
						$db->execute("UPDATE apps_wallet SET balance='".$md_close_balance."' WHERE wallet_id='".$md->wallet_id."'");
						$ts2 = mysql_affected_rows();
						$db->execute("INSERT INTO `commission_details`(`recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('".$recharge_id."', '".$agent_info->mdist_id."', '".$sCommission['mdCom']."', '".$md_close_balance."', NOW())");
						if($ts2) {
							$commit = $db->query("COMMIT");
						} else {
							$db->query("ROLLBACK");
						}
					} else {
						$db->query("ROLLBACK");
					}
				}
				
				/*
				 * If Complaint then resolved
				 */
				$complaint_info=$db->queryUniqueObject("SELECT * FROM complaints WHERE txn_no = '".$recharge_id."'");				
				if($complaint_info && $complaint_info->status == '0') {
					$remark = "Complaint closed, recharge successful @hook";
					$db->query("UPDATE complaints SET status = '1', refund_status = '2', refund_by = '0', refund_date = NOW(), remark = '".$remark."' WHERE complaint_id = '".$complaint_info->complaint_id."' ");
					$db->execute("UPDATE apps_recharge SET is_complaint = 'c' WHERE recharge_id = '".$recharge_id."' ");
					$message = "Recharge already successful, Txn: ".$recharge_id.", ".$operator_info->operator_name.", ".$recharge_info->account_no.", Rs.".$recharge_info->amount." Ref. Id: ".$operator_ref_no;
					smsSendSingle($agent_info->mobile, $message, 'complaint_refund');
				}
				
			} elseif ($api_status=='101') {
				
				$status = '2';
				$status_details = 'Transaction Failed';		
				
				/*
				 * Update response status for failed recharge
				 */
				$db->execute("UPDATE apps_recharge SET status='".$status."', status_details='".$status_details."', response_date=NOW(), api_status='".$api_status."', is_callback='1' WHERE recharge_id='".$recharge_id."' ");				
				
				if($recharge_info->is_callback=='0') {
					
					/*
					 * Revert recharge amount to agent Use a refund function
					 */
					if($recharge_info->is_refunded=='n') {
						$account_id = $recharge_info->uid;
						$trans_info = $db->queryUniqueObject("SELECT * FROM transactions WHERE transaction_ref_no='".$recharge_id."' AND account_id='".$account_id."' ORDER BY transaction_date DESC");
						if($trans_info) {				
							if($trans_info->type=='dr') {
								$recharge_amount=$recharge_info->amount;						
								$debit_amount=$trans_info->amount;
								$db->query("START TRANSACTION");
								$wallet=$db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->uid."' ");													
								$closing_balance=$wallet->balance+$debit_amount;
								$db->execute("UPDATE apps_wallet SET balance='".$closing_balance."' WHERE wallet_id='".$wallet->wallet_id."' ");
								$ts1 = mysql_affected_rows();
								if($wallet && $ts1) {													
									$commit=$db->query("COMMIT");	
									if($commit) {													
										
										$remark_new="REVERT: $recharge_id, $account, $recharge_amount, $debit_amount, failed revert";										
										$db->execute("INSERT INTO `transactions`(`transaction_id`, `transaction_date`, `account_id`, `to_account_id`, `type`, `amount`, `closing_balance`, `transaction_term`, `transaction_ref_no`, `remark`, `transaction_user_type`, `transaction_by`) VALUES ('', NOW(), '".$agent_info->uid."', '".$agent_info->uid."', 'cr', '".$debit_amount."', '".$closing_balance."',  'FAILURE', '".$recharge_id."', '".$remark_new."', '5', '".$agent_info->uid."')");
										$ts_reference_id=$db->lastInsertedId();
										
										//If Complaint then resolved
										$complaint_info=$db->queryUniqueObject("SELECT * FROM complaints WHERE txn_no='".$recharge_id."'");				
										if($complaint_info && $complaint_info->status=='0') {
											$remark = "Complaint closed, recharge failed @hook";
											$db->query("UPDATE complaints SET status='1', refund_status='1', refund_by='0', refund_date=NOW(), remark='".$remark."' WHERE complaint_id='".$complaint_info->complaint_id."' ");
											$db->execute("UPDATE apps_recharge SET is_refunded='y', is_complaint='c' WHERE recharge_id='".$recharge_id."' ");
											$message="Complaint Refund Successful, Txn: ".$recharge_id.", ".$operator_info->operator_name.", ".$recharge_info->account_no.", Rs.".$recharge_info->amount." Ur Bal: ".$closing_balance;
											smsSendSingle($agent_info->mobile, $message, 'complaint_refund');
										} else {
											$db->execute("UPDATE apps_recharge SET is_refunded='y' WHERE recharge_id='".$recharge_id."' ");										
											$message = "Transaction Failed, ".$operator_info->operator_name.", ".$recharge_info->account_no.", Rs.".$recharge_amount." Txn: ".$recharge_id.". Ur Bal: ".$closing_balance;
											smsSendSingle($agent_info->mobile, $message, 'recharge');											
										}
									}
										
								} else {
									$db->query("ROLLBACK");
								}
							}
						}
					} //End amount not refunded	
				}							
			} 
		}
	}
}
?>
Success