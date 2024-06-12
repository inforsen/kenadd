<?php
	$url = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

  	$BusinessShortCode =7188791;                                   

	/* This two files are provided in the project. */
	$confirmationUrl = 'https://cartsen.com/index.php?page=place-order'; // path to your confirmation url. can be IP address that is publicly accessible or a url
	$validationUrl = ''; // path to your validation url. can be IP address that is publicly accessible or a url


	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); //setting custom header


	$curl_post_data = array(
	  //Fill in the request parameters with valid values
	  'ShortCode' => $BusinessShortCode,
	  'ResponseType' => 'Confirmed',
	  'ConfirmationURL' => $confirmationUrl,
	  'ValidationURL' => $validationUrl
	);

	$data_string = json_encode($curl_post_data);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

	$curl_response = curl_exec($curl);
	print_r($curl_response);

	echo $curl_response;

?>
