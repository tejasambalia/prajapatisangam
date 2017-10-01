<?php
$server = "http://www.prajapatisangam.com";

$url_data[0] = $server."/createRelation";
foreach ($url_data as $url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 0);
	$return = curl_exec ($ch);
	curl_close ($ch);
}
?>