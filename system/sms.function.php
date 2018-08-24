<?php
function smsSendSingle($mobile, $message, $mod = '') {	
	$url = "https://godspeed.liveair.in/httpapi/httpapi?token=081567e0c2f3581236ec27068746c901&sender=RECHRG&number=".$mobile."&route=2&type=3&sms=".urlencode($message);
	//print_r($url);
	/*
	* Submit to SMS API
	*/
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);	
}

/*
* SMS TEMPALTE
*/
function smsUserActivation($name, $userid, $password, $date) {
	$result = "Welcome to ".$name."! Account activated on ".$date.". Your USERID: ".$userid.", passsword: ".$password;
	return $result;
}

function smsPinChange($name, $pin) {
	$result = $name.": Pin has been successfully changed, Your new Pin is ".$pin;
	return $result;
}

function smsPasswordChange($name, $password) {
	$result = $name.": Password has been successfully changed, Your new Password is ".$password;
	return $result;
}

function smsBalanceCheck($name, $balance) {
	$result = $name.", Your current Balance is Rs.".$balance;
	return $result;
}

function smsFundTransfer($amount, $from, $to){
  $result = "Rs. ".$amount." transferred successfully from ".$from." to ".$to;
	return $result;
}

function smsFundDeduct($amount, $from, $to){
  $result = "Rs. ".$amount." deduct successfully from ".$from." to ".$to;
	return $result;
}

function smsRechargeStatus($status, $mobile, $amount, $date, $txn_no) {	
  $result = "Recharge Status: ".$status." on ".$mobile." Rs.".$amount.", (".$date.") Txn:".$txn_no;
	return $result;
}

function smsRechargeSuccess($operator, $mobile, $amount, $txn_no, $balance){
  $result = "Recharge success on ".$mobile." (".$operator.") Txn:".$txn_no.", Rs.".$amount.". Ur Bal Rs.".$balance;
	return $result;
}

function smsRechargeFail($operator, $mobile, $amount, $txn_no, $balance, $reason){
  $result = "Recharge fail on ".$mobile." (".$operator.") Txn:".$txn_no.", Rs.".$amount.", (".$reason.") Ur Bal Rs.".$balance;
	return $result;
}
?>