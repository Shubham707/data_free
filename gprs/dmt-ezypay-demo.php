<?php
header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
session_start();
define("BROWSE", "browse");
include("../config.php");
$ip = $_SERVER['REMOTE_ADDR'];
$mode = "GPRS";
$user_id = $_GET['user_id'];
$reference_txn_no = '';
//
$agent_info = $db->queryUniqueObject("SELECT * FROM apps_user WHERE user_id='".$user_id."'");
if($agent_info) {
	if(isset($_GET["mobile"]) && $_GET["mobile"]!='') {
		$account = isset($_GET['mobile']) && $_GET['mobile'] ? mysql_real_escape_string($_GET['mobile']) : '0';
		$request_txn_no = time();	
		if(isset($_GET['request']) && $_GET['request']=='senderValidate') {
			include(DIR."/ezypay-demo/sender-validate.php");
			echo $jsDmtResponse;
			exit();	
					
		} else if(isset($_GET['request']) && $_GET['request']=='senderRegistration') {
			$name = isset($_GET['name']) && $_GET['name']!='' ? mysql_real_escape_string($_GET['name']) : '';	
			include(DIR."/ezypay-demo/sender-registration.php");
			echo $jsDmtResponse;
			exit();
		
		} else if(isset($_GET['request']) && $_GET['request']=='beneficiaryList') {
			include(DIR."/ezypay-demo/beneficiary-list.php");
			echo $jsDmtResponse;
			exit();
			
		} else if(isset($_GET['request']) && $_GET['request']=='beneficiaryAdd') {
			$ben_name = isset($_GET['ben_name']) && $_GET['ben_name']!='' ? mysql_real_escape_string($_GET['ben_name']) : '';
			$bank_account = isset($_GET['ben_account']) && $_GET['ben_account']!='' ? mysql_real_escape_string($_GET['ben_account']) : '';
			$ifsc = isset($_GET['ifsc']) && $_GET['ifsc']!='' ? mysql_real_escape_string($_GET['ifsc']) : '';
			include(DIR."/ezypay-demo/beneficiary-add.php");
			echo $jsDmtResponse;
			exit();
			
		} else if(isset($_GET['request']) && $_GET['request']=='beneficiaryValidate') {
			$ben_account = isset($_GET['ben_account']) && $_GET['ben_account']!='' ? mysql_real_escape_string($_GET['ben_account']) : '0';
			$ben_aadhaar = isset($_GET['ben_aadhaar']) && $_GET['ben_aadhaar']!='' ? mysql_real_escape_string($_GET['ben_aadhaar']) : '526489754125';
			$ben_pan = isset($_GET['ben_pan']) && $_GET['ben_pan']!='' ? mysql_real_escape_string($_GET['ben_pan']) : 'CDER546859';
			$ben_ifsc = isset($_GET['ben_ifsc']) && $_GET['ben_ifsc']!='' ? mysql_real_escape_string($_GET['ben_ifsc']) : '';
			include(DIR."/ezypay-demo/beneficiary-validate.php");
			echo $jsDmtResponse;
			exit();
			
		} else if(isset($_GET['request']) && $_GET['request']=='beneficiaryDelete') {
			$ben_code = isset($_GET['ben_code']) && $_GET['ben_code']!='' ? mysql_real_escape_string($_GET['ben_code']) : '';
			include(DIR."/ezypay-demo/beneficiary-delete.php");
			echo $jsDmtResponse;
			exit();
			
		} elseif(isset($_GET['request']) && $_GET['request']=='moneyRemittance') {
			$ben_code = isset($_GET['ben_code']) && $_GET['ben_code']!='' ? mysql_real_escape_string($_GET['ben_code']) : '';
			$ben_type = isset($_GET['ben_type']) && $_GET['ben_type']!='' ? mysql_real_escape_string($_GET['ben_type']) : '';			
			$ben_aadhaar = isset($_GET['ben_aadhaar']) && $_GET['ben_aadhaar']!='' ? mysql_real_escape_string($_GET['ben_aadhaar']) : '526489754125';
			$ben_pan = isset($_GET['ben_pan']) && $_GET['ben_pan']!='' ? mysql_real_escape_string($_GET['ben_pan']) : 'CDER546859';
			$amount = isset($_GET['ben_amount']) && $_GET['ben_amount']!='' ? mysql_real_escape_string($_GET['ben_amount']) : '0';
			include(DIR."/ezypay-demo/money-remittance.php");
			
			echo $jsDmtResponse;
			exit();
			
		} elseif(isset($_GET['request']) && $_GET['request']=='otpVerify') {
			$otp_ref_code = isset($_GET['otp_ref_code']) && $_GET['otp_ref_code']!='' ? mysql_real_escape_string($_GET['otp_ref_code']) : '';
			$otp = isset($_GET['otp']) && $_GET['otp']!='' ? mysql_real_escape_string($_GET['otp']) : '';
			$otp_ref_id = isset($_GET['otp_ref_id']) && $_GET['otp_ref_id']!='' ? mysql_real_escape_string($_GET['otp_ref_id']) : '';
			include(DIR."/ezypay-demo/otp-verify.php");
			echo $jsDmtResponse;
			exit();
			
		} elseif(isset($_GET['request']) && $_GET['request']=='otpResend') {
			$otp_ref_code = isset($_GET['otp_ref_code']) && $_GET['otp_ref_code']!='' ? mysql_real_escape_string($_GET['otp_ref_code']) : '';
			include(DIR."/ezypay-demo/otp-resend.php");
			echo $jsDmtResponse;
			exit();
			
		} elseif(isset($_GET['request']) && $_GET['request']=='transactionHistory') {
			$from = isset($_GET['from']) && $_GET['from']!='' ? mysql_real_escape_string($_GET['from']) : date("d-m-Y");
			$to = isset($_GET['to']) && $_GET['to']!='' ? mysql_real_escape_string($_GET['to']) : date("d-m-Y");
			include(DIR."/ezypay-demo/transaction-history.php");
			echo $jsDmtResponse;
			exit();
		} elseif(isset($_GET['request']) && $_GET['request']=='senderBalance') {
			include(DIR."/ezypay-demo/sender-balance.php");
			echo $jsDmtResponse;
			exit();
			
		} else {
			echo '{"EZY_RSP":"1","EZY_MSG":"Invalid request"}';		
			exit();
		}
	} else {
		echo '{"EZY_RSP":"1","EZY_MSG":"Invalid sender mobile number"}';		
		exit();
	}
} else {
	echo '{"EZY_RSP":"22","EZY_MSG":"Invalid agent/retailer detail"}';		
	exit();
}