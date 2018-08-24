<?php
//include('../config.php');
define("BROWSE", "browse");
//
$ezpmsg = "msg=E06007~E1hgYt898557843789~Abc589654123~7699999821~NA~NA";
$url = "http://www.pradeshtoday.com/post.php?id=195707";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if (curl_error($ch)) {
	print_r( curl_error($ch) );
	echo "<br>";
}
curl_close($ch);

print_r($output);


