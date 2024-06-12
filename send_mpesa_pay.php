<?php 
date_default_timezone_set('Africa/Nairobi');  

# define the variales
# provide the following details, this part is found on your test credentials on the developer account
$BusinessShortCode =7188791;                                   
$BusinessTill =5173649;                                   
$Passkey = 'e74535d525a84df525f5fc521aa2988cbbca4a5a535504c76b46fdc5ea8ed02f';  

        /*
    This are your info, for
    $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
    $AccountReference, it maybe invoice number, account number etc on production systems, but for test just put anything
    TransactionDesc can be anything, probably a better description of or the transaction
    $Amount this is the total invoiced amount, Any amount here will be 
    actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
    for developer/test accounts, this money will be reversed automatically by midnight.
  */


        $PartyA = $phone; // This is your phone number, 
        $AccountReference = $invoice_no;
        $TransactionDesc = 'Order payment to Store Cartsen';
        //$Amount = $order_main_total;

        # Get the timestamp, format YYYYmmddhms -> 20181004151020
        $Timestamp = date('YmdHis');    

        # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
        $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

        # header for access token
        //$headers = ['Content-Type:application/json; charset=utf8'];  

        require_once 'mpesa/access_token.php';

        # callback url
        //$CallBackURL = 'https://cartsen.com';
        $CallBackURL = 'https://cartsen.com/index.php?page=order_mpesa';  //To change ***************************************************

        # header for stk push
        $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];

        # initiating the transaction
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $initiate_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header

        $curl_post_data = array(
          //Fill in the request parameters with valid values
          'BusinessShortCode' => $BusinessShortCode,
          'Password' => $Password,
          'Timestamp' => $Timestamp,
          'TransactionType' => 'CustomerBuyGoodsOnline',        //To change ***************************************************
          'Amount' => $Amount,
          'PartyA' => $PartyA,
          'PartyB' => $BusinessTill,
          'PhoneNumber' => $PartyA,
          'CallBackURL' => $CallBackURL,
          'AccountReference' => $AccountReference,
          'TransactionDesc' => $TransactionDesc
        );

        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        print_r($curl_response);

        echo $curl_response;   
?>