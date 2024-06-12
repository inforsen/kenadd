<?php 

	$consumer_key="LpoKydEFqHivHRlSVnPZBRXUZnqOg31m"; //Fill with your app Consumer Key
    $consumer_secret="3ozBofBAf5bpe1rG"; // Fill with your app Secret

	# M-PESA endpoint urls
	$access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
	$initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

	$curl = curl_init($access_token_url);
	//curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);
	curl_setopt($curl, CURLOPT_USERPWD, $consumer_key.':'.$consumer_secret);
	$result = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$result = json_decode($result);
	$access_token = $result->access_token;  
	curl_close($curl);
?>