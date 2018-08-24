<?php
session_start();
if(!isset($_SESSION['retailer'])) {
	header("location:index.php");
	exit();
}
include('../config.php');
include('common.php');

$id = isset($_GET['id']) && $_GET['id']!='' ? mysql_real_escape_string($_GET['id']) : 0;
$amount = isset($_GET['amount']) && $_GET['amount']!='' ? mysql_real_escape_string($_GET['amount']) : 0;
$agent_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE user_id='".$_SESSION['retailer']."' ");
if($agent_info) {
	$sCommission = getUsersCommission(trim($agent_info->mdist_id), $id, $amount, 'r');
	print_r($sCommission);
	echo "<br>";
	if($sCommission['surcharge']=='y') {
		$rch_comm_type = '1';
		$rch_comm_value = $sCommission['samount'];
	} else {
		$rch_comm_type = '0';
		$rch_comm_value = $sCommission['rtCom'];
	}
	$operator_info = $db->queryUniqueObject("SELECT * FROM operators WHERE operator_id='".$id."' ");
	$tax = getUserGstTxns($agent_info,$operator_info->billing_type,$rch_comm_value,$rch_comm_type);
	print_r($tax);
	echo "<br>";
	$wallet = $db->queryUniqueObject("SELECT wallet_id, balance FROM apps_wallet WHERE uid='".$agent_info->uid."' ");
	if($sCommission['surcharge'] == 'y') {
		$debit_amount = $amount + $tax['total_debit'];
	} else {
		$debit_amount = $amount - $tax['total_debit'];
	}
	$close_balance = $wallet->balance - $debit_amount;
	echo $debit_amount;
	echo "<br>";
	echo $close_balance;
}