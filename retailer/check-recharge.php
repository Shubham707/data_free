<?php
session_start();
if(!isset($_SESSION['retailer'])) {
	header("location:index.php");
	exit();
}
include('../config.php');
include('common.php');
$result_code = '-1';
$operator_code = isset($_GET['id']) && $_GET['id']!='' ? mysql_real_escape_string($_GET['id']) : 0;
$amount = isset($_GET['amount']) && $_GET['amount']!='' ? mysql_real_escape_string($_GET['amount']) : 0;
$agent_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE user_id='".$_SESSION['retailer']."' ");
if($mode=="WEB") {
	$sOperator = "opr.operator_id='".trim($operator_code)."' ";
} else if($mode=="SMS" || $mode=="GPRS") {			
	$sOperator = "opr.operator_longcode='".trim($operator_code)."' ";
} else if($mode=="API") {
	$sOperator = "opr.operator_code='".trim($operator_code)."' ";
} else {
	$sOperator = "opr.operator_id='".trim($operator_code)."' ";
}
//
$operator_info_old = $db->queryUniqueObject("SELECT opr.*, api.api_id, api.status AS api_status, ser.service_name, ser.status AS ser_status FROM operators opr LEFT JOIN api_list api ON opr.api_id=api.api_id LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id WHERE $sOperator ");

$operator_info = $db->queryUniqueObject("SELECT opr.*, api.api_id, api.status AS api_status, ser.service_name, ser.status AS ser_status FROM operators opr LEFT JOIN api_list api ON opr.api_id=api.api_id LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id WHERE $sOperator ");

if($operator_info) {
	
	if($operator_info->is_express!='0') {
		$operator_info_new = $db->queryUniqueObject("SELECT opr.*, api.api_id, api.status AS api_status, ser.service_name, ser.status AS ser_status FROM operators opr LEFT JOIN api_list api ON opr.api_id=api.api_id LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id WHERE opr.operator_id='".trim($operator_info->is_express)."' AND opr.status='1' ");
		if($operator_info_new) {
			$operator_info = $operator_info_new;
		}
	}
	
	$duplicate_info = $db->queryUniqueObject("SELECT recharge_id FROM apps_recharge WHERE account_no='".$account."' AND amount='".$amount."' AND operator_id='".trim($operator_info->operator_id)."' AND (status='0' OR status='1' OR status='7' OR status='8') AND (request_date > DATE_SUB(NOW(), INTERVAL 2 HOUR)) ORDER BY recharge_id DESC ");
	if($duplicate_info) {
		//Error Code: Duplicate Recharge											
		$result_code = '310';
	} else {
		if($operator_info->ser_status == '1') {
			if($operator_info->api_status == '1') {
				if($operator_info->status == '1') {
					if($amount >= $operator_info->minimum_amount && $amount <= $operator_info->maximum_amount) {			
						
						$denom_info = $db->queryUniqueObject("SELECT deno.*, api.api_id, api.status AS api_status FROM operators_denominations deno LEFT JOIN api_list api ON deno.api_id = api.api_id WHERE deno.operator_id = '".$operator_info->operator_id."' AND deno.status = '1' AND FIND_IN_SET ($amount, deno.amount_values) ");
						if($denom_info) {
							if($denom_info->api_status == '1') {
								$api_id = $denom_info->api_id;
							} else {
								$api_id = $operator_info->api_id;
							}
						} else {
							if($agent_info->user_type=='1') {
								$user_info = $db->queryUniqueObject("SELECT user.*, api.api_id, api.status AS api_status FROM usercommissions user LEFT JOIN api_list api ON user.api_id = api.api_id WHERE user.operator_id = '".$operator_info->operator_id."' AND user.status = '1' AND user.uid='".$agent_info->uid."'");
							} else if($agent_info->user_type=='6') {
								$user_info = $db->queryUniqueObject("SELECT user.*, api.api_id, api.status AS api_status FROM usercommissions user LEFT JOIN api_list api ON user.api_id = api.api_id WHERE user.operator_id = '".$operator_info->operator_id."' AND user.status = '1' AND user.uid='".$agent_info->uid."'");
							} else {
								$user_info = $db->queryUniqueObject("SELECT user.*, api.api_id, api.status AS api_status FROM usercommissions user LEFT JOIN api_list api ON user.api_id = api.api_id WHERE user.operator_id = '".$operator_info->operator_id."' AND user.status = '1' AND user.uid='".$agent_info->mdist_id."'");
							}
							if($user_info) {
								if($user_info->api_status == '1') {
									$api_id = $user_info->api_id;
								} else {
									$api_id = $operator_info->api_id;
								}
        			} else {
								$api_id = $operator_info->api_id;
							}
						}
						
						print_r($operator_info);
						echo "<hr>";
								
						/*
						 * INSERT INTO RECHARGE TABLE
						 */
						if($agent_info->user_type=='1') {				
							$sCommission = getUsersCommission(trim($agent_info->uid), $operator_info->operator_id, $amount, 'api');
						}
						else if($agent_info->user_type=='6') {				
							$sCommission = getUsersCommission(trim($agent_info->uid), $operator_info->operator_id, $amount, 'r');
						}
						else {
							$sCommission = getUsersCommission(trim($agent_info->mdist_id), $operator_info->operator_id, $amount, 'r');
						}
						
						print_r($sCommission);
						echo "<hr>";
						
						if($sCommission['surcharge']=='y') {
							$rch_comm_type = '1';
							$rch_comm_value = $sCommission['samount'];
						} else {
							$rch_comm_type = '0';
							$rch_comm_value = $sCommission['rtCom'];
						}
						
						$isfund = $db->queryUniqueObject("SELECT wallet_id, balance, cuttoff FROM apps_wallet WHERE user_id='".$agent_info->user_id."' ");
						if($isfund && (($isfund->balance - $isfund->cuttoff) >= ($amount + $sCommission['samount']))) {
							$status = '0';
							$recharge_id = time();
							
							/*
							 * Start Transaction
							 */
							$db->query("START TRANSACTION");
							$wallet = $db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->uid."' ");
							$tax = getUserGstTxns($agent_info,$operator_info->billing_type,$rch_comm_value,$rch_comm_type);
							print_r($tax);
							echo "<hr>";
							if($sCommission['surcharge'] == 'y') {
								$debit_amount = $amount + $tax['total_debit'];
							} else {
								$debit_amount = $amount - $tax['total_debit'];
							}
							$close_balance = $wallet->balance - $debit_amount;
							echo "<hr>";
							echo "Retailer: ".$agent_info->company_name;
							echo "<br>";
							echo "Debit Amount: ".$tax['total_debit'];
							echo "<br>";
							echo "Balance: ".$close_balance;
							if($wallet) {
								if($status == '0') {
									echo "<br>";
									$remark = "RECHARGE: $recharge_id, $account, $amount, $debit_amount";
									print_r("INSERT INTO `transactions`(`transaction_date`, `account_id`, `to_account_id`, `type`, `amount`, `closing_balance`, `transaction_term`, `transaction_ref_no`, `remark`, `transaction_user_type`, `transaction_by`) VALUES (NOW(), '".$agent_info->uid."', '".$agent_info->uid."', 'dr', '".$debit_amount."', '".$close_balance."',  'RECHARGE', '".$recharge_id."', '".$remark."', '5', '".$agent_info->uid."')");
									echo "<br>";
									/*
									* Update commission for all parent users
									*/
									if($sCommission['surcharge']=='n' && $sCommission['rtCom'] > '0') {
										echo "<br>";
										print_r("INSERT INTO `commission_details`(`recharge_id`, `uid`, `amount`, `closing_balance`, `added_date`) VALUES ('".$recharge_id."', '".$agent_info->uid."', '".$tax['total_debit']."', '".$close_balance."', NOW())");
										echo "<br>";
									}
									
									if($agent_info->user_type!='1') {								
										//Commission Distributor
										if($sCommission['surcharge']=='n' && $sCommission['dsCom'] > '0') {
											$rDs = $db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->dist_id."' ");
											if($rDs) {
												$ds_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$agent_info->dist_id."' ");
												if($sCommission['surcharge']=='y') {
													$rch_ds_comm_value = '0';
												} else {
													$rch_ds_comm_value = $sCommission['dsCom'];
												}
												$taxDs = getUserGstTxns($ds_info,$operator_info->billing_type,$rch_ds_comm_value,$rch_comm_type);									
												$ds_close_balance = $rDs->balance + $taxDs['total_debit'];
												echo "<hr>";
												echo $ds_info->company_name;
												echo "<br>";
												echo "Amount: ".$taxDs['total_debit'];
												echo "<br>";
												echo "Balance: ".$ds_close_balance;
											}
										}
										//Commission MasterDistributor
										if($sCommission['surcharge']=='n' && $sCommission['mdCom'] > '0') {
											$rMd = $db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->mdist_id."' ");
											if($rMd) {
												$md_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$agent_info->mdist_id."' ");
												if($sCommission['surcharge']=='y') {
													$rch_md_comm_value = '0';
												} else {
													$rch_md_comm_value = $sCommission['mdCom'];
												}
												$taxMd = getUserGstTxns($md_info,$operator_info->billing_type,$rch_md_comm_value,$rch_comm_type);									
												$md_close_balance = $rMd->balance + $taxMd['total_debit'];
												echo "<hr>";
												echo $md_info->company_name;
												echo "<br>";
												echo "Amount: ".$taxMd['total_debit'];
												echo "<br>";
												echo "Balance: ".$md_close_balance;
											}
										}
									}
									//Error Code: Recharge Success
									$result_code = '300';
								
								} else if ($status == '2') {								
																			
									$result_code = '302';
								} else if ($status == '7') {		
									$result_code = '307';
											
								} else if ($status == '8') {
									$result_code = '308';
											
								} else if ($status == '1') {	
									$result_code = '301';
											
								} else {
									$result_code = '301';
								}
															
							} else {
								$result_code = '306';
							}
							
						} else {
							$result_code = '319';
						}
						
					} else {
						$result_code = '318';
					}
				} else {
					$result_code = '317';
				}
			} else {
				$result_code = '316';
			}
		} else {
			$result_code = '315';
		}
	}
} else {
	$result_code = '314';
}

echo $result_code;