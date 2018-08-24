<?php
if(!defined('BROWSE')) {
	exit('No direct access allowed');
}

// 
$request_txn_no = time();
//http://99-604-99-605.com/api/money-transfer.php?userid=20011095&key=133302f76347425311ba&request=beneficiaryAdd&mobile=9827506087&ben_name=Vedansh Online&ben_account=35997512335&ifsc=SBIN0030051

$url = "http://99-604-99-605.com/api/money-transfer2.php?userid=".$echarge['uid']."&key=".$echarge['key']."&request=".$_GET['request']."&mobile=".$account."&ben_mobile=".$ben_mobile."&ben_name=".urlencode($ben_name)."&ben_account=".$bank_account."&ifsc=".$ifsc;
//$db->execute("INSERT INTO `mt_logs`(`mt_logs_id`, `mt_logs_date`, `mt_logs_type`, `mt_logs`) VALUES ('', NOW(), 'BEN ADD PARA', '".$url."')");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if($output) {	
	$jsDmtResponse = $output;
} else {
	$jsDmtResponse = '{"ResponseCode":"18","Message":"Error, Response not recieved.","MobileNo":"'.$account.'"}';	
}	

//$jsDmtResponse = '{"ResponseCode":"18","Message":"Error, Response not recieved.","MobileNo":"'.$account.'"}';	
?>